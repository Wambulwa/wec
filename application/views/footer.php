      <footer class="content-footer">
      <nav class="footer-left hidden-xs">
        <ul class="nav">
          <li>
            <a href="javascript:;"><span>About</span> WEC ERP</a>
          </li>
          <li>
            <a href="javascript:;">Privacy</a>
          </li>
          <li>
            <a href="javascript:;">Terms</a>
          </li>
          <li>
            <button  type="button" class="btn no-print btn-sm" data-target="#faq" data-toggle="modal">FAQ</button>
          </li>
        </ul>
      </nav>
      <nav class="footer-right">
        <ul class="nav">
          <li>
            <button  type="button" class="btn no-print btn-sm" data-target="#feedback" data-toggle="modal">Feedback</button>
          </li>
          <li>
            <a href="javascript:;" class="scroll-up">
              <i class="fa fa-angle-up"></i>
            </a>
          </li>
        </ul>
      </nav>
    </footer>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="<?php echo base_url();?>scripts/helpers/modernizr.js"></script>
  <script src="<?php echo base_url('vendor/jquery/dist/jquery.js');?>"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>vendor/fastclick/lib/fastclick.js"></script>
  <script src="<?php echo base_url();?>vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="<?php echo base_url();?>scripts/helpers/smartresize.js"></script>
  <script src="<?php echo base_url();?>scripts/constants.js"></script>
  <script src="<?php echo base_url();?>scripts/main.js"></script>
  <!-- endbuild -->
  <!-- page scripts -->
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.js"></script>
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.categories.js"></script>
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.stack.js"></script>
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.time.js"></script>
  <script src="<?php echo base_url();?>vendor/flot/jquery.flot.pie.js"></script>
  <script src="<?php echo base_url();?>vendor/flot-spline/js/jquery.flot.spline.js"></script>
  <script src="<?php echo base_url();?>vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <!-- end page scripts -->
  <!-- page scripts 1 -->
  <script src="<?php echo base_url();?>vendor/chosen_v1.4.0/chosen.jquery.min.js"></script>
  <script src="<?php echo base_url();?>vendor/card/lib/js/jquery.card.js"></script>
  <script src="<?php echo base_url();?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo base_url();?>vendor/checkbo/src/0.1.4/js/checkBo.min.js"></script>
  <script src="<?php echo base_url();?>vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
  <!-- end page scripts 2 -->
  <!-- initialize page scripts -->
  <script src="<?php echo base_url();?>scripts/helpers/sameheight.js"></script>
  <script src="<?php echo base_url();?>scripts/ui/dashboard.js"></script>
  <script src="<?php echo base_url();?>scripts/forms/wizard.js"></script>
  <!-- end initialize page scripts -->
  <!--datatables-->
  <script src="<?php echo base_url();?>vendor/datatables/media/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>vendor/datatables/media/js/datatables.bootstrap.js"></script>
  <!--/datatables-->
  <!--MASKS-->
  <script src="<?php echo base_url();?>vendor/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>
  <!--/MASKS-->
  <!--Bootstrap EDITOR-->
  <script src="<?php echo base_url();?>vendor/summernote/dist/summernote.min.js"></script>
  <script src="<?php echo base_url();?>scripts/forms/wysiwyg.js"></script>
  <!--/Bootstrap EDITOR-->
  <!--Chat.Js-->
  <script src="<?php echo base_url();?>scripts/chartjscdn.js"></script>
  <script src="<?php echo base_url();?>scripts/helpers/colors.js"></script>
  <!--/Chat.Js-->
  <!-- DATEPICKER -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css');?>">
  <script src="<?php echo base_url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
  <!-- //DATEPICKER -->
  <!-- INPUT STYLES -->
  <script src="<?php echo base_url('scripts/helpers/inputfx.js');?>"></script>
  <script src="<?php echo base_url('scripts/helpers/inputfx.js');?>"></script>
  <script src="<?php echo base_url('scripts/helpers/selectfx.js');?>"></script>
  <!-- //INPUT STYLES -->
  <!-- SELECT STYLE -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <!-- //SELECT STYLE -->
  <!--FEEDBACK MODAL-->
  <div id="feedback" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">We're collecting bugs...kindly write us below</h4>
      </div>
      <div class="modal-body">
      <form role="form" method="post" action="<?php echo base_url('');?>" >
        <div class="form-group">
          <input type="text" name="cname" class="form-control" value="<?php echo $this->staff_fname.' '.$this->staff_lname;?>" placeholder="Your name" readonly="">
        </div>
        <div class="form-group">
          <input type="text" name="cemail" class="form-control" value="<?php echo $this->staff_email;?>" placeholder="Company email" readonly="">
        </div>
        <div class="form-group">
          <input type="text" name="cphone" class="form-control" placeholder="Issue subject">
        </div>
        <textarea class="form-control" placeholder="Describe the issue" rows="4"></textarea>
        <div class="form-group">
          <button class="btn btn-primary">Report bug</button>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--/FEEDBACK MODAL-->
<!--FAQ MODAL-->
  <div id="faq" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Below are the Frequently Asked Questions</h4>
      </div>
      <div class="modal-body">
<!--ACCORDION-->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">How to navigate through the system</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          The system has two navigations:
            <ul>
              <li>
                <strong>Top Navigation</strong><br>
                <i>This is the blue menu on top of the systrem/page. It has my account section (where your profile photo is) and notifications pane</i>
              </li>
              <li>
                <strong>Left Navigation</strong><br>
                <i>This is located on the left. Its the main menu navigation. It starts from dashboard to reports. To use the system well, you must be familiar with this menu.</i>
              </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How to manage my account</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <ul>
            <li><strong>Logging out</strong><br>
              <i>To logout, cilck on <strong>Your Name</strong> then <strong>Logout</strong> located at the top-right part of the top navigation menu. Kindly note that any unsaved work will be saved if you logout. Make sure you save all the work on the logged-in screen before logging out</i>
            </li>
            <li><strong>Changing password,a few details</strong><br>
              <i>To change your password, click on <strong>Your Name</strong> then <strong>My Account</strong>. This takes you to an account management page</i>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Not what you need? Click here to create support ticket</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <form role="form" method="post" action="<?php echo base_url('');?>" >
            <div class="form-group">
              <input type="text" name="cname" class="form-control" value="<?php echo $this->staff_fname.' '.$this->staff_lname;?>" placeholder="Your name" readonly="">
            </div>
            <div class="form-group">
              <input type="text" name="cemail" class="form-control" value="<?php echo $this->staff_email;?>" placeholder="Company email" readonly="">
            </div>
            <div class="form-group">
              <input type="text" name="cphone" class="form-control" placeholder="Query title">
            </div>
            <textarea class="form-control" placeholder="Describe the query" rows="4"></textarea>
            <div class="form-group">
              <button class="btn btn-primary">Create ticket</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--//ACCORDION-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--/FAQ MODAL-->
</body>

</html>
