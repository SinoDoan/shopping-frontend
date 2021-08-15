<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Setting;
use App\ShippingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages.checkout.login_checkout');
    }
    public function add_customer(Request $request)
    {
        $customer = Customer::insertGetId([
           'customer_name'=> $request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_password'=>md5($request->customer_password),
            'customer_phone'=>$request->customer_phone
        ]);
        Session::put('customer_id', $customer);
        Session::put('customer_name', $request->customer_name);
        $customer_id = Session::get('customer_id');
        return redirect()->route('checkout');

    }
    public function checkout(){
        return view('pages.checkout.checkout');
    }
    public function save_checkout_customer(Request $request)
    {
        $shipping = ShippingOrder::insertGetId([
            'shipping_name'=> $request->shipping_name,
            'shipping_email'=>$request->shipping_email,
            'shipping_address'=>$request->shipping_address,
            'shipping_phone'=>$request->shipping_phone,
            'shipping_note'=>$request->shipping_note
        ]);
        Session::put('shipping_id', $shipping);
        return redirect()->route('payment');
    }
    public function payment(){
        $carts = session()->get('cart');
        return view('pages.checkout.payment', compact('carts'));
    }
    public function logout_checkout()
    {
        Session::flush();
        return redirect()->route('login_checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = Customer::where('customer_email', $email)->where('customer_password', $password)->first();
        Session::put('customer_id', $result->id);
        if($result){
            return redirect()->route('checkout');
        }
        else{
            return redirect()->route('login_checkout');
        }
    }
    public function order_place (Request $request, $subTotal){
        //insert payment method
        $dataPayment = [
            'payment_method' =>$request->payment_option,
            'payment_status' => 'Dang cho xu ly'
        ];
        $payment_id = DB::table('tbl_payment')->insertGetId($dataPayment);

        //insert order
        $dataOrder = [
            'customer_id'=>Session::get('customer_id'),
            'shipping_id'=>Session::get('shipping_id'),
            'payment_id'=>$payment_id,
            'order_total'=>$subTotal,
            'order_status'=>'Dang cho xu ly'
        ];
        $order_id = DB::table('tbl_order')->insertGetId($dataOrder);

        //insert order_detail
        $carts = session()->get('cart');
        foreach ($carts as $id=>$cart){
            $dataOrderDetail = [
                'order_id' => $order_id,
                'product_id' => $cart['id'],
                'product_name' => $cart['name'],
                'product_price' => $cart['price'],
                'product_sale_quantity' => $cart['quantity']
            ];
            DB::table('tbl_order_detail')->insert($dataOrderDetail);
        }
        if($dataPayment['payment_method'] == 1){
            echo ('ATM');
        }
        elseif ($dataPayment['payment_method'] == 2){
            $request->session()->forget('cart');
            return view('pages.checkout.cash-on-delivery');
        }
        elseif ($dataPayment['payment_method'] == 3){
            echo ('Credit');
        }
    }
}
