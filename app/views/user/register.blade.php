@extends('master')

@section('title')
  Register
@endsection

@section('content')
  <div class="pjLogin">
    <h2>Register</h2>

    @if($errors->has())
        <div class="pjLoginAlert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif


    {{ Form::open() }}

        <div>
          <input type="text" name="display_name" placeholder="Display Name" autofocus>
        </div>

        <div>
          <input type="text" name="email" placeholder="Email Address">
        </div>

        <div>
          <input type="password" name="password" placeholder="Password">
        </div>

        <div>
          <input type="password" name="password_confirm" placeholder="Confirm Password">
        </div>

        <div>
          <input type="submit" class="createButton" value="Register">
        </div>

    {{ Form::close() }}

    <div id="pgLoginRegister">
      Got an Account? <a href="/user/login">Sign In</a>
    </div>
  </div>
@endsection
