@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection
@section('css')
    <link href="{{asset('frontend/home/home.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('frontend\js\update-cart.js') }}"></script>
    <script src="{{ asset('frontend\js\delete-cart.js') }}"></script>
@endsection
@section('content')
<div class="wrapper">
    @include('products.cart.component.cart-info')
</div>


@endsection










