<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $categoryItem)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if($categoryItem->categoryChildren->count())
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$categoryItem->id}}">
                            <span class="badge pull-right">
                                    <i class="fa fa-plus"></i>
                            </span>
                            {{$categoryItem->name}}
                        </a>
                        @else
                            <a href="{{route('category.product', ['slug'=> $categoryItem->slug, 'id'=>$categoryItem->id])}}">
                            <span class="badge pull-right"></span>
                                {{$categoryItem->name}}
                            </a>
                        @endif
                    </h4>
                </div>
                <div id="sportswear_{{$categoryItem->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($categoryItem->categoryChildren as $categoryChildren)
                            <li>
                                <a href="{{route('category.product', ['slug'=> $categoryChildren->slug, 'id'=>$categoryChildren->id])}}">
                                    {{$categoryChildren->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--/category-products-->

{{--        <div class="price-range"><!--price-range-->--}}
{{--            <h2>Price Range</h2>--}}
{{--            <div class="well text-center">--}}
{{--                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />--}}
{{--                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>--}}
{{--            </div>--}}
{{--        </div><!--/price-range-->--}}

{{--        <div class="shipping text-center"><!--shipping-->--}}
{{--            <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" />--}}
{{--        </div><!--/shipping-->--}}

    </div>
</div>
