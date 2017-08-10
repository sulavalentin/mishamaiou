<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endif
        {{ Html::style('css/custom.css') }}
        {{ Html::style('css/style.less') }}
        {{ Html::style('css/sweetalert.min.css') }}
        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        {{ Html::script('js/jquery-3.2.1.min.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/axios.min.js') }}
        {{ Html::script('js/sweetalert.min.js') }}
    </head>
    <body id="app-layout">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container" id="body">

                @include('includes.partials.messages')
                @yield('content')
                <div class="fullpageload" id="fullpageload" style="display: none;">
                    <div class="imgload">
                        <img src="{{asset('img/frontend/loading.gif')}}">
                    </div>
                </div>
            </div><!-- container -->
            <div id="product-data-modal">

            </div>

        </div><!--#app-->
        <footer id="footer">
            <div class="container">
                <?php $facebook = "burlacutv"; ?>
                <div class="col-md-6">
                    <iframe  src='//www.facebook.com/plugins/likebox.php?href={{$facebook}}&width=336&height=400&colorscheme=light&show_faces=true&header=false&stream=true&show_border=false&appId=578969238871389'scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:334px; height:400px;' allowTransparency='true'></iframe>
                </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="footercontact">
                            <li class="phone_f">(022) 99-09-82,  078 070 222,  068 441 447</li>
                            <li class="clock_f">Ln-Vn: 09:00-18:00, Simbata: 09:00-14:00</li>
                            <li class="address_f">str.Gh. Asachi 58</li>
                            <li class="email_f"><a href="mailto:client@tricou.md">client@tricou.md</a></li>
                            <li class="skype_f"><a href="skype://tricouri_haioase">tricouri_haioase</a></li>
                        </ul>
                    </div>
            </div>
        </footer>
        <!-- Scripts -->
        @yield('before-scripts')
        @stack('after-scripts')
        <script>
            if($( window ).height()< $( document ).height()){
                $('#body').height($( document ).height()-$('#frontend-navbar-collapse').height()-$('#footer').height());
            }else{
                $('#body').height($( window ).height());
            }

        </script>
        @include('includes.partials.ga')
    </body>
</html>