<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach($recommendProducts as $key=> $item)
                @if($key % 3 == 0 )
                    <div class="item {{$key == 0 ? 'active' : ''}}">
                        @endif
                        <a href="{{route('product.detail', ['id'=>$item->id])}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{config('app.base_url') . $item->feature_image_path}}" alt=""/>
                                        <h2>{{number_format($item->price)}} VND</h2>
                                        <p>{{$item->name}}</p>
                                        <a href="#"
                                           data-url = "{{route('addToCart', ['id'=>$item->id])}}"
                                           class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </a>
                        @if($key % 3 == 2 )
                    </div>
                @endif
            @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
