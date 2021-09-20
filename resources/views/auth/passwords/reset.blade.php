{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Reset Password')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="login-pattern"></div>
<div id="login-page" class="row">
<div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-1">
<form class="resetpwd-form" id="resetpassform" method="POST" action="{{ route('password.update') }}">
@csrf
<input type="hidden" name="token" value="{{ $token }}">
<div class="row">
<div class="input-field col s12">
<h5 class="ml-4">Reset Password</h5>
</div>
</div>
<div class="row margin">
<div class="input-field col s12">
<i class="material-icons prefix pt-2">person_outline</i>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
value="{{ $email ?? old('email') }}"  autocomplete="email" readonly>
<label for="email" class="center-align">Username</label>
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
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
name="password"  autocomplete="new-password" autofocus>
<label for="password">Password</label>
@error('password')
<small class="red-text ml-7" role="alert">
{{ $message }}
</small>
@enderror
</div>
</div>


<div class="row margin employee_details_row">
<div class="col s12">
<div class="passw">
<h2 class="pass-checking-text"> Password Requirements: </h2>
<div class="pass-checklist">
<ul>
<li id="character_length" class="ccross">Must contain at least 8 characters (12+
recommended )
</li>
<li id="uppercase_latter" class="ccross">Must contain at least one uppercase
letter
</li>
<li id="lowercase_latter" class="ccross">Must contain at least one lowercase
letter
</li>
<li id="one_number" class="ccross">Must contain at least one number</li>
<li id="special_character" class="ccross">Must contain at least one special
character
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="row margin">
<div class="input-field col s12">
<i class="material-icons prefix pt-2">lock_outline</i>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation"
autocomplete="new-password">
<label for="password-confirm">Password Confirm</label>
</div>
</div>

<div class="row">
<div class="input-field col s12">
<div class='text-center'>
<button type="submit" class="defaultbtn">Reset Password</button>
</div>

</div>
</div>
</form>
</div>
</div>
@endsection
