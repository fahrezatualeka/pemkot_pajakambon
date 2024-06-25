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
                <h3 class="box-title"> Tambah Jenis Wajib Pajak </h3>
                <div class="pull-right">
                    <a href="{{ url('wp_tipe') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="wp_tipeForm" action="{{ url('wp_tipe/add') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ old('npwpd') }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ old('nama_pajak') }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" value="{{ old('jenis') }}">
                                    <option value="">- Pilih -</option>
                                    <option value="hiburan">Hiburan</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="restoran">Restoran</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tarif">Tarif (%)</label>
                                <input type="number" name="tarif" id="tarif" class="form-control" value="{{ old('tarif') }}">
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
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @extends('layout/template')

@section('content')
<section class="content-header">
  <h1>
    Tipe WP
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Tipe WP</li>
    @if ($page == 'add')
        <li class="active">Tambah</li>
    @elseif ($page == 'edit')
        <li class="active">Edit</li>
    @endif
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>{{ ucfirst($page) }} Data</b></h3>
            <div class="pull-right">
                <a href="{{ route('tipe_wp') }}" class="btn btn-warning btn-normal">
                    <i class="fa fa-arrow-left"></i> Kembali </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="{{ $action }}" method="post">
                        @csrf
                        @if ($page == 'edit')
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="jenis_tipe">Jenis</label>
                            <input type="text" name="jenis_tipe" id="jenis_tipe" maxlength="50" value="{{ old('jenis_tipe', $row->jenis_tipe) }}" class="form-control" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="ket_tipe">Tipe Wajib Pajak</label>
                            <select name="ket_tipe" class="form-control" id="ket_tipe" required>
                                @if ($page == 'add')
                                    <option value="">- Pilih -</option>
                                    <option value="hiburan">HIBURAN</option>
                                    <option value="hotel">HOTEL</option>
                                    <option value="restoran">RESTORAN</option>
                                @elseif ($page == 'edit')
                                <option value="hiburan" {{ $row->ket_tipe == "hiburan" ? "selected" : "" }}>HIBURAN</option>
                                    <option value="hotel" {{ $row->ket_tipe == "hotel" ? "selected" : "" }}>HOTEL</option>
                                    <option value="restoran" {{ $row->ket_tipe == "restoran" ? "selected" : "" }}>RESTORAN</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pajak">Besaran Pajak (%)</label>
                            <input type="number" name="pajak" id="pajak" value="{{ old('pajak', $row->pajak) }}" class="form-control" required maxlength="3">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="{{ $page }}" class="btn btn-success btn-normal">
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
@endsection --}}