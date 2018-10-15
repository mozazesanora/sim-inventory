<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>public/themes/backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ?>public/themes/backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->

    <script src="<?php echo base_url() ?>public/themes/backend/dist/js/app.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url() ?>public/themes/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/plugins/mask/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() ?>public/themes/backend/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
   function looding(bol=true){
    $body = $("body");
    if(bol){
      document.getElementsByClassName('logo')[0].setAttribute("href", "#");
      document.getElementsByClassName('dropdown-toggle')[0].setAttribute("data-toggle", "");
      $body.addClass("looding");
    }else{
      document.getElementsByClassName('logo')[0].setAttribute("href", "<?php echo site_url('webmin/dashboard') ?>");
      document.getElementsByClassName('dropdown-toggle')[0].setAttribute("data-toggle", "dropdown");
      $body.removeClass("looding");
    }
  }
  function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
 </script>
    <script type="text/javascript">
      $(function() {
            $(document).ajaxStart(function() { Pace.restart(); }); 
            $('.money').mask('000.000.000.000.000', {reverse: true});
            $('.tahun').mask('0000/0000', {reverse: true});
            $('.jam').mask('00:00', {reverse: true});
            // setTimeout(function(){
            //     $(".alert").slideUp();
            // }, 2500);
        });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>public/themes/backend/dist/js/demo.js"></script>
	

<!-- END JAVASCRIPT -->

