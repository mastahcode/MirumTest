<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url(action('BlogFrontController@index'))}}">Home</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{url(action('BlogFrontController@aboutMe'))}}">About me</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
                <li><a href="{{url(action('LoginController@index'))}}">Login</a></li>
                <li><a href="{{url(action('RegisterController@index'))}}">Register</a></li>

            @else
                <li><a href="{{url(action('RegisterController@index'))}}">{{Auth::user()->username}}</a></li>
                <li><a href="{{url(action('LoginController@getLogout'))}}">Logout</a></li>
                <li><a href="{{url(action('BlogBackendController@index'))}}">Backend</a></li>
                <li><a href="{{url(action('PasswordRecoverResetController@getGantiPassword'))}}">Ganti Password</a></li>
                @if(Auth::user()->hasRole('admin'))
                    <li><a href="{{url(action('AdminController@index'))}}">Admin</a></li>
                @endif

            @endif


        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>