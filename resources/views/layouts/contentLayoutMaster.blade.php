{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php
// confiData variable layoutClasses array in Helper.php file.
$configData = Helper::applClasses();
@endphp
<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
  data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | JPI</title>
  <link rel="apple-touch-icon" href="../../images/jpi_logo.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../images/jpi_logo.png">
  {{-- Include core + vendor Styles --}}
  @include('panels.styles')
</head>
<!-- END: Head-->
<!-- User Profile Modal  -->
<?php
// echo "<pre>"; print_r($configData);
?>

{{-- @isset(config('custom.custom.mainLayoutType'))
@endisset --}}
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
  @if(($configData['mainLayoutType'] === 'horizontal-menu'))
  @includeIf('layouts.horizontalLayoutMaster')
  @else
  <body class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        @include('panels.navbar')
    </header>
    <!-- END: Header-->
    <!-- BEGIN: SideNav-->
    @include('panels.sidebar')
    <!-- END: SideNav-->
    @yield('content')
      {{-- footer  --}}
    @include('panels.footer')
    <div id="user_profile_modal" class="modal">
      <div class="modal-content">
      <h5>Update Profile</h5>
      <hr>
      <form id="updateProfile" >
      @csrf
      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="firstname_profile" type="text" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ auth()->user()->firstname; }}"
             autocomplete="firstname"  >
          <label for="firstname" class="center-align">Firstname</label>
          @error('firstname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="lastname_profile" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ auth()->user()->lastname; }}"
             autocomplete="lastname" >
          <label for="lastname" class="center-align">Lastname</label>
          @error('lastname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>


      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="email_profile" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ auth()->user()->email; }}" disabled autocomplete="email">
          <label for="email">Email</label>
          @error('email')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password_profile" type="password" class="@error('password') is-invalid @enderror" name="password"
            autocomplete="new-password">
          <label for="password">Password</label>
          @error('password')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm_profile" type="password" name="password_confirmation"
            autocomplete="new-password">
          <label for="password-confirm">Confirm Password</label>
        </div>
      </div>
      <div class="row margin">
        <div class="col s12">
        <div class="passw">
            <h2 class="pass-checking-text"> Password Requirements: </h2>
				  <div class="pass-checklist">
                    <ul>
                        <li id="character_length" class="ccross">Must contain at least 8 characters (12+ recommended )</li>
                        <li id="uppercase_latter" class="ccross">Must contain at least one uppercase letter</li>
                        <li id="lowercase_latter" class="ccross">Must contain at least one lowercase letter</li>
                        <li id="one_number" class="ccross">Must contain at least one number</li>
                        <li id="special_character" class="ccross">Must contain at least one special character</li>
                    </ul>
                </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <div class='text-center'>
			<button type="button" class="defaultbtn" id='updateprofilebtn' data-url="{{route('employees.update',['employee'=> Auth::user()->id])}}">Update</button>
		  </div>
        </div>
      </div>

      </form>
      </div>
    </div>
    <div id="user_funding_source_modal" class="modal">
      <div class="modal-content">
      <h5>Funding Source</h5>
      <hr>
      <form id="updateFundingSource" >
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
            <input id="bank_account" type="text" class="validate" name="bank_account">
            <label for="bank_account">Bank Account#</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
            <input id="routing" type="text" class="validate" name="routing">
            <label for="routing">Routing#</label>
        </div>
          <div class="input-field col s12">
              <i class="material-icons prefix pt-2">person_outline</i>
              <input id="bank_nickname" type="text" class="validate" name="bank_nickname">
              <label for="bank_nickname">Bank nickname</label>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <div class='text-center'>
			<button type="button" class="defaultbtn" id='updateFundingSourceBtn' data-url="{{route('employees.updateFunding',['employee'=> Auth::user()->id])}}">Update</button>
		  </div>
        </div>
      </div>
      </form>
      </div>
    </div>
    <div id="jpiModal" class="modal" tabindex="0" data-keyboard="false" data-backdrop="static">
        <div class="white modal-content">
            <p class="modal-header right modal-close">
                <span class="right"><i class="material-icons right-align">clear</i></span>
            </p>
            <div class="row">
                <div class="col s12" id="modalBody">
                    <p class="text-center"> Please wait..</p>
                </div>
            </div>
        </div>
    </div>

    {{-- vendor and page scripts --}}
    @include('panels.scripts')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.min.css')}}">
    <!-- datatable css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/data-tables.min.css')}}">
    <!-- datatable js -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    @yield('customjs')
    {{-- <script>
	
	
	
      $('#updateProfile').submit(function(e){
                e.preventDefault();
                var options = {
                    url: "{{route('employees.index')}}/{{\Auth::user()->id}}",
                    type: "PUT",
                    data: {
                        '_token': "{{csrf_token()}}",
                        '_method': "PUT"
                    },
                    success: function(){
                        toastr.success('Your details has been successfully updated!');
                    },
                    error: function(){
                        toastr.error('Some Error occured! Please enter all the details carefully!');
                    }
                };


                $(this).ajaxSubmit(options);


            });
    </script> --}}

  </body>
  @endif
@else
{{-- if mainLaoutType is empty or not set then its print below line  --}}
<h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif

</html>
