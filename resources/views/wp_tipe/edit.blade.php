@extends('layout/template')
@section('content')
    <section class="content-header">
        <h1>
            Wajib Pajak
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> WP </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Edit Jenis Wajib Pajak </h3>
                <div class="pull-right">
                    <a href="{{ url('wp_tipe') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="wp_tipeForm" action="{{ route('wp_tipe.update', $wp_tipe->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ $wp_tipe->npwpd }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ $wp_tipe->nama_pajak }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="hiburan" {{ $wp_tipe->jenis == "hiburan" ? "selected" : "" }}>Hiburan</option>
                                    <option value="hotel" {{ $wp_tipe->jenis == "hotel" ? "selected" : "" }}>Hotel</option>
                                    <option value="restoran" {{ $wp_tipe->jenis == "restoran" ? "selected" : "" }}>Restoran</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tarif">Tarif</label>
                                <input type="text" name="tarif" id="tarif" class="form-control" value="{{ $wp_tipe->tarif }}">
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
                            document.getElementById('wp_tipeForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_pajak', 'jenis', 'tarif'];
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

                            @if(session('success'))
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: '{{ session('success') }}'
                                });
                            @endif
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection