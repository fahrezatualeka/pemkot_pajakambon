@extends('layout/template')

@section('content')
<section class="content-header">
    <h1>
        Beranda
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <img src="{{ asset('uploads/balaikota2.jpg') }}" style="margin-left:auto;margin-right:auto;border-radius:20%;height:300px;width:100%">
            <p style="text-align:center;font-size:24px;color:black;"><b>BADAN PENGELOLAAN PAJAK PEMERINTAH KOTA AMBON</b></p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Wajib Pajak</span>
                    <span class="info-box-number">{{ $countWp }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-teal"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Hotel</span>
                    <span class="info-box-number">{{ $countHotel }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cutlery"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Restoran</span>
                    <span class="info-box-number">{{ $countRestoran }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-music"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Hiburan</span>
                    <span class="info-box-number">{{ $countHiburan }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
</section>
@endsection