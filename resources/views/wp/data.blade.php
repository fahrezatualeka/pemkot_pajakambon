@extends('layout/template')
@section('content')
<section class="content-header">
    <h1>
        Wajib Pajak
    </h1>
    <ol class="breadcrumb">
        <li><a href="No"><i class="fa fa-home"></i></a></li>
        <li class="active">WP</li>
    </ol>
</section>
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
        <h3 class="box-title">Data Wajib Pajak</h3>
        <div class="pull-right">
            <a href="{{ url('form_datapenjualan_wajibpajak') }}" class="btn btn-primary btn-normal" target="_blank">
                <i class="fa fa-user-plus"></i> Tambah
            </a>
        </div>
    </div>

    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                        <th style="width: 10px">No</th>
                        <th>NPWPD</th>
                        <th>Nama Usaha</th>
                        <th>Nama Pemilik Usaha</th>
                        <th>Jenis</th>
                        {{-- <th>Username</th> --}}
                        <th>Nomor Telepon/WhatsApp</th>
                        <th>Alamat</th>
                        <th>Omset</th>
                        {{-- <th>Pajak</th> --}}
                        {{-- <th style="width: 50px">SPTPD</th> --}}
                        <th style="width: 100px" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $key => $wp)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $wp->npwpd }}</td>
                    <td>{{ $wp->nama_pajak }}</td>
                    <td>{{ $wp->nama_kelola }}</td>
                    <td>{{ $wp->jenis }}</td>
                    {{-- <td>{{ $wp->username }}</td> --}}
                    <td>{{ $wp->no_telepon }}</td>
                    <td>{{ $wp->alamat }}</td>
                    <td>Rp{{ number_format($wp->omset, 0, ',', '.') }}</td>
                    {{-- <td>{{ number_format($wp->pajak, 0, ',', '.') }}%</td> --}}

                    <!-- <td>
                        {{-- @if($wp->sptpd)
                            <img src="{{ asset('storage/' . $wp->sptpd) }}" alt="SPTPD Image" style="width: 100px; height: auto;">
                        @else
                            Tidak ada file
                        @endif --}}
                    </td> -->
                    {{-- <td class="text-center">
                    @if($wp->sptpd)
                        <a href="{{ asset('storage/' . $wp->sptpd) }}" class="btn bg-orange btn-xs" target="_blank">
                            SPTPD
                        </a>
                    @else
                        Tidak ada file
                    @endif
                    </td> --}}
                    <td class="text-center">
                        <a href="{{ url('wp/edit/'.$wp->id) }}" class="btn bg-green btn-xs">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ url('wp/delete/'.$wp->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin Menghapus data?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    {{-- <script>
                        function confirmDelete() {
                            Swal.fire({
                                title: "Apakah Anda yakin ingin Menghapus?",
                                text: "Anda tidak dapat Mengembalikannya",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Ya, Hapus"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('deleteForm').submit();
                                }
                            });
                        }
                    </script> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="tipenya">Jenis</label>
                        <select name="jenis" class="form-control" id="jenis">
                            <option value=""> -Pilih Jenis- </option>
                            <option value=""> Hiburan </option>
                            <option value=""> Hotel </option>
                            <option value=""> Restoran </option>
                        </select>
                        <br>
                        <a href="" type="submit" class="btn btn-default btn-normal"> CETAK REKAP </a>
                    </div>
                </div>
            </form>
        </div>
        {{-- <script>
            $(document).ready(function() {
                $('#jenis').change(function() {
                    var jenis = $(this).val();
                    $.ajax({
                        url: "{{ route('wp.filter') }}",
                        type: "GET",
                        data: { jenis: jenis },
                        success: function(response) {
                            var rows = '';
                            $.each(response, function(key, value) {
                                rows += '<tr>';
                                rows += '<td>' + (key + 1) + '</td>';
                                rows += '<td>' + value.npwpd + '</td>';
                                rows += '<td>' + value.nama_pajak + '</td>';
                                rows += '<td>' + value.jenis + '</td>';
                                rows += '<td>' + value.nama_kelola + '</td>';
                                rows += '<td>' + value.username + '</td>';
                                rows += '<td>' + value.no_telepon + '</td>';
                                rows += '<td>' + value.alamat + '</td>';
                                rows += '<td class="text-center">';
                                rows += '<a href="{{ url('wp/edit') }}/' + value.id + '" class="btn bg-green btn-xs">';
                                rows += '<i class="fa fa-pencil"></i> Edit</a>';
                                rows += '<form action="{{ url('wp/delete') }}/' + value.id + '" method="post" style="display: inline-block;">';
                                rows += '@csrf';
                                rows += '@method('delete')';
                                rows += '<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah anda yakin untuk menghapus data?\')">';
                                rows += '<i class="fa fa-trash"></i> Hapus </button>';
                                rows += '</form>';
                                rows += '</td>';
                                rows += '</tr>';
                            });
                            $('#table1 tbody').html(rows);
                        }
                    });
                });
            });
        </script> --}}
        
        

    </div>
</div>
</section>
{{-- <script>
    // Polling untuk refresh halaman setiap 10 detik
    setInterval(function() {
        location.reload();
    }, 10000); // 10000 ms = 10 detik
</script> --}}
@endsection