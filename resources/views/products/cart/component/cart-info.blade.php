<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info delete-cart-url" data-url="{{route('deleteCart')}}">
            <table class="table table-condensed update-cart-url" data-url="{{route('updateCart')}}">
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
                                <input type="number"
                                       name="quantity"
                                       value="{{$cartItem['quantity']}}"
                                       min="1"
                                       class="update-cart quantity"
                                       data-id="{{$id}}"
                                       onchange="updateCart()"
                                       style="width: 70px">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($cartItem['price'] * $cartItem['quantity'])}} VND</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i data-id="{{$id}}" class="fa fa-times cart-delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{number_format($total)}} VND</span></li>
                        <li>Eco Tax <span>{{number_format($total * 0.1)}} VND</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{number_format($total * 1.1)}} VND</span></li>
                    </ul>
{{--                    <a class="btn btn-default update" href="">Update</a>--}}
                    @php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('shipping_id');
                    @endphp
                    @if($customer_id != NULL && $shipping_id == NULL)
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                    @elseif($customer_id != NULL && $shipping_id != NULL)
                        <a class="btn btn-default check_out" href="{{route('payment')}}">Check Out</a>
                    @else
                        <a class="btn btn-default check_out" href="{{route('login_checkout')}}">Check Out</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
