@extends('layout/template')
@section('content')

    <section class="content-header">
        <h1>
            Pengawasan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Pengawasan Pajak Restoran </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Tambah Data Pengawasan Pajak Restoran </h3>
                <div class="pull-right">
                    <a href="{{ url('pws_restoran') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="pengawasanForm" action="{{ url('pws_restoran/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{''}}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{''}}">
                            </div>

                            <div class="form-group">
                                <label for="no_pengawasan">Nomor Pengawasan</label>
                                <input type="text" name="no_pengawasan" id="no_pengawasan" class="form-control" value="{{''}}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{''}}">
                            </div>

                            {{-- accept=".jpeg, .jpg, .png, .pdf" --}}

                            <div class="form-group">
                                <label for="sspd">SSPD</label>
                                <input type="file" name="sspd" id="sspd" class="form-control" value="{{''}}">
                            </div>

                            <div class="form-group">
                                <label for="sptpd">SPTPD</label>
                                <input type="file" name="sptpd" id="sptpd" class="form-control" value="{{''}}">
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

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('pengawasanForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_pajak', 'no_pengawasan', 'tanggal', 'sspd', 'sptpd'];
                                requiredFields.forEach(function(field) {
                                    const value = document.getElementById(field).value;
                                    if (!value) {
                                        formValid = false;
                                    }
                                });
                                if (!formValid) {
                                    event.preventDefault();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal menyimpan!',
                                        text: 'Silahkan lengkapi data'
                                    });
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection