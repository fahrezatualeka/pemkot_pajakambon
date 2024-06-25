@extends('layout.template')
@section('content')

<section class="content-header">
  <h1>
    Pelunasan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">Pelunasan Pajak Restoran</li>
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
                timer: 3500
            });
        </script>
        @endif

        <div class="box-header with-border">
            <h3 class="box-title">Data Pelunasan Pajak Restoran</h3>
            <div class="pull-right">
                <a href="{{ url('pgh_restoran') }}" class="btn btn-default btn-normal">
                    <i class="fa fa-arrow-left"></i> Kembali
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
                        <!-- <th>Nomor Penagihan</th> -->
                        <th>Nomor Telepon</th>
                        <th>Tanggal Penagihan</th>
                        <th>Tanggal Pelunasan</th>
                        <th>Omset</th>
                        <th>Pajak</th>
                        <!-- <th>Denda</th> -->
                        <th>Total</th>
                        {{-- <th>Status</th> --}}
                        <th style="width: 100px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $key => $pgh_restoran)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pgh_restoran->npwpd }}</td>
                        <td>{{ $pgh_restoran->nama_pajak }}</td>
                        <!-- <td>{{ $pgh_restoran->no_penagihan }}</td> -->
                        <td>{{ $pgh_restoran->no_telepon }}</td>
                        <td>{{ $pgh_restoran->tanggal }}</td>
                        <td>{{ $pgh_restoran->tanggal_pelunasan }}</td>
                        <td>Rp{{ number_format($pgh_restoran->omset, 0, ',', '.') }}</td>
                        <td>{{ number_format($pgh_restoran->pajak, 0, ',', '.') }}%</td>
                        <!-- <td>{{ number_format($pgh_restoran->denda, 0, ',', '.') }}%</td> -->
                        <td>Rp{{ number_format($pgh_restoran->total, 0, ',', '.') }}</td>
                        
                        <td class="text-center">
                            <form action="{{ url('pgh_restoranPelunasan/delete/'.$pgh_restoran->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>
{{-- <script>
    // Polling untuk refresh halaman setiap 10 detik
    setInterval(function() {
        location.reload();
    }, 15000); // 10000 ms = 10 detik
</script> --}}
@endsection