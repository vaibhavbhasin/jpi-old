{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Add User')

{{-- page content --}}
@section('content')

<form id="updateProfile" action='/postSaveUser' method='POST'>
      @csrf
      <!-- <div class="row margin">
        <div class="input-field col s6">
            <select id='role_id' name='role_id'>
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <label>Select Role</label>
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="new_firstname" type="text" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"
             autocomplete="firstname"  >
          <label for="firstname" class="center-align">Firstname</label>
          @error('firstname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        
      </div> -->
      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="new_firstname" type="text" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"
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
          <input id="new_lastname" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"
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
          <i class="material-icons prefix pt-2">domain</i>
          <input id="new_address1" type="text" class="@error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}"
             autocomplete="address1" >
          <label for="address1" class="center-align">Address 1</label>
          @error('address1')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">domain</i>
          <input id="new_address2" type="text" class="@error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}"
             autocomplete="address2" >
          <label for="address2" class="center-align">Address 2</label>
          @error('address2')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">location_city</i>
          <input id="new_city" type="text" class="@error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"
             autocomplete="city" >
          <label for="city" class="center-align">City</label>
          @error('city')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">location_city</i>
          <input id="new_state" type="text" class="@error('state') is-invalid @enderror" name="state" value="{{ old('state') }}"
             autocomplete="state" >
          <label for="state" class="center-align">State</label>
          @error('state')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">location_city</i>
          <input id="new_zip" type="text" class="@error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}"
             autocomplete="zip" maxlength='5' onkeypress='return allowOnlyNumber(event)' >
          <label for="zip" class="center-align">Zip</label>
          @error('zip')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col s6">
        <i class="material-icons prefix pt-2">domain</i>
          <input id="new_bank_account" type="text" class="@error('bank_account') is-invalid @enderror" name="bank_account" value="{{ old('bank_account') }}"
             autocomplete="bank_account" >
          <label for="bank_account" class="center-align">Bank Account No.</label>
          @error('bank_account')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        
      </div>
      <div class="row margin">
        <div class="col s12">
            <div class="row">
            
            <div class="input-field col s6">
            <i class="material-icons prefix pt-2">domain</i>
            <input id="new_bankname" type="text" class="@error('bankname') is-invalid @enderror" name="bankname" value="{{ old('bankname') }}"
                autocomplete="bankname" >
            <label for="bankname" class="center-align">Bank Name</label>
            @error('bankname')
            <small class="red-text ml-7" role="alert">
                {{ $message }}
            </small>
            @enderror
            </div>
            <div class="input-field col s6">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="new_email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}"  autocomplete="email">
          <label for="email">Email</label>
          @error('email')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        </div>
      </div>
      </div>
      <div class="row margin">
        <div class="input-field col s6">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="new_password" type="password" class="@error('password') is-invalid @enderror" name="password"
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
          <input id="new_password-confirm" type="password" name="password_confirmation"
            autocomplete="new-password">
          <label for="password-confirm">Confirm Password</label>
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
      
      <div class="row">
        <div class="input-field col s12">
          <div class='text-center'>
			<button type="submit" id='addnewuser' class="defaultbtn" >Update</button>
		  </div>
        </div>
      </div>
      
    </form>

@endsection