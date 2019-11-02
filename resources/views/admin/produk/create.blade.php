@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            Tambah Produk & Jasa
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
            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="mitra_id" value="@auth{{ Auth::user()->id }}@endauth" hidden>

                <div class="form-group">
                    <label for="foto"> Foto </label>
                    <input id="foto" type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') : 'holder.js/255x382?random=yes&auto=yes&texmode=exact'}}">

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
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
                    <label for="kategori"> Kategori </label>
                    <select id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                        <option value="barang">Barang</option>
                        <option value="jasa">Jasa</option>
                    </select>

                    @error('kategori')
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