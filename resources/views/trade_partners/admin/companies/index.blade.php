{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')
{{-- page content --}}
@section('content')
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class='container'>
                    <div class="section">
                        <div class="jpi-main-heading"></div>
                        <div class="row">
                            <div class="col s12 m12" id="header-search">
                                <div class="header-search-wrapper hide-on-med-and-down"><i
                                        class="material-icons">search</i>
                                    <input class="header-search-input z-depth-2" type="text" name="Search"
                                           placeholder="Search Companies" data-search="template-list">
                                </div>
                            </div>
                        </div>
                        <div class="card account-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l12" id="accsett">
                                            <h4 class="card-title">Companies</h4>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <table id="companyTable" class="display">
                                            <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Company Type</th>
                                                <th>Operating Region</th>
                                                <th>Created Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($tableData as $row)
                                                <tr>
                                                    <td>{{$row->company_name}}</td>
                                                    <td>{{$row->company_type}}</td>
                                                    <td>{{$row->region}}</td>
                                                    <td>{{$row->date}}</td>
                                                </tr>
                                            @empty
                                                <tr><th colspan="4"><h6 class="center">No Data Found</h6></th></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s6"></div>
                                    <div class="col s6">{!! $tableData->appends(request()->all())->render() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-overlay"></div> <!-- add class "show" -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection
@section('customjs')
    <script>
        $(document).on('click','#companyTable tbody tr',function (){
            window.location.href="{{route('companies.show',1)}}"
        });
    </script>
@endsection
