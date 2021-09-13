<body class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        @include('panels.navbar')
    </header>
    <!-- END: Header-->
    <!-- BEGIN: SideNav-->
    @include('panels.sidebar')
    <!-- END: SideNav-->
    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class='container'>
                    <div class="section">
                        <div class="jpi-main-heading">
                            <h2>Welcome {{Auth::user()->firstname}} </h2>
                            <p>This system is to help manage your registration and banking info for cellular reimbursement payments.</p>
                        </div>
                        <div class="card account-settings-section">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="accsett">
                                            <h4 class="card-title">Account Settings</h4>
                                            <div class="registered-tag">
                                                <span class="registered"><img src="{{asset('images/registered-icon.svg')}}" alt="" class="regit-icon"> Registered</span>
                                                <!-- remove class 'hide' -->
                                                <span class="notregistered hide"><img src="{{asset('images/not-registered.svg')}}" alt="" class="regit-icon"> Not Registered</span>
                                            </div>
                                        </div>
                                        <div class="col s12 m6 l2 text-right">
                                            <!-- remove class 'hide' -->
                                            <button type="button" class="waves-effect apj-cancel-btn btn hide">Cancel</button>
                                            <!-- remove class 'hide' -->
                                            <button type="button" class="waves-effect apj-save-btn btn hide">Save</button>
                                            <button type="button" class="waves-effect apj-edit-btn btn ">Edit</button>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <div class="row">
                                    <form class="">
                                        <div class="col s6">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="address1" type="text" class="validate">
                                                    <label for="address1">Address 1</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="address2" type="text" class="validate">
                                                    <label for="address2">Address 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="city" type="text" class="validate">
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="state" type="text" class="validate">
                                                    <label for="state">State</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="zip" type="text" class="validate">
                                                    <label for="zip">Zip</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="bankaccount" type="text" class="validate">
                                                    <label for="bankaccount">Bank Account#</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="routing" type="text" class="validate">
                                                    <label for="routing">Routing#</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="banknickname" type="text" class="validate">
                                                    <label for="banknickname">Bank nickname</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                    <div class="col s12">
                                        <table id="data-table-simple" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Transcation ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                </tr>
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
    <!-- BEGIN: Page Main-->
    <!-- BEGIN: Page Main-->
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
                <div id="img-modal" class="intromodal modal white" tabindex="0" data-keyboard="false" data-backdrop="static">
                    <div class="modal-content">
                        <p class="modal-header right modal-close">
                            <span class="right"><i class="material-icons right-align">clear</i></span>
                        </p>
                        <div class="carousel carousel-slider center intro-carousel">
                            <div class="carousel-fixed-item center middle-indicator with-indicators">
                                <div class="left">
                                    <button class="movePrevCarousel middle-indicator-text btn btn-flat apj-black-text waves-effect waves-light btn-prev">
                                        <i class="material-icons">navigate_before</i> <span class="hide-on-small-only">Back</span>
                                    </button>
                                </div>
                                <div class="right">
                                    <button class="moveNextCarousel middle-indicator-text btn btn-flat apj-blue-text waves-effect waves-light btn-next" id="btn_next-form-submit">
                                        <span class="hide-on-small-only">Next</span> <i class="material-icons">navigate_next</i>
                                    </button>
                                    <button class="moveNextCarousel middle-indicator-text btn btn-flat apj-blue-text waves-effect waves-light btn-submit hide">
                                        <span class="hide-on-small-only">Submit</span>
                                    </button>
                                </div>
                            </div>
                            <div class="carousel-item slide-1 active">
                                <h5 class="intro-step-title mt-7 center animated fadeInUp">Welcome {{Auth::user()->firstname}}</h5>
                                <p class="intro-step-text mt-5 animated fadeInUp">This system is to help manage your registration and banking info for cellular reimbursement payments. All you need to do to get started is to add your address and banking information to be fully registered for reimbursment payments that occur at the end of each month.</p>
                                <p class="intro-step-text mt-5 animated fadeInUp"><button type="button" class="waves-effect apj-get-started-btn btn ">Click to get started</button></p>
                            </div>
                            <div class="carousel-item slide-2">
                                <h5 class="intro-step-title mt-0 center">Enter Your Address Details</h5>
                                <div class="row">
                                    <div class="col s12">
                                        <form class="">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="address1-pop" type="text" class="validate">
                                                    <label for="address1-pop">Address 1</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="address2-pop" type="text" class="validate">
                                                    <label for="address2-pop">Address 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="city-pop" type="text" class="validate">
                                                    <label for="city-pop">City</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    {{--                                                    <input id="state-pop" type="text" class="validate">--}}
                                                    <select id="state-pop" class="select2 selectstate browser-default"
                                                            class="validate">
                                                        <option value="">Select State</option>
                                                        <option value="AA">AA</option>
                                                        <option value="AE">AE</option>
                                                        <option value="AP">AP</option>
                                                        <option value="AK">AK</option>
                                                        <option value="AL">AL</option>
                                                        <option value="AR">AR</option>
                                                        <option value="AZ">AZ</option>
                                                        <option value="CA">CA</option>
                                                        <option value="CO">CO</option>
                                                        <option value="CT">CT</option>
                                                        <option value="DC">DC</option>
                                                        <option value="DE">DE</option>
                                                        <option value="FL">FL</option>
                                                        <option value="GA">GA</option>
                                                        <option value="GU">GU</option>
                                                        <option value="HI">HI</option>
                                                        <option value="IA">IA</option>
                                                        <option value="ID">ID</option>
                                                        <option value="IL">IL</option>
                                                        <option value="IN">IN</option>
                                                        <option value="KS">KS</option>
                                                        <option value="KY">KY</option>
                                                        <option value="LA">LA</option>
                                                        <option value="MA">MA</option>
                                                        <option value="MD">MD</option>
                                                        <option value="ME">ME</option>
                                                        <option value="MI">MI</option>
                                                        <option value="MN">MN</option>
                                                        <option value="MO">MO</option>
                                                        <option value="MS">MS</option>
                                                        <option value="MT">MT</option>
                                                        <option value="NC">NC</option>
                                                        <option value="ND">ND</option>
                                                        <option value="NE">NE</option>
                                                        <option value="NH">NH</option>
                                                        <option value="NJ">NJ</option>
                                                        <option value="NM">NM</option>
                                                        <option value="NV">NV</option>
                                                        <option value="NY">NY</option>
                                                        <option value="OH">OH</option>
                                                        <option value="OK">OK</option>
                                                        <option value="OR">OR</option>
                                                        <option value="PA">PA</option>
                                                        <option value="PR">PR</option>
                                                        <option value="RI">RI</option>
                                                        <option value="SC">SC</option>
                                                        <option value="SD">SD</option>
                                                        <option value="TN">TN</option>
                                                        <option value="TX">TX</option>
                                                        <option value="UT">UT</option>
                                                        <option value="VA">VA</option>
                                                        <option value="VI">VI</option>
                                                        <option value="VT">VT</option>
                                                        <option value="WA">WA</option>
                                                        <option value="WI">WI</option>
                                                        <option value="WV">WV</option>
                                                    </select>
                                                    <label for="state-pop">State</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="zip-pop" type="text" class="validate">
                                                    <label for="zip-pop">Zip</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item slide-3">
                                <h5 class="intro-step-title mt-0 center">Enter Your Banking Details</h5>
                                <div class="row">
                                    <div class="col s12">
                                        <form class="">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="bankaccount-pop" type="text" class="validate">
                                                    <label for="bankaccount-pop">Bank Account#</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="routing-pop" type="text" class="validate">
                                                    <label for="routing-pop">Routing#</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="banknickname-pop" type="text" class="validate">
                                                    <label for="banknickname-pop">Bank nickname</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item slide-4">
                                <h5 class="intro-step-title mt-7 center animated fadeInUp">Congratulations</h5>
                                <p class="intro-step-text mt-5 animated fadeInUp">You are now fully registered to start receiving reimburstment payments that are disbursed at the end of every month. </p>
                                <p class="intro-step-text mt-5 animated fadeInUp"><button type="button" class="waves-effect apj-intro-close-btn modal-close btn ">Click to close</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: intro -->
    {{-- footer  --}}
    @include('panels.footer')
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
    <script>
        async function submitDetails(callback){

            var data  = validateAndCollectData();
            if(data){
                $.ajax({
                            url:"{{ route('employees.index') }}/{{Auth::user()->id}}",
                            method:"PUT",
                            data:{
                                '_token': "{{ csrf_token() }}",
                                'address1': data.address1,
                                'address2': data.address2,
                                'city': data.city,
                                'state': data.state,
                                'zip': data.zip,
                            },

                            success: function(data)
                            {
                                $(".intro-carousel").carousel("next");
                                toastr.success('The detail has been submitted successfully');
                            }

                    });
            }
        }

    </script>
    <script>
        $(function() {
            $("#data-table-simple").DataTable({
                responsive: !0,
                "ordering": false
            });
        });
        $(window).on("load", function() {
            $(".btn-prev").addClass("hide");
            $(".btn-next").addClass("hide");
            $(".intromodal").modal({
                dismissible: false,
                onOpenEnd: function() {
                    $(".carousel.carousel-slider").carousel({
                        fullWidth: !0,
                        indicators: !0,
                        onCycleTo: function() {
                            1 == $(".carousel-item.active").index() ? ($(".btn-prev").addClass("disabled hide"), $(".btn-next").addClass("hide"), $("ul.indicators li:first-child").removeClass("done")) : 1 < $(".carousel-item.active").index() && ($(".btn-prev").removeClass("disabled"), $(".btn-next").removeClass("disabled"), 3 == $(".carousel-item.active").index() && ($(".btn-next").addClass("disabled"), $("ul.indicators li:nth-child(2)").addClass("done")));
                            2 == $(".carousel-item.active").index() ? ($("ul.indicators li:first-child").addClass("done"), $("ul.indicators li:nth-child(2)").removeClass("done"), $(".btn-submit").addClass("hide"), $(".btn-prev").removeClass("hide"), $(".btn-next").removeClass("hide")) : "";
                            3 == $(".carousel-item.active").index() ? ($(".btn-next").addClass("hide"), $(".btn-submit").removeClass("hide"), $(".btn-prev").removeClass("hide")) : "";
                            4 == $(".carousel-item.active").index() ? ($(".btn-prev").addClass("hide"), $(".btn-next").addClass("hide"), $(".btn-submit").addClass("hide"), $("ul.indicators li").addClass("hide")) : "";
                        }
                    })
                }
            }), setTimeout(function() {
                $(".intromodal").modal("open");
            }, 100), $(".btn-next").on("click", async function(e) {
                var status = await submitDetails();
            }), $(".btn-prev").on("click", function(e) {
                $(".intro-carousel").carousel("prev")
            }), $(".apj-get-started-btn").on("click", function(e) {
                $(".btn-prev").removeClass("hide");
                $(".btn-next").removeClass("hide");
            }), $(".apj-get-started-btn").on("click", function(e) {
                $(".intro-carousel").carousel("next")
            }), $(".btn-submit").on("click", function(e) {
                $(".intro-carousel").carousel("next")
            })
        });
    </script>
    <script>
        function validateAndCollectData(){
            var data = {
                address1: $('#address1-pop').val(),
                address2: $('#address2-pop').val(),
                city: $('#city-pop').val(),
                state: $('#state-pop').val(),
                zip: $('#zip-pop').val()
            };

            if(!data.address1){
                toastr.error('Address1 is required. Please add address1');
                return false;
            }
            if(!data.city){
                toastr.error('City is required. Please add city');
                return false;
            }
            if(!data.state){
                toastr.error('State is required. Please add state');
                return false;
            }
            if(!data.zip){
                toastr.error('Zip is required. Please add zip');
                return false;
            }

            return data;
        }
    </script>

</body>
