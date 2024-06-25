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
                <h3 class="box-title"> Edit Data Wajib Pajak </h3>
                <div class="pull-right">
                    <a href="{{ url('wp') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    <form id="wpForm" action="{{ route('wp.update', $wp->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ $wp->npwpd }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ $wp->nama_pajak }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_kelola">Nama Pemilik Pajak</label>
                                <input type="text" name="nama_kelola" id="nama_kelola" class="form-control" value="{{ $wp->nama_kelola }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="hiburan" {{ $wp->jenis == "hiburan" ? "selected" : "" }}>Hiburan</option>
                                    <option value="hotel" {{ $wp->jenis == "hotel" ? "selected" : "" }}>Hotel</option>
                                    <option value="restoran" {{ $wp->jenis == "restoran" ? "selected" : "" }}>Restoran</option>
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ $wp->username }}">
                            </div> --}}

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon (Nomor WhatsApp yang terdaftar)</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control" value="{{ $wp->no_telepon }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $wp->alamat }}">
                            </div>

                            <div class="form-group">
                                <label for="omset">Omset (Rp) / Tahun</label>
                                <input type="number" id="omset" name="omset" id="omset" class="form-control" value="{{ $wp->omset }}">
                            </div>

                            <div class="form-group">
                                <label for="pajak">Pajak (%) / Tahun</label>
                                <input type="number" id="pajak" name="pajak" id="pajak" class="form-control" value="{{ $wp->pajak }}">
                            </div>

                            <div class="form-group">
                                <label for="sptpd">SPTPD</label>
                                @if($wp->sptpd)
                                    <p>File SPTPD saat ini: <a href="{{ asset('storage/' . $wp->sptpd) }}" target="_blank">Lihat SPTPD</a></p>
                                @endif
                                <input type="file" name="sptpd" id="sptpd" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-normal">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn bg-red btn-normal">
                                    <i class="fa fa-refresh"></i> Ulangi
                                </button>
                            </div>

                        </form>

                        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('wpForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_wajib_pajak', 'jenis', 'nama_kelola', 'no_telepon', 'alamat', 'omset'];
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
                            }); -->

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