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
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" /> --}}
@endpush

@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script> --}}
    {{-- <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            // type: 'bar',
            // type: 'line',
            type: 'horizontalBar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script> --}}
    <script>
        var bulan           = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
        var dataPerbulan    = [30, 20, 10, 5, 1, 10];
        var dataPembelian    = [5, 10, 4, 30, 1, 20];

        var ctx = $('#myChart');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: bulan,
                datasets: [
                    {
                        label: 'Penjualan',
                        data: dataPerbulan,
                        backgroundColor: 'red',
                        borderColor: 'red',
                        borderWidth: 2,
                        fill: false,
                    },
                    {
                        label: 'Pembelian',
                        data: dataPembelian,
                        backgroundColor: 'blue',
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false,
                    },
                ],
            },
            options: {
                title: {
                    display: true,
                    text: 'Jumlah Pendapatan'
                },
                tooltips: {
					mode: 'index',
					intersect: false,
				},
            }
        });
    </script>
@endpush