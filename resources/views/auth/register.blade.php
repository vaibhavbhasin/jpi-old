{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Register')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="login-pattern"></div>
<div id="register-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Register</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="col s12">
        <div class="row">
        <div class="input-field col s6 padding_kl">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="firstname" type="text" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"
             autocomplete="firstname" >
          <label for="firstname" class="center-align">Firstname</label>
          @error('firstname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6 padding_kl">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"
             autocomplete="lastname" >
          <label for="lastname" class="center-align">Lastname</label>
          @error('lastname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
            @enderror
        </div>
        </div>
        </div>
      </div>
        <div class="row margin">
            <div class="col s12">
            </div>
        </div>

        <div class="row margin">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">mail_outline</i>
                <input id="email_save" type="hidden" name="email" value="{{ old('email') }}">
                <input id="email" type="text" class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                       autocomplete="email">
                <button type="button" class="button button-secondary emailaddress-hint">
                    @jpi.com
                </button>
                <label for="email">Email</label>
                @error('email')
                <small class="red-text ml-7" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="row margin">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                       autocomplete="new-password">
                <label for="password">Password</label>
                @error('password')
                <small class="red-text ml-7" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>
        <div class="row margin">
            <div class="col s12">
                <div class="passw">
                    <p> Password Requirements: </p>
                    <ul>
                        <li>Must contain at least 8 characters (12+ recommended )</li>
              <li>Must contain at least one uppercase letter</li>
              <li>Must contain at least one lowercase letter</li>
              <li>Must contain at least one number</li>
              <li>Must contain at least one special character</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm" type="password" name="password_confirmation"
            autocomplete="new-password">
          <label for="password-confirm">Confirm Password</label>
        </div>
        </div>

      <div class="row">
        <div class="input-field col s12">
          <div class='text-center'>
			<button type="submit" class="defaultbtn apj-reg-btn" id='register_user'>Register</button>
		  </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 mt--6">
          <p class="margin center-align medium-small"><a href="{{ route('login')}}" >Already have an account? Login</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
