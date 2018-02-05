      <!-- main area -->
      <div class="main-content" style="margin-top: -15px;">
        <div class="page-title" style="">
          <div class="pull-right">
            <button class="btn btn-danger no-print btn-sm" onclick="window.print();">
              <i class="icon-printer m-r"></i>Print
            </button>
            <!-- <button type="button" class="btn btn-info no-print">Export to PDF</button> -->
          </div>
          <div class="title" style="margin-top: 0px;"><img src="<?php echo base_url('images/wec/weclogo.png');?>" width="400px;" height="40px;"></div>
          <div class="sub-title" style="font-size: 8px;">Wilson Airport<strong>. </strong>P.O Box 47578, 00100 G.P.O Nairobi-Kenya<strong>. </strong>+254206002841/2<strong>. </strong>info@willfreight.co.ke<strong>. </strong>www.willfreight.com</div>
        </div>
        <div class="row m-b" style="margin-top: 0px;">
          <div class="col-xs-12">
            <div class="row">
              <table style="width: 100%; text-align: left; margin-bottom: 5px; height: 10px; " class="tab" border="1">
                <thead>
                <tr>
                  <th ><p style="font-size: 20px;">INVOICE #<?php echo $invoice_id;?></p></th>
                  <th><p style="text-align: center;">Page 1 of 1</p></th>
                </tr>
                </thead>
              </table>
   <!--INVOICE NO. COLUMN-->
              <table class="tab" style="width: 100%; margin-bottom: 5px;">
                <thead>
                <tr>
                  <!-- <th></th>
                  <th></th> -->
                </tr>                  
                </thead>
                <tbody>
                  <tr>
      <?php foreach ($invoices as $topright): ?>
              
            
                    <td><p style="padding-left: 40px; font-size: 10px;">WILLFREIGHT EXPRESS CARGO SERVICES<br>ATTN: THE ACCOUNTS PAYABLE MANAGER<br>AVIATION CARGO CENTER<br>WILSON AIRPORT<br>NAIROBI 00100<br>KENYA</p></td>
                    <td style="font-size: 8px;">
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>INVOICE DATE</strong></th><th style=""><input type="text" name="" class="bord" value="<?php echo date('d-M-Y',strtotime($topright->inv_date));?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>CUSTOMER ID</strong></th><th><input type="text" name="" class="bord" value="<?php echo $topright->cust_id;?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>SHIPMENT</strong></th><th><input type="text" name="" class="bord" value="<?php echo $topright->shipment;?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>TERMS</strong></th><th><input type="text" name="inv_due_date" class="bord" value="<?php echo $topright->termss.' days from invoice date';?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>SERVICE TYPE</strong></th><th><input type="text" name="" class="bord" value="<?php echo $topright->service_type;?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>REGIME</strong></th><th><input type="text" name="" class="bord" value="<?php echo $topright->regime;?>" readonly></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab font10">
                        <thead>
                          <tr><th class="txt-rt"><strong>URGENCY</strong></th><th><input type="text" name="" class="bord" value="<?php echo $topright->urgency;?>" readonly></th></tr>
                        </thead>
                      </table>
                    </td>
      <?php endforeach ?>
      <?php foreach ($invoices as $middle):?>
              </tr>
                </tbody>
              </table>
  <!--/INVOICE NO. COLUMN-->
  <!--SALUTATION NO. COLUMN-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px; " class="tab font10" border="1">
                <tbody>
                  <tr>
                    <td style="border-right: none; font-size: 12px;"><strong>SHIPMENT DETAILS</strong> </td>
                    <td style="text-align: right; margin-right: 100px; font-weight: bold; border-left: none;">PRINTED BY:<input type="text" name="" class="bord" value="<?php echo $this->staff_fname.' '.$this->staff_lname;?>" style="width: 50%; margin-left: 5px;" readonly></td>
                  </tr>
                </tbody>
              </table>
  <!--/SALUTATION NO. COLUMN-->
  <!--SHIPMENT DETAILS COLUMN-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px;" class="tab font10" border="1">
                <thead>
                  <tr>
                    <th>SHIPPER</th>
                    <th>CONSIGNEE</th>
                  </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="" class="bord font10" value="<?php echo $middle->shipper;?>" readonly></td>
                    <td><input type="text" name="" class="bord font10" value="<?php echo $middle->consignee;?>" readonly></td>
                  </tr>
                </tbody>
              </table>
  <!--/SHIPMENT DETAILS COLUMN-->
  <!--OUR REF COLUMN-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px;" class="tab font10" border="1">
                <thead>
                <tr>
                  <th>YOUR REF</th>
                  <th>OUR REF</th>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->your_ref;?>" readonly></td>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->our_ref;?>" readonly></td>
                  </tr>
                </tbody>
              </table>
  <!--/OUR REF COLUMN-->
  <!--CHARGES COLUMN-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px;" class="tab font10" border="1">
                <thead style="border-bottom: none;">
                <tr>
                  <th>GOODS DESCRIPTION</th>
                  <th></th>
                </tr>                  
                </thead>
                <tbody style="border-top: none;">
                  <tr>
                    <td><input type="text" name="" class="bord"  value="<?php echo $middle->goods_desc;?>" readonly></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
  <!--/CHARGES COLUMN-->
  <!--MAWB/HAWB-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px;" class="tab font10" border="1">
                <thead style="border-bottom: none;">
                <tr>
                  <th>VESSEL/VOYAGE NO.</th>
                  <th>MAWB</th>
                  <th>HAWB</th>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->vessel_no;?>" readonly></td>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->mawb;?>" readonly></td>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->hawb;?>" readonly></td>
                  </tr>
                </tbody>
              </table>
  <!--/MAWB-->
  <!--MAWB/HAWB-->
              <table style="width: 100%; text-align: left; margin-bottom: 5px;" class="tab font10" border="1">
                <thead style="border-bottom: none;">
                <tr>
                  <th>ORIGIN</th>
                  <th>ETD</th>
                  <th style="border-left-width: 1px; border-left-color: black;">DESTINATION</th>
                  <th>ETA</th>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="" class="bord" value="<?php echo $middle->origin;?>" readonly></td>
                    <td><input type="text" name="" class="bord" value="<?php echo date('d-M-Y',strtotime($middle->etd));?>" readonly></td>
                    <td style="border-left-width: 1px; border-left-color: black;"><input type="text" name="" class="bord" value="<?php echo $middle->destination;?>" readonly></td>
                    <td><input type="text" name="" class="bord" value="<?php echo date('d-M-Y',strtotime($middle->eta));?>" readonly></td>
                  </tr>
                </tbody>
              </table>

    
  <!--/MAWB-->
  <!--MAWB/HAWB-->
              <table style="width: 100%; text-align: left;" class="tab font10" border="1">
                <tbody>
                  <tr>
                    <td style="font-size: 12px;"><strong>CHARGES</strong></td>
                  </tr>
                </tbody>
              </table>
  <!--/MAWB-->
            </div>
          </div>
        </div>
<!--billing section-->
        <div class="row m-b">
          <div class="col-xs-12">
            <div class="row">
            <table border="1" class="tab font10" style="margin-top: -10px;">
              <thead>
                <tr>
                  <th style="border-right: none;">DESCRIPTION</th>
                  <th style="text-align: right; border-left: none;">CHARGES IN <?php echo $middle->inv_currency;?></th>
                </tr>
              </thead>
            </table>
        <?php endforeach ?>
            <table style="width: 100%; font-size: 10px; min-height: 100px;">
              <tbody>
              <?php foreach ($invCharge as $charges):?>
                  <tr>
                    <td><?php echo $charges->charge; ?></td>
                    <td id="cost" style="text-align: right;"><?php echo $charges->amount;?></td>
                  </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
<!--/billing section-->
        <div class="row m-b">
          <div class="col-xs-12">
            <div class="row">
            <table border="1" class="tab font10" style="margin-bottom: 5px;">
              <thead>
                <tr>
                  <th>TOTAL CHARGES</th>
                </tr>
              </thead>
            </table>
      <?php foreach ($totals as $total):?> 
            <table class="tab font10" border="1" style="margin-bottom: 5px;">
              <tbody>
                <tr>
                  <td style="width: 60%; font-size: 8px;">Please contact us within 7 days should there be any discrepancies</td>
                    <td>
                      <table border="1" style="width: 100%; border-top: none; border-right: none; border-bottom: none; border-left: none;" class="font10">
                        <thead style="border-bottom-color: black;">
                          <tr>
                            <th><strong>SUBTOTAL</strong></th>
                            <th><input type="text" name="" class="bord" value="<?php echo $total->total;?>" style="text-align: right;" readonly></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>TOTAL USD</strong> </td>
                            <td><input type="text" name="" class="bord" value="<?php echo $total->total;?>" style="text-align: right;" readonly></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                </tr>
              </tbody>
            </table>
    <?php endforeach; ?>
            <table class="tab font10" style="margin-bottom: 0px;">
              <thead>
                <tr>
                  <th><strong>INVOICED</strong><input type="text" name="" class="bord" value="<?php echo $total->total;?>" style="width: 70%; text-align: right;" readonly></th>
    <?php foreach ($bal_due as $bal_due):?>
                  <th><strong>BALANCE DUE</strong><input type="text" name="" value="<?php echo $bal_due->bal_due;?>" class="bord" style="width: 70%; text-align: right;" readonly></th>
    <?php endforeach;?>
    <?php foreach ($invoices as $dates):?>
                  <th><strong>DUE DATE</strong><input type="text" name="inv_due_date" class="bord" value="<?php echo date('d-M-Y',strtotime($dates->inv_due_date));?>" style="width: 70%; margin-left: 10px;" readonly></th>
    <?php endforeach; ?>              
                </tr>
              </thead><!-- 
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody> -->
            </table>
            </div>
          </div>
        </div>
<!--TRANSFER FUNDS TO COLUMN-->
        <div class="row m-b">
          <div class="col-xs-12">
            <div class="row">
            <table style="width: 100%;" class="tab font10">
              <tbody>
                <tr>
                  <td style="width: 50%; padding-top: 7px;">
                    <table class="tab-bottom font10" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th><strong>Transfer funds to</strong></th></tr></thead></table>
                    <table class="tab-bottom font10" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th><strong>NBK</strong><input type="text" name="" class="bord" style="width: 50%;"></th><th><strong>SWIFT</strong><input type="text" name="" class="bord" style="width: 50%;"></th></tr></thead></table>
                    <table class="tab-bottom font10" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th><strong>Account</strong><input type="text" name="" class="bord" style="width: 65%;"></th></tr></thead></table>
                    <table class="tab-bottom font10" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th>WILLFREIGHT: 012512478<br>NATIONAL BANK, NAIROBI KENYA</th></tr></thead></table>
                    <table class="tab-bottom font10" border="1" style="width: 100%; margin-bottom: 5px;"><tbody><tr><td>Pay Ref: CUSTOMERID WEC12547854</td></tr></tbody></table>
                  </td>
                  <td style="width: 50%;">
                    <table border="1" style="width: 100%; margin-left: 3px;" class="tab-bottom font10">
                      <thead><tr><td style="padding-bottom: 37px; padding-top: 5px; padding-left: 2%;"><strong>Address:<br></strong>Willfreight Express Cargo<br>Wilson Airport<br>Lang'ata Road<br>Nairobi - Kenya</td></tr></thead>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
<!--/TRANSFER FUNDS TO COLUMN-->        
        <!-- <div class="card card-block bg-default shadow"> -->
       <!--  <table>
          <tbody>
            <tr>
              <td style="width: 40%; margin-right: 5px;">
                <p class="bold small" style="padding-bottom: 20px;">For & on behalf of Willfreight Express Cargo Services</p>
                <small><p>
                Sign:..........................................................................<br></p>
                </small>
              </td>
              <td>
                <p class="bold small">PAYMENT TERMS AND POLICIES</p>
                <small style="font-size: 8px;">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed
                  quoted fee noted above. If the Invoice remails unpaid. our dept recovery agency, Urban, may charge you a fee of 25% of the unpaid portion of the
                  invoice amount and other legal and collection costs not covered by the fee. </small>
              </td>
            </tr>
          </tbody>
        </table> -->
          <!-- <p class="bold small" style="padding-bottom: 15px";>For & on behalf of Willfreight Express Cargo Services</p>
          <small>
          <p style="padding-bottom: 12px;">
          Name:........................................................................<br></p>
          <p style="padding-bottom: 12px;">
          Sign:..........................................................................<br></p>
          <p style="padding-bottom: 12px;">
          Date:..........................................................................</p>
          </small> -->
        <!-- </div> -->
        <!-- <div class="card card-block bg-default shadow">
          <p class="bold small">PAYMENT TERMS AND POLICIES</p>
          <small style="font-size: 8px;">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed
            quoted fee noted above. If the Invoice remails unpaid. our dept recovery agency, Urban, may charge you a fee of 25% of the unpaid portion of the
            invoice amount and other legal and collection costs not covered by the fee. </small>
        </div> -->
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <style type="text/css">
      .hh{
        padding-right: 25px;
      }
      .bord
      {
        border-collapse: collapse;
        align-content: left;
        width: 100%;
        border:none;
        padding-left: 2px;
      }
      /*border="0" cellpadding="0" cellspacing="0"* copy this to table tag*/
      .tab{
         width: 100%; 
         text-align: left;
         border-color: black;
         border-bottom-width: 1px;
         border-top-width: 1px;
         border-right-width: 1px;
         border-left-width: 1px;
      }
      .tab-bottom{
         /*width: 100%; */
         text-align: left;
         border-color: black;
         border-bottom-width: 1px;
         border-top-width: 1px;
         border-right-width: 1px;
         border-left-width: 1px;
      }
      td, th{
        /*border-left-width: 0px;*/
        /*border-right-width: 0px;*/
        /*border-top-width: 0px;*/
        min-width: 75px;
      }
      .txt-rt{
        text-align: right;
      }
      .font10{
        font-size: 10px;
      }
    </style>