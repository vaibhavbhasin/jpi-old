{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','ACH Users')

{{-- page content --}}
@section('content')

<div class='text-right'>
    <a href='/add-user' class='defaultbtn'>Add User</a>
</div>
@endsection