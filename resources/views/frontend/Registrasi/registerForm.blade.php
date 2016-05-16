@extends('masterTemplates.masterTemplates')


<div class="container">


    <form method="post" class="form-signin" action="{{url(action('RegisterController@store'))}}">
        @include('frontend.messages.error')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="form-signin-heading">Form Registrasi</h2>


        <label for="inputNama" class="sr-only">Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="nama" required autofocus>

        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <label for="inputPassword" class="sr-only">Re Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Re Same Password" required>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

</div> <!-- /container -->

