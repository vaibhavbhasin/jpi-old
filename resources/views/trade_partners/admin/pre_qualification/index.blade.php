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
                            <div class="col s12 m10" id="header-search">
                                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                                    <input class="header-search-input z-depth-2" type="text" name="Search" >
                                    <ul class="search-list collection ps ps--active-y display-none">
                                        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                                                <h6 class="search-title">PAGES</h6>
                                            </a></li>
                                        <li class="auto-suggestion"><a class="collection-item"
                                                                       href="dashboard-ecommerce.html">
                                                <div class="display-flex">
                                                    <div class="display-flex align-item-center flex-grow-1"><span
                                                            class="material-icons" data-icon="add_shopping_cart">add_shopping_cart</span>
                                                        <div class="member-info display-flex flex-column"><span
                                                                class="black-text">eCommerce</span><small
                                                                class="grey-text">Dashboard</small></div>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li class="auto-suggestion"><a class="collection-item"
                                                                       href="media-hover-effects.html">
                                                <div class="display-flex">
                                                    <div class="display-flex align-item-center flex-grow-1"><span
                                                            class="material-icons" data-icon="picture_in_picture">picture_in_picture</span>
                                                        <div class="member-info display-flex flex-column"><span
                                                                class="black-text">Media Hover Effects</span><small
                                                                class="grey-text">Medias Pages</small></div>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li class="auto-suggestion"><a class="collection-item"
                                                                       href="ui-collections.html">
                                                <div class="display-flex">
                                                    <div class="display-flex align-item-center flex-grow-1"><span
                                                            class="material-icons" data-icon="format_list_bulleted">format_list_bulleted</span>
                                                        <div class="member-info display-flex flex-column"><span
                                                                class="black-text">Collections</span><small
                                                                class="grey-text">User Interface</small></div>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li class="auto-suggestion"><a class="collection-item" href="form-select2.html">
                                                <div class="display-flex">
                                                    <div class="display-flex align-item-center flex-grow-1"><span
                                                            class="material-icons" data-icon="content_paste">content_paste</span>
                                                        <div class="member-info display-flex flex-column"><span
                                                                class="black-text">Form Select2</span><small
                                                                class="grey-text">Forms</small></div>
                                                    </div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col s12 m2" id="accsett">
                            <a class="btn dropdown-settings dropdown-filter waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">Filter</i><span class="hide-on-small-onl">Filter</span><i class="material-icons right">arrow_drop_down</i></a>
                        <ul class="dropdown-content dropdown-settings " id="dropdown1" tabindex="0">
                            <li tabindex="0"><a class="grey-text text-darken-2" href="#!">Minimum</a></li>
                            <li tabindex="0"><a class="grey-text text-darken-2" href="#!">Maximum</a></li>
                        </ul>
                                        </div>
                        </div>
                        <div class="card account-settings-section section-data-tables">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10" id="accsett">
                                            <h4 class="card-title">Applications</h4>
                                        </div>
                                        <div class="col s12 m6 l2 text-right">
                                            <select id="" name="">
                                                <option value="1">My Tasks</option>
                                                <option value="0">All Apps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="apj-acctxt-border"></div>
                                </div>
                                <!-- Page Length Options -->
                                <div class="row" id="data-table-starts">
                                    <div class="col s12 p0">
                                        <table id="preQualTable" class="display">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox" class="select-all"/>
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th>Date</th>
                                                <th>EIN</th>
                                                <th>Company</th>
                                                <th>Contact</th>
                                                <th>Project</th>
                                                <th>Single</th>
                                                <th>Aggregate</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($tableData as $row)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox"/>
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>{{$row->date}}</td>
                                                    <td>{{$row->ein_number}}</td>
                                                    <td>{{$row->company}}</td>
                                                    <td>{{$row->contact}}</td>
                                                    <td>{{$row->project}}</td>
                                                    <td>{{price($row->single)}}</td>
                                                    <td>{{price($row->aggregate)}}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="waves-effect waves-light btn-small appstatusbutton {{strtolower(preQuailStatus($row->status))}}" id="">{{preQuailStatus($row->status)}}</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><th colspan="9"><h6 class="center">No Data Found</h6></th></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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
        $(document).on('click','#preQualTable tbody tr',function (){
           window.location.href="{{route('preQualification.show')}}"
        });
    </script>
@endsection
