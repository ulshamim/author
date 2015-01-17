<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Free ecommerce template by @webdezign</title>
        <!--        <link rel="stylesheet" href="css/style.css" />-->

        {{ HTML::style('css/style.css') }}

        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        {{ HTML::script('js/jquery-ui-1.8.13.custom.min.js') }}

        <script type="text/javascript">
$(function () {
    // Tabs
    $('#tabs').tabs();
});
        </script>

        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css'>
        <!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
        <!--[if IE]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>


    <body  <?php
    if (URL::current() == 'http://localhost:8000') {
        echo "id='home'";
    } else {
        echo "";
    }
    ?> >
        <header>
            <div class="wrapper">
                <h1><a href="/" id="brand" title="ABC comp">ABC comp</a></h1>
                <nav>
                    <ul>
                        @foreach(Config::get('menu') as $menu)
                            @if(!$menu['hide'])
                                @if(Request::is($menu['path'])) <li class="active"> @else <li> @endif {{ HTML::link($menu['path'], Lang::get( $menu['name'])) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </header>
        <aside id="top">
            <div class="wrapper">
                <ul id="social">
                    <li><a href="#" class="facebook" title="like us us on Facebook">like us us on Facebook</a></li>
                    <li><a href="#" class="twitter" title="follow us on twitter">follow us on twitter</a></li>
                </ul>
                <form>
                    <input type="text" placeholder="Search ABC comp..." /><button type="submit">Search</button>
                </form>
                <div id="action-bar">
                    @if(Sentry::check())
                    <a href="users/edit/{{Sentry::getUser()->id}}">{{Sentry::getUser()->first_name}}</a>
                    <span>{{ HTML::link('logout', Lang::get('redminportal::menus.logout')) }}</span>
                    @else
                    {{ HTML::link('users/login','Login/Register') }}
                    <!--<a href="users/login">Login/Register</a>-->  
                    @endif
                    //    <a href="cart">     Your bag ({{Cart::totalItems()}})</a>

                </div>
            </div>
        </aside>

        @yield('content')
        <footer>
            <div class="wrapper">
                <span class="logo">ABC comp</span>
                <a href="http://www.webdezign.co.uk" target="_blank" title="web design london" class="right">Web design london</a>&copy; ABC comp <a href="#">Sitemap</a> <a href="#">Terms &amp; Conditions</a> <a href="#">Shipping &amp; Returns</a> <a href="#">Size Guide</a><a href="#">Help</a> <br />
                Address to said ABC comp, including postcode &nbsp;-&nbsp; 1.888.CO.name <a href="mailto:ABC comp">service@ABC comp.com</a>
            </div>
        </footer>
    </body>
</html>