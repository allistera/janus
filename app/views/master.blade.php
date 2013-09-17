<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>@yield('title') :: Your Diet Planner</title>

    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/foundation.css') }}
    {{ HTML::style('css/vendor/fancybox/jquery.fancybox.css') }}
    {{ HTML::style('css/style.css') }}

    {{ HTML::script('js/vendor/custom.modernizr.js') }}
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Fauna+One|Balthazar' rel='stylesheet' type='text/css'>
</head>
<body>
    @if (Auth::check())
    <div class="show-for-touch fixed">
        <div data-alert class="pjSuccessBox" style="opacity: 1;">
            We have detected you might be using a mobile. Your Diet Planer doesn't support mobiles currently, please use a desktop.
            <a href="#" class="closeSuccess">&times;</a>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".closeSuccess").click(function() {
                $(this).parent().hide();
                return false;
            });
        });
        </script>
    </div>
    @endif
    @if (!Auth::check())
    <nav class="top-bar">
        <ul class="title-area">
            <!-- Title Area -->
            <li class="name">
                <h1><a href="/" style="display:inline"><img src="/img/logo.png" width="32"> Your Diet Planner </a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">

            <ul class="right">
                <li class="divider"></li>
                <li><a href="/user/register">Sign Up</a></li>
                <li class="divider"></li>
                <li><a href="/user/login">Login</a></li>
            </ul>

        </section>
    </nav>
    @else

    <div class="userNav" style="background">
        <h1 id="logo"><a href="/"><img src="/img/logo.png" width="32"><span>Your Diet Planner</span></a></h1>

        <div class="clearfix"></div>

        <div id="createBtn">
            <form action="/plan/create" method="get">
                <button href="/plan/create">Create Plan</button>
            </form>
        </div>

        <ul>
            <a href="/"><li @if(Request::is('plan')) class="active" @endif><i class="foundicon-calendar"></i> Your Plans</li></a>
            <a href="/item"><li @if(Request::is('item')) class="active" @endif><i class="foundicon-cart"></i> Items</li></a>
            <a href="/user/goals"><li @if(Request::is('user/goals')) class="active" @endif><i class="foundicon-star"></i>Goals</li></a>
            <a href="/user/logout" ><li class="spacer"><i class="foundicon-lock"></i>Logout</li></a>
        </ul>

        <div class="userNavFooter">
            <small>
                <a href="http://www.allisterantosik.com">Allister Antosik</a>&nbsp; - &nbsp;
                <a href="/privacy">Privacy</a> - <a href="http://www.allisterantosik.com/contact" target="_blank">Contact</a>
            </small>
        </div>
    </div>

    @endif

    @if (Session::get('success'))
        <div data-alert class="pjSuccessBox">
            {{ Session::get('success') }}
            <a href="#" class="closeSuccess">&times;</a>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".pjSuccessBox").delay(2000).fadeOut("slow");
            $(".closeSuccess").click(function() {
                $(this).parent().hide();
                return false;
            });
        });
        </script>
    @endif


    <div @if (Auth::check()) class="mainSection" @endif>
        @yield('content')
    </div>

    @if (!Auth::check())
    <div class="row footer">
        <hr/>
        <small><a href="http://www.allisterantosik.com">Allister Antosik</a></small>
        <small class="right">
            <a href="/privacy">Privacy</a> |
            <a href="http://www.allisterantosik.com/contact" target="_blank">Contact</a>
        </small>
    </div>
    @endif

    {{ HTML::script('js/vendor/foundation.min.js') }}
    {{ HTML::script('js/vendor/jquery.fancybox.js') }}
    @yield('javascript')

    <script type="text/javascript">
        $(document).foundation();
        $('.fancybox').fancybox();
    </script>
</body>
</html>

