@extends('layouts.app')

@section('content')
<div class="limiter">  
    <div class="container-login100" style="background-image: url('image/bg-image-1.png');">     
        <div class="wrap-login100">
          <span class="login100-form-title">
            Login
        </span>
        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
            @csrf

            <div class=" wrap-input100 validate-input" data-validate = "Enter Email">
                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} input100" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus >

                <span class="focus-input100" data-placeholder="&#xf007;"></span>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                <span class="focus-input100" data-placeholder="&#xf06e;"></span>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="textcenter">
                <div class="container-login100-form-btn">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
          
                <a class="btn btn-link txt1" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            
         
               <a class="btn btn-link txt1 mr-auto" href="{{ route('register') }}">
                {{ __('Create new account.') }}
            </a>
        
    </div>
</form>
</div>
</div>
</div>

@endsection
