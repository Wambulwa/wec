      <footer class="content-footer">
      <nav class="footer-right">
        <ul class="nav">
          <li>
            <a href="javascript:;">Feedback</a>
          </li>
          <li>
            <a href="javascript:;" class="scroll-up">
              <i class="fa fa-angle-up"></i>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="footer-left hidden-xs">
        <ul class="nav">
          <li>
            <a href="javascript:;"><span>About</span> WEC</a>
          </li>
          <li>
            <a href="javascript:;">Privacy</a>
          </li>
          <li>
            <a href="javascript:;">Terms</a>
          </li>
          <li>
            <a href="javascript:;">Help</a>
          </li>
        </ul>
      </nav>
    </footer>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="<?php echo base_url();?>scripts/helpers/modernizr.js"></script>
  <script src="<?php echo base_url();?>vendor/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>vendor/fastclick/lib/fastclick.js"></script>
  <script src="<?php echo base_url();?>vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="<?php echo base_url();?>scripts/helpers/smartresize.js"></script>
  <script src="<?php echo base_url();?>scripts/constants.js"></script>
  <script src="<?php echo base_url();?>scripts/main.js"></script>
  <!-- endbuild -->
  <!-- page scripts -->
  <script src="<?php echo base_url();?>vendor/datatables/media/js/jquery.dataTables.js"></script>
  <!-- end page scripts -->
  <!-- initialize page scripts -->
  <script src="<?php echo base_url();?>vendor/datatables/media/js/datatables.bootstrap.js"></script>
  <script type="text/javascript">
    $('.datatable').dataTable({
      'ajax': '<?php echo base_url();?>data/datatables-arrays.json'
    });
  </script>
  <!-- end initialize page scripts -->
</body>

</html>