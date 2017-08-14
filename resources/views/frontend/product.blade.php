@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 body-modal">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image-modal" >
                <img src="{{$product->image}}" class="img-responsive">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <h3 class="col-lg-9 text-center">{{$product->title}}</h3>
                <h3 class="col-lg-3 price-modal text-center">
                    <span id="price">{{$product->price}}</span>
                    Lei
                </h3>
                <hr>
                <span>
                            <p>Sex</p>
                            <label class="btn btn-default btn-circle btn-lg">
                                <input type="radio" name="sex" value="1">
                                <i class="fa fa-male"></i>
                            </label>
                            <label class="btn btn-default btn-circle btn-lg">
                                <input type="radio" name="sex" value="2">
                                <i class="fa fa-female"></i>
                            </label>
                            <label name="error" class="text-danger" style="display:none">Alege sexul</label>
                        </span>
                @if(!empty($product->sizes) && count($product->sizes)>0)
                    <span>
                                <p class="title-select">Marime</p>
                        @foreach($product->sizes as $size)
                            <label class="btn btn-default btn-circle btn-lg">
                                    <input type="radio" name="size" value="{{$size->size->id}}">
                                {{$size->size->size}}
                                </label>
                        @endforeach
                        <label name="error" class="text-danger" style="display:none">Alege marimea</label>
                            </span>
                @endif
                <span>
                            <p class="title-select">Culoare</p>
                            <label class="btn btn-default btn-circle btn-lg">
                                <input type="radio" name="color" value="1">
                                <img src="{{asset('img/frontend/alb.png')}}">
                            </label>
                            <label class="btn btn-default btn-circle btn-lg">
                                <input type="radio" name="color" value="2">
                                <img src="{{asset('img/frontend/negru.png')}}">
                            </label>
                            <label name="error" class="text-danger" style="display:none">Alege culoarea</label>
                        </span>

                @if(!empty($product->honorocs) && count($product->honorocs)>0)
                    <span>
                                <p class="title-select">Model Hanorac</p>
                        @foreach($product->honorocs as $honoroc)
                            <label class="btn btn-default btn-circle btn-lg">
                                    <input type="radio" name="honoroc" value="{{$honoroc->honoroc->id}}" price="{{$honoroc->honoroc->price}}" text="{{$honoroc->honoroc->title}}">
                                    <img src="{{asset('img/frontend/'.$honoroc->honoroc->image)}}">
                                </label>
                        @endforeach
                        <label id="honoroc-text">
                                </label>
                                <label name="error" class="text-danger" style="display:none">Alege Model Hanorac</label>
                            </span>
                @endif
                <hr>
                <div class="quantity">
                    <input type="number" min="1" value="1" name="quantity" readonly>
                    <label name="error" class="text-danger" style="display:none">Alege cantitatea</label>
                </div>
                <br> <hr>
                <button class="btn btn-primary" id="{{$product->id}}" name="final-buy">Cumpara</button>
            </div>

            <div class="row" style="background-color: white; margin-bottom:15px; padding-bottom:15px;">
                @if(!empty($descriptions) && count($descriptions)>0)
                    <ul class="horizontal">
                        @foreach($descriptions as $key => $description)
                            <li><a class="{{$key == 0 ? 'active':''}}" href="#a{{$key}}" name="nav-salary-guide">{{$description->title}}</a></li>
                        @endforeach
                    </ul>
                    @foreach($descriptions as $key => $description)
                        <div class="col-lg-12" id="a{{$key}}" name="annual-monthly-information" style="{{$key != 0 ? 'display:none':''}}">
                            {!! $description->description !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-9">
            @if(!empty($others) && count($others)>0)
                @foreach($others as $other)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="item">
                            <a href="{{route('frontend.item',$other)}}">
                                <div class="content-item">
                                    <div class="image-item">
                                        <img src="{{$other->image}}" class="img-responsive">
                                    </div>
                                    <div class="title-item text-center">
                                        {{$other->title}}
                                    </div>
                                    <div class="price-item text-center">
                                        {{$other->price}} Lei
                                    </div>
                                    <div class="buttons-item">
                                        <button class="btn btn-primary btn-sm" name="buy" id="{{$other->id}}">Cumpara</button>
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
        $('[name=nav-salary-guide]').click(function (e){
            e.preventDefault();
            $("[name=annual-monthly-information]").hide();
            var id = $(this).attr('href');
            $(id).show();
            $('[name=nav-salary-guide]').removeClass('active');
            $(this).addClass('active');
        });

        $('[name=final-buy]').on('click',function(){
            $('[name=error]').hide();
            success=true;
            $('input[type=radio]').each(function(key){
                if(!$("[name="+$(this).attr('name')+"]").is(":checked")){
                    $(this).parent().parent().find('[name=error]').show();
                    success=false;
                }
            });
            if(success===true){
                swal.setDefaults({
                    input: 'text',
                    inputValidator: function (value) {
                        return new Promise(function (resolve, reject) {
                            if (value.length > 0) {
                                resolve()
                            } else {
                                reject('Completeaza Campul)')
                            }
                        })
                    },
                    confirmButtonText: 'Urmatorul &rarr;',
                    showCancelButton: true,
                    animation: false,
                    progressSteps: ['1', '2', '3']
                })
                var steps = [
                    {
                        title: 'Pasul 1',
                        text: 'Introdu numele'
                    },
                    {
                        title: 'Pasul 2',
                        text: 'Introdu email'
                    },
                    {
                        title: 'Pasul 3',
                        text: 'Introdu telefonul'
                    },
                ];
                swal.queue(steps).then(function (result) {
                    swal.resetDefaults();
                    swal({
                        title: "Va rugam sa asteptati!",
                        html: "<img src='{{asset('img/frontend/loading.gif')}}' style='width:50px;'>",
                        showConfirmButton: false
                    });
                    var name = result[0];
                    var email = result[1];
                    var telephone = result[2];
                    var id = $(this).attr('id');
                    axios.post('{{route('frontend.save.command')}}',{
                        product : $('[name=final-buy]').attr('id'),
                        sex : $('[name=sex]:checked').val(),
                        size : $('[name=size]:checked').val(),
                        color : $('[name=color]:checked').val(),
                        @if(!empty($product->honorocs) && count($product->honorocs)>0)
                        honoroc : $('[name=honoroc]:checked').val(),
                        @endif
                        quantity : $('[name=quantity]').val(),
                        name:name,
                        email:email,
                        telephone:telephone,
                    })
                        .then(function(response){
                            $('#product-modal').modal('hide');
                            swal(
                                'Va multumim!',
                                'In curand veti fi apelat!',
                                'success'
                            )

                        }).catch(function(error){
                        swal(
                            'Oops...',
                            'A aparut o eroare necunoscuta',
                            'error'
                        )
                    })
                }, function () {
                    swal.resetDefaults()
                })
            }
        });
        var price = "{{$product->price}}";
        $('[type=radio]').on('click',function(){
            $(this).parent().parent().find('[name=error]').hide();
            var name = $(this).attr('name');
            $('[name='+name+']').parent().removeClass('activ');
            $(this).parent().addClass('activ');
        });
        $("[name=quantity]").on('change',function(){

            @if(!empty($product->honorocs) && count($product->honorocs)>0)
            if($("[name=honoroc]").is(':checked')){
                $('#price').text(price*$(this).val()+parseInt($("[name=honoroc]:checked").attr('price')*$(this).val()));
            }else{
                $('#price').text(price*$(this).val());
            }
            @else
$('#price').text(price*$(this).val());
            @endif
        });
        $("[name=honoroc]").on('change',function(){
            $('#price').text(parseInt(price*$("[name=quantity]").val())+parseInt($(this).attr('price')*$("[name=quantity]").val()));
            $('#honoroc-text').text($(this).attr('text'));
        });

        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
        jQuery('.quantity').each(function() {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });
    </script>
@endsection
