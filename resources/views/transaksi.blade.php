@extends('layouts.app')

@section('content')
    <section class="bg-gradient-info">
        <div class="container p-4">
            <div class="row justify-content-center" style="min-height:100vh">                
                <div class="col-12 col-md">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h3> 
                                {{-- Halaman Transaksi  --}}
                                {{$item->snap_token}}
                            </h3>

                            <button data-token="{{$item->snap_token}}" id="pay-button" type="button" class="btn btn-primary btn-sm">Selesaikan Pembayaran</button>
                        </div>
                    </div>
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
@endpush