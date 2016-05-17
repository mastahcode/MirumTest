@extends('masterTemplates.masterTemplates')


<div class="container">

    <form method="post" action="{{url(action('PasswordRecoverResetController@postResetPassword'))}}" class="form-signin">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('frontend.messages.flash')
        @include('frontend.messages.error')

        <h2 class="form-signin-heading">Reset password</h2>


        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Now</button>
    </form>

</div> <!-- /container -->

