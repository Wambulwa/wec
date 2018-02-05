      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Receive payment</div>
          <div class="sub-title">All invoice payments are recorded here</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            <!-- Datatables -->
          </div>
          <div class="card-block">
        <?php foreach ($allData as $allDat): ?>
          <table class="table-responsive" style="width: 100%;" border="1">
            <tbody style="font-size: 20px; font-weight: bolder; color: inherit;">
            <tr>
              <td>INVOICE # <?php echo $allDat->invoice_id;?></td>
              <td>CLIENT <?php echo $allDat->cust_id;?></td>
              <td>CURRENCY <?php echo $allDat->inv_currency;?></td>
            </tr>              
            </tbody>            
          </table>
        <?php if(($allDat->amount_dues<$allDat->amounts)&&($allDat->amount_dues>0)){?>
      <!--VIEW PAYMENT HISTORY MESSAGE-->
        <?php echo form_open('accounts/paidInvDetails');?>
          <input type="text" name="inv_id" value="<?php echo $allDat->invoice_id;?>" hidden="">
          <h5 style="color: red;">This invoice has some payments recorded.</h5>
          <button class="btn btn-danger btn-sm" style="margin-left: 1%; margin-top: 0%;">VIEW PAYMENT HISTORY</button>
        <?php echo form_close();?>
        <?php }
        if($allDat->amount_dues<=0){?>
        <!--VIEW PAYMENT HISTORY MESSAGE-->
        <?php echo form_open('accounts/paidInvDetails');?>
          <input type="text" name="inv_id" value="<?php echo $allDat->invoice_id;?>" hidden="">
          <h5 style="color: red;">This invoice is fully paid.</h5>
          <style type="text/css">
            .dis-abled{
              display: none;
            }
          </style>
          <button class="btn btn-danger btn-sm" style="margin-left: 1%; margin-top: 0%;">VIEW PAYMENT HISTORY</button>
        <?php echo form_close();?>
        <?php }?>
          <br><br>
          <table class="table-responsive" style="width: 100%;" border="1">
            <tbody style="font-size: 18px; font-weight: bold;">
                <tr>
                  <td>AMOUNT INVOICED <?php echo $allDat->amounts.'/='; ?></td>
                  <td></td>
                  <td>AMOUNT DUE <?php echo $allDat->amount_dues.'/=';?></td>
                </tr>
            </tbody>
          </table><br>
          <table class="table-responsive" style="width: 100%;" border="1">
            <tbody>
                <tr>
                  <td>This invoice was created on <strong><?php echo date('d-M-Y', strtotime($allDat->created_at)); ?> </strong> and is due on <strong><?php echo date('d-M-Y', strtotime($allDat->inv_due_date)); ?></strong></td>
                </tr>
            </tbody>
          </table>      
          <br>
          <table style="width: 100%; border-style: dashed;" border="1">
            <thead>
              <th></th>
            </thead>
          </table>
          <br>
          <?php echo form_open('accounts/invoicePayment');?>
          <h4 class="dis-abled">RECEIVE PAYMENT</h4>
          <table style="width: 100%;" class="dis-abled">
            <thead>
              <th>Amount paid</th>
              <th>Date paid</th>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="number" name="inv_id" value="<?php echo $allDat->invoice_id;?>" hidden="">
                  <input type="number" name="inv_payment" class="form-control" placeholder="Enter amount paid..." required="">
                </td>
                <td><input type="date" name="date_paid" placeholder="Date paid" required="" class="form-control" required=""></td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-primary dis-abled" style="margin-left: 1%; margin-top: 2%;">SUBMIT</button>
          <?php echo form_close();?>
        <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->