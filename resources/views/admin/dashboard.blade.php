@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="generateReport"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="">
        <form action="" method="post" class="row justify-content-end" id="searchFromDate">
            <div class="form-group col col-md">
                <input type="date" name="from_date" id="" class="form-control" placeholder="" aria-describedby="helpId" value="2019-01-01">
            </div>
            <div class="form-group col col-md">
                <input type="date" name="to_date" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group col col-md">
                <select class="form-control" name="format" id="">
                    <option value="Y">Tahunan</option>
                    <option value="M" selected>Bulanan</option>
                    <option value="d" selected>Mingguan</option>
                    <option value="D">Harian</option>
                </select>
            </div>
        </form>
    </div>

    <section id="cetak_report">
        <div class="row">
            <div class="col mb-4">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Report</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">9999</div>
            </div>
        </div>
        <div class="row" id="cetak_pdf">
            <div class="col-xl-3 col-md-6 mb-4 cetak_pdf_card">
                <div class="card shadow h-100 py-2 border-left-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">xxxx</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">9999</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 statistik">
                <div class="card border-0 shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Transaksi</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-155px, 18px, 0px);">
                        <div class="dropdown-header">Statistik</div>
                        <a class="dropdown-item" href="#">Harian</a>
                        <a class="dropdown-item" href="#">Mingguan</a>
                        <a class="dropdown-item" href="#">Bulanan</a>
                        <a class="dropdown-item" href="#">Tahunan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Generate Report</a>
                        </div>
                    </div> --}}
                    </div>
                    <div class="card-body">
                        <canvas id="statistik"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script>
        $('[type="date"]').prop('max', function(){
            return new Date().toJSON().split('T')[0];
        });
        $('[name="to_date"]').prop('value', function(){
            return new Date().toJSON().split('T')[0];
        });

        // $('[name="from_date"]').prop('value', '2019-11-14');
        
        searchFromDate()
        cetak_pdf()

        $('#searchFromDate').find('input[type=date]').change(function (e) { 
            e.preventDefault();
            searchFromDate() 
        });

        $('#searchFromDate').find('select').change(function (e) { 
            e.preventDefault();
            searchFromDate() 
        });
        
        function searchFromDate() {
            let form = $('#searchFromDate');
            $('#cetak_pdf > .col-xl-3').not(':last').remove();

            $.ajax({
                type: "POST",
                url: "{{ route('searchFromDate') }}",
                data: form.serialize(),
                success: function (response) {

                    $.map(response.total, function (value, index) {
                        var card = $('#cetak_pdf > .col-xl-3:first-child').clone();
                                    $(card).find('.text-xs').text(index);
                                    $(card).find('.h5').text(value.length);
                                    $(card).prependTo('#cetak_pdf');
                    });
                    $('#cetak_pdf > div:last-child').remove();
                    $('#cetak_report').find('.h5').first().text(response.label);

                    var labels = $.map(response.chart.m, function (value, index) {
                        return index
                    });

                    var datas = $.map(response.chart.m, function (value, index) {
                        return value.length
                    });

                    var datasJumlah = $.map(response.chart.x, function (value, index) {
                        return value;
                    });

                    var ctxLine = document.getElementById("statistik").getContext("2d");
                    if(window.bar != undefined) 
                    window.bar.destroy(); 
                    window.bar = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: ' Transaksi '+response.label,
                                    data: datas,
                                    backgroundColor: 'rgba(255, 206, 86, 1)',
                                }
                            ]
                        }
                    });
                }
            });
        }

        function cetak_pdf() {
            var width = $('#cetak_pdf').width();
            var height = $('#cetak_pdf').height();
            
            $('#generateReport').click(function (e) { 

                html2canvas(document.getElementById("cetak_report"), {
                    onrendered: function(canvas) {
                        var imgData = canvas.toDataURL('image/png');
                        var doc = new jsPDF('L', 'px', 'legal');
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('report.pdf');
                    }
                });
            });
        }
    </script>
@endpush