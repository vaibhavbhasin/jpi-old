{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Employee Login')

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
                <p>PHONE REIMBURSEMENT SYSTEM</p>
                <div class='text-center'>
                    <a href="{{route('employee.register.show')}}" class='defaultbtn'>Register</a>
                    <div class='loginseparator'>or</div>
                    @error('password')
                    @else
                        <a href="javascript:void(0)" id='userform' class='btn btn btn-light-cyan btn-light-new-bg-bt'>Login</a>
                    @enderror
                </div>
            </div>
            <form class="login-form" method="POST" action="{{ route('employee.login') }}"
                  style="display:@error('password') block @else none @enderror">
                @csrf
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" autocomplete="email">
                        <label for="email" class="center-align">{{ __('Username') }}</label>
                        @error('email')
                        <small class="red-text ml-7">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" autocomplete="current-password">
                        <label for="password">{{ __('Password') }}</label>
                        @error('password')
                        <small class="red-text ml-7">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 text-center">
                        <button type="submit" id='loginbtn' class="defaultbtn login-btn">
                            Login
                        </button>
                    </div>
                </div>
                <div class="row">
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
