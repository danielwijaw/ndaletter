<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Letter</h3>
    </div>
    <div class="box-body">
        <div class="col-md-12">
        	<div class="panel-group">
			  <div class="panel panel-primary">
			    <div class="panel-body"><h2>Selamat Datang <?php echo $this->session->userdata('nama') ?></h2></div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-body" id="surat_masuk_depan">Panel Content</div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-body" id="surat_keluar_depan">Panel Content</div>
			  </div>
			</div>
        </div>
    </div>
</div>
<script type="text/javascript">
	Pesanindex();
    function Pesanindex() {
       setTimeout(Pesanindex,7500);
		$.get("<?php echo base_url('/front/countsuratmasuk') ?>", function(data){ $('#surat_masuk_depan').html(data); });
		$.get("<?php echo base_url('/front/countsuratkeluar') ?>", function(data){ $('#surat_keluar_depan').html(data); });
    }
</script>