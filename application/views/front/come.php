<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Surat Masuk</h3>
    </div>
    <div class="box-body">
        <button data-toggle="modal" onclick="loadmodalcome()" data-target="#modalsuratmasuk" type="button" class="btn btn-primary btn-sm">Data Surat Masuk</button>
        <div class="table-responsive" id="surat_masuk">
        	
        </div>
    </div>
</div>

<div id="modalsuratmasuk" class="modal fade" role="dialog">
  <div class="modal-dialog" id="modalsuratmasukx">

  </div>
</div>

<script type="text/javascript">
  function loadmodalcome()
  {
    $.get("<?php echo base_url('/front/comeform') ?>", function(data){ $('#modalsuratmasukx').html(data); });
  }
</script>