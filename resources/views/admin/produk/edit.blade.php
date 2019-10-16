@extends('layouts.admin')

@section('content')

<h3>Edit produk</h3>

<form action="{{ route('produk.store') }}" method="post">
  @csrf

  <input type="number" name="mitra_id" value="1" hidden>

  <div class="form-group">
      <label for="nama"> nama </label>
      <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') : \Faker\Factory::create()->name}}" autocomplete="nama" autofocus>

      @error('nama')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="form-group">
      <label for="harga"> harga </label>
      <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') ? old('harga') : \Faker\Factory::create()->randomNumber()}}" autocomplete="harga" autofocus>

      @error('harga')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="form-group">
      <label for="kategori"> kategori </label>
      <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') ? old('kategori') : \Faker\Factory::create()->word}}" autocomplete="kategori" autofocus>

      @error('kategori')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>

</form>

@endsection