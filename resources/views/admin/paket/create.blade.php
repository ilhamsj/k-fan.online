@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            Tambah Paket
        </h1>
        <a href="{{ URL::previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa fa-arrow-left fa-sm text-white-50" aria-hidden="true"></i>
            Kembali
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('paket.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="nama"> Nama </label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') : \Faker\Factory::create()->name}}" autocomplete="nama" autofocus>

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga"> Harga </label>
                    <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') ? old('harga') : \Faker\Factory::create()->randomNumber()}}" autocomplete="harga" autofocus>

                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="diskon"> Diskon </label>
                    <input id="diskon" type="number" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon') ? old('diskon') : \Faker\Factory::create()->randomNumber()}}" autocomplete="diskon" autofocus>

                    @error('diskon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto"> Foto </label>
                    <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') : 'https://source.unsplash.com/225x281?kitten'}}" autocomplete="foto" autofocus>

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi"> Deskripsi </label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi') ? old('deskripsi') : \Faker\Factory::create()->realText()}}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
            </form>
        </div>
    </div>
@endsection