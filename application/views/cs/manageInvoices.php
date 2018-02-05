      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Manage Invoices</div>
          <div class="sub-title">Get a list of your unpaid/partly paid invoices here. You can print them from here</div>
        </div>
        <div class="card bg-white">
          <!-- <div class="card-header">
            Datatables
          </div> -->
          <div class="card-block">
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead style="background: #D8D7E7; color: black;">
                <tr>
                  <th>Invoice ID</th>
                  <!-- <th>Amount paid</th> -->
                  <th>Amount due</th>
                  <th>Customer</th>
                  <th>INVOICE DATE<?php foreach ($inv_app_count as $key) {echo $key->inv_app_count;}?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices as $invoices):?>
                  <?php if($invoices->amount_due>0): ?>
                  <tr>
                    <?php echo form_open('accounts/printInvoice');?>
                      <td><button style="border:none; width: 100%; background-color: inherit;color: black;"><input type="text" name="invoice_id" value="<?php echo $invoices->invoice_id;?>" readonly="" style="border:none;"></button></td>
                      <td><?php echo $invoices->amount_due.' '.$invoices->inv_currency;?></td>
                      <td><?php echo $invoices->cust_id;?></td>
                      <td><?php echo $invoices->inv_date;?></td>
                    <?php echo form_close();?>
                  </tr>
                <?php endif; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->