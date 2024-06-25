@extends('layout/template')

@section('content')
<section class="content-header">
    {{-- <style>
        .input-group .input-group-append {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: 3;
    }
    .input-group .input-group-text {
        background-color: inherit;
        border: none;
    }
    
    </style> --}}
    <h1>
        Profil
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">Profil</li>
    </ol>
</section>

<section class="content">
    <div class="box box-solid">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="false">Profil</a></li>
                <li><a href="#editprofil" data-toggle="tab" aria-expanded="true">Edit Profil</a></li>
            </ul>
            <div class="tab-content">

                @if(auth()->check())
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nama Lengkap</b> <span class="pull-right">{{ auth()->user()->name }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <span class="pull-right">{{ auth()->user()->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Username</b> <span class="pull-right">{{ auth()->user()->username }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomor Telepon</b> <span class="pull-right">{{ auth()->user()->no_telepon }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <span class="pull-right">{{ auth()->user()->alamat }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Kode Perusahaan</b> <span class="pull-right">{{ auth()->user()->kode }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

                <div class="tab-pane" id="editprofil">
                    <form action="{{route ('profile.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ auth()->user()->username }}">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="passwordInput" type="password" name="password" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span id="togglePassword" style="cursor: pointer;">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <style>
                                    .input-group {
                                        position: relative;
                                    }
                                
                                    #togglePassword {
                                        position: absolute;
                                        top: 50%;
                                        right: 25px; /* Adjust this value according to your preference */
                                        transform: translateY(-240%);
                                        cursor: pointer;
                                    }
                                </style>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const togglePassword = document.getElementById('togglePassword');
                                        const passwordInput = document.getElementById('passwordInput');
                                    
                                        togglePassword.addEventListener('click', function() {
                                            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);
                                            this.querySelector('i').classList.toggle('fa-eye');
                                            this.querySelector('i').classList.toggle('fa-eye-slash');
                                        });
                                    });
                                </script>
     
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" name="no_telepon" class="form-control" value="{{ auth()->user()->no_telepon }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ auth()->user()->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label>Kode Perusahaan</label>
                                    <input type="text" name="kode" class="form-control" value="{{ auth()->user()->kode }}">
                                </div>
                                      
                                      <form action="{{ url('profile/update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <!-- Isi form di sini -->
                                        <button type="submit" class="btn btn-success btn-block  btn-normal" onclick="return confirm('Apakah Anda yakin ingin Memperbarui profil?')">
                                            <i class="fa fa-paper-plane"></i> Kirim
                                        </button>
                                    </form>
                                    <br>
                                    <form action="{{ url('profile/delete') }}" method="post" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block btn-normal" onclick="return confirm('Apakah Anda yakin ingin Menghapus profil?')">
                                        <i class="fa fa-trash"></i> Hapus Profil
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

                                {{-- <script>
                                    @if(session('success'))
                                        // Redirect to login page after profile is successfully updated or deleted
                                        window.location.href = "/login";
                                    @endif
                                </script> --}}

                                @if(session('success'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: '{{ session('success') }}',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                    </script>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</section>
@endsection