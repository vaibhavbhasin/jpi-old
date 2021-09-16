{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','User Forgot Password')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/forgot.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="login-pattern"></div>
    <div id="forgot-password" class="row">
        <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">
            {{-- success status --}}
            @if (session('status'))
                <div class="card-alert card green lighten-5">
                    <div class="card-content green-text">
                        <p>{{ session('status') }}</p>
                    </div>
                    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <form class="login-form" method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4">Forgot Password</h5>
                        <p class="ml-4">Enter your email address to reset your password.</p>
                    </div>
                </div>
                <div class="row wmauto">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}" autocomplete="email">
                        <label for="email" class="center-align">Email</label>
                        @error('email')
                        <small class="red-text ml-7" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class='text-center'>
                            <button type="submit" class="defaultbtn login-btn">Reset Password</button>
                        </div>
                        <div class='text-center mt-2'>
                            <a href="{{ route('employee.login.show') }}" class="login-btn forgot-pasw-text">
                                Back to Login
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
@endsection
