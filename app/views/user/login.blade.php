@extends('master')

@section('title')
  Login
@endsection

@section('content')
  <div class="pjLogin">
    <h2>Sign In</h2>
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

        <div >
            <input type="text" name="email" placeholder="Email Address">
         </div>

        <div>
            <input type="password" name="password"  placeholder="Password">
        </div>

        <div>
            <input type="submit" class="createButton" value="Sign In">
        </div>

    </form>

    <div id="pgLoginRegister">
      New Here? <a href="/user/register">Register</a>
    </div>
  </div>

@endsection