@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Transaksi
    </h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="transaksi">
              <thead>
                  <tr>
                      <th class="text-center">Action</th>
                      <th>ID</th>
                      <th>User</th>
                      <th>Paket</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                      <th>Create</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
          </table>
      </div>      
  </div>
  <div class="card-body">
      <img src="" alt="" srcset="">
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="transaksi-show" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content  border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="fa fa-flag" aria-hidden="true"></i>
                    <strong><span class="text-primary">Ka</span>fan</strong>
                </h5>
                <button type="button" class="btn btn-primary" id="generateReport">Cetak</button>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" id="modal_invoice">
                <div class="row">
                    <div class="col-12">
                        <h3>Invoice :</h3>
                    </div>
                    <div class="col">
         
                    </div>
                </div>
            </div>
            <div class="modal-body" id="modal_invoice_details">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-body" id="modal_catatan">
                <h4>Notes :</h4>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <!-- print -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script> 
    <script>
        var table = $('#transaksi').DataTable({
            order : [[0,'desc']],
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('transaksi.index.v1') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'id', name: 'id' },
                {data: 'user_id', name: 'user_id' },
                {data: 'paket_id', name: 'paket_id' },
                {data: 'jumlah', name: 'jumlah' },
                {data: 'status', name: 'status' },
                {data: 'created_at', name: 'created_at' }
            ],
        });
        
        $(document).on('click', '.transaksi_show', function (e) {
            e.preventDefault();

            var url = $(this).attr('data-url');

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#transaksi-show').modal('show');
                    $.map(response.data, function (value, index) {
                        if(value != null)
                        {
                            if(Number.isInteger(value))
                            {
                                $('#modal_invoice_details').find('tfoot > tr > th:last-child').text(value)
                            }
                            else
                            {
                                if(value.length == undefined)
                                {
                                    if(index == 'paket')
                                    {
                                        $('#modal_invoice_details').find('tbody > tr > td:nth-child(2)').append('<span>'+value.nama+'</span>');
                                        
                                        var no = 1;
                                        $.map(value.produk, function (val, ind) {
                                            var nota  = $('#modal_invoice_details').find('tbody > tr').first().clone()
                                            $(nota).find('td:nth-child(1)').text(no++);
                                            $(nota).find('td:nth-child(3)').text(val.nama);
                                            $(nota).find('td:nth-child(4)').text(val.harga);
                                            $('#modal_invoice_details').find('tbody').append(nota);
                                        });
                                        $('#modal_invoice_details').find('tfoot > tr > th:nth-child(2)').text(value.produk.length)
                                        var tr = $('#modal_invoice_details').find('tbody > tr:gt(1) > td:nth-child(2)').remove();
                                        var tr = $('#modal_invoice_details').find('tbody > tr:gt(1) > td:nth-child(1)').remove();
                                        $('#modal_invoice_details').find('tbody > tr:nth-child(2) > td:nth-child(2)').attr('rowspan', value.produk.length)
                                        $('#modal_invoice_details').find('tbody > tr:nth-child(2) > td:nth-child(1)').attr('rowspan', value.produk.length)
                                    }
                                }
                                else
                                {
                                    if(index != 'catatan')
                                    {
                                        $('#modal_invoice > div > div:nth-child(2)').append('<p>' + index + '<br/><strong>' + value + '</strong></p>');
                                    }
                                    else
                                    {
                                        $('#modal_catatan').append('<div>'+value+'</div>');
                                    }
                                }
                            }
                        }
                        else
                        {

                        }

                        console.log(value);
                        // $(transaksi).last().remove();

                        // console.log(Array.isArray(value) ? 'array' : 'bukan');
                        // console.log(value ? 'ada' : 'null');
                        // console.log(value.length);
                        // console.log(Number.isInteger(value) ? value : 'bukan'); 
                    });
                    $('#modal_invoice_details').find('tbody > tr').first().remove()
                }
            });
        });

        $('#transaksi-show').on('hidden.bs.modal', function (e) {
            e.preventDefault()
            $('#transaksi-show').find('table > tbody > tr').not(':first').remove();
            $('#modal_invoice > div > div:nth-child(2) > p').remove();
            $('#modal_catatan > div').remove();
            $('#modal_invoice_details').find('tfoot > tr > th:last-child > span').remove()
            $('#modal_invoice_details').find('tbody > tr > td:last-child > span').remove()
            $('#modal_invoice_details').find('tbody > tr > td:nth-child(2) > span').remove()
            $('#generateReport').parent().show();

        });

        
        function new_url(url, before, after) {
            return url.replace(before, after);
        }

        
        $('#generateReport').click(function (e) { 
            window.scrollTo(0,0)
            $(this).parent().hide();
            
            var h_doc = $('#transaksi-show').height();
            var w_doc = $('#transaksi-show').width();

            html2canvas(document.getElementById("transaksi-show"), {
                onrendered: function(canvas) {
                    var imgData = canvas.toDataURL('image/png');
                    var doc = new jsPDF('P', 'pt', 'a4');
                    doc.addImage(imgData, 'JPEG', -220, 0)
                    doc.save('invoice.pdf');
                // $('.card-body:last-child > img').attr('src', imgData);
                    // $('#transaksi-show').modal('hide')
                }
            });
        });


    </script>
@endpush