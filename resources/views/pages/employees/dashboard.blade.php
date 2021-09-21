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
                            <p>This system is to help manage your registration and banking info for cellular
                                reimbursement payments.</p>
                        </div>
                        <div class="card account-settings-section">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l8" id="accsett">
                                            <h4 class="card-title">Account Settings</h4>
                                            <div class="registered-tag">
                                            @if(@$employee_details['is_active'] == '1')
                                                <!-- <span class="registered"><img src="{{asset('images/registered-icon.svg')}}" alt="" class="regit-icon"> Registered</span> -->
                                                    <button type="button" class="waves-effect apj-edit-btn btn "
                                                            id="regit-icon-new">Complete
                                                    </button>
                                                    <!-- remove class 'hide' -->
                                            @else
                                                <!-- <span class="notregistered"><img src="{{asset('images/not-registered.svg')}}" alt="" class="regit-icon"> No Registered</span> -->
                                                    <button type="button" class="waves-effect apj-edit-btn btn "
                                                            id="non-regit-icon-new">Incomplete
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col s12 m6 l4 text-right">

                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <div class="row">
                                    <form id="employee_details_form" method="POST" action="">
                                        <div class="col s6">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="address1" name="address1" type="text" class="validate"
                                                           value="{{$employee_details['address1'] ?? ''}}" disabled>
                                                    <label for="address1">Address 1</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="address2" name="address2" type="text" class="validate"
                                                           value="{{$employee_details['address2'] ?? ''}}" disabled>
                                                    <label for="address2">Address 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="city" name="city" type="text" class="validate"
                                                           value="{{$employee_details['city'] ?? ''}}" disabled>
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    {{--                                                    <input id="state" name="state" type="text" class="validate"--}}
                                                    {{--                                                           value="{{$employee_details['state'] ?? ''}}" disabled>--}}
                                                    <select id="state-pop-update"
                                                            class="select2 selectstate browser-default" class="validate"
                                                            name="state" disabled>
                                                        <option value="">Select State</option>
                                                        @foreach(\App\Helpers\Helper::states() as $state)
                                                            <option
                                                                value="{{$state}}" {{$employee_details['state']==$state ? 'selected' : ''}}>{{$state}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="state">State</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6 md-width-adj">
                                                    <input id="zip" name="zip" type="text" class="validate"
                                                           value="{{$employee_details['zip'] ?? ''}}" disabled>
                                                    <label for="zip">Zip</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <!-- remove class 'hide' -->
                                                    <button type="button" class="waves-effect apj-cancel-btn btn"
                                                            id="edit_details_cancel_btn" style="display: none;">Cancel
                                                    </button>
                                                    <!-- remove class 'hide' -->
                                                    <button type="button" class="waves-effect apj-save-btn btn"
                                                            id="edit_details_save_btn" style="display: none;">Save
                                                    </button>
                                                    <button type="button" class="waves-effect apj-edit-btn btn "
                                                            id="edit_details_btn">Edit
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="submit" style="display: none;">Save</button>
                                        </div>
                                    </form>
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="bank_name" type="text" class="validate" disabled
                                                       value="{{@$employee_details->dwolla->bank_name}}">
                                                <label for="bank_name">Bank name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="bank_type" type="text" class="validate" disabled
                                                       value="{{@$employee_details->dwolla->account_name}}">
                                                <label for="bank_type">Account Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6 md-width-adj">
                                                <input id="bank_type" type="text" class="validate" disabled
                                                       value="{{ucfirst(@$employee_details->dwolla->bank_type)}}">
                                                <label for="bank_type">Account Type</label>
                                            </div>
                                            <div class="input-field col 6">
											
											
											 @if(@$employee_details['is_active'] == '1')
                                                <!-- <span class="registered"><img src="{{asset('images/registered-icon.svg')}}" alt="" class="regit-icon"> Registered</span> -->
                                                   <a href="#jpiModal"
													   data-load-url="{{ route('employees.updateFunding',auth()->id()) }}"
													   class="waves-effect update-funding-source btn modal-trigger"
													   id="updateFundingSource">
														Update Funding Source
													</a>
                                                    <!-- remove class 'hide' -->
                                            @else
                                                 <!-- nothing -->
											@endif
												
												
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card transaction-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="accsett">
                                            <h4 class="card-title">Transaction History</h4>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <table id="data-table-simple" class="display">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Transcation ID</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($achTransfers as $i => $transaction)
                                                <tr>
                                                    <td>{{date('m-d-Y',strtotime($transaction->created))}}</td>
                                                    <td>${{$transaction->amount->value}}</td>
                                                    <td>{{$transaction->id}}</td>
                                                    <td>{{ucfirst($transaction->status)}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="padding-left: 20px;text-align: center">-- No
                                                        Data --
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container'>
        <div class='row'>
            <div class='col s3'></div>
            <div class='col s9'>
                <div class='layout-min-height'>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
    <!-- Intro -->
    <div id="intro">
        <div class="row">
            <div class="col s12">
                <div id="img-modal" class="intromodal modal white" tabindex="0" data-keyboard="false"
                     data-backdrop="static">
                    <div class="modal-content">
                        <div class="modal-loader"><img src="{{asset('images/loading.gif')}}" alt="" class="regit-icon">
                        </div>
                        <p class="modal-header right modal-close">
                            <span class="right"><i class="material-icons right-align">clear</i></span>
                        </p>
                        <div class="carousel carousel-slider center intro-carousel">
                            <div class="carousel-fixed-item center middle-indicator with-indicators">
                                <div class="left">
                                    <button
                                        class="movePrevCarousel middle-indicator-text btn btn-flat apj-black-text waves-effect waves-light btn-prev">
                                        <i class="material-icons">navigate_before</i> <span class="hide-on-small-only">Back</span>
                                    </button>
                                </div>
                                <div class="right">
                                    <button
                                        class="moveNextCarousel middle-indicator-text btn btn-flat apj-blue-text waves-effect waves-light btn-next"
                                        id="btn_next-form-submit">
                                        <span class="hide-on-small-only">Next</span> <i class="material-icons">navigate_next</i>
                                    </button>
                                </div>
                            </div>
                            <div class="carousel-item slide-1 active">
                                <h5 class="intro-step-title mt-7 center animated fadeInUp">
                                    Welcome {{Auth::user()->firstname}}</h5>
                                <p class="intro-step-text mt-5 animated fadeInUp">This system is to help manage your
                                    registration and banking info for cellular reimbursement payments. All you need to
                                    do to get started is to add your address and banking information to be fully
                                    registered for reimbursment payments that occur at the end of each month.</p>
                                <p class="intro-step-text mt-5 animated fadeInUp">
                                    <button type="button" class="waves-effect apj-get-started-btn btn ">Click to get
                                        started
                                    </button>
                                </p>
                            </div>
                            <div class="carousel-item slide-2">
                                <h5 class="intro-step-title mt-0 center">Enter Your Address Details</h5>
                                <div class="row">
                                    <div class="col s12">
                                        <form class="">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="address1-pop" type="text" class="validate"
                                                           value="{{$employee_details['address1'] ?? ''}}">
                                                    <label for="address1-pop">Address 1</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="address2-pop" type="text" class="validate"
                                                           value="{{$employee_details['address2'] ?? ''}}">
                                                    <label for="address2-pop">Address 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="city-pop" type="text" class="validate"
                                                           value="{{$employee_details['city'] ?? ''}}">
                                                    <label for="city-pop">City</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <select id="state-pop" class="select2 selectstate browser-default"
                                                            class="validate">
                                                        <option value="">Select State</option>
                                                        @foreach(\App\Helpers\Helper::states() as $state)
                                                            <option
                                                                value="{{$state}}" {{$employee_details['state'] == $state ? 'selected' : ''}}>{{$state}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="zip-pop" type="text" class="validate"
                                                           value="{{$employee_details['zip'] ?? ''}}" maxlength="5">
                                                    <label for="zip-pop">Zip</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item slide-3">
                                <h5 class="intro-step-title mt-7 center animated fadeInUp">Congratulations</h5>
                                <p class="intro-step-text mt-5 animated fadeInUp">You are now fully registered to start
                                    receiving reimbursement's payments that are disbursed at the end of every
                                    month. </p>
                                <p class="intro-step-text mt-5 animated fadeInUp">
                                    <button type="button" class="waves-effect apj-intro-close-btn modal-close btn "
                                            onclick="location.reload()">
                                        Click to close
                                    </button>
                                </p>
                            </div>
                            <div class="carousel-item slide-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="jpiAddFundingSourceModal" class="modal" tabindex="0" data-keyboard="false" data-backdrop="static">
        <div class="white modal-content">
            <p class="modal-header right modal-close">
                <span class="right"><i class="material-icons right-align">clear</i></span>
            </p>
            <div class="row">
                <div class="col s12" id="modalBody">
                    <div id="iavContainerAddFirstFundingSource">
                    <!--<img src="{{asset('images/loading.gif')}}" alt="" class="regit-icon">-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customjs')
    <link rel="stylesheet"
          href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.min.css"
          type="text/css">
    <link rel="stylesheet"
          href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
          type="text/css">
    <script
        src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.full.min.js"></script>
    <script src="//cdn.dwolla.com/1/dwolla.js"></script>
    <script type="text/javascript">

        $(".modal-loader").hide();
        // Basic Select2 select
        $(".selectstate").select2({
            placeholder: "Select a state",
            dropdownAutoWidth: true,
            width: '100%'
        });

        function callDwollaBankPopup(iavToken) {
            dwolla.configure('{{config('services.dwolla.api_env')}}');
            dwolla.iav.start(iavToken, {
                container: 'iavContainerAddFirstFundingSource',
                stylesheets: [
                    'https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext',
                    "{{asset('css/custom/dwolla_style.css')}}"
                ],
                microDeposits: false,
                fallbackToMicroDeposits: true,
                backButton: true,
                subscriber: ({currentPage, error}) => {
                    console.log("currentPage:", currentPage, "error:", JSON.stringify(error));
                },
            }, function (err, res) {
                console.log('Error: ' + JSON.stringify(err) + ' -- Response: ' + JSON.stringify(res));
                if (err) {
                    toastr.error('Some errors occured!');
                } else if (res._links['funding-source']['href']) {
                    submitBankFundingSource(res._links['funding-source']['href']);
                }
            });
        }
    </script>
    <script>
        async function submitDetails(callback) {
            var data = validateAndCollectData();
            if (data) {
                $.ajax({
                    url: "{{ route('employees.index') }}/{{Auth::user()->id}}",
                    method: "PUT",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'address1': data.address1,
                        'address2': data.address2,
                        'city': data.city,
                        'state': data.state,
                        'zip': data.zip,
                    }, beforeSend: function () {
                        $("#btn_next-form-submit").html('<img src="/images/loading.gif" alt="" class="loader-btn">').prop('disabled', true);
                    },
                    success: function (data) {
                        if (data) {
                            $(".intromodal").modal("close");
                            submitBankDetails();
                            toastr.success('Submitted successfully');
                        }
                    }
                });
            }
        }
    </script>
    <script>
        async function submitBankDetails(callback) {
            $.ajax({
                url: "{{ route('employees.index') }}/{{Auth::user()->id}}",
                method: "PUT",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'from': 'bank_update',
                },
                success: function (data) {
                    if (data.fsToken) {
                        $("#jpiAddFundingSourceModal").modal("open");
                        callDwollaBankPopup(data.fsToken);
                    }
                }
            });
        }
    </script>
    <script>
        async function submitBankFundingSource(fundingSource) {
            $.ajax({
                url: "{{ route('employees.index') }}/{{Auth::user()->id}}",
                method: "PUT",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'from': 'bank_funding_source',
                    'fundingSource': fundingSource,
                },
                success: function (data) {
                    $('#jpiAddFundingSourceModal').hide();
                    $('#iavContainerAddFirstFundingSource').hide();
                    $(".intromodal").modal("open");
                    $(".intro-carousel").carousel("next");
                    setInterval(function () {
                        $("body").find('.intro-carousel .btn-prev').addClass('hide');
                    }, 100);

                }
            });
        }

    </script>
    <script>
        $(function () {
            $("#data-table-simple").DataTable({
                responsive: !0,
                "ordering": false,
                drawCallback: function () {
                    $(".paginate_button").addClass("waves-effect");
                },
                "language": {
                    "paginate": {
                        "previous": "<i class=\"material-icons\">chevron_left</i>",
                        "next": "<i class=\"material-icons\">chevron_right</i>",
                    }
                },
            });
        });
        @if($employee_details['is_active']==0)
        $(window).on("load", function () {
            $(".btn-prev").addClass("hide");
            $(".btn-next").addClass("hide");
            let intro_carousel = false;
            $(".intromodal").modal({
                dismissible: false,
                onOpenEnd: function () {
                    if (intro_carousel === false) {
                        $(".carousel.carousel-slider").carousel({
                            fullWidth: !0,
                            indicators: !0,
                            onCycleTo: function () {
                                1 == $(".carousel-item.active").index() ? ($(".btn-prev").addClass("disabled hide"), $(".btn-next").addClass("hide"), $("ul.indicators li:first-child").removeClass("done")) : 1 < $(".carousel-item.active").index() && ($(".btn-prev").removeClass("disabled"), $(".btn-next").removeClass("disabled"), 3 == $(".carousel-item.active").index() && ($(".btn-next").addClass("disabled"), $("ul.indicators li:nth-child(2)").addClass("done")));
                                2 == $(".carousel-item.active").index() ? ($("ul.indicators li:first-child").addClass("done"), $("ul.indicators li:nth-child(2)").removeClass("done"), $(".btn-submit").addClass("hide"), $(".btn-prev").removeClass("hide"), $(".btn-next").removeClass("hide")) : "";
                                3 == $(".carousel-item.active").index() ? ($(".btn-next").addClass("hide"), $(".btn-submit").removeClass("hide"), $(".btn-prev").removeClass("hide")) : "";
                                4 == $(".carousel-item.active").index() ? ($(".btn-prev").addClass("hide"), $(".btn-next").addClass("hide"), $(".btn-submit").addClass("hide"), $("ul.indicators li").addClass("hide")) : "";
                            }
                        });
                        $(document).keydown(function(e) {
                            if(e.keyCode == 38) { // left nav key pressed
                                // code to load prev slide
                            } else if(e.keyCode == 40) { // right nav key pressed
                                // code to load next slide
                            }
                        });
                        intro_carousel =true;
                    }

                }
            }), setTimeout(function () {
                $(".intromodal").modal("open");
            }, 100), $(".btn-next").on("click", async function (e) {
                var status = await submitDetails();
            }), $(".btn-prev").on("click", function (e) {
                $(".intro-carousel").carousel("prev")
            }), $(".apj-get-started-btn").on("click", function (e) {
                $(".btn-prev").removeClass("hide");
                $(".btn-next").removeClass("hide");
            }), $(".apj-get-started-btn").on("click", function (e) {
                $(".intro-carousel").carousel("next")
            }), $(".btn-submit").on("click", async function (e) {
                var status = await submitBankDetails();
            })
        });
        @endif
    </script>
    <script>
        function validateAndCollectData() {
            var data = {
                address1: $('#address1-pop').val(),
                address2: $('#address2-pop').val(),
                city: $('#city-pop').val(),
                state: $('#state-pop').val(),
                zip: $('#zip-pop').val()
            };

            if (!data.address1) {
                toastr.error('Address1 is required. Please add address1');
                return false;
            }
            if (!data.city) {
                toastr.error('City is required. Please add city');
                return false;
            }
            if (!data.state) {
                toastr.error('State is required. Please add state');
                return false;
            }
            if (!data.zip) {
                toastr.error('Zip is required. Please add zip');
                return false;
            }

            return data;
        }
    </script>
    <script>
        function validateAndCollectBankData() {
            var data = {
                bank_account: $('#bankaccount-pop').val(),
                routing: $('#routing-pop').val(),
                bank_nickname: $('#banknickname-pop').val(),
            };

            if (!data.bank_account) {
                toastr.error('Bank account is required. Please add bank account');
                return false;
            }
            if (!data.routing) {
                toastr.error('Routing number is required. Please add routing number');
                return false;
            }
            if (!data.bank_nickname) {
                toastr.error('Nickname is required. Please add nickname');
                return false;
            }

            return data;
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#edit_details_btn").click(function () {
                /* $('#employee_details_form').show(); */
                $('#edit_details_btn').hide();
                $("#employee_details_form input,select").attr("disabled", false);

                $('#edit_details_cancel_btn').show();
                $('#edit_details_save_btn').show();

            });
            $("#edit_details_cancel_btn").click(function () {
                $("#employee_details_form input,#employee_details_form select").attr("disabled", true);
                /*  $('#employee_details_form').hide(); */
                $('#edit_details_btn').show();
                $('#edit_details_cancel_btn').hide();
                $('#edit_details_save_btn').hide();
            });
            $('#employee_details_form').submit(function (e) {
                e.preventDefault();
                var options = {
                    url: "{{route('employees.index')}}/{{Auth::user()->id}}",
                    type: "PUT",
                    data: {
                        '_token': "{{csrf_token()}}",
                        '_method': "PUT"
                    },
					beforeSend:function (){
						$("#edit_details_save_btn").html('<img src="/images/loading.gif" alt="" class="loader-btn">').prop('disabled',true);
						$("#edit_details_cancel_btn").hide();
					},
                    success: function () {

                        toastr.success('Submitted successfully');
						$("#edit_details_save_btn").html('Save').prop('disabled',false);
                        $("#edit_details_cancel_btn").click();
                    },
                    error: function () {
                        toastr.error('Some Error occurred! Please enter all the details carefully!');
                    }
                };

                $(this).ajaxSubmit(options);


            });
            $('#edit_details_save_btn').click(function () {
                $('#employee_details_form').submit();
            });
        })
    </script>
@endsection
