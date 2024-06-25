@extends('layout.template')

@section('content')
    <section class="content-header">
        <h1>
            Wajib Pajak
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Wp</li>
            <li class="active">Generate</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Generate Virtual Account</b></h3>
                <div class="pull-right">
                    <a href="{{ url('wp') }}" class="btn btn-warning btn-flat">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('wp/generate') }}" method="post">
                            @csrf
                            <div class="form-group {{ $errors->has('virtual_account') ? 'has-error' : '' }}">
                                <label for="virtual_account">Virtual Account *</label>
                                <input type="text" name="virtual_account" id="virtual_account" class="form-control" value="{{ old('virtual_account') }}" maxlength="20">
                                @if ($errors->has('virtual_account'))
                                    <span class="help-block">{{ $errors->first('virtual_account') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Submit
                                </button>
                                <button type="reset" class="btn bg-red btn-flat">
                                    <i class="fa fa-refresh"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection