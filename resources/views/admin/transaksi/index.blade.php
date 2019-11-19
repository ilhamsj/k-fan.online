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
</div>

<!-- Modal -->
<div class="modal fade" id="transaksi-show" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-flag" aria-hidden="true"></i>
                    <strong><span class="text-primary">Ka</span>fan</strong>
                </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h3>Invoice :</h3>
                    </div>
                    <div class="col">
                        <p>
                            <strong>From</strong> <br/>
                            17 November 2019 10:00
                        </p>
                        <p>
                            <strong>To</strong> <br/>
                            17 November 2019 10:00
                        </p>
                    </div>
        
                    <div class="col text-right">
                        <p>
                            <strong>ID</strong> <br/>
                            #a4643aaf-d1e1-3020-82c5-f9c2e298b59c
                        </p>
                        <p>
                            <strong>Tanggal</strong> <br/>
                            17 November 2019 10:00
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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
                                <td rowspan="3">01</td>
                                <td rowspan="3">Platinum</td>
                                <td>Peti Mati</td>
                                <td>19000</td>
                            </tr>
                            <tr>
                                <td>Peti Mati</td>
                                <td>19000</td>
                            </tr>
                            <tr>
                                <td>Peti Mati</td>
                                <td>19000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th>4</th>
                                <th>Harga</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-body">
                <h4>Notes :</h4>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad voluptas doloribus totam repellendus, repudiandae ea nihil natus earum. Deserunt distinctio quia, nobis quis nesciunt rem a et quidem doloribus nihil?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
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
                        var nota  = $('#transaksi-show').find('tr:first-child').clone();
                        
                        // if(value != null)
                        // {
                        //     if(Number.isInteger(value))
                        //     {
                        //         $(nota).find('td').first().text(index);
                        //         $(nota).find('td').last().text(value);
                        //         $('#transaksi-show').find('table').append(nota);
                        //     }
                        //     else
                        //     {
                        //         if(value.length == undefined)
                        //         {
                        //             $.map(value, function (val, ind) {
                        //                 $('#transaksi-show > div > div > div:nth-child(2) > div > div').append('<p>'+ind+'<br/><strong>'+val+'</strong></p>');
                        //             });
                        //         }
                        //         else
                        //         {
                        //             $(nota).find('td').first().text(index);
                        //             $(nota).find('td').last().text(value);
                        //             $('#transaksi-show').find('table').append(nota);
                        //         }
                        //     }
                        // }
                        // else
                        // {
                        //     $(nota).find('td').first().text(index);
                        //     $(nota).find('td').last().text('tidak ada data mayat');
                        //     $('#transaksi-show').find('table').append(nota);
                        // }


                        console.log(value);
                        // console.log(Array.isArray(value) ? 'array' : 'bukan');
                        // console.log(value ? 'ada' : 'null');
                        // console.log(value.length);
                        // console.log(Number.isInteger(value) ? value : 'bukan'); 
                    });
                }
            });
        });



        
        
        $('#transaksi-show').on('hidden.bs.modal', function (e) {
            e.preventDefault()
            $('#transaksi-show').find('table > tbody > tr').not(':first').remove();
        });

        
        function new_url(url, before, after) {
            return url.replace(before, after);
        }

        $('#transaksi-show').modal('show');

    </script>
@endpush