@extends('layout.template')
@section('content')

<section class="content-header">
  <h1>
    Pelunasan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">Pelunasan Pajak Hotel</li>
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
            <h3 class="box-title">Data Pelunasan Pajak Hotel</h3>
            <div class="pull-right">
                <a href="{{ url('pgh_hotel') }}" class="btn btn-default btn-normal">
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
                    @foreach ($data as $key => $pgh_hotel)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pgh_hotel->npwpd }}</td>
                        <td>{{ $pgh_hotel->nama_pajak }}</td>
                        <!-- <td>{{ $pgh_hotel->no_penagihan }}</td> -->
                        <td>{{ $pgh_hotel->no_telepon }}</td>
                        <td>{{ $pgh_hotel->tanggal }}</td>
                        <td>{{ $pgh_hotel->tanggal_pelunasan }}</td>
                        <td>Rp{{ number_format($pgh_hotel->omset, 0, ',', '.') }}</td>
                        <td>{{ number_format($pgh_hotel->pajak, 0, ',', '.') }}%</td>
                        <!-- <td>{{ number_format($pgh_hotel->denda, 0, ',', '.') }}%</td> -->
                        <td>Rp{{ number_format($pgh_hotel->total, 0, ',', '.') }}</td>
                        
                        <td class="text-center">
                            <form action="{{ url('pgh_hotelPelunasan/delete/'.$pgh_hotel->id) }}" method="post" style="display: inline-block;">
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