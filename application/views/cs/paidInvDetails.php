      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
        <div class="pull-right">
        <button class="btn btn-danger no-print" onclick="window.print();">PRINT TRANSACTIONS</button>
        </div>
          <div class="title">INVOICE PAYMENT HISTORY</div>
          <div class="sub-title"><strong>This records all payments associated with invoice #<?php echo $inv_id;?> for <?php foreach ($invClient as $client) { echo "$client->cname ($client->cid)";} ?></strong></div>
        </div>
        <div class="card bg-white">
          <!-- <div class="card-header"> -->
            <!-- Datatables -->
          <!-- </div> -->
          <div class="card-block">
          <h3>INVOICE DETAILS</h3>    
      <table style="width: 100%;" class="table-basic" border="1">
        <thead style="background: #D8D7E7;">
          <th>INVOICE#</th>
          <th>INVOICED TO</th>
          <th>INVOICE TOTAL</th>
          <th>AMOUNT PAID</th>
          <th>AMOUNT DUE</th>
          <th>CURRENCY</th>
        </thead>
        <tbody>    
          <tr>
    <?php foreach ($paidInvDetails as $details1): ?>
            <td>
              <?php echo $details1->invoice_id;?>
            </td>
            <td>
              <?php echo $details1->cust_id;?>
            </td>
    <?php endforeach; ?>
    <?php foreach ($paidInvDetailsTotal as $details): ?>
            <td>
              <?php echo $details->inv_total;?>
            </td>
    <?php endforeach; ?>
    <?php foreach ($paidInvDetailsPaid as $details): ?>
            <td>
              <?php echo $details->amount_paid;?>
            </td>
    <?php endforeach; ?>
    <?php foreach ($paidInvDetailsBal as $details): ?>
            <td>
              <?php echo $details->amount_due;?><br>
            </td>
    <?php endforeach; ?>
    <?php foreach ($paidInvDetails as $details2): ?>
            <td>
              <?php echo $details2->inv_currency;?>
            </td>
          </tr>
    <?php endforeach; ?>
        </tbody>
      </table><br><br>
      <table border="1" style="width: 100%;">
        <thead>
          <th></th>
        </thead>
      </table>    
      <h3>PAYMENT HISTORY</h3>
      <table class="table-responsive" border="1" style="width: 100%;">
        <thead style="background: #D8D7E7;">
          <th>
            DATE/TIME
          </th>
          <th>
            TRANSACTION #
          </th>
          <th>
            AMOUNT PAID
          </th>
          <th>
            RECORDED BY
          </th>
        </thead>
        <tbody>
    <?php foreach ($history as $history):?>
          <tr>
            <td><?php echo date('d-M-Y  H:i ',strtotime($history->recorded_at));?></td>
            <td><?php echo $history->transaction_id;?></td>
            <td><?php echo $history->amount_paid;?></td>
            <td><?php echo $history->staff_fname.' '.$history->staff_sname;?></td>
          </tr>
    <?php endforeach;?>
        </tbody>
      </table>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->