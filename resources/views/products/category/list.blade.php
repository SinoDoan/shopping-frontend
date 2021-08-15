@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection
@section('css')
    <link href="{{asset('frontend/home/home.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('frontend\js\add-to-cart-alert.js') }}"></script>
@endsection
@section('content')

    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $productItem)
                            <a href="{{route('product.detail', ['id'=>$productItem->id])}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{config('app.base_url') . $productItem->feature_image_path}}" alt="" />
                                        <h2>{{number_format($productItem->price)}}</h2>
                                        <p>{{$productItem->name}}</p>
                                        <a href="#"
                                           data-url = "{{route('addToCart', ['id'=>$productItem->id])}}"
                                           class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            </a>
                        @endforeach

                        {{$products->links()}}
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>
@endsection










