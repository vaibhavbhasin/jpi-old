{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Login')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="login-pattern"></div>
<div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-1 min-hig">
	<div class='loginbtndisplay text-center'>
		<p>LOGIN</p>
		<div class='text-center'>
			<a href="{{route('employeeLoginForm')}}" class='defaultbtn'>Employee Login</a>
			<div class='loginseparator'>or</div>
			<a href="javascript:void(0)" id='userform' class='btn btn btn-light-cyan btn-light-new-bg-bt'>External Login</a>
		</div>

	</div>

    <form class="login-form" method="POST" action="{{ route('login') }}" style='display:none;'>
      @csrf
      <!--<div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">{{ __('Sign in') }}</h5>
        </div>
      </div>-->
	  <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}"  autocomplete="email">
          <label for="email" class="center-align">{{ __('Username') }}</label>
          @error('email')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password"  autocomplete="current-password">
          <label for="password">{{ __('Password') }}</label>
          @error('password')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <!--<div class="row margin">
        <div class="col s12 m12 l12 apj-ml-2p5 mt-1">
          <p>
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <span>Remember Me</span>
            </label>
          </p>
        </div>
      </div> -->
      <div class="row">
        <div class="input-field col s12 text-center">
          <!--<button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">-->
          <button type="submit" id='loginbtn' class="defaultbtn login-btn">
            Login
          </button>
        </div>
      </div>
      <div class="row">
        <!-- <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
        </div> -->
        <div class="input-field col s12 mt--6">
          <p class="margin center-align medium-small">
            <a href="{{ route('password.request') }}" class="login-btn forgot-pasw-text">
            Forgot password?
           </a>
          </p>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
