@extends('layout/template')

@section('content')
<section class="content-header">
  <h1>
    Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengguna</h3>
            <div class="pull-right">
                <a href="{{ url('user/edit') }}" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th style="width: 150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->level == 1 ? "Admin" : "Wajib Pajak" }}</td>
                        <td class="text-center">
                            @if ($user->npwpd != null)
                                <form action="{{ url('user.delwp') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="npwpd" value="{{ $user->npwpd }}">
                            @else
                                <form action="{{ url('user.del') }}" method="post">
                            @endif
                                    @if ($user->level == 2)
                                        <a href="{{ url('user.edit', $user->user_id) }}" class="btn bg-olive btn-xs">
                                            <i class="fa fa-pencil" style="width : 20px"></i> Edit
                                        </a> 
                                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                        <button onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn bg-red btn-xs">
                                            <i class="fa fa-trash" style="width : 20px"></i> Hapus
                                        </button>
                                    @endif
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
</section>
@endsection