      <div class="main-content">
        <div class="page-title">
          <ol class="breadcrumb no-bg pl0 no-print">
            <li>
              <a href="<?php echo base_url('cs');?>">CS</a>
            </li>
            <li>
              <a href="<?php echo base_url('cs/manageConsignment');?>">Consignments</a>
            </li>
            <li class="active">Dispatched Consignments</li>
          </ol>
          <label>This part is for all dispatched invoices not marked as delivered</label>
        </div><br><br><br>
        <!-- LIST OF CONSIGNMENTS FROM ACCOUNTS-->
        <div class="card bg-white notset">
          <div class="card-block">
            <label class="control-label"><h3><?php if(isset($invUpdated)){ echo $invUpdated;} ?></h3></label>
            <table class="table table-bordered table-striped datatable editable-datatable responsive bordered">
              <thead style="background: #4b78c1; color: #fff;">
                <tr>
                  <th>Client</th>
                  <th>Invoice#</th>
                  <th>Invoice amount</th>
                  <th>INVOICE DATE</th>
                  <th>Created by</th>
                  <th>Dropped by</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($dispatchedUndeliveredInvoices)): foreach ($dispatchedUndeliveredInvoices as $dispatchedUndeliveredInvoices):?>
                  <tr>                    
                    <td>
                      <?php echo form_open('cs/dispatchedInvoices');?>
                      <?php echo $dispatchedUndeliveredInvoices->client_name;?>
                      <?php echo form_hidden('cust_id',$dispatchedUndeliveredInvoices->cust_id,'class="form-control"');?>
                    </td>
                    <td>
                      <?php echo $dispatchedUndeliveredInvoices->invoice_id;?>
                      <?php echo form_hidden('invoice_id',$dispatchedUndeliveredInvoices->invoice_id,'class="form-control"');?>
                      <?php echo form_hidden('cons_id',$dispatchedUndeliveredInvoices->cons_id,'class="form-control"');?>
                    </td>
                    <td>
                      <?php echo $dispatchedUndeliveredInvoices->inv_currency.' '.$dispatchedUndeliveredInvoices->inv_amount;?>
                    </td>
                    <td>
                      <?php echo $dispatchedUndeliveredInvoices->inv_date;?>
                    </td>
                    <td><?php echo $dispatchedUndeliveredInvoices->staff_fname.' '.$dispatchedUndeliveredInvoices->staff_mname.' '.$dispatchedUndeliveredInvoices->staff_sname;?>
                    </td>
                    <td>
                      <?php echo $dispatchedUndeliveredInvoices->dispatched_by;?>
                    </td>
                    <td>
                      <?php echo form_submit('submit','MARK AS DELIVERED','class="btn btn-primary btn-sm"');?>
                      <?php echo form_close();?>
                    </td>                    
                  </tr>
                <?php endforeach;endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- MARK INVOICE AS DELIVERED FEEDBACK -->
        <div class="card bg-white sendInvoice">
          <div class="card-block">
            <label><h3><?php if(isset($send_msg)){ echo $send_msg;}?></h3></label>
          </div>
        </div>
        <!-- //MARK INVOICE AS DELIVERED FEEDBACK -->
    </div>
<!-- BUGS FEEDBACK -->
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
 <!--//BUGS FEEDBACK