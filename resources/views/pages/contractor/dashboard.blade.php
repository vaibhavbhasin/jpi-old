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
                        <p>Dashboard is in development mode(Contractor)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection