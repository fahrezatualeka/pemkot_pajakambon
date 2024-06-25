@extends('layout/template')
@section('content')

    <section class="content-header">
        <h1>
            Penagihan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active"> Penagihan Pajak Hiburan </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Tambah Data Penagihan Pajak Hiburan </h3>
                <div class="pull-right">
                    <a href="{{ url('pgh_hiburan') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="penagihanForm" action="{{ route('penagihan.hiburan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group">
                                <label for="jenis">NPWPD</label>

                            </div> --}}
                            {{-- <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ old('npwpd') }}" readonly> --}}
{{-- 
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <div class="form-group input-group">
                                    <select name="jenis" id="jenis" class="form-control" value="{{ old('jenis') }}">
                                        <i class="fa fa-search"></i>
                                        <option value="">Pilih NPWPD</option>
                                        @foreach ($wpData as $item)
                                            
                                        <option value="{{$item->npwpd}}">{{$item->npwpd}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> --}}
                            

                            <div class="form-group">
                                <label for="nama_pajak">NPWPD</label>
                            <select name="npwpd" id="jenis" class="form-control">
                                <i class="fa fa-search"></i>
                                <option value="">- Pilih -</option>
                                @foreach ($wpData as $item)
                                    <option value="{{$item->npwpd}}">{{$item->npwpd}}</option>
                                @endforeach
                            </select>
                            </div>
                            
                            <div id="result"></div> <!-- Tempat untuk menampilkan hasil pencarian -->
                            
                            <script>
                            document.getElementById('jenis').addEventListener('change', function() {
                                let npwpd = this.value;
                                if (npwpd) {
                                    fetchData(npwpd);
                                } else {
                                    document.getElementById('result').innerHTML = ''; // Kosongkan hasil jika tidak ada NPWPD yang dipilih
                                }
                            });

                            function fetchData(npwpd) {
                                fetch(`/search-wp?npwpd=${npwpd}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        let namaDiv = document.getElementById('nama_pajak');
                                        let teleponDiv = document.getElementById('no_telepon');
                                        let omsetDiv = document.getElementById('omset');
                                        let pajakDiv = document.getElementById('pajak');
                                        if (data) {
                                            namaDiv.value = `${data.nama_pajak}`;
                                            teleponDiv.value = `${data.no_telepon}`;
                                            omsetDiv.value = `${data.omset}`;
                                            pajakDiv.value = `${data.pajak}`;

                                        } 
                                    })
                                    .catch(error => console.error('Error:', error));
                            }
                            </script>
                            
                            

                            <div class="form-group">
                                <label for="nama_pajak">Nama Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control"  readonly>
                            </div>

                            <!-- <div class="form-group">
                                <label for="no_penagihan">Nomor Penagihan</label>
                                <input type="text" name="no_penagihan" id="no_penagihan" class="form-control" value="{{''}}">
                            </div> -->

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon (Nomor WhatsApp yang terdaftar)</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control"  readonly>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal Penagihan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{''}}">
                            </div>

                            <div class="form-group">
                                <label for="omset">Omset (Rp) / Tahun</label>
                                <input type="number" name="omset" id="omset" class="form-control" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="pajak">Pajak (%) / Tahun</label>
                                <input type="number" name="pajak" id="pajak" class="form-control" readonly>
                            </div>

                            <!-- <div class="form-group">
                                <label for="denda">Denda (%)</label>
                                <input type="number" name="denda" id="denda" class="form-control" value="{{''}}">
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

                        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('penagihanForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_pajak', 'no_penagihan', 'tanggal', 'omset', 'pajak'];
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
                                        text: 'Silahkan lengkapi data, data yang tidak wajib diisi hanya Denda'
                                    });
                                }
                            });
                        </script> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection