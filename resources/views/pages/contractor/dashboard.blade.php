{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
{{-- page content --}}
@section('content')
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class='container'>
                <div class="section">
                    <div class="jpi-main-heading">
                        <h2>Welcome {{Auth::user()->firstname}} </h2>
                        <p>This portal is to help manage your pre-qualification application and status along with job limits. </p>
                    </div>
                    <div class="card account-settings-section">
                        <div class="card-content" id="card-content-id">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col s12 m6" id="accsett2">
                                        <h4 class="card-title">Company</h4>
                                        <div class="sub-company-dropdown">
                                            <select id="limitdd" name="limitdd">
                                                <option value="Single">Single</option>
                                                <option value="Aggregate">Aggregate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 text-right">
                                        <button type="button" data-toggle="modal" class="waves-effect apj-edit-btn btn" id="edit_company_btn">Edit Company</button>
                                        <button type="button" class="waves-effect apj-save-btn btn" id="add_company_btn"><i class="material-icons left">add</i>Add Company</button>
                                    </div>
                                </div>
                                <div id="apj-acctxt-border"></div>
                            </div>
                            <div id="card-with-analytics" class="section">
                                <div class="row">
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name</b></h4>
                                                    <p class="sdate mb-5">Submitted: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-submitted">Submitted</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name 2</b></h4>
                                                    <p class="sdate mb-5">Expires: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-approved">Approved</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name</b></h4>
                                                    <p class="sdate mb-5">Started: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-pending">Pending</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name</b></h4>
                                                    <p class="sdate mb-5">Submitted: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-submitted">Submitted</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <!-- Submit an Application card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align subappsec">
                                                <div class="inner">
                                                    <h4 class="m-0 mb-4 headtxt"><b>Submit an Application</b></h4>
                                                    <p class="subtxt">Click to get started</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <!-- Ready to Requalify card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align subappsec">
                                                <div class="inner">
                                                    <h4 class="m-0 mb-4 headtxt"><b>Ready to Requalify?</b></h4>
                                                    <p class="subtxt">Click to get started</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card account-settings-section">
                        <div class="card-content">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col s12 m6 l8" id="accsett2">
                                        <h4 class="card-title">Expired Applications</h4>
                                    </div>
                                </div>
                                <div id="apj-acctxt-border"></div>
                            </div>
                            <div id="card-with-analytics" class="section">
                                <div class="row">
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name</b></h4>
                                                    <p class="sdate mb-5 expired">Expired: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-approved">Approved</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <!-- card -->
                                    <div class="col s12 m6 l3 card-width">
                                        <div class="card border-radius-6">
                                            <div class="card-content center-align">
                                                <div class="inner">
                                                    <h4 class="m-0  mb-2 headtxtapp"><b>Company Name</b></h4>
                                                    <p class="sdate mb-5 expired">Expired: <span>1-1-2021</span></p>
                                                    <p class="status">Status:</p>
                                                    <p class="statusbtn"><a class="mb-10 mt-2 btn waves-effect waves-light application-approved">Approved</a></p>
                                                    <p class="clicktobtn"><a href="#!">Click to review</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
<div id="edit_company_modal" class="modal edit_company_modal">
    <div class="modal-content">
        <p class="modal-header right modal-close">
            <span class="right"><i class="material-icons right-align">clear</i></span>
        </p>
        <h5>Edit Company</h5>
        <p></p>
        <div class="row">
            <div class="col s12">
                <form id="">
                    <div class="row margin">
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                            <input id="firstname_profile" type="text" class="" name="firstname">
                            <label for="firstname_profile" class="center-align">Employer ID Number * </label>
                        </div>
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">business</i> -->
                            <input id="lastname_profile" type="text" class="" name="lastname">
                            <label for="lastname_profile" class="center-align">Company Name *</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col m12 s12 isyfaoc">
                            Is your firm affiliated with any other contracting firm? *
                            <p>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Corporation</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Individual</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>L.L.C.</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Partnership</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Joint Venture</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">mail_outline</i> -->
                            <select>
                                <option value="" disabled selected>Choose your region</option>
                                <option value="1">Manager</option>
                                <option value="2">Developer</option>
                                <option value="3">Business</option>
                            </select>
                            <label>Operating Region *</label>
                        </div>
                        <div class="input-field col s6">
                            <!--  <i class="material-icons prefix pt-2">mail_outline</i> -->
                            <select>
                                <option value="" disabled selected>Choose your business</option>
                                <option value="1">Manager</option>
                                <option value="2">Developer</option>
                                <option value="3">Business</option>
                            </select>
                            <label>Do you qualify as a Minority Owned Business? *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="text-center">
                                <button type="button" class="defaultbtn ">Update</button>
                                <p class="forgot-pasw-text bottom-cancel-btn modal-close">Cancel</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="add_company_modal" class="modal add_company_modal">
    <div class="modal-content">
        <p class="modal-header right modal-close">
            <span class="right"><i class="material-icons right-align">clear</i></span>
        </p>
        <h5>Add Company</h5>
        <p></p>
        <div class="row">
            <div class="col s12">
                <form id="">
                    <div class="row margin">
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                            <input id="firstname_profile" type="text" class="" name="firstname">
                            <label for="firstname_profile" class="center-align">Employer ID Number * </label>
                        </div>
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">business</i> -->
                            <input id="lastname_profile" type="text" class="" name="lastname">
                            <label for="lastname_profile" class="center-align">Company Name *</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col m12 s12 isyfaoc">
                            Is your firm affiliated with any other contracting firm? *
                            <p>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Corporation</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Individual</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>L.L.C.</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Partnership</span>
                                </label>
                                <label>
                                    <input name="group1" type="radio" />
                                    <span>Joint Venture</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s6">
                            <!-- <i class="material-icons prefix pt-2">mail_outline</i> -->
                            <select>
                                <option value="" disabled selected>Choose your region</option>
                                <option value="1">Manager</option>
                                <option value="2">Developer</option>
                                <option value="3">Business</option>
                            </select>
                            <label>Operating Region *</label>
                        </div>
                        <div class="input-field col s6">
                            <!--  <i class="material-icons prefix pt-2">mail_outline</i> -->
                            <select>
                                <option value="" disabled selected>Choose your business</option>
                                <option value="1">Manager</option>
                                <option value="2">Developer</option>
                                <option value="3">Business</option>
                            </select>
                            <label>Do you qualify as a Minority Owned Business? *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="text-center">
                                <button type="button" class="defaultbtn ">Save</button>
                                <p class="forgot-pasw-text bottom-cancel-btn modal-close">Cancel</p>
                            </div>
                        </div>
                    </div>
                </form>
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
