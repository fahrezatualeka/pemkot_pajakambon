@extends('layout/template')
@section('content')

<section class="content-header">
  <h1>
    Pengawasan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan Pajak Hiburan</li>
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
            <h3 class="box-title">Data Pengawasan Pajak Hiburan</h3>
            <div class="pull-right">
                <a href="{{ url('pws_hiburan/add') }}" class="btn btn-primary btn-normal">
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
                        <th>Nama Pajak</th>
                        <th>Nomor Pengawasan</th>
                        <th>Tanggal</th>
                        <th style="width: 100px">SSPD</th>
                        <th style="width: 100px">SPTPD</th>
                        <th style="width: 150px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $key => $pws_hiburan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pws_hiburan->npwpd }}</td>
                        <td>{{ $pws_hiburan->nama_pajak }}</td>
                        <td>{{ $pws_hiburan->no_pengawasan }}</td>
                        <td>{{ $pws_hiburan->tanggal }}</td>
                        <td class="text-center">
                            <a href="{{ $pws_hiburan->sspd_path }}" class="btn bg-orange btn-xs">
                                SSPD
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ $pws_hiburan->sptpd_path }}" class="btn bg-orange btn-xs">
                                SPTPD
                            </a>
                        </td>
                        {{-- <td><img src="{{ asset('storage/sptpd/' . $pws_hiburan->sptpd_path) }}" alt="Gambar SPTPD"></td> --}}
                        <td class="text-center">
                            <a href="{{ url('pws_hiburan/edit/'.$pws_hiburan->id) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <form action="{{ url('pws_hiburan/delete/'.$pws_hiburan->id) }}" method="post" style="display: inline-block;">
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
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSspdModal{{ $pws_hiburan->id }}">
                                SSPD
                            </button>
                        </td>
                    </tr> --}}

                    {{-- <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSptpdModal{{ $pws_hiburan->id }}">
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
                                <label for="awal"> Dari Tanggal: </label>
                                <input type="date" name="awal" id="awal" class="form-control">
                                <br>
                                <a href="" type="submit" class="btn btn-default btn-normal"> CETAK REKAP </a>
                            </div>
                            <div class="col-md-2">
                                <label for="akhir"> Sampai Tanggal: </label>
                                <input type="date" name="akhir" id="akhir" class="form-control">
                            </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection