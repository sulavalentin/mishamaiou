@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(!empty($products) && count($products)>0)
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="item">
                            <a href="{{route('frontend.item',$product)}}">
                                <div class="content-item">
                                    <div class="image-item">
                                        <img src="{{$product->image}}" class="img-responsive">
                                    </div>
                                    <div class="title-item text-center">
                                        {{$product->title}}
                                    </div>
                                    <div class="price-item text-center">
                                        {{$product->price}} Lei
                                    </div>
                                    <div class="buttons-item">
                                        <button class="btn btn-primary btn-sm" name="buy" id="{{$product->id}}">Cumpara</button>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection