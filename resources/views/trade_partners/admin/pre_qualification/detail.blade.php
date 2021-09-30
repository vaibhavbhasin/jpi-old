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
                        <h2>Test Comapny</h2>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="section">
                    <div class="jpi-main-heading dropdown-generaldrop">
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">General Info</i><span class="hide-on-small-onl">General Info</span><i class="material-icons right">arrow_drop_down</i></a>
                        <ul class="dropdown-content dropdown-settings" id="dropdown1" tabindex="0">
                            <li tabindex="0"><a class="grey-text text-darken-2" href="#!">View App</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s6">
            <p>EIN: 78-9456123</p>
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
            <div class="col s8">
                <div class="card account-settings-section section-data-tables">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row valigh">
                                <div class="col s12 m10" id="accsett">
                                    <h4 class="card-title">General Info</h4>
                                </div>
                                <div class="col s12 m2 text-right">
                                    <select id="" name="">
                                        <option value="1">2021</option>
                                    </select>
                                </div>
                            </div>
                            <div id="apj-acctxt-border"></div>
                        </div>
                        <!-- Page Length Options -->
                        <div class="row" id="generalinfo">
                            <div class="col s12 p0">
                                <form>
                                    <div class="row">
                                        <div class="input-field col m8 s12">
                                            <input id="jcf" type="text">
                                            <label for="jcf">Job Considered For</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <input id="psd" type="date">
                                            <label for="psd">Project Start Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m8 s12">
                                            <input id="psa" type="text">
                                            <label for="psa">Potential Subcontract Amount $</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <input id="dur" type="date">
                                            <label for="dur">Duration</label>
                                        </div>
                                    </div>
                                </form>
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0 binfopad">
                                        <table id="tableone" class="display table-jpi tableone">
                                            <thead>
                                                <tr>
                                                    <th>EIN #</th>
                                                    <th>Company</th>
                                                    <th>Contact</th>
                                                    <th>Project</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td>78-9456123</td>
                                                    <td>Edinburgh</td>
                                                    <td>Tyler Barton</td>
                                                    <td>Tyler Barton</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="apj-acctxt-border"></div>
                                <div id="card-panel-type" class="section">
                                    <h4 class="card-title">Attached Documents(s)</h4>
                                    <div class="row" id="data-table-starts">
                                        <div class="col s12 p0 binfopad">
                                            <table id="tabletwo" class="display table-jpi">
                                                <thead>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Attached File (View File)</th>
                                                        <th>Attached</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Edinburgh</td>
                                                        <td>Insurance</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Edinburgh</td>
                                                        <td>Insurance</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col s2 attach_drop_list_label">
                                            <span class="subfont">Upload File: </span>
                                        </div>
                                        <div class="col s4 attach_drop_list">
                                            <select id="attach_drop_list" name="attach_drop_list">
                                                <option value="">Please Select Type</option>
                                                <option value="1">Project</option>
                                                <option value="0">Bond</option>
                                                <option value="0">Insurence</option>
                                            </select>
                                        </div>
                                        <div class="col s4">
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Choose file</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper hidden">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s2">
                                        </div>
                                    </div>
                                </div>
                                 <div id="apj-acctxt-border"></div>
                                <div id="card-panel-type" class="section">
                                    <h4 class="card-title">Additional Notes / Comments</h4>
                                    <div class="row" id="data-table-starts">
                                        <div class="col s12 p0 binfopad">
                                            <table id="tablethree" class="display table-jpi">
                                                <thead>
                                                    <tr style="display: none;">
                                                        <th>comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>test<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 2<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 3<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                 <div id="apj-acctxt-border"></div>
                                <div id="card-panel-type" class="section">
                                    <h4 class="card-title">Internal Messages</h4>
                                    <div class="row" id="data-table-starts">
                                        <div class="col s12 p0 binfopad">
                                            <table id="tablefour" class="display table-jpi">
                                                <thead>
                                                    <tr style="display: none;">
                                                        <th>comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>test<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 2<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 3<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>test 4<br>Root Admin | 09-29-2021 7:59 AM</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                 <div id="apj-acctxt-border"></div>
                                <div id="card-panel-type" class="section">
                                    <h4 class="card-title">3rd Party Correspondence / files</h4>
                                    <div class="row" id="data-table-starts">
                                        <div class="col s12 p0 binfopad">
                                            <table id="tablesix" class="display table-jpi">
                                                <thead>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Attached File (View File)</th>
                                                        <th>Attached</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><a href="javascript:void(0);" target="_blank">gamer-theme-lawn-sign.jpg</a></td>
                                                        <td>3rd party</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><a href="javascript:void(0);" target="_blank">gamer-theme-lawn-sign.jpg</a></td>
                                                        <td>3rd party</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td><a href="javascript:void(0);" target="_blank">gamer-theme-lawn-sign.jpg</a></td>
                                                        <td>3rd party</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td><a href="javascript:void(0);" target="_blank">gamer-theme-lawn-sign.jpg</a></td>
                                                        <td>3rd party</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td><a href="javascript:void(0);" target="_blank">gamer-theme-lawn-sign.jpg</a></td>
                                                        <td>3rd party</td>
                                                        <td><a href="javascript:void(0);" class="waves-effect waves-light btn-small delete-btn">Delete</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col s2 m-4 attach_drop_list_label">
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
                                        <div class="input-field col m6 s12">
                                            <input id="asjl" type="text">
                                            <label for="asjl">Approval Single Job Limit</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="al" type="text">
                                            <label for="al">Aggregate Limit</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="ratings" type="text">
                                            <label for="ratings">Ratings</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="notes" type="text">
                                            <label for="notes">Notes</label>
                                        </div>
                                    </div>
                                </div>
                                 <div id="apj-acctxt-border"></div>
                                <div id="card-panel-type" class="section">
                                    <h4 class="card-title">Approved Limits</h4>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="appsjl" type="text">
                                            <label for="appsjl">Approval Single Job Limit</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="apal" type="text">
                                            <label for="apal">Aggregate Limit</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="apratings" type="text">
                                            <label for="apratings">Ratings</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="apnotes" type="text">
                                            <label for="apnotes">Notes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col s4">
                <div class="card account-settings-section section-data-tables">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col s12 m4" id="accsett">
                                    <h4 class="card-title">Status</h4>
                                </div>
                            </div>
                            <div id="apj-acctxt-border"></div>
                        </div>
                        <!-- Page Length Options -->
                        <div class="row four_btns" id="">
                            <div class="col s12 p0  state-opt">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                        3rd Party Review Required
                                    </label>
                                </div>
                                <ul class="state-list" style="pointer-events: none;">
                                    <li class="completed_state" id="new_state"><a data-parent="#accordion">1. New
                                        </a>
                                    </li>
                                    <!-- <li class="" id="validate_state"><a id="moving_3par">2. Validating -->
                                    <li class="completed_state" id="validate_state"><a id="moving_3par">2. Validating
                                            <!--   -->
                                        </a>
                                    </li>
                                    <li class="completed_state" id="suretec_validate"><a data-parent="#accordion" id="3party">3. 3rd Party Review
                                        </a>
                                    </li>
                                    <!-- Inreview state -->
                                    <li class="completed_state" id="inreview_state"><a>4. In Review
                                        </a>
                                    </li>
                                    <!-- Completed status  -->
                                    <li class=" completed_state " id="comp_state"><a>5. Completed
                                        </a>
                                    </li>
                                    <!-- Processed status -->
                                    <li class=" active " id="proc_state"><a data-toggle="collapse" href="#process_state">6. Processed
                                            <span class="state-arrow"></span>
                                        </a>
                                    </li>
                                    <li class="procced-to-nxt gray-out" id="proced-next">
                                        <a href="javascript:void(0);" disabled="" class="btn btn-block waves-effect waves-light">Proceed to Next State</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card account-settings-section section-data-tables">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col s12 m4" id="accsett">
                                    <h4 class="card-title">Functions </h4>
                                </div>
                            </div>
                            <div id="apj-acctxt-border"></div>
                        </div>
                        <!-- Page Length Options -->
                        <div class="row functions_sec" id="">
                            <div class="col s12 p0 ">
                                <a class="btn-flat mb-1 waves-effect">
                                    <i class="material-icons left">email</i> Send Messsage</a>
                                <a class="btn-flat mb-1 waves-effect">
                                    <i class="material-icons left">comment</i> Add Notes/Comments</a>
                                <a class="btn-flat mb-1 waves-effect">
                                    <i class="material-icons left">print</i> Print Application</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div> <!-- add class "show" -->
        </div>
    </div>
</div>
@endsection
