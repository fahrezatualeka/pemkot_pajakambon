@extends('layout/template')
@section('content')
    <section class="content-header">
        <h1>
            Pengawasan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Pengawasan Pajak Hotel </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Edit Data Pengawasan Pajak Hotel </h3>
                <div class="pull-right">
                    <a href="{{ url('pws_hotel') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="pengawasanForm" action="{{ route('pws_hotel.update', $pws_hotel->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ $pws_hotel->npwpd }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ $pws_hotel->nama_pajak }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pengawasan">Nomor Pengawasan</label>
                                <input type="text" name="no_pengawasan" id="no_pengawasan" class="form-control" value="{{ $pws_hotel->no_pengawasan }}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $pws_hotel->tanggal }}">
                            </div>

                            {{-- accept=".jpeg, .jpg, .png, .pdf" --}}
                            <div class="form-group">
                                <label for="sspd_path">SSPD</label>
                                <input type="file" name="sspd_path" id="sspd_path" class="form-control" value="{{ $pws_hotel->sspd_path }}">
                            </div>

                            <div class="form-group">
                                <label for="sptpd_path">SPTPD</label>
                                <input type="file" name="sptpd_path" id="sptpd_path" class="form-control" value="{{ $pws_hotel->sptpd_path }}">
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

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('pengawasanForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_pajak', 'no_pengawasan', 'tanggal', 'sspd_path', 'sptpd_path'];
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