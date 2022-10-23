@extends('master.core')
@section('title','Dashboard')
@section('link')
@endsection
@section('content')
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@yield('title')</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Dashboards</li>
            </ul>
        </div>  
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xxl-12">
                <div class="card card-flush h-md-100">
                    <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('{{ URL::asset('assets') }}/media/stock/900x600/42.png')">
                        <div class="mb-10">
                            <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                            <span class="me-2">Welcome to my Aplication
                            <br />
                            <span class="position-relative d-inline-block text-danger">
                                <a href="#" class="text-danger opacity-75-hover">Management</a>
                                <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                            </span></span>for Drugs</div>
                        </div>
                        <img class="mx-auto h-150px h-lg-200px theme-light-show" src="{{ URL::asset('assets') }}/media/illustrations/misc/upgrade.svg" alt="" />
                        <img class="mx-auto h-150px h-lg-200px theme-dark-show" src="{{ URL::asset('assets') }}/media/illustrations/misc/upgrade-dark.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection