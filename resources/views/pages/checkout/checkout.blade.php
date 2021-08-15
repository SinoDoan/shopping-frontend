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
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <form action="{{route('saveCheckoutCustomer')}}" method="POST" >
                                @csrf
                                <input type="text" name="shipping_email" placeholder="Email">
                                <input type="text" name="shipping_name" placeholder="Name">
                                <input type="text" name="shipping_address" placeholder="Address">
                                <input type="text" name="shipping_phone" placeholder="Phone">
                                <div class="order-message">
                                    <p>Shipping Order</p>
                                    <textarea name="shipping_note"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-default">Gửi</button>
                          </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection










