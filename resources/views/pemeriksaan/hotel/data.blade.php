@extends('layout/template')
@section('content')

<section class="content-header">
  <h1>
    Pemeriksaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">Pemeriksaan Pajak Hotel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2150
            });
        </script>
        @endif
        <div class="box-header with-border">
            <h3 class="box-title">Data Pemeriksaan Pajak Hotel</h3>
            <div class="pull-right">
                <a href="{{ url('prs_hotel/add') }}" class="btn btn-primary btn-normal">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>NPWPD</th>
                        <th>Nama Wajib Pajak</th>
                        <th>Nomor Pemeriksaan</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th style="width: 150px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $key => $prs_hotel)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $prs_hotel->npwpd }}</td>
                        <td>{{ $prs_hotel->nama_wajib_pajak }}</td>
                        <td>{{ $prs_hotel->no_pemeriksaan }}</td>
                        <td>{{ $prs_hotel->tanggal }}</td>
                        {{-- <td><img src="{{ asset('storage/sptpd/' . $prs_hotel->sptpd_path) }}" alt="Gambar SPTPD"></td> --}}
                        <td class="text-center">
                            <a href="{{ url('prs_hotel/edit/'.$prs_hotel->id) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <form action="{{ url('prs_hotel/delete/'.$prs_hotel->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSspdModal{{ $prs_hotel->id }}">
                                SSPD
                            </button>
                        </td>
                    </tr> --}}

                    {{-- <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSptpdModal{{ $prs_hotel->id }}">
                                SPTPD
                            </button>
                        </td>
                    </tr> --}}

                    @endforeach
                </tbody>
                
            </table>
            
            <div class="box-body">
                <form action="" method="post">
                    <div class="row">
                            <div class="col-md-2">
                                <label for="awal"> Dari Tanggal Pemeriksaan: </label>
                                <input type="date" name="awal" id="awal" class="form-control">
                                <br>
                                <a href="" type="submit" class="btn btn-default btn-normal"> CETAK REKAP </a>
                            </div>
                            <div class="col-md-2">
                                <label for="akhir"> Sampai Tanggal Pemeriksaan: </label>
                                <input type="date" name="akhir" id="akhir" class="form-control">
                            </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection