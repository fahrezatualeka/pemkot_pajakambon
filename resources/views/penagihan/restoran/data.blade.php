@extends('layout/template')
@section('content')

<section class="content-header">
  <h1>
    Penagihan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="active">Penagihan Pajak Restoran</li>
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
            <h3 class="box-title">Data Penagihan Pajak Restoran</h3>
            <div class="pull-right">
                <a href="{{ url('pgh_restoran/add') }}" class="btn btn-primary btn-normal">
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
                        <!-- <th>Nomor Penagihan</th> -->
                        <th>Nomor Telepon/WhatsApp</th>
                        <th>Tanggal Penagihan</th>
                        <th>Omset/Tahun</th>
                        <th>Pajak/Tahun</th>
                        <!-- <th>Denda</th> -->
                        <th>Total Keseluruhan</th>
                        {{-- <th>Status</th> --}}
                        <th style="width: 180px" class="text-center">Aksi</th>
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
                        <td>Rp{{ number_format($pgh_restoran->omset, 0, ',', '.') }}</td>
                        <td>{{ number_format($pgh_restoran->pajak, 0, ',', '.') }}%</td>
                        <!-- <td>{{ number_format($pgh_restoran->denda, 0, ',', '.') }}%</td> -->
                        <td>Rp{{ number_format($pgh_restoran->total, 0, ',', '.') }}</td>
                        {{-- <td>{{ ($pgh_restoran->status) }}</td> --}}
                        {{-- <td><img src="{{ asset('storage/sptpd/' . $pgh_restoran->sptpd_path) }}" alt="Gambar SPTPD"></td> --}}
                        <td class="text-center">
                            <a href="{{ url('pgh_restoran/edit/'.$pgh_restoran->id) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <form action="{{ url('pgh_restoran/delete/'.$pgh_restoran->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">
                            <i class="fa fa-trash"></i> Hapus
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#paymentModal{{ $pgh_restoran->id }}">
                                <i class="fa fa-money"></i> Penagihan 
                            </button>
                {{-- <a href="{{ url('pgh_restoran/paymentMidtrans/'.$pgh_restoran->id.'/'.$pgh_restoran->npwpd.'/'.$pgh_restoran->nama_pajak.'/'.$pgh_restoran->no_penagihan.'/'.$pgh_restoran->total) }}" class="btn btn-warning btn-xs">
                        <i class="fa fa-money"></i> Bayar
                </a> --}}


            <!-- Modal -->
    <div class="modal fade" id="paymentModal{{ $pgh_restoran->id }}" role="dialog" aria-labelledby="paymentModalLabel{{ $pgh_restoran->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="paymentModalLabel{{ $pgh_restoran->id }}">
                        <b>KONFIRMASI PENAGIHAN</b>
                    </h3>
                    <br>
                    <p>
                        Ini laman Popup Konfirmasi Penagihan, Silahkan menekan tombol Konfirmasi. Halaman akan munuju ke Nomor WhatsApp Wajib Pajak agar dapat melakukan proses Pembayaran lebih lanjut!
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>NPWPD</b> <span class="left">{{ $pgh_restoran->npwpd }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Nama Pajak</b> <span class="left">{{ $pgh_restoran->nama_pajak }}</span>
                                </li>
                                <!-- <li class="list-group-item">
                                    <b>Nomor Penagihan</b> <span class="left">{{ $pgh_restoran->no_penagihan }}</span>
                                </li> -->
                                <li class="list-group-item">
                                    <b>Nomor Telepon</b> <span class="left">{{ $pgh_restoran->no_telepon }}</span>
                                </li>
                                {{-- <li class="list-group-item">
                                    <b>Tanggal</b> <span class="left">{{ $pgh_restoran->tanggal }}</span>
                                </li> --}}
                                <li class="list-group-item">
                                    <b>Omset</b> <span class="left">Rp{{ number_format($pgh_restoran->omset, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Pajak</b> <span class="left">{{ number_format($pgh_restoran->pajak, 0, ',', '.') }}%</span>
                                </li>
                                <!-- <li class="list-group-item">
                                    <b>Denda</b> <span class="left">{{ number_format($pgh_restoran->denda, 0, ',', '.') }}%</span>
                                </li> -->
                                <li class="list-group-item">
                                    <b>Total</b> <span class="left">Rp{{ number_format($pgh_restoran->total, 0, ',', '.') }}</span>
                                </li>
                                {{-- <li class="list-group-item">
                                    <b>Pilih Pembayaran</b>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value="restoran">Restoran</option>
                                        <option value="restoran">Restoran</option>
                                        <option value="restoran">Restoran</option>
                                    </select>
                                    <span class="pull-right"></span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-normal" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal </button>
                    @php
                        // Mengganti 08 dengan 628 pada nomor telepon
                        $nomor_telepon = $pgh_restoran->no_telepon;
                        if (substr($nomor_telepon, 0, 2) == '08') {
                            $nomor_telepon = '628' . substr($nomor_telepon, 2);
                        }

                        // Mengambil nama dari data pengguna
                        $nama_pengguna = auth()->user()->name;
                
                        // Membuat pesan WhatsApp
                        $message = "Selamat Datang Wajib Pajak Pemerintah Kota Ambon, perkenalkan saya {$nama_pengguna} sebagai Pengelola Sistem Aplikasi Pajak Pemerintah Kota Ambon. Ingin memberitahukan kepada Wajib Pajak dengan NPWPD {$pgh_restoran->npwpd}, Nama Wajib Pajak {$pgh_restoran->nama_pajak}, dengan Omset sebesar Rp".number_format($pgh_restoran->omset, 0, ',', '.').", Pajak ".number_format($pgh_restoran->pajak, 0, ',', '.')."%, jika dijumlahkan Total Pembayaran Pajak Anda sebesar Rp".number_format($pgh_restoran->total, 0, ',', '.').". Batas Jatuh Tempo pembayaran Pajak Anda yaitu 1 menit dimulai dari Anda mengklik link pembayaran Pajak berikut ini, https://alakasemesta.com/pgh_restoran/paymentMidtransRestoran/{$pgh_restoran->id}/{$pgh_restoran->npwpd}/{$pgh_restoran->nama_pajak}/{$pgh_restoran->total} (Jika telah selesai melakukan pembayaran Pajak dimohon kembali ke halaman ini untuk mengirimkan bukti pembayaran telah Berhasil).";
                        $encoded_message = urlencode($message);
                        @endphp
                    <a href="https://wa.me/{{ $nomor_telepon }}?text={{ $encoded_message }}" target="_blank" class="btn btn-success btn-normal">
                        <i class="fa fa-user"></i> Konfirmasi
                    </a>
                </div>
                {{-- <a href="{{ url('pgh_restoran/paymentMidtrans/'.$pgh_restoran->id.'/'.$pgh_restoran->npwpd.'/'.$pgh_restoran->nama_pajak.'/'.$pgh_restoran->no_penagihan.'/'.$pgh_restoran->total) }}" class="btn btn-success btn-normal"><i class="fa fa-user"></i> Konfirmasi </a> --}}
                
                            {{-- <button type="button" class="btn btn-success" id="confirm-payment" {{ $pgh_restoran->npwpd }} {{ $pgh_restoran->npwpd }} {{ $pgh_restoran->npwpd }} {{ $pgh_restoran->npwpd }}>Bayar</button> --}}
                            {{-- <a href="https://wa.me/62811470492?text=Selamat%20Datang%20Wajib%20Pajak%20Pemerintah%20Kota%20Ambon%2C%20perkenalkan%20saya%20Fachreza%20Pengelola%20Sistem%20Aplikasi%20Pengelolaan%20Pembayaran%20Pajak%20Pemerintah%20Kota%20Ambon.%20Ingin%20memberitahukan%20Penagihan%20Pajak%20dengan%20NPWPD%2C%20Nama%20Pajak%2C%20Nomor%20Penagihan%2C%20Omset%2C%20Pajak%2C%20Denda%2C%20dan%20Total%20Pembayaran.%20Silahkan%20melakukan%20proses%20Pembayaran%20Pajak%20pada%20link%20berikut%20ini." target="blank" class="btn btn-success btn-normal"><i class="fa fa-user"></i> Konfirmasi </a> --}}

                            {{-- <button type="button" class="btn btn-success btn-normal" onclick="redirectToWhatsApp('{{ $pgh_restoran->no_telepon }}')">
                                <i class="fa fa-user"></i> Konfirmasi 
                            </button> --}}
                            
                    </div>
                </div>
            </div>
                            </form>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSspdModal{{ $pgh_restoran->id }}">
                                SSPD
                            </button>
                        </td>
                    </tr> --}}

                    {{-- <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detailSptpdModal{{ $pgh_restoran->id }}">
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
                                <a href="{{ url('pgh_restoran/pelunasan') }}" type="submit" class="btn btn-default btn-normal"> DATA PELUNASAN </a>
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
{{-- <script>
    // Polling untuk refresh halaman setiap 10 detik
    setInterval(function() {
        location.reload();
    }, 15000); // 10000 ms = 10 detik
</script> --}}
@endsection