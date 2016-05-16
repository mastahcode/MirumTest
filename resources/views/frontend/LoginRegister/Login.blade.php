@extends('masterTemplates.masterTemplates')


<div class="container">

    <form method="post" action="{{url(action('LoginController@postLogin'))}}" class="form-signin">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('frontend.messages.flash')
        @include('frontend.messages.error')

        <h2 class="form-signin-heading">Please sign in</h2>

            <a href="{{url(action('FacebookLoginController@getFacebook'))}}">Facebook</a> |
            <a href="{{url(action('TwitterLoginController@getTwitter'))}}">Twitter</a>


        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="username" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <div>
            <label>
                Lupa password? click <a href="">here</a>

            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

