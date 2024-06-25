@extends('layout/template')
@section('content')
<section class="content-header">
    <h1>
        Wajib Pajak
    </h1>
    <ol class="breadcrumb">
        <li><a href="No"><i class="fa fa-home"></i></a></li>
        <li class="active"> WP </li>
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
            <h3 class="box-title">Jenis Wajib Pajak</h3>
            <div class="pull-right">
                <a href="{{ url('wp_tipe/add') }}" class="btn btn-primary btn-normal">
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
                        <th>Nama Pajak</th>
                        <th>Jenis</th>
                        <th>Tarif</th>
                        <th style="width: 150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($data as $key => $wp_tipe)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $wp_tipe->npwpd }}</td>
                        <td>{{ $wp_tipe->nama_pajak }}</td>
                        <td>{{ $wp_tipe->jenis }}</td>
                        <td>{{ $wp_tipe->tarif }}%</td>
                        <td class="text-center">
                            <a href="{{ url('wp_tipe/edit/'.$wp_tipe->id) }}" class="btn bg-green btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <form action="{{ url('wp_tipe/delete/'.$wp_tipe->id) }}" method="post" style="display: inline-block;">
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

        </div>
    </div>
</section>
@endsection