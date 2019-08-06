<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Surat Masuk</h3>
    </div>
    <div class="box-body">
        <button data-toggle="modal" data-target="#modalsuratmasuk" type="button" class="btn btn-primary btn-sm">Data Surat Masuk</button>
        <div class="table-responsive" id="surat_masuk">
        	
        </div>
    </div>
</div>

<div id="modalsuratmasuk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Surat Masuk</h4>
      </div>
      <div class="modal-body">
        <label>Nomor Surat</label>
        <input type="text" name="nomor_surat" class="form-control"><br/>
        <label>Perihal</label>
        <input type="text" name="perihal_surat" class="form-control"><br/>
        <label>Dari</label>
        <input type="text" name="dari_surat" class="form-control"><br/>
        <input type="hidden" name="melalui_surat" class="form-control">
        <label>Ke</label>
        <input type="text" name="ke_surat" class="form-control"><br/>
        <label>File</label>
        <input type="file" name="file_surat">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Masukan Data</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>