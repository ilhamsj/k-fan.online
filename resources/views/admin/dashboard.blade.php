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
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script>
    <script>
    
        $.ajax({
            type: "GET",
            url: "{{ route('chart.status') }}",
            success: function (response) {
                var labels = response.data.map(function (e) {
                    return e.status
                })
                
                var data = response.data.map(function (e) {
                    return e.jumlah
                })

                var ctx = $('#myChart');
                var config = {
                    type: 'line',
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
    </script>
@endpush