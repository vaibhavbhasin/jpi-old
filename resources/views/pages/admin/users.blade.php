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
                        <p>This page contains list of ACH users</p>
                    </div>
                    <div class="card transaction-settings-section section-data-tables">
                        <div class="card-content">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col s12 m6 l10" id="accsett">
                                        <h4 class="card-title">ACH Users</h4>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $i=>$user)
                                            <tr>
                                                <td>{{$user['firstname']}}</td>
                                                <td>{{$user['lastname']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{$user['is_active'] ? 'Active': 'Not Active'}}</td>
                                                <td></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td>No Data Found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
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
@endsection

@section('customjs')
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
"ordering": false,
drawCallback: function () {
    $( ".paginate_button" ).addClass( "waves-effect" );
},
"language": {
    "paginate": {
      "previous": "<i class=\"material-icons\">chevron_left</i>",
      "next": "<i class=\"material-icons\">chevron_right</i>",
    }
  },
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
@endsection
