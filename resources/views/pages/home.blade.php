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

    <!--slider-->
    @include('pages.component.slider')
    <!--/slider-->


    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('pages.component.feature-product')
                    <!--features_items-->

                    <!--category-tab-->
                    @include('pages.component.category-tab')
                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('pages.component.recommended-product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
