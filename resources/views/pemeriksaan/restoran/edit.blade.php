@extends('layout/template')
@section('content')
    <section class="content-header">
        <h1>
            Pemeriksaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Pemeriksaan Pajak Restoran </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Edit Data Pemeriksaan Pajak Restoran </h3>
                <div class="pull-right">
                    <a href="{{ url('prs_restoran') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ route('pemeriksaan.restoran.update', $prs_restoran->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ $prs_restoran->npwpd }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_wajib_pajak">Nama Wajib Pajak</label>
                                <input type="text" name="nama_wajib_pajak" id="nama_wajib_pajak" class="form-control" value="{{ $prs_restoran->nama_wajib_pajak }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pemeriksaan">Nomor Pemeriksaan</label>
                                <input type="text" name="no_pemeriksaan" id="no_pemeriksaan" class="form-control" value="{{ $prs_restoran->no_pemeriksaan }}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal Pemeriksaan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $prs_restoran->tanggal }}">
                            </div>

                            {{-- AKSI --}}
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