<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="transaksi_id"> Transaksi </label>
                        <input id="transaksi_id" type="text" class="form-control @error('transaksi_id') is-invalid @enderror" name="transaksi_id" value="">
                    </div>
      
                    <div class="form-group">
                        <label for="nama"> Nama Jenazah</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="">
                    </div>
      
                    <div class="row">
                        <div class="form-group col lahir">
                            <label for="lahir"> Tanggal Lahir </label>
                            <input id="lahir" type="datetime-local" class="form-control @error('lahir') is-invalid @enderror" name="lahir" value="">
                        </div>
                        <div class="form-group col wafat">
                            <label for="wafat"> Tanggal Wafat </label>
                            <input id="wafat" type="datetime-local" class="form-control @error('wafat') is-invalid @enderror" name="wafat" value="">
                        </div>
                    </div>
      
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') ? old('alamat') :  '' }}">
                    </div>
      
                    <div class="form-group">
                        <label for="surat_kematian"> Link Surat Kematian </label>
                        <input id="surat_kematian" type="text" class="form-control @error('surat_kematian') is-invalid @enderror" name="surat_kematian" value="{{ old('surat_kematian') ? old('surat_kematian') : '' }}">
                    </div>
      
                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') :  '' }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
