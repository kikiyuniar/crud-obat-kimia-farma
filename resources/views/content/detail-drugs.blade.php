@extends('master.core')
@section('title','Detail Obat')
@section('link')
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
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
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('drugs') }}" class="text-muted text-hover-primary">Data Obat</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container">
                <div class="card">
                    <div class="card-body">
                            <div class="mb-13">
                                <h1 class="mb-3">Detail Obat</h1>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="mb-3" width="20%" src="{{ asset('Foto Obat') }}/{{ $data->images_obat }}" alt="{{ $data->images_obat }}">                                    
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Nama Entri Data</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Kolom Wajib Diisi"></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"  placeholder="Masukkan Nama Obat" value="{{ $data->user->name }}" disabled/>
                                    </div>

                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Nama Obat</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Kolom Wajib Diisi"></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"  placeholder="Masukkan Nama Obat" disabled value="{{ $data->name_obat }}"/>
                                    </div>

                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Tanggal Obat Dibuat</span>
                                        </label>
                                        <input class="form-control form-control-solid" id="tanggal_dibuat" placeholder="Pilih Tanggal Obat Dibuat" disabled value="{{ $data->tgl_dibuat }}"/>
                                    </div>

                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Tanggal Obat Kadaluarsa</span>
                                        </label>
                                        <input class="form-control form-control-solid" id="tanggal_kadaluarsa" placeholder="Pilih Tanggal Obat Kadaluarsa" disabled value="{{ $data->tgl_kadaluarsa }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('drugs') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_footer" class="app-footer">
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2022&copy;</span>
                <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Tes Kemampuan Bidang</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $("#tanggal_dibuat").flatpickr();
        $("#tanggal_kadaluarsa").flatpickr();
    </script>
@endsection