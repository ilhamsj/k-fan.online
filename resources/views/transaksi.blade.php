@extends('layouts.app')

@section('content')
    <section class="bg-light">
        <div class="container p-4">
            <div class="row justify-content-center flex-row-reverse" style="min-height:100vh">                
                <div class="col-12 col-md-4 mb-4">
                    <div class="card rounded-card border-0" style="box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 6px 0px;">
                        <div class="card-header text-center bg-primary text-light border-0" style="border-radius: 1rem 1rem 0 0">
                            <strong>Ringkasan Paket</strong>
                        </div>
                        <div class="card-body d-flex text-center justify-content-center align-items-center" style="min-height: 35vh">
                            <div>
                                <h3>{{$item->paket->nama}}</h3>
                                Total Harga <br/>
                                <h4>Rp. {{ number_format($item->jumlah, 2, ',', ',') }}</h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            @if (count($item->BeritaLelayu) == null)
                                <a class="btn btn-link text-danger" href="" data-toggle="modal" data-target="#modelId">* Tambahkan Informasi Jenazah</a>
                            @endif
                            <button {{ count($item->BeritaLelayu) == null ? 'disabled' : ''}} data-token="{{$item->snap_token}}" id="pay-button" type="button" class="rounded-card btn btn-primary btn-block">Pilih Pembayaran</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8" id="data-jenazah">
                    <div class="card rounded-card shadow-sm">
                        <div class="card-header border-0 bg-transparent" style="border-radius: 1rem 1rem 0 0">
                            <strong>Informasi Jenazah</strong>
                        </div>
                        <div class="card-body">
                            <a href="" id="btn-add">Tambah</a>
                            @if (count($item->BeritaLelayu) == null)
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Surat Kematian</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Tanggal Wafat</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('lelayu.create')
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>
    <script>
        $('.tour').click(function (e) { 
            e.preventDefault();
            tourWebsite()
        });

        function tourWebsite() {
            var intro = introJs();
            intro.setOptions({
                steps: [
                    {
                        element: document.querySelector('#data-jenazah'),
                        intro: "Tambah informasi jenazah"
                    },
                    {
                        element: document.querySelector('#pay-button'),
                        intro: "Pilih pembayaran"
                    },
                ]
            });
        }

        $('#pay-button').click(function (e) { 
            e.preventDefault();
            var x = $(this).attr('data-token');
            snap.pay(x, {
                onSuccess: function(result){
                    ShowMessage('Transaksi Berhasil')
                },
                onPending: function(result){
                    ShowMessage('Selesaikan Pembayaran')
                },
                onError: function(result){
                    ShowMessage('Transaksi Error')
                }
            });
        });

        function ShowMessage(message) {
            alert(message);
            location.replace('/home')
        }


        // read
        var table = $('table').DataTable({
            order : [[0,'desc'], [6,'desc']],
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('lelayu.transaksi', $item->id) }}",
            columns: [
                {data: 'nama', name: 'nama' },
                {data: 'alamat', name: 'alamat' },
                {data: 'foto', name: 'foto' },
                {data: 'surat_kematian', name: 'surat_kematian' },
                {data: 'lahir', name: 'lahir' },
                {data: 'wafat', name: 'wafat' },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });


        // add
        $('#btn-add').click(function (e) { 
            e.preventDefault();
            var form = $('#modelId form');
            form.trigger('reset');
            $('#modelId').modal('show')
            $('#modelId').find('button:last-child').attr('id', 'btn-store');
            $('#modelId').find('#transaksi_id').val('{{ $item->id }}');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");
        });

        // store
        $('#modelId').on('click','#btn-store',function(e){
            e.preventDefault();

            var form = $('#modelId form');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");

            console.log(form.serialize());
            
            $.ajax({
                type: "POST",
                url: "{{ route('lelayu.store') }}",
                data: form.serialize(),
                success: function (response) {
                    $('#modelId').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    showError(xhr.responseJSON)
                }
            });
        });

        // show data
        $.ajax({
            type: "GET",
            url: '{{ route("lelayu.transaksi", $item->id) }}',
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
            }
        });

        // show modal to edit
        $('table').on('click','.btnEdit',function(e){
            e.preventDefault();

            var url = $(this).attr('data-url');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");
            
            $('#modelId').modal('show')
            $('#modelId form').attr('action', url);
            $('#modelId').find('button:last-child').attr('id', 'btn-update');

            
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#id').val(response.id);
                    $('#transaksi_id').val(response.transaksi_id);
                    $('#nama').val(response.nama);
                    $('#foto').val(response.foto);
                    $('#alamat').val(response.alamat);
                    $('#surat_kematian').val(response.surat_kematian);
                    
                    var lahir = response.lahir;
                    var lahir = lahir.split(' ').join('T');
                    
                    var wafat = response.wafat;
                    var wafat = wafat.split(' ').join('T');

                    $('#lahir').attr('value', lahir);
                    $('#wafat').attr('value', wafat);
                }
            });
        });
        
        // update
        $('#modelId').on('click','#btn-update',function(e){
            e.preventDefault();

            var form = $('#modelId form');
            var url = $(form).attr('action');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");

            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    $('#modelId').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    showError(xhr.responseJSON)
                }
            });
        });

        // delete
        $('table').on('click','.btnDelete',function(e){
            e.preventDefault();
            
            var urlDelete = $(this).attr('data-url');
            var idDelete = $(this).attr('data-id');
            $.ajax({
                type: "DELETE",
                url: urlDelete,
                data: {
                    _token: "{{csrf_token()}}",
                },
                dataType: "json",
                success: function (response) {
                    $('table').DataTable().ajax.reload();
                }
            });     
        });


        // show error
        function showError(res) 
        {
            if ($.isEmptyObject(res) == false)
            {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .append('<span class="invalid-feedback" role="alert"> <strong>'+ value +'</strong> </span>')
                        .find('input').addClass("is-invalid")
                })
            }
        }

        
        $('#modelId').on('hidden.bs.modal', function () {
            var form = $('#modelId form');
            form.trigger('reset');
            $('input[type=datetime-local]').removeAttr('value');
        });
    </script>
@endpush