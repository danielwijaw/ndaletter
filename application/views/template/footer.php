
        </div>
      </section>
    </div>
  </div>
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright Template By <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url('assets/') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url('assets/') ?>/dist/js/adminlte.min.js"></script>
<script>
    sayHi();
    function sayHi() {
       setTimeout(sayHi,7500);
       $.get("<?php echo base_url('/front/suratnotif') ?>", function(data){ $('#suratdepan').html(data); });
    }
    
    $(".menunya").click(function() {
        $(".menunya").attr('class', 'menunya');
        $(this).attr('class', 'menunya active');
    });

    function hyperlinkajax(e, id) {
        e.preventDefault();
        var urlxz = $("#"+id+"").attr('href');
        var urlxx = urlxz.split("?");
        var url = urlxx[0];
        $.ajax({
            url: urlxz+"&ajax=true",
            contentType: false,
            cache: true,
            processData: false,
            success: function(data) {
                $('#dataajax').html(data);
            },
            error: function(error) {
                $('#dataajax').html(error);
            }
        });
        window.history.pushState({href: url}, '', url);
    }

    function hyperlinkajaxz(url) {
        $(".menunya active").attr('class', 'menunya');
        $.ajax({
            url: url+"?&ajax='true'",
            contentType: false,
            cache: true,
            processData: false,
            success: function(data) {
                $('#dataajax').html(data);
            },
            error: function(error) {
                $('#dataajax').html(error);
            }
        });
    }

    $(document).ready(function() {
        $(window).on('popstate', function() {
          hyperlinkajaxz(window.location.href)
        });
    });
</script>
</body>
</html>