@extends('layouts.app')

@section('content')
    <section class="">
        <div class="container p-4">
            <div class="row justify-content-center flex-row-reverse" style="min-height:100vh">                
                <div class="col-12 col-md-4">
                    <div class="card border-0" style="box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 6px 0px;">
                        <div class="card-body">
                            <strong>Ringkasan Paket</strong>
                        </div>
                        <div class="card-body row">
                            <div class="col text-left">
                                Total Harga
                            </div>
                            <div class="col text-right">
                                <strong>{{ number_format($item->jumlah, 2, ',', ',') }}</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <button data-token="{{$item->snap_token}}" id="pay-button" type="button" class="btn btn-primary btn-block">Pilih Pembayaran</button>
                        </div>

                    </div>
                </div>

                <div class="col" id="data-jenazah">
                    <p>
                        <strong>Informasi Jenazah</strong>
                        <a href="">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </p>
                    <form action="{{ route('berita-lelayu.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="transaksi_id"> Transaksi </label>
                            <input id="transaksi_id" type="text" class="form-control @error('transaksi_id') is-invalid @enderror" name="transaksi_id" value="{{ $item->id }}">
        
                            @error('transaksi_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama"> Nama Jenazah</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') :  \Faker\Factory::create()->name }}">
        
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="lahir"> Tanggal Lahir </label>
                                <input id="lahir" type="datetime-local" class="form-control @error('lahir') is-invalid @enderror" name="lahir"value="1990-06-12T19:30">
            
                                @error('lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="wafat"> Tanggal Wafat </label>
                                <input id="wafat" type="datetime-local" class="form-control @error('wafat') is-invalid @enderror" name="wafat"value="2019-06-12T19:30">
            
                                @error('wafat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') ? old('alamat') :  \Faker\Factory::create()->address}}">
        
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surat_kematian"> Link Surat Kematian </label>
                            <input id="surat_kematian" type="text" class="form-control @error('surat_kematian') is-invalid @enderror" name="surat_kematian" value="{{ old('surat_kematian') ? old('surat_kematian') :  'https://3.bp.blogspot.com/-7sBdhkwNq34/W9unzLsWJSI/AAAAAAAALtc/EqEskIv9SbsJblzg6vk_ACVrZFInO0dWwCLcBGAs/s1600/img002.jpg' }}">
        
                            @error('surat_kematian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto"> Foto </label>
                            <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') :  'https://cache.desktopnexus.com/thumbseg/620/620245-bigthumbnail.jpg' }}">
        
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>

<script>
    $('#pay-button').click(function (e) { 
        e.preventDefault();
        var x = $(this).attr('data-token');
        snap.pay(x, {
            // Optional
            onSuccess: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                location.replace("/")
            },
            // Optional
            onPending: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              location.replace("/home")
            },
            // Optional
            onError: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                location.replace("/home")
            }
        });
    });
</script>

<script>
    // $('.form-group').find('label').addClass('text-muted');
    // $('#data-jenazah').find('button').addClass('collapse');
    // $('#data-jenazah').find('input').attr('disabled', 'disabled');

    // $('#data-jenazah').find('a').click(function (e) { 
    //     e.preventDefault();
    //     $('#data-jenazah > form > button').toggleClass('collapse');
    //     $('#data-jenazah').find('input').removeAttr('disabled');
    // });
</script>
@endpush