<header class="container">
    <div class="row">
        <div class="col-md-2 col-lg-2 header-logo">
            <a href="/">
                <img src="{{asset('img/recrut_color.png')}}" alt="Logo">
            </a>
        </div>
        <div class="col-md-2 col-lg-2 header-nav pull-right" id="register">
            <a href="{{ url('/register') }}">Register</a>
        </div>
        <div class="col-md-2 col-lg-2 header-nav pull-right" id="login">
            <a href="{{ url('/login') }}">Login</a>
        </div>
    </div>
</header>