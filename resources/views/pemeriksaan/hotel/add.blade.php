@extends('layout/template')

@section('content')
    <section class="content-header">
        <h1>
            Pemeriksaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Pemeriksaan Pajak Hotel </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Tambah Data Pemeriksaan Pajak Hotel </h3>
                <div class="pull-right">
                    <a href="{{ url('prs_hotel') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ url('prs_hotel/add') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ old('npwpd') }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_wajib_pajak">Nama Wajib Pajak</label>
                                <input type="text" name="nama_wajib_pajak" id="nama_wajib_pajak" class="form-control" value="{{ old('nama_wajib_pajak') }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pemeriksaan">Nomor Pemeriksaan</label>
                                <input type="@extends('layout/template')

@section('content')
    <section class="content-header">
        <h1>
            Pajak Hotel
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Pemeriksaan Pajak Hotel </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Tambah Data Pemeriksaan Pajak Hotel </h3>
                <div class="pull-right">
                    <a href="{{ url('prs_hotel') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ url('prs_hotel/add') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ old('npwpd') }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_wajib_pajak">Nama Wajib Pajak</label>
                                <input type="text" name="nama_wajib_pajak" id="nama_wajib_pajak" class="form-control" value="{{ old('nama_wajib_pajak') }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pemeriksaan">Nomor Pemeriksaan</label>
                                <input type="text" name="no_pemeriksaan" id="no_pemeriksaan" class="form-control" value="{{ old('no_pemeriksaan') }}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal Pemeriksaan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-normal">
                                    <i class="fa fa-paper-plane"></i> Kirim
                                </button>
                                <button type="reset" class="btn bg-red btn-normal">
                                    <i class="fa fa-refresh"></i> Ulangi
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection" name="no_pemeriksaan" id="no_pemeriksaan" class="form-control" value="{{ old('no_pemeriksaan') }}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal Pemeriksaan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-normal">
                                    <i class="fa fa-paper-plane"></i> Kirim
                                </button>
                                <button type="reset" class="btn bg-red btn-normal">
                                    <i class="fa fa-refresh"></i> Ulangi
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection