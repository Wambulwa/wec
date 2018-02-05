      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title"><h1>Invoices payments</h1></div>
          <div class="sub-title">All unpaid/partly paid invoices are managed here</div>
        </div>
        <div class="card bg-beige">
          <div class="card-block">
            <label class="control-label"><h2>DISPATCHED INVOICES DUE TODAY</h2></label><hr>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead style="background: #D8D7E7; color: brown; font-size: 12px;">
                <tr>
                  <th>Invoice#</th>
                  <th>Client</th>
                  <th>Invoiced on</th>
                  <th>Due date</th>
                  <th>Amount invoiced</th>
                  <th>Amount collected</th>
                  <th>Amount due</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices_due as $invoices):?>
                  <?php if($invoices->amount_due>0): ?>
                  <tr>
                    <?php echo form_open('accounts/printInvoice');?>
                      <td><input type="text" name="invoice_id" value="<?php echo $invoices->invoice_id;?>" hidden="" style="border:none;"><?php echo $invoices->invoice_id;?></td>
                      <td><?php echo $invoices->client_name;?></td>
                      <td><?php echo $invoices->inv_date;?></td>
                      <td><?php echo $invoices->inv_due_date;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->invoiced_value;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_paid;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_due;?></td>
                      <td><button class="btn btn-sm btn-success">Open</button></td>
                    <?php echo form_close();?>
                  </tr>
                <?php endif; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card bg-beige">
          <div class="card-block">
            <label class="control-label"><h2>DISPATCHED OVERDUE INVOICES</h2></label><hr>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered colored">
              <thead style="background: #D8D7E7; color: brown; font-size: 12px;">
                <tr>
                  <th style="width: 10%;">Invoice#</th>
                  <th>Client</th>
                  <th>Invoiced on</th>
                  <th>Due date</th>
                  <th>Amount invoiced</th>
                  <th>Amount collected</th>
                  <th>Amount overdue</th>
                  <th>Days overdue</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices_overdue as $invoices):?>
                  <?php if($invoices->amount_due>0): ?>
                  <tr>
                    <?php echo form_open('accounts/printInvoice');?>
                      <td><input type="text" name="invoice_id" value="<?php echo $invoices->invoice_id;?>" hidden="" style="border:none;"><?php echo $invoices->invoice_id;?></td>
                      <td><?php echo $invoices->client_name;?></td>
                      <td><?php echo $invoices->inv_date;?></td>
                      <td><?php echo $invoices->inv_due_date;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->invoiced_value;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_paid;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_due;?></td>
                      <td><?php echo $invoices->days_due*-1;?></td>
                      <td><button class="btn btn-sm btn-success">Open</button></td>
                    <?php echo form_close();?>
                  </tr>
                <?php endif; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card bg-beige">
          <div class="card-block">
            <label class="control-label"><h2>DISPATCHED INVOICES NOT DUE FOR PAYMENT</h2></label><hr>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead style="background: #D8D7E7; color: brown; font-size: 12px;">
                <tr>
                  <th style="width: 10%;">Invoice#</th>
                  <th>Client</th>
                  <th>Invoiced on</th>
                  <th>Due date</th>
                  <th>Amount invoiced</th>
                  <th>Amount collected</th>
                  <th>Amount unpaid</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices_undue as $invoices):?>
                  <?php if($invoices->amount_due>0): ?>
                  <tr>
                    <?php echo form_open('accounts/printInvoice');?>
                      <td><input type="text" name="invoice_id" value="<?php echo $invoices->invoice_id;?>" hidden="" style="border:none;"><?php echo $invoices->invoice_id;?></td>
                      <td><?php echo $invoices->client_name;?></td>
                      <td><?php echo $invoices->inv_date;?></td>
                      <td><?php echo $invoices->inv_due_date;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->invoiced_value;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_paid;?></td>
                      <td><?php echo $invoices->inv_currency.' '.$invoices->amount_due;?></td>
                      <td><button class="btn btn-sm btn-success">Open</button></td>
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