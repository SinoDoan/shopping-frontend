@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection
@section('css')
    <link href="{{asset('frontend/home/home.css')}}" rel="stylesheet">
@endsection
@section('js')
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>
            <div class="table-responsive cart_info delete-cart-url">
                <table class="table table-condensed update-cart-url">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image" width="20%">Item</td>
                        <td class="description" width="25%"></td>
                        <td class="price" width="20%">Price</td>
                        <td class="quantity" width="15%">Quantity</td>
                        <td class="total" width="20%">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($carts as $id=>$cartItem)
                        @php
                            $total += $cartItem['price'] * $cartItem['quantity'];
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{config('app.base_url') . $cartItem['image']}}" alt=""
                                                style="width: 110px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cartItem['name']}}</a></h4>
                                <p>Web ID: {{$cartItem['id']}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cartItem['price'])}} VND</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <label for="">{{$cartItem['quantity']}}</label>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($cartItem['price'] * $cartItem['quantity'])}} VND</p>
                            </td>

                        </tr>
                    @endforeach
                    @php
                        $subTotal = $total * 1.1;
                    @endphp
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{number_format($total)}} VND</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>{{number_format($total * 0.1)}} VND</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{number_format($subTotal)}} VND</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="margin: 50 0 50 0; font-size: 20px" >
                <h4>Chọn hình thức thanh toán</h4>
            </div>
            <form action="{{route('orderPlace', $subTotal)}}" method="POST">
                @csrf
                <div class="payment-options">
					<span>
						<label><input name="payment_option" type="checkbox" value="1" > Direct Bank Transfer</label>
					</span>
                    <span>
						<label><input name="payment_option" type="checkbox" value="2" > COD</label>
					</span>
                    <span>
						<label><input name="payment_option" type="checkbox" value="3" > Paypal</label>
					</span>
                </div>
                <button type="submit" class="btn btn-primary btn-default">Thanh toán </button>
            </form>

        </div>
    </section> <!--/#cart_items-->
@endsection










