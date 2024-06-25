<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form Pengisian Data Penjualan Wajib Pajak Pemerintah Kota Ambon</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo.png') }}" />

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH">
</head>
<body>
    

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Form Pengisian Data Penjualan Wajib Pajak </h3>
                <div class="pull-right">
                    {{-- <a href="{{ url('wp') }}" class="btn btn-default btn-normal">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a> --}}
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form id="wpForm" action="{{ url('wp/formSuccess') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="npwpd">NPWPD</label>
                                <input type="text" name="npwpd" id="npwpd" class="form-control" value="{{ old('npwpd') }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_pajak">Nama Wajib Pajak</label>
                                <input type="text" name="nama_pajak" id="nama_pajak" class="form-control" value="{{ old('nama_pajak') }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" value="{{ old('jenis') }}">
                                    <option value="">- Pilih -</option>
                                    <option value="hiburan">Hiburan</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="restoran">Restoran</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="nama_kelola">Nama Pengelola</label>
                                <input type="text" name="nama_kelola" id="nama_kelola" class="form-control" value="{{ old('nama_kelola') }}">
                            </div>

                            {{-- <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                            </div> --}}

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon') }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
                            </div>

                            <div class="form-group">
                                <label for="omset">Omset Pajak</label>
                                <input type="number" name="omset" id="omset" class="form-control" value="{{''}}">
                            </div>

                            {{-- AKSI --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-normal">
                                    <i class="fa fa-paper-plane"></i> Kirim
                                </button>
                                <button type="reset" class="btn btn-danger btn-normal">
                                    <i class="fa fa-refresh"></i> Ulangi
                                </button>
                            </div>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById('wpForm').addEventListener('submit', function(event) {
                                let formValid = true;
                                const requiredFields = ['npwpd', 'nama_pajak', 'jenis', 'nama_kelola', 'username', 'no_telepon', 'alamat'];
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
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>