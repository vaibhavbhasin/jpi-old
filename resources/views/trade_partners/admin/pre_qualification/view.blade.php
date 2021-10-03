{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
{{-- page content --}}
@section('content')
<div id="main">
    <div class='container'>
        <div class="row">
            <div class="col s6">
                <div class="section">
                    <div class="jpi-main-heading">
                        <h2>{{$data->company}}</h2>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="section">
                    <div class="jpi-main-heading dropdown-generaldrop">
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">View App</i><span class="hide-on-small-onl">View App</span><i class="material-icons right">arrow_drop_down</i></a>
                        <ul class="dropdown-content dropdown-viewapp" id="dropdown1" tabindex="0">
                            <li tabindex="0"><a class="grey-text text-darken-2" href="#!">General Info</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s6 einnumber">
                <p>EIN: {{$data->ein_number}}</p>
            </div>
            <div class="col s6 ">
                <div class="right assignto">
                    <span> Assigned to:</span>
                    <div class="input-field inline">
                        <select id="status" name="status">
                            <option value="">Please Select</option>
                            <option value="1">User test</option>
                            <option value="0">Auditor</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card account-settings-section section-data-tables">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row valigh">
                                <div class="col s12 m6" id="accsett">
                                    <h4 class="card-title">Application</h4>
                                </div>
                                <div class="col s12 m4 text-right">
                                    <a href="#!" class="waves-effect waves-light btn black-text secondary-content viewapp_status_btn">Status: <span>{{strtolower(preQuailStatus($data->status))}}</span></a>
                                </div>
                                <div class="col s12 m2 text-right">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                    </div>
                                </div>
                            </div>
                            <div id="apj-acctxt-border"></div>
                        </div>
                        <!-- Page Length Options -->
                        <div class="row" id="viewapp">
                            <div class="col s12">
                                <ul class="stepper" id="nonLinearStepper">
                                    <li class="step active">
                                        <div class="step-title waves-effect">Company Information</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="cc">Choose Company: <span class="red-text">*</span></label>
                                                    <input type="text" id="cc" name="cc" class="validate" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="wcay">What company are you commonly doing Business as: <span class="red-text">*</span></label>
                                                    <input type="text" id="wcay" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="rop">Project Name, or enter N/A: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="rop" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="rcoe">Contact, or enter N/A: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="rcoe" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="cbwa">Certified by which agency: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="cbwa" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="mail">Mailing Address: <span class="red-text">*</span></label>
                                                    <input type="email" class="validate" name="Email" id="mail" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="acity">City: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="acity" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="state">State: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="state" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="zip">Zip: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="zip" required>
                                                </div>
                                                <div class="input-field col m3 s12">
                                                    <label for="tn">Telephone Number: <span class="red-text">*</span></label>
                                                    <input type="number" class="validate" name="contactNum" id="tn" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p class="pl8">
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Please Select , If it is same as Mailing Address</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="paddre">Physical Address: <span class="red-text">*</span></label>
                                                    <input type="text" id="paddre" name="firstName1" class="validate" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="pcity">City: <span class="red-text">*</span></label>
                                                    <input type="text" id="pcity" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="pstate">State: <span class="red-text">*</span></label>
                                                    <input type="text" id="pstate" name="firstName1" class="validate" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="pzip">Zip: <span class="red-text">*</span></label>
                                                    <input type="text" id="pzip" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input id="datefounded" type="date" required>
                                                    <label for="datefounded">Date Founded: <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="scwyc">Scope of Work your company normally performs: <span class="red-text">*</span></label>
                                                    <input type="text" id="scwyc" class="validate" name="lastName1" required>
                                                </div>
                                                <div class="input-field col m3 s12">
                                                    <label for="pstate">State: <span class="red-text">*</span></label>
                                                    <input type="text" id="firstName1" name="pstate" class="validate" required>
                                                </div>
                                                <div class="input-field col m5 s12">
                                                    Is your firm affiliated with any other contracting firm?
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="lastName12"></label>
                                                    <input type="text" id="lastName12" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="nofe">No. of Field Employees: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="nofe" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="nofee">No. of Office Employees: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="nofee" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="contactname">Contact Name: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="contactname" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="titiles">Title: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="titiles" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="Email"> E-Mail address: <span class="red-text">*</span></label>
                                                    <input type="email" class="validate" name="Email" id="Email" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="webaddress">Web address: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="webaddress" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="president">President: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="Email" id="president" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="vpp">Vice President: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="vpp" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="cfo">CFO/Controller: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" name="contactNum" id="cfo" required>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">GC References</div>
                                        <div class="step-content" id="secondstep">
                                            <p>List 3 General Contractors you currently do business with:</p>
                                            <div class="row" id="data-table-starts">
                                                <div class="col s12 p0 binfopad">
                                                    <table id="tablewo" class="display table-jpi tableone">
                                                        <thead>
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <th>Contact</th>
                                                                <th>Address</th>
                                                                <th>Phone</th>
                                                                <th>City</th>
                                                                <th>State</th>
                                                                <th>Zip</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Christian Harris Traders</td>
                                                                <td>Eveniet quia ex ut</td>
                                                                <td>Iure ut sunt facere</td>
                                                                <td>190-954-5728</td>
                                                                <td>Ut ut dolor obcaecat</td>
                                                                <td>Alaska</td>
                                                                <td>86681</td>
                                                                <td><a class="btn dropdown-settings table-action-dropdown waves-effect waves-light breadcrumbs-btn right dropdown2" href="#!" data-target="dropdown2"><i class="material-icons">edit</i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">Contractor</h4>
                                                <div class="input-field col m6 s12">
                                                    <label for="proposal12">Company Name: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Contact: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="company1">Phone:</label>
                                                    <input type="text" class="validate" id="company1" name="company1">
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="url123">Address:</label>
                                                    <input type="url" class="validate" id="url123">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="exp123">City: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">State: <span class="red-text">*</span></label>
                                                    <textarea name="desc" id="desc123" rows="4" class="materialize-textarea"></textarea>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Zip: <span class="red-text">*</span></label>
                                                    <textarea name="desc" id="desc123" rows="4" class="materialize-textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col m12 s12 apjmb-3">
                                                    <button class="waves-effect waves btn btn-primary hide">
                                                        Add Contractor
                                                    </button>
                                                    <button class="waves-effect waves btn btn-primary">
                                                        Save Contractor
                                                    </button>
                                                    <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3 apjmt-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Project History</div>
                                        <div class="step-content" id="thirdstep">
                                            <div class="row" id="data-table-starts">
                                                <div class="col s12 p0 binfopad">
                                                    <table id="tablewo" class="display table-jpi tableone">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>Contractor</th>
                                                                <th>Contact Person</th>
                                                                <th>Date</th>
                                                                <th>Value</th>
                                                                <th>Phone</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Claudia Weber</td>
                                                                <td>A enim consequuntur</td>
                                                                <td>Aut nostrum lorem co</td>
                                                                <td>09-30-2021</td>
                                                                <td>$933.00</td>
                                                                <td>128-173-1181</td>
                                                                <td><a class="btn dropdown-settings table-action-dropdown waves-effect waves-light breadcrumbs-btn right dropdown2" href="#!" data-target="dropdown2"><i class="material-icons">edit</i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p class="plr14">* Current work in progress or lists of jobs in progress with Contract Values must be attached</p>
                                                <div class="col s1 m-4 attach_drop_list_label">
                                                    <span class="subfont">Upload File: </span>
                                                </div>
                                                <div class="col s11 m-4">
                                                    <div class="file-field input-field">
                                                        <div class="btn left">
                                                            <span>Choose file</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper hidden">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input placeholder="" id="AvgVal" type="text" class="validate">
                                                    <label for="AvgVal">What do you consider is your companies average single job contract value?</label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input placeholder="" id="LargeAmount" type="text" class="validate" value="">
                                                    <label for="LargeAmount">What is your companies largest single job contract value?</label>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Bonding Information</div>
                                        <div class="step-content" id="thirdstep">
                                            <div class="row">
                                                <div class="col s2 attach_drop_list_label">
                                                    <span class="subfont">Are you bonded? <span class="red-text">*</span></span>
                                                </div>
                                                <div class="col s4 attach_drop_list">
                                                    <select id="attach_drop_list" name="attach_drop_list">
                                                        <option value="1">No</option>
                                                        <option value="0">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">Bonding</h4>
                                                <div class="input-field col m6 s12">
                                                    <label for="proposal12">Name of Bonding Agency: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Contact Person: <span class="red-text">*</span><span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="company1">Phone:<span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="company1" name="company1">
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="url123">Name of Surety Company:<span class="red-text">*</span></label>
                                                    <input type="url" class="validate" id="url123">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="exp123">Bonding capacity for single job: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Aggregate: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Amount of work currently bonded: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s2 m-4 attach_drop_list_label">
                                                    <span class="subfont">Attach bonding letter: <span class="red-text">*</span></span>
                                                </div>
                                                <div class="col s6 m-4">
                                                    <div class="file-field input-field">
                                                        <div class="btn left">
                                                            <span>Choose file</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper hidden">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Banking</div>
                                        <div class="step-content" id="thirdstep">
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="proposal12">Bank Name:</label>
                                                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Address:</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="company1">City:<span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="company1" name="company1">
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="url123">State:<span class="red-text">*</span></label>
                                                    <input type="url" class="validate" id="url123">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="exp123">Zip:</label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Account Contact: </label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Phone: </label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="exp123">Existing Line of Credit:</label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Currently Drawn: </label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <input id="psd" type="date">
                                                    <label for="psd">Renewal Date</label>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Financials</div>
                                        <div class="step-content" id="thirdstep">
                                            <div class="row">
                                                <div class="input-field col m12 s12">
                                                    <label for="proposal12">Value of Current Backlog: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                                                </div>
                                            </div>
                                            <div class="row" id="data-table-starts">
                                                <h4 class="card-title">Credit Vendors</h4>
                                                <div class="col s12 p0 binfopad">
                                                    <table id="tablewo" class="display table-jpi tableone">
                                                        <thead>
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <th>Phone no</th>
                                                                <th>Contact</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a class="btn dropdown-settings table-action-dropdown waves-effect waves-light breadcrumbs-btn right dropdown2" <td>Christian Harris Traders</td>
                                                                <td>Eveniet quia ex ut</td>
                                                                <td>Iure ut sunt facere</td>
                                                                <td><a class="btn dropdown-settings table-action-dropdown waves-effect waves-light breadcrumbs-btn right dropdown2" href="#!" data-target="dropdown2"><i class="material-icons">edit</i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">New Credit Vendor</h4>
                                                <div class="input-field col m4 s12">
                                                    <label for="proposal12">Company Name: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Phone: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Contact: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col m12 s12">
                                                    <button class="waves-effect waves btn btn-primary hide">
                                                        Add Vendor
                                                    </button>
                                                    <button class="waves-effect waves btn btn-primary">
                                                        Save Vendor
                                                    </button>
                                                    <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                        Cancel
                                                    </button>
                                                    <label class="pl10">
                                                        <input type="checkbox">
                                                        <span>by checking this box I authorize Rogers-Obrien to contact the above vendors.</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">Financials: Last Full Fiscal Year</h4>
                                                <div class="input-field col m6 s12">
                                                    <input type="date" class="validate" id="proposal12" name="proposal1" required>
                                                    <label for="proposal12">From Date: <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input type="date" class="validate" id="job12" name="job1" required>
                                                    <label for="job12">To Date: <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Cash & Marketable Securities: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Total Current Assets: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m12 s12">
                                                    <label for="job12">Fixed Assets: Property Plant & Equipment (net of depreciation): <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Other Assets: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Total Assets: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Current Liabilities: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Long Term Liabilities: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Liabilities: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Equity: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Revenue/Billings/Sales: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Net Income before Tax: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s3 m-4 attach_drop_list_label">
                                                    <span class="subfont">Most Recent Fiscal Year End Statements: <span class="red-text">*</span></span>
                                                </div>
                                                <div class="col s8 m-4">
                                                    <div class="file-field input-field">
                                                        <div class="btn left">
                                                            <span>Choose file</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper hidden">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">Financials: Current Year To Date (Interim)</h4>
                                                <div class="input-field col m6 s12">
                                                    <input type="date" class="validate" id="proposal12" name="proposal1" required>
                                                    <label for="proposal12">From Date (Interim): </label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input type="date" class="validate" id="job12" name="job1" required>
                                                    <label for="job12">To Date (Interim): </label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Cash & Marketable Securities (Interim): </label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Total Current Assets (Interim): </label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m12 s12">
                                                    <label for="job12">Fixed Assets: Property Plant & Equipment (net of depreciation) (Interim): </label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Other Assets (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="job12">Total Assets (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Current Liabilities (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Long Term Liabilities (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Liabilities (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Equity (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Total Revenue/Billings/Sales (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Net Income before Tax (Interim):</label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4 m-4 attach_drop_list_label">
                                                    <span class="subfont">Current Interim Income Statement / Balance Sheet: <span class="red-text">*</span></span>
                                                </div>
                                                <div class="col s8 m-4">
                                                    <div class="file-field input-field">
                                                        <div class="btn left">
                                                            <span>Choose file</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper hidden">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Insurance and Safety</div>
                                        <div class="step-content" id="thirdstep">
                                            <div class="row cap">
                                                <h4> Must meet the following requirements: </h4>
                                                <ul>
                                                    <li> General Aggregate per project </li>
                                                    <li> Certificate issued on standard ACORD form </li>
                                                    <li> Coverage supplied on a primary and non-contributory basis (GL &amp; Auto) </li>
                                                    <li> Waiver of subrogation in favor of additional insureds (GL, Auto &amp; W/C) </li>
                                                    <li> Rogers-O’Brien shown as Certificate holder </li>
                                                    <li> Rogers-O’Brien, project owner (and lender if required) shown as additional insured </li>
                                                    <li> Cancellation requires 30 days written notice </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title pb20">General Liability coverage minimums:</h4>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left">General Aggregate <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left">Products-Comp/Op Agg. <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left">Personal & Adv Injury <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left ">Each Occurrence <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left">Fire Damage <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left">Medical Expense <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title pb20">Automobile Liability coverage minimums:</h4>
                                            </div>
                                            <div class="row">
                                                <p for="GenralAggregate" class="control-label text-left">Combined single limit <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                <div class="input-field col m2 s12 pt15">
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="input-field col m10 s12">
                                                    <label for="lastName12">$</label>
                                                    <input type="text" id="lastName12" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title pb20">Excess or Umbrella coverage minimums:</h4>
                                            </div>
                                            <div class="row">
                                                <p for="GenralAggregate" class="control-label text-left pl15">Each occurrence <span class="width-dollar input-group-addon">$1,000,000</span></p>
                                                <div class="input-field col m2 s12 pt15">
                                                    <p>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="input-field col m10 s12">
                                                    <label for="lastName12">$</label>
                                                    <input type="text" id="lastName12" class="validate" name="lastName1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title pb20">Workers' Compensation minimums:</h4>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left"><span class="width-dollar input-group-addon">$1,000,000</span> Each accident</p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left"><span class="width-dollar input-group-addon">$1,000,000</span> Disease policy limit</p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                                <div class="col m4 s12">
                                                    <p for="GenralAggregate" class="control-label text-left"><span class="width-dollar input-group-addon">$1,000,000</span> Disease-each employee</p>
                                                    <div class="input-field radiobtn">
                                                        <p>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" />
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field">
                                                        <label for="desc123">$</label>
                                                        <input type="text" class="validate" id="desc123" name="job1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p class="plr14"><span class="red-text">*</span> Current Insurance Certificate showing your limits must be attached</p>
                                                <div class="col s1 m-4 attach_drop_list_label">
                                                    <span class="subfont">Upload File: </span>
                                                </div>
                                                <div class="col s10 m-4">
                                                    <div class="file-field input-field">
                                                        <div class="btn left">
                                                            <span>Choose file</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper hidden">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="card-title">Safety Experience Modifier Rate</h4>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Current Year: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Last Year: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="job12">Two Years Ago: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="job12" name="job1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    Is your firm a party to any labor agreements?<span class="red-text">*</span>
                                                    <p class="pt15">
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    Is your firm currently involved in any lawsuits?<span class="red-text">*</span>
                                                    <p class="pt15">
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input name="group1" type="radio" />
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <label for="nofe">What unions do you have agreements with? </label>
                                                    <input type="text" class="validate" name="Email" id="nofe">
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label for="plelar">Please list each lawsuit and related details</label>
                                                    <input type="text" class="validate" name="Email" id="plelar">
                                                </div>
                                            </div><!-- /.row -->
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">W-9 TIN Information</div>
                                        <div class="step-content" id="thirdstep">
                                            <p><span class="red-text">*</span> Please upload your completed W-9. If you do not have a copy of your W-9, please visit the IRS website at <a href="https://www.irs.gov/pub/irs-pdf/fw9.pdf" target="_blank">https://www.irs.gov/pub/irs-pdf/fw9.pdf</a></p>
                                            <div class="row">
                                                <div class="col s12 p0 binfopad">
                                                    <div class="col s1 m-4 attach_drop_list_label">
                                                        <span class="subfont">Upload File: </span>
                                                    </div>
                                                    <div class="col s10 m-4">
                                                        <div class="file-field input-field">
                                                            <div class="btn left">
                                                                <span>Choose file</span>
                                                                <input type="file">
                                                            </div>
                                                            <div class="file-path-wrapper hidden">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-save-btn">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-light next-step jpi-btn">
                                                            Save & Next
                                                        </button>
                                                        <button class="waves-effect waves dark btn btn-primary cancelbtn">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Complete </div>
                                        <div class="step-content" id="thirdstep">
                                            <p>By completing this submission I agree to the accuracy of all the information above.</p>
                                            <div class="row">
                                                <div class="input-field col m4 s12">
                                                    <label for="exp123">Name: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <label for="desc123">Title: <span class="red-text">*</span></label>
                                                    <input type="text" class="validate" id="exp123" name="exp1">
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <input id="psd" type="date">
                                                    <label for="psd">Date: <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m12 s12 mb-3">
                                                        <button class="waves-effect waves btn btn-primary jpi-btn">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('customjs')
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/materialize-stepper/materialize-stepper.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/css/pages/form-wizard.min.css">
<script src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/materialize-stepper/materialize-stepper.min.js"></script>
<script>
    var nonLinearStepper = document.querySelector("#nonLinearStepper"),
        nonLinearStepperInstace = new MStepper(nonLinearStepper, {
            firstActive: 0,
            showFeedbackPreloader: !0,
            autoFormCreation: !0,
            validationFunction: defaultValidationFunction,
            stepTitleNavigation: !0,
            feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>'
        });

    function validationFunction(e, r) {
        return someValidationPlugin(e),
            !0
    }

    function defaultValidationFunction(e, r) {
        for (var t = r.querySelectorAll("input, textarea, select"), n = 0; n < t.length; n++)
            if (!t[n].checkValidity())
                return !1;
        return !0
    }
    $(".btn-reset").on("click", function() {
        horizStepperInstace.openStep(0),
            linearStepperInstace.openStep(0),
            nonLinearStepperInstace.openStep(0)
    });
    $(".cancelbtn").on("click", function() {
        $(this).closest('.step').removeClass('active');
    });
</script>
@endsection
