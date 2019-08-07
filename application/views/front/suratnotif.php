
              <!-- Menu toggle button -->
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"><?php echo count($data) ?>+</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Surat Baru</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <?php foreach($data as $val){ ?>
                    <li><!-- start message -->
                      <a onclick="notifikasi()" target="_blank" href="http://<?php echo $val['file'] ?>">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="<?php echo base_url('assets/') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Dari <?php echo $val['dari'] ?>
                          <?php 
                            $sekarang = time();
                            $validasi = strtotime($val['created_at']);
                            $diff = $sekarang - $validasi;
                            $jam   = floor($diff / (60 * 60));
                            $menit = $diff - $jam * (60 * 60);
                          ?>
                          <small><i class="fa fa-clock-o"></i> <?php echo floor( $menit / 60 ) ?> mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Klik Surat Untuk Melihat Detail</p>
                      </a>
                    </li>
                    <!-- end message -->
                    <?php } ?>
                  </ul>
                  <!-- /.menu -->
                </li>
                <?php if(count($data) > 0 ){ ?>
                <li class="footer"><a id="come-template" href="<?php echo base_url("front/come") ?>?" onclick="hyperlinkajax(event, this.id)">See All Messages</a></li>
                <?php }else{ ?>
                <li class="footer"><a style="cursor: context-menu" href="javascript:void(0)">Tidak Ada Surat Masuk</a></li>
                <?php } ?>
              </ul>

<script type="text/javascript">
  function notifikasi()
  {
    $.get("<?php echo base_url("front/skipnotif") ?>", function(data){
      console.log(data);
    });
  }
</script>