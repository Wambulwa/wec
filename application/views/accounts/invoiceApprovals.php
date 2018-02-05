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
              <thead style="background: #b7e0e2;">
                <tr>
                  <th style="width: 10%;">Invoice#</th>
                  <th>Client</th>
                  <th>Date created</th>
                  <th>Amount</th>
                  <th>Approved?</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($approvals as $approvals): ?>
                  <?php if($approvals->amount_paid<1): ?>
                  <tr>
                    <?php echo form_open('accounts/printInvoiceApproval');?>
                      <td><input type="text" name="invoice_id" value="<?php echo $approvals->invoice_id;?>" hidden=""><?php echo $approvals->invoice_id;?></td>
                      <td><?php echo $approvals->client_name;?></td>
                      <td><?php echo $approvals->inv_date;?></td>
                      <td><?php echo $approvals->total;?></td>
                      <td><?php if($approvals->approvals==1){echo "YES";}if($approvals->approvals==0){echo "NO";}?></td>
                      <td><button class="btn btn-success btn-sm">Open</button></td>
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