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
        <footer>
            <div class="container">

            </div>
        </footer>
        <!-- Scripts -->
        @yield('before-scripts')
        @stack('after-scripts')
        <script>
            if($( window ).height()< $( document ).height()){
                $('#body').height($( document ).height()-$('#frontend-navbar-collapse').height());
            }else{
                $('#body').height($( window ).height());
            }

        </script>
        @include('includes.partials.ga')
    </body>
</html>