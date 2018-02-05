      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Invoice dispatch</div>
          <div class="sub-title">All approved invoices ready for dispatch are listed below</div>
        </div>
        <div class="card bg-white">
          <!-- <div class="card-header">
            Datatables
          </div> -->
          <div class="card-block">
            <?php if(isset($invoices)){
              if(count($invoices)>0){?>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead style="background: #D8D7E7; color: black;">
                <tr>
                  <th>Invoice ID</th>
                  <th>Invoice value</th>
                  <th>Customer</th>
                  <th>INVOICE DATE</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices as $invoices):?>
                  <?php if(count($invoices->cust_id)>0):?>
                  <tr>
                    <?php echo form_open('accounts/invoiceDispatch');?>
                      <td><input type="text" name="invoice_id" value="<?php echo $invoices->invoice_id;?>" readonly="" style="border:none;"></td>
                      <td><?php echo $invoices->amount_due.' '.$invoices->inv_currency;?></td>
                      <td><?php echo $invoices->cust_id;?></td>
                      <td><?php echo $invoices->inv_date;?></td>
                      <td><button class="btn btn-sm btn-success">View & dispatch</button></td>
                    <?php echo form_close();?>
                  </tr>
                <?php endif; endforeach;?>
              </tbody>
            </table>
            <?php } else{?>
            <label class="control-label">No invoices ready for dispatch</label>
            <?php }}?>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->