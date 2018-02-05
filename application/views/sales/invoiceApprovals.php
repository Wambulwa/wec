      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Invoice Approvals</div>
          <div class="sub-title">All created invoices that are pending full approval or approved but not sent appear here</div>
        </div>
        <div class="card bg-white">
          <!-- <div class="card-header">
            Datatables
          </div> -->
          <div class="card-block">
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead>
                <tr>
                  <th>Invoice ID</th>
                  <th>Client</th>
                  <th>Date created</th>
                  <th>Amount</th>
                  <th>Accepted</th>
                  <th>Rejected</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($approvals as $approvals): ?>
                  <?php if($approvals->amount_paid<1): ?>
                  <tr>
                    <?php echo form_open('sales/printInvoiceApproval');?>
                      <td><button style="border:none; width: 100%; background-color: inherit;color: black;"><input type="text" name="invoice_id" value="<?php echo $approvals->invoice_id;?>" readonly="" style="border:none;"></button></td>
                      <td><?php echo $approvals->client_name;?></td>
                      <td><?php echo $approvals->inv_date;?></td>
                      <td><?php echo $approvals->total;?></td>
                      <td><?php //echo $approvals->approver1;?></td>
                      <td><?php //echo $approvals->approver2;?></td>
                    <?php echo form_close();?>
                  </tr>
                <?php endif; endforeach; ?>
              </tbody>
            </table>            
            <?php if($this->is_invoice_approver==1){?>
            <label>You are an invoice approver</label>
            <?php }?>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->