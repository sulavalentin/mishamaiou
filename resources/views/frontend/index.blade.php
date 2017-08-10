@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <header class="jumbotron hero-spacer col-lg-12" style="background-color: white;border: 1px solid #ccc;" id="burlacul-text">
                <div class="line-burlacul" style="margin-bottom: -10px;"></div>
                <h1 class="text-center">BurlaculTV!</h1>
                <div class="line-burlacul"></div>
                <p class="text-center">Îți Mulțumim că ai ales BURLACUL-SHOP , procurînd de la noi un produs ,automat susții proiectul nostru ceea ce ne ajuta ca să continuăm să filmăm pentru voi cele mai super video .Esti un Burlac Adevărat.</p>
                <p class="text-center"><a class="btn btn-primary btn-large" id="start-buy">Incepe cumparaturile !</a>
                </p>
            </header>
            <h1 class="text-center col-lg-12 product-text">Produse</h1>
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
    <script>
        $("#start-buy").click(function() {
            $('html, body').animate({
                scrollTop: $(".product-text").offset().top
            }, 500);
        });
    </script>
@endsection