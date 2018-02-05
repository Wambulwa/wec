      <!-- main area -->
      <div class="main-content" style="">
        <div class="page-title" style="">
        <div class="pull-left">
            <button type="button" class="btn btn-info no-print" data-target="#loadTarrif" data-toggle="modal">LOAD CLIENT/SERVICE</button>
          </div>
          <div class="pull-right">
          <?php echo form_open('sales/addInvoice');?>
            <!-- <button type="button" class="btn btn-danger no-print" onclick="window.print();">
              <i class="icon-printer m-r"></i>Print
            </button> -->
            <button class="btn btn-danger no-print" name="saveInv">SAVE INVOICE</button>
            <!-- <button type="button" class="btn btn-info no-print">Export to PDF</button> -->
          </div>
        </div>
        <div class="row m-b" style="margin-top: 0px;">
          <div class="col-xs-12">
          <?php if(isset($cid)):else:?>
          <style type="text/css">
            .dis-abled{display: none;}
          </style>
           <?php endif;?>
            <div class="row dis-abled">            
              <table style="width: 100%; text-align: left; margin-bottom: 5px; height: 10px;" border="1" class="tab">
                <thead>
                <tr>
                  <th ><p style="font-size: 20px;">INVOICE # <input type="text" name="invoice_id" placeholder="Enter or leave blank to generate" class="bord" style="width: 50%; font-size: 14px;"></p></th>
                  <th><p style="text-align: center;">Page 1 of 1<input type="text" name="staff_id" value="<?php echo $this->staff_wec_emp_no;?>" hidden=""></p></th>
                </tr>                  
                </thead>
              </table>
   <!--INVOICE NO. COLUMN-->
              <table class="tab" style="width: 100%; margin-bottom: 5px;">
                <thead>
                <tr>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><p style="padding-left: 40px; font-size: 10px;">WILLFREIGHT EXPRESS CARGO SERVICES<br>ATTN: THE sales PAYABLE MANAGER<br>AVIATION CARGO CENTER<br>WILSON AIRPORT<br>NAIROBI 00100<br>KENYA</p></td>
                    <td style="font-size: 8px;">
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>INVOICE DATE</strong></th><th><input type="date" name="invoice_date" class="bord"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>CUSTOMER ID</strong></th><th><input type="text" name="cust_id" class="bord" value="<?php if(isset($cid)){ echo $cid;}?>"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>SHIPMENT</strong></th><th><input type="text" name="shipment" class="bord"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>DUE DATE</strong></th><th><input type="date" name="inv_due_date" class="bord"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>SERVICE TYPE</strong></th><th><input type="text" name="service_type" class="bord" value="<?php if(isset($serviceType)){ echo $serviceType;}?>"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>REGIME</strong></th><th><input type="text" name="regime" class="bord"></th></tr>
                        </thead>
                      </table>
                      <table style="margin-top: 5px;" border="1" class="tab">
                        <thead>
                          <tr><th class="txt-rt"><strong>URGENCY</strong></th><th><input type="text" name="urgency" class="bord"></th></tr>
                        </thead>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
  <!--/INVOICE NO. COLUMN-->
  <!--SALUTATION NO. COLUMN-->
              <table style="width: 100%; text-align: left; border-top-width: 1px; margin-bottom: 5px; " class="tab font10" border="1">
                <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td style="border-right: none;"><strong>SHIPMENT DETAILS</strong> </td>
                    <td style="text-align: right; margin-right: 100px; font-weight: bold; border-left: none;">PRINTED BY:<input type="text" name="" class="bord" style="width: 50%;"></td>
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
                    <td><input type="text" name="shipper" class="bord"></td>
                    <td><input type="text" name="consignee" class="bord"></td>
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
                    <td><input type="text" name="your_ref" class="bord"></td>
                    <td><input type="text" name="our_ref" class="bord"></td>
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
                    <td><input type="text" name="goods_desc" class="bord"></td>
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
                    <td><input type="text" name="vessel_no" class="bord"></td>
                    <td><input type="text" name="mawb" class="bord"></td>
                    <td><input type="text" name="hawb" class="bord"></td>
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
                  <th style="border-left-width: 2px;">DESTINATION</th>
                  <th>ETA</th>
                </tr>                  
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="origin" class="bord"></td>
                    <td><input type="date" name="etd" class="bord"></td>
                    <td style="border-left-width: 2px;"><input type="text" name="destination" class="bord"></td>
                    <td><input type="date" name="eta" class="bord"></td>
                  </tr>
                </tbody>
              </table>
  <!--/MAWB-->
  <!--MAWB/HAWB-->
              <table style="width: 100%; text-align: left;" class="tab font10" border="1">
                <tbody>
                  <tr>
                    <td><strong>CHARGES</strong></td>
                  </tr>
                </tbody>
              </table>
  <!--/MAWB-->
            </div>
          </div>
        </div>
<!--billing section-->
        <div class="row m-b dis-abled">
          <div class="col-xs-12">
            <div class="row">
            <table border="1" class="tab font10" style="margin-top: -10px;">
              <thead>
                <tr>
                  <th style="border-right: none;">DESCRIPTION</th>
                  <th style="text-align: right; border-left: none;">CHARGES IN <?php if(isset($currency)){ foreach ($currency as $currency){ echo $currency->currency;?><input type="text" name="currency" value="<?php echo $currency->currency;?>" hidden=""><?php }}?></th>
                </tr>
              </thead>
            </table>
            <table style="width: 100%; font-size: 10px;">
              <tbody>                
                <?php if(isset($charges)){ foreach ($charges as $charges) {?>
                  <tr>
                    <td><input type="text" name="charge_id[]" value="<?php echo $charges->service_id;?>" hidden=""><?php echo $charges->service_name;?></td>
                    <td id="cost" style="text-align: right;"><input type="text" name="charges_amnt[]" value="<?php echo $charges->cust_rate;?>" style="border:none; text-align: right;"></td>
                  </tr>
                <?php }}?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
<!--/billing section-->
        <div class="row m-b dis-abled">
          <div class="col-xs-12">
            <div class="row">
            <table border="1" class="tab font10" style="margin-bottom: 5px;">
              <thead>
                <tr>
                  <th>TOTAL CHARGES</th>
                </tr>
              </thead>
            </table>
            <table class="tab font10" border="1" style="margin-bottom: 5px;">
              <tbody>
                <tr>
                  <td style="width: 60%; font-size: 8px;">Please contact us within 7 days should there be any discrepancies</td>
                    <td>
                      <table border="1" style="width: 100%; border-top: none; border-right: none; border-bottom: none; border-left: none;">
                        <thead style="border-bottom-color: black;">
                          <tr>
                            <th><strong>SUBTOTAL</strong></th>
                            <th><input type="text" name="" class="bord" value="1619.97" style="text-align: right;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>TOTAL USD</strong> </td>
                            <td><input type="text" name="" class="bord" value="1619.97" style="text-align: right;"></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                </tr>
              </tbody>
            </table>
            <!-- <table class="tab font10" style="margin-bottom: 0px;">
              <thead>
                <tr>
                  <th><strong>INVOICED</strong><input type="text" name="" class="bord" style="width: 70%;"></th>
                  <th><strong>BALANCE DUE</strong><input type="text" name="" class="bord" style="width: 70%;"></th>
                  <th><strong>DUE DATE</strong><input type="text" name="inv_due_date" class="bord" style="width: 70%;"></th>
                </tr>
              </thead>
            </table> -->
            </div>
          </div>
        </div>
        <?php echo form_close();?>
      </div>
<!--LOAD CLIENT MODAL-->
      <div id="loadTarrif" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">LOAD CLIENT TARIFF AND SERVICE TYPE</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open('sales/addInvoice');?>
              <div class="form-group">
                <input type="text" name="cid" placeholder="Customer id (Enter name to search)" class="form-control col-sb-8">
                <input type="text" name="serviceType" placeholder="Service type" class="form-control col-xs-8">
              </div>
              <div class="form-group" style="padding-left: 80%; padding-top: 5%;">                
                <button class="btn btn-primary">Load</button>
              </div>
            <?php echo form_close();?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<!--/LOAD CLIENT MODAL-->
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
      }
      /*border="0" cellpadding="0" cellspacing="0"* copy this to table tag*/
      .tab{
         width: 100%; 
         text-align: left; 
         /*border-top: none; */
         /*border-right: none; */
         /*border-left: none;*/
         border-bottom-width: 1px;
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
        font-size: 8px;
      }
    </style>
    <!-- <div style="color:lightgrey; font-size:120px; transform:rotate(300deg); -webkit-transform:rotate(300deg);opacity: 0.2;">WILLFREIGHT</div> -->