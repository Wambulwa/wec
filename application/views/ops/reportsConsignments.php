      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">
        <div class="row">
          <div class="form-group">
            <label class="control-label"><h2>Consignment reports<?php if(isset($date)){echo $date;}?></h2></label>
          </div>
        </div>
        <div class="form-group row">
          <?php echo form_open('ops/reportsConsignments');?>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-white">
              <div class="card-header">
                <input type="text" name="date1" class="cust-col form-control col-md-4" data-provide="datepicker" placeholder="From......" required="">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-white">
              <div class="card-header">
                <input type="text" name="date2" class="cust-col form-control col-md-4" data-provide="datepicker" placeholder="To......" required="">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-white">
              <div class="card-header">
                <button class="btn btn-primary" style="width: 100%;">Let's go....</button>
              </div>
            </div>
          </div>
          <?php echo form_close();?>
        </div>
        <!-- SMALL CARDS -->
        <?php if(isset($all)):?>
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-block b-a-0 bg-teal text-white">
                  <div class="card-circle-bg-icon"> <i class="icon-cup"></i> </div>
                  <div class="h4 m-a-0"><?php echo count($all);?></div>
                  <div>Consignments cleared<br><?php
                  $date1=date_create("2017-07-31");
                  $date2=date_create("2017-08-31");
                  $diff=date_diff($date1,$date2);
                  $diff1=$diff->format("%a");
                   $diff1;?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block b-a-0 bg-purple text-white">
                  <div class="card-circle-bg-icon"> <i class="icon-tag"></i> </div>
                  <div class="h4 m-a-0"><?php echo count($imports);?></div>
                  <div>Imports</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block b-a-0 bg-blue text-white">
                  <div class="card-circle-bg-icon"> <i class="icon-settings"></i> </div>
                  <div class="h4 m-a-0"><?php echo count($exports);?></div>
                  <div>Exports</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block b-a-0 bg-cyan text-white">
                  <div class="card-circle-bg-icon"> <i class="icon-cloud-upload"></i> </div>
                  <div class="h4 m-a-0"><?php echo count($locals);?></div>
                  <div>Local</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-block no-border bg-primary text-white">
                  <h6 class="m-a-0">DHL</h6>
                  <h3 class="m-a-0"><?php echo count($dhl);?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block no-border bg-dark text-white">
                  <h6 class="m-a-0">SwissPort CSC</h6>
                  <h3 class="m-a-0"><?php echo count($swissport);?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block no-border bg-red text-white">
                  <h6 class="m-a-0">Transglobal Cargo center</h6>
                  <h3 class="m-a-0"><?php echo count($tcc);?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block no-border bg-indigo text-white">
                  <h6 class="m-a-0">Siginon Freight</h6>
                  <h3 class="m-a-0"><?php echo count($siginon);?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block no-border bg-red text-white">
                  <h6 class="m-a-0">Africa Cargo Handling center</h6>
                  <h3 class="m-a-0"><?php echo count($achc);?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-block no-border bg-indigo text-white">
                  <h6 class="m-a-0">Kenya Airfreight Handling Ltd</h6>
                  <h3 class="m-a-0"><?php echo count($kahl);?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //SMALL CARDS -->
        <div class="row">
          <!-- TABULAR REPORT -->
          <div class="main-content">
            <!-- <div class="page-title">
              <div class="title">Datatables</div>
              <div class="sub-title">UI datatables</div>
            </div> -->
            <div class="card bg-white">
              <div class="card-header">
                CONSIGNMENTS CLEARED LIST
              </div>
              <div class="card-block">
                <table class="display nowrap" id="export" width="100%" cellspacing="0" border="1">
                  <thead>
                    <th>CONS#</th>
                    <th>CUST#</th>
                    <th>DESCRIPTION</th>
                    <th>CONSIGNEE</th>
                    <th>SHIPPER</th>
                    <th>DATE OPENED</th>
                  </thead>
                  <tbody>
                    <?php foreach ($all as $all):?>
                    <tr>
                      <td><?php echo $all->cons_id;?></td>
                      <td><?php echo $all->cust_id;?></td>
                      <td><?php echo $all->cons_desc;?></td>
                      <td><?php echo $all->cons_consignee;?></td>
                      <td><?php echo $all->cons_shipper;?></td>
                      <td><?php echo $all->cons_date_opened;?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
            <!-- EXPENSES LIST -->
              <!-- FREIGHT -->
        <div class="row">
          <div class="main-content">
            <div class="card bg-white">
              <div class="card-header">
                CONSIGNMENT FREIGHT CHARGES
              </div>
              <div class="card-block">
                <table class="display nowrap" id="exportFreight" width="100%" cellspacing="0" border="1">
                  <thead>
                    <th>CONS#</th>
                    <th>CUST#</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
                    <th>FREIGHT CHARGES</th>
                  </thead>
                  <tbody>
                    <?php foreach ($freight as $freight):?>
                    <tr>
                      <td><?php echo $freight->bol_cons_id;?></td>
                      <td><?php echo $freight->cust_id;?></td>
                      <td><?php echo $freight->cons_date_opened;?></td>
                      <td><?php echo $freight->cons_desc;?></td>
                      <td><?php echo $freight->sum_freight;?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- //EXPENSES LIST -->
          </div>
          <!-- //TABULAR REPORT -->
        </div>
            <!-- CLEARANCE @ CARGO SHED -->
        <div class="row">
          <div class="main-content">
            <div class="card bg-white">
              <div class="card-header">
                CONSIGNMENT CLEARANCE CHARGES @ CARGO SHED
              </div>
              <div class="card-block">
                <table class="display nowrap" id="exportClearance" width="100%" cellspacing="0" border="1">
                  <thead>
                    <th>CONS#</th>
                    <th>CUST#</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
                    <th>CLEARANCE CHARGES</th>
                  </thead>
                  <tbody>
                    <?php foreach ($clearance as $clearance):?>
                    <tr>
                      <td><?php echo $clearance->cons_cons_id;?></td>
                      <td><?php echo $clearance->cust_id;?></td>
                      <td><?php echo $clearance->cons_date_opened;?></td>
                      <td><?php echo $clearance->cons_desc;?></td>
                      <td><?php echo $clearance->clearance;?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- //EXPENSES LIST -->
          </div>
          <!-- //TABULAR REPORT -->
        </div>
      <?php endif;?>
      </div>
<style type="text/css">
  .cust-col{
    border-right: none; 
    border-top: none;
    border-left: none; 
    border-bottom-color: #b3b3ff; 
  }
  .cust-col1{
    border-right: none;
    border-top: none;
    border-left: none;
    border-bottom: none;
  }
  .cust-tr{
    width: 100%;
  }
  .abc{
    width: 10px;
  }
</style>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="<?php echo base_url('scripts/helpers/modernizr.js');?>"></script>
  <script src="<?php echo base_url('vendor/jquery/dist/jquery.js');?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/dist/js/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('vendor/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?php echo base_url('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js');?>"></script>
  <script src="<?php echo base_url('scripts/helpers/smartresize.js');?>"></script>
  <script src="<?php echo base_url('scripts/constants.js');?>"></script>
  <script src="<?php echo base_url('scripts/main.js');?>"></script>
  <!-- endbuild -->
  <!-- page scripts -->
  <!-- end initialize page scripts -->
  <!-- date pickers -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css');?>">
  <script src="<?php echo base_url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
  <!-- datatables -->
  <script src="<?php echo base_url('vendor/datatables/media/js/jquery.dataTables.js');?>"></script>
  <script src="<?php echo base_url('scripts/helpers/bootstrap-datatables.js');?>"></script>
  <!-- //datatables css -->
  <!-- buttons -->
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
  <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
            $('#export').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ]
             } );
            $('#exportFreight').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ]
             } );
            $('#exportClearance').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ]
             } );
        } );
    </script>
  <!-- //buttons -->
</body>

</html>