@extends('main')

@section('title', 'Detail Data Keluhan')
@section('title2', 'Detail Data Keluhan')
@section('judul', 'Detail Data Keluhan')

@section('content')
    <div id="xtest" style="font-size: 14px"></div>
    <div class="callout callout-warning">
        <i class="fas fa-info-circle"></i>
        Halaman untuk melihat detail Data Keluhan Pengunjung
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title font-weight-bold">DATA KELUHAN</h4>
            <div class="card-tools">
                <input type="hidden" name="statusM" id="statusMid[2]" value="2">
            </div>
        </div>

        <div class="card-body">
            <form action="" class="form-horizontal">

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="" class="form-control" value="{{ $visitor->nama }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" name="" class="form-control" value="{{ $visitor->umur }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-normal">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" name="" class="form-control" value="{{ $visitor->no_handphone }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="" class="form-control" value="{{ $visitor->alamat }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Keluhan</label>
                    <div class="col-sm-10">
                        <input type="text" name="" class="form-control" value="{{ $complaint->keluhan }}"
                            readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
