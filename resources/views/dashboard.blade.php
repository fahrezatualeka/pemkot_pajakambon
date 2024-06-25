@extends('layout/template')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <p style="text-align:center; font-size:20px">
                    <i> SELAMAT DATANG di</i>
                </p>
                <p style="text-align:center; font-size:25px">
                    <b> SISTEM MONITORING PAJAK PENDAPATAN DAERAH PEMERINTAH KOTA AMBON </b>
                </p>
            </div>
            <div class="box-body">
                @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Login!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 3500
                    });
                </script>
                @endif
                {{-- <div class="item">
                    <img src="{{ asset('uploads/kota-ambon.jpg') }}" style="width:100%">
                </div> --}}
            </div>
            {{-- <div class="box-body">
                <table>
                    <tr>
                        <td colspan="9" align="center">
                            <br>
                            <h3>MISI</h3>
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%"></td>
                        <td width="23%" style="vertical-align:top">
                            <p style="text-align:center; font-size:16px">
                                <b>1</b>
                                <br><br>
                                Menciptakan Manajemen Pengelolaan Keuangan Daerah yang Efektif dan Efesien.
                            </p>
                        </td>
                        <td width="2%"></td>
                        <td width="23%" style="vertical-align:top">
                            <p style="text-align:center; font-size:16px">
                                <b>2</b>
                                <br><br>
                                Mewujudkan Tertatanya Administrasi Pengelolaan Aset Daerah sehingga Tercapai Data dan Nilai Aset Daerah yang Meyakinkan.
                            </p>
                        </td>
                        <td width="2%"></td>
                        <td width="23%" style="vertical-align:top">
                            <p style="text-align:center; font-size:16px">
                                <b>3</b>
                                <br><br>
                                Tercapainya Pelayanan masyarakat / WP yang transparan, efesien, efektif dan akuntabel, serta meningkatnya Pendapatan Asli Daerah dari Tahun ke Tahun.
                            </p>
                        </td>
                        <td width="2%"></td>
                        <td width="23%" style="vertical-align:top">
                            <p style="text-align:center; font-size:16px">
                                <b>4</b>
                                <br><br>
                                Melaksanakan  pemerintahan amanah, ramah, bersih, dan profesional berbasis teknologi, informasi dan komunikasi serta memaksimalkan fungsi melayani sebagai suatu tanggung jawab terhadap masyarakat dan Tuhan Yang Maha Esa.
                            </p>
                        </td>
                        <td width="1%"></td>
                    </tr>
                </table>
            </div> --}}
        </div>
        {{-- <div class="info box">
            <div class="box-header with-border">
                <div class="box-body">
                        <div class="item">
                            <h5><b> Wajib Pajak </b></h5>
                            <h5><b> Jenis Wajib Pajak </b></h5>
                        </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{url('wp')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-white"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Wajib Pajak </b></span>
                        <span class="info-box-number">{{ $jumlahDataWp }}</span>
                    </div>
                </div>
            </a>
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{url('wp_tipe')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-brown"><i class="fa fa-user-circle-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Jenis Wajib Pajak </b></span>
                        <span class="info-box-number">{{ $jumlahDataJenisWp }}</span>
                    </div>
                </div>
            </a>
            </div>


            {{-- BARIS PERTAMA --}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pws_hiburan')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-music"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pengawasan </b></span>
                        <span class="info-box-text"> Hiburan </span>
                        <span class="info-box-number">{{ $jumlahDataPwsHiburan }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('prs_hiburan')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-music"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pemeriksaan </b></span>
                        <span class="info-box-text"> Hiburan </span>
                        <span class="info-box-number">{{ $jumlahDataPrsHiburan }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pgh_hiburan')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-music"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Penagihan </b></span>
                        <span class="info-box-text"> Hiburan </span>
                        <span class="info-box-number">{{ $jumlahDataPghHiburan }}</span>
                    </div>
                </div>
            </a>
            </div>


            {{-- BARIS KEDUA --}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pws_hotel')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pengawasan </b></span>
                        <span class="info-box-text"> Hotel </span>
                        <span class="info-box-number">{{ $jumlahDataPwsHotel }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('prs_hotel')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pemeriksaan </b></span>
                        <span class="info-box-text"> Hotel </span>
                        <span class="info-box-number">{{ $jumlahDataPrsHotel }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pgh_hotel')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-building"></i></span>
                    <span class="icon-[mdi--dollar]"></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Penagihan </b></span>
                        <span class="info-box-text"> Hotel </span>
                        <span class="info-box-number">{{ $jumlahDataPghHotel }}</span>
                    </div>
                </div>
            </a>
            </div>


            {{-- BARIS KETIGA --}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pws_restoran')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-cutlery"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pengawasan </b></span>
                        <span class="info-box-text"> Restoran </span>
                        <span class="info-box-number">{{ $jumlahDataPwsRestoran }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('prs_restoran')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-cutlery"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Pemeriksaan </b></span>
                        <span class="info-box-text"> Restoran </span>
                        <span class="info-box-number">{{ $jumlahDataPrsRestoran }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pgh_restoran')}}" style="color:black">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="fa fa-cutlery"></i></span>
                    <span class="icon-[mdi--dollar]"></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Penagihan </b></span>
                        <span class="info-box-text"> Restoran </span>
                        <span class="info-box-number">{{ $jumlahDataPghRestoran }}</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('pgh_hiburan/pelunasan')}}" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-music"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b> Pelunasan </b></span>
                    <span class="info-box-text"> Hiburan </span>
                    <span class="info-box-number">{{ $jumlahDataPghHiburanPelunasan }}</span>
                </div>
            </div>
        </a>
        </div>
            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pgh_restoran')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-cutlery"></i></span>
                    <span class="icon-[mdi--dollar]"></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Penagihan </b></span>
                        <span class="info-box-text"> Restoran </span>
                        <span class="info-box-number">{{ $jumlahDataPghRestoran }}</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{url('pgh_restoran')}}" style="color:black">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-cutlery"></i></span>
                    <span class="icon-[mdi--dollar]"></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b> Penagihan </b></span>
                        <span class="info-box-text"> Restoran </span>
                        <span class="info-box-number">{{ $jumlahDataPghRestoran }}</span>
                    </div>
                </div>
            </a>
            </div> --}}

        </div>

    </section>
@endsection