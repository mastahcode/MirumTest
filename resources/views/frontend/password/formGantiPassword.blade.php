@extends('masterTemplates.masterTemplates')


<div class="container">

    <form method="post" action="{{url(action('PasswordRecoverResetController@postGantiPassword'))}}"
          class="form-signin">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('frontend.messages.flash')


        <h2 class="form-signin-heading">Ganti password</h2>


        <div class="form-group">
            {!! Form::label('passwordLama','Password Lama:') !!}
            {!! Form::password('passwordLama',['class'=>'form-control']) !!}
        </div>

        <!--PasswordBaru form input-->
        <div class="form-group">
            {!! Form::label('passwordBaru','Password Baru:') !!}
            {!! Form::password('passwordBaru',['class'=>'form-control']) !!}
        </div>

        <!--PasswordBaruLagi form input-->
        <div class="form-group">
            {!! Form::label('passwordBaru','Ulangi Password Baru:') !!}
            {!! Form::password('ulangiPasswordBaru',['class'=>'form-control']) !!}
        </div>

        <!--simpan Button Submit-->
        <div class="form-group">
            {!! Form::submit('simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        @include('frontend.messages.error')
    </form>

</div> <!-- /container -->

