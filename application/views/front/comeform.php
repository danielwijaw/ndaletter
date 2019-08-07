<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Surat Masuk</h4>
  </div>
  <div class="modal-body">
  <form id="come" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <label>Nomor Surat</label>
    <input type="text" name="nomor_surat" class="form-control" required="required"><br/>
    <label>Perihal</label>
    <input type="text" name="perihal_surat" class="form-control"><br/>
    <label>Dari</label>
    <input type="text" name="dari_surat" class="form-control" required="required"><br/>
    <input type="hidden" name="melalui_surat" class="form-control" value="<?php echo $this->session->userdata('nip') ?>">
    <input type="hidden" name="inisurat" class="form-control" value="2">
    <label>Ke</label>
    <select class="form-control" name="ke_surat" id="ke_surat">
      <option value="">Surat Ditujukan Kepada</option>
      <?php foreach ($data as $key => $value) { ?>
      <option value="<?php echo $value['nip'] ?>"><?php echo $value['nama'].' || '.$value['jabatan'] ?></option>
      <?php } ?>
    </select><br/>
    <label>File</label>
    <input type="file" id="file_surat" name="file_surat" required="required">
  </div>
  </form>
  <div class="modal-footer">
    <button type="button" onclick="insert()" class="btn btn-primary">Masukan Data</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

<script type="text/javascript">
  function insert()
  {
    if($("input[name='file_surat']").val().length===0){
      alert("File Surat Wajib Diisi");
      return false;
    }
    if($("input[name='nomor_surat']").val().length===0){
      alert("Nomor Surat Wajib Diisi");
      return false;
    }
    if($("input[name='perihal_surat']").val().length===0){
      alert("Perihal Surat Wajib Diisi");
      return false;
    }
    if($("input[name='dari_surat']").val().length===0){
      alert("Dari Surat Wajib Diisi");
      return false;
    }
    if($("#ke_surat").val().length===0){
      alert("Ke Surat Wajib Diisi");
      return false;
    }
    var a = new FormData(document.getElementById("come"));
      $.ajax({
        url: "<?php echo base_url('post/insertsurat') ?>",
        type: "POST",
        data: a,
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(data) {
          if(data == "Berhasil"){
            alert("Berhasil Input Data Surat Masuk");
            window.location.reload(true);
            return false;
          }else{
            alert(data);
          }
        },
        error: function(e) {
          alert('Gagal Terhubung ke Server');
        }
    });
  }
</script>