<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Surat Keluar</h3>
    </div>
    <div class="box-body">
        <button data-toggle="modal" onclick="loadmodalsend()" data-target="#modalsuratkeluar" type="button" class="btn btn-primary btn-sm">Data Surat Keluar</button>
        <br/><br/>
        <div class="table-responsive" id="surat_masuk">
        	
        </div>
    </div>
</div>

<div id="modalsuratkeluar" class="modal fade" role="dialog">
  <div class="modal-dialog" id="modalsuratkeluarx">

  </div>
</div>

<script type="text/javascript">
  function loadmodalsend()
  {
    $.get("<?php echo base_url('/front/sendform') ?>", function(data){ $('#modalsuratkeluarx').html(data); });
  }
  function ajaxpaging(url)
  {
    $.get(url, function(data){ $('#surat_masuk').html(data); });
  }
  $.get("<?php echo base_url('/front/surat_keluar') ?>", function(data){ $('#surat_masuk').html(data); });
</script>