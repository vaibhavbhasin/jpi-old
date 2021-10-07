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
    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-1 min-hig login-innerpage">
        <div class='loginbtndisplay text-center'>
            <p>TRADE PARTNER PORTAL</p>
            <p class="tp-small-size">Register or login to access the JPI portal for Trade Partners</p>
            <div class='text-center'>
                <a href="{{route('tpportal.register.show')}}" class='defaultbtn'>Register</a>
                <div class='loginseparator'>or</div>
                <a href="javascript:void(0)" id='userform' class='btn btn btn-light-cyan btn-light-new-bg-bt'>Login</a>
            </div>
        </div>
        <form class="login-form" method="POST" action="{{ route('tpportal.login.submit') }}" style="display:@error('email') block @else none @enderror">
            @csrf
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">person_outline</i>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
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
                        <a href="{{ route('admin.password.request') }}" class="login-btn forgot-pasw-text">
                            Forgot password?
                        </a>
                    </p>
                </div>
            </div>
        </form>
        <div class="row newm-dps justify-content-md-center">
            <div class="col s12">
                <a data-toggle="modal" href="#user_funding_source_modal" class="login-btm-icons faq-icons modal-trigger faq--modal"><img src="{{asset('images/faq-icons.png')}}" alt="" class="lg-btm-icon"> Frequently Asked Question</a>
                <a data-toggle="modal" href="#needhelp_modal" class="login-btm-icons needhelp--modal"><img src="{{asset('images/help-icon.png')}}" alt="" class="lg-btm-icon"> Need Help?</a>
            </div>
        </div>
    </div>
</div>
<div id="faq_modal" class="modal faq_modal">
    <div class="modal-content">
        <p class="modal-header right modal-close">
            <span class="right"><i class="material-icons right-align">clear</i></span>
        </p>
        <h5>Frequently asked questions and answers:</h5>
        <p></p>
        <div class="row">
            <div class="col s12">
                <div class="slimScrollDiv" style="position: relative; overflow-y: auto; width: auto; height: 500px;">
                    <div class="sub_models" id="inner-content-div1">
                        <p><strong>What is Subcontractor Qualification? </strong></p>
                        <p>Subcontractor Qualification allows R-O to review the Subcontractor’s company and its capability to complete all Contractual obligations or qualify to bid future projects. </p>
                        <p><strong>Why is it necessary to go through the Qualification process? </strong></p>
                        <p>To insure that all subcontractors on our projects can be successful in completing their scope of work or fulfilling the projects they bid. This involves understanding a Subcontractor’s financial strength, manpower resources, experience level on size, complexity and project type and ability to work safely.</p>
                        <p><strong>Do all Subcontractors have to go through the Qualification Processes? </strong></p>
                        <p>Any Subcontractor that has not worked previously with R-O and who will be performing labor on a project must be qualified. Subcontracts will not be awarded until approved. Bid proposals will continue to be accepted however; could slow down the awarding process if the Subcontractor is not already qualified. </p>
                        <p><strong>How long does the process take? </strong></p>
                        <p>The qualification process can take anywhere from one to three weeks or, in some cases longer. All qualifications are processed in the order in which it is received unless the priority is changed due to project conditions. </p>
                        <p><strong>What are the requirements for a Subcontractor to be considered? </strong></p>
                        <p>Unless otherwise approved by Rogers-O’Brien, a Subcontractor must have been in business for a minimum of one year, (with the same Tax Identification Number) and carry the required insurance. </p>
                        <p><strong>What documentation is required in addition to the Qualification Packet? </strong></p>
                        <p>The Qualification Packet must be completely filled out and submitted along with all attachments as required within the Qualification Packet. Financial Statements are a requirement for Qualification. </p>
                        <p><strong>Who will be reviewing the documentation? </strong></p>
                        <p>All information is for R-O’s use only and will be kept strictly confidential. The Qualification packet is reviewed only by authorized Rogers-O’Brien personnel and our third party reviewer for which confidentiality is strictly required. Qualification files may be viewed by our insurance underwriters only in the process of reviewing adherence to policy requirements. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="needhelp_modal" class="modal needhelp_modal">
    <div class="modal-content">
        <p class="modal-header right modal-close">
            <span class="right"><i class="material-icons right-align">clear</i></span>
        </p>
        <h5>Need Help?</h5>
        <p></p>
        <div class="row">
            <div class="col s12">
                <form id="updateProfile">
                    <input type="hidden" name="_token" value="r3L5Mr1d3a3Oca1IwiowR6VzYwbVqz2qc5xvAu9u">
                    <div class="row margin">
                        <div class="input-field col s6">
                            <i class="material-icons prefix pt-2">person_outline</i>
                            <input id="firstname_profile" type="text" class="" name="firstname">
                            <label for="firstname_profile" class="center-align active">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix pt-2">business</i>
                            <input id="lastname_profile" type="text" class="" name="lastname">
                            <label for="lastname_profile" class="center-align active">Company</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s6">
                            <i class="material-icons prefix pt-2">mail_outline</i>
                            <input id="email_profile" type="email" class="" name="email">
                            <label for="email_profile" class="active">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix pt-2">local_phone</i>
                            <input id="phone_number_profile" type="text" class="" name="phone_number" inputmode="text">
                            <label for="phone_number_profile">Phone Number</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix pt-2">chat</i>
                            <textarea id="textarea2" class="materialize-textarea message-text-area"></textarea>
                            <label for="textarea2">Message</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="text-center">
                                <button type="button" class="defaultbtn ">Send</button>
                                <p class="forgot-pasw-text bottom-cancel-btn modal-close">Cancel</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
