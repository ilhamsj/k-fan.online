@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        @foreach ($items as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card {{ $item['color'] }} shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL {{Str::upper($item['title'])}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item['jumlah'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="{{$item['icon']}} fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-100"></div>
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form class="row">
                        <div class="form-group col">
                            <input type="date" class="form-control" id="from_date" name="from_date" value="1990-01-01">
                        </div>
                        <div class="form-group col">
                            <input type="date" class="form-control" id="to_date" name="to_date" value="2019-12-31">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <canvas id="test"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <canvas id="grafikTerlaris"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" /> --}}
@endpush

@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script> --}}
    <script>
        grafikTransaksi()
        statusTransaksi()
        grafikTerlaris()

        $('#from_date').change(function (e) { 
            grafikTransaksi()
        });
        
        $('#to_date').change(function (e) { 
            grafikTransaksi()
        });

        function grafikTransaksi() {
            var form = $('#content > div > div.row > div.col-12.mb-4 > div > div:nth-child(1) > form');

            $.ajax({
            type: "POST",
            url: "{{ route('grafik.transaksi') }}",
            data: form.serialize(),
                success: function (response) {
                    var labels = response.data.map(function (e) {
                        return e.created_at
                    })
                    
                    var data = response.data.map(function (e) {
                        return e.jumlah
                    })

                    var ctx = $('#test');
                    var config = {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Transaksi',
                                data: data,
                                backgroundColor: 'rgb(63, 101, 211, 0.5)'
                            }]
                        }
                    };
                    var chart = new Chart(ctx, config);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }
        
        function statusTransaksi() {
            $.ajax({
                type: "GET",
                url: "{{ route('grafik.transaksi.status') }}",
                success: function (response) {
                    var labels = response.data.map(function (e) {
                        return e.status
                    })
                    
                    var data = response.data.map(function (e) {
                        return e.jumlah
                    })

                    var ctx = $('#myChart');
                    var config = {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Transaksi Status',
                                data: data,
                                backgroundColor: 'rgba(0, 119, 204, 0.3)'
                            }]
                        }
                    };
                    var chart = new Chart(ctx, config);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }
        
        function grafikTerlaris() {
            $.ajax({
                type: "GET",
                url: "{{route('grafik.paket')}}",
                success: function (response) {
                    var labels = response.data.map(function (e) {
                        return e.paket_id
                    })
                    
                    var data = response.data.map(function (e) {
                        return e.jumlah
                    })

                    var ctx = $('#grafikTerlaris');
                    var config = {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Paket Terlaris',
                                data: data,
                                // backgroundColor: 'rgba(0, 119, 204, 0.3)'
                                backgroundColor: 'rgb(255, 99, 132)'
                                // 'rgba(255, 206, 86, 0.2)'
                                // 'rgba(255, 99, 132, 0.2)'
                                // 'rgba(54, 162, 235, 0.2)'
                                // 'rgba(255, 206, 86, 0.2)'
                                // 'rgba(75, 192, 192, 0.2)'
                                // 'rgba(153, 102, 255, 0.2)'
                                // 'rgba(255, 159, 64, 0.2)'
                            }]
                        }
                    };
                    var chart = new Chart(ctx, config);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }
    </script>
@endpush