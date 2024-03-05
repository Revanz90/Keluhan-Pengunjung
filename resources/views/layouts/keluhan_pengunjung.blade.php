@extends('main')

@section('title', 'Keluhan Pengunjung')
@section('title2', 'Keluhan Pengunjung')
@section('judul', 'Keluhan Pengunjung')

@section('page-js-files')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@stop

@section('content')
    <section class="content">
        <div id="xtest" style="font-size: 14px"></div>
        <div class="callout callout-warning">
            <i class="fas fa-info-circle"></i>
            Halaman untuk mengisikan keluhan pengunjung
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <form method="POST" action="{{ route('store_keluhan_pengunjung') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for=""
                                        class="col-sm-2 col-form-label font-weight-normal">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Umur</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="umur" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label font-weight-normal">No.
                                        Telpon</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_handphone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label font-weight-normal">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tambahkan Keluhan Anda:</label>
                                    <textarea class="form-control" id="keluhan" name="keluhan" rows="3"></textarea>
                                </div>

                                <br>
                                <h5 class="font-weight-bold">Tolong isikan form pertanyaan dibawah ini!</h5>
                                <br>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th>YA</th>
                                            <th>TIDAK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $question->pertanyaan }}</td>
                                                <td>
                                                    <input type="radio" name="jawaban{{ $question->id }}" value="YA">
                                                    <input type="hidden" name="question_id{{ $question->id }}"
                                                        value="{{ $question->id }}">
                                                </td>
                                                <td>
                                                    <input type="radio" name="jawaban{{ $question->id }}" value="TIDAK">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
