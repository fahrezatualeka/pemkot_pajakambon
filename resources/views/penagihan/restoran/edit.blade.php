@extends('layout/template')
@section('content')

    <section class="content-header">
        <h1>
            Penagihan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Penagihan Pajak Restoran </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Edit Data Penagihan Pajak Restoran </h3>
                <div class="pull-right">
                    <a href="{{ url('pgh_restoran') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="penagihanForm" action="{{ route('penagihan.restoran.update', $pgh_restoran->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ $pgh_restoran->npwpd }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ $pgh_restoran->nama_pajak }}">
                            </div>

                            <!-- <div class="form-group">
                                <label for="no_penagihan">Nomor Penagihan</label>
                                <input type="text" name="no_penagihan" id="no_penagihan" class="form-control" value="{{ $pgh_restoran->no_penagihan }}">
                            </div> -->

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon (Nomor WhatsApp yang terdaftar)</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control" value="{{ ($pgh_restoran->no_telepon) }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="tanggal">Tanggal Penagihan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $pgh_restoran->tanggal }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="omset">Omset (Rp) / Tahun</label>
                                <input type="number" name="omset" id="omset" class="form-control" value="{{ intval($pgh_restoran->omset) }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="pajak">Pajak (%) / Tahun</label>
                                <input type="number" name="pajak" id="pajak" class="form-control" value="{{ intval($pgh_restoran->pajak) }}">
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="denda">Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control" value="{{ intval($pgh_restoran->denda) }}">
                            </div> -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-normal">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn bg-red btn-normal">
                                    <i class="fa fa-refresh"></i> Ulangi
                                </button>
                            </div>

                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('penagihanForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_wajib_pajak', 'no_penagihan', 'tanggal', 'omset', 'pajak'];
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