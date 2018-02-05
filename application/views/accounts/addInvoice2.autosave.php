      <!-- main area -->
      <div class="main-content" style="">
        <div class="page-title" style="">
          <div class="pull-left">
              <!-- <button type="button" class="btn btn-info no-print" data-target="#loadTarrif" data-toggle="modal">LOAD CLIENT/SERVICE</button> -->
              <button type="button" class="btn btn-info no-print inv_not_added" data-target="#loadConsignment" data-toggle="modal">LOAD CONSIGNMENT</button>
          </div>
          <div class="inv_added">
            <?php echo form_open('accounts/printInvoice');?>
              <label style="font-size: 20px; background: #DEB887; width: 100%;">New invoice successfully added. Invoice unique ID# <?php echo $new_inv_id;?></label><hr />
              <?php echo form_input('invoice_id',$new_inv_id,'hidden');?>
              <button class="btn btn-info inv_added">VIEW INVOICE</button>
            <?php echo form_close();?> 
          </div>
          <div class="pull-right">
            <?php echo form_open('accounts/addInvoice');?>
              <button class="btn btn-danger no-print dis-abled" name="saveInv">SAVE INVOICE</button>
          </div>
        </div>
        <div class="row m-b" style="">
          <div class="col-xs-12">
            <div class="row dis-abled">
              <!-- INPUT VALUES -->
              <div class="form-group">
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input name="cust_id" required="" value="<?php echo $cons_inv_data[0]->cust_id;?>" hidden="">
                    <input class="input__field cust-col" type="text" placeholder="Enter client here" required="" value="<?php echo $client[0]->client_name.' ('.$cons_inv_data[0]->cust_id.')';?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content" style="color: #77a1e5">Customer</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="invoice_date" placeholder="Enter invoice date here" required="" data-provide="datepicker">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Invoide date</span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="shipment" placeholder="Enter shipment here" required="" value="<?php echo $cons_inv_data[0]->cons_id;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content" style="color: #77a1e5">Shipment/Consignment</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="inv_due_date" placeholder="Enter invoice due date here" required="" data-provide="datepicker">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Due date</span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="service_type" placeholder="Enter Service type here" required="" value="<?php echo $cons_inv_data[0]->cons_trans_type.' '.$cons_inv_data[0]->cons_import_export;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Service type</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="regime" placeholder="Enter consignment regime here" required="" value="<?php echo $cons_inv_data[0]->cons_regime;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Regime</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="urgency" placeholder="Enter consignment urgency here" required="" value="<?php echo $cons_inv_data[0]->cons_urgency;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Urgency</span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label class="control-label"><strong>SHIPMENT DETAILS</strong></label><hr>
                </div>
              </div>
              <!-- shipment details -->
              <div class="form-group">
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="shipper" placeholder="Enter shipper here" required="" value="<?php echo $cons_inv_data[0]->cons_shipper;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Shipper</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="consignee" placeholder="Enter consignee here" required="" value="<?php echo $cons_inv_data[0]->cons_consignee;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Consignee</span>
                    </label>
                  </span>
                </div>
              </div>
              <!-- REFERENCES -->
              <div class="form-group">
                <div class="col-sm-10">
                  <label class="control-label"><strong>REFERENCES</strong></label><hr>
                </div>
              </div>
              <!-- shipment details -->
              <div class="form-group">
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="our_ref" placeholder="Enter Willfreight Ref here" required="">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Our ref</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-5">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="your_ref" placeholder="Enter client Ref here" required="">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Your Ref</span>
                    </label>
                  </span>
                </div>
              </div>
              <!-- goods description -->
              <div class="form-group">
                <div class="col-sm-10">
                  <label class="control-label"><strong>GOODS DESCRIPTION</strong></label><hr>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="goods_desc" placeholder="Enter consignment description here" required="" value="<?php echo $cons_inv_data[0]->cons_desc;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Goods description</span>
                    </label>
                  </span>
                </div>
              </div>
              <!-- FREIGHT DETAILS -->
              <div class="form-group">
                <div class="col-sm-10">
                  <label class="control-label"><strong>FREIGHT DETAILS</strong></label><hr>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="vessel_no" placeholder="Enter Freight no here" value="<?php echo $cons_inv_data[0]->cons_flight_no;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Flight no.</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="mawb" placeholder="Enter Master Airwaybill no here">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">MAWB</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="hawb" placeholder="Enter House Awaybill no here">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">HAWB</span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="origin" placeholder="Enter consignment origin here" required="" value="<?php echo $cons_inv_data[0]->cons_country_of_origin;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Origin</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-2">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="etd" placeholder="Enter ETD here" required="" data-provide="datepicker" value="<?php echo $cons_inv_data[0]->cons_etd;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">ETD</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-3">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="destination" placeholder="Enter consignment destination here" required="">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">Destination</span>
                    </label>
                  </span>
                </div>
                <div class="col-sm-2">
                  <span class="input input--focused m-b-md">
                    <input class="input__field cust-col" type="text" name="eta" placeholder="Enter ETA here" required="" data-provide="datepicker" value="<?php echo $cons_inv_data[0]->cons_eta;?>">
                    <label class="input__label" for="input-2">
                      <span class="input__label-content">ETA</span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10"><hr><label>INVOICE CHARGES</label><hr></div>
              </div>
              <div class="form-group">
                <div class="col-xs-10">
                <table id="oldTable" class="table oldcharges table-responsive">
                  <thead style="background-color:  #ccccff;">
                    <tr>
                      <td class="col-sm-7">Description</td>
                      <td class="col-sm-2">Charges in <select name="currency"><option value="KES">KES</option><option value="" selected="">USD</option></select></td>
                      <td class="col-sm-1"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($charges)){ foreach ($charges as $charges) {?>
                      <tr>
                        <td class="col-sm-7">
                          <input type="text" name="charge_id_1[]" value="<?php echo $charges->service_id;?>" hidden=""><?php echo $charges->service_name;?>
                        </td>
                        <td id="cost" class="col-sm-2">
                          <input type="text" name="charges_amnt_1[]" value="<?php echo $charges->cust_rate;?>">
                        </td>
                        <td class="col-sm-1"></td>
                      </tr>
                    <?php }}?>
                    <?php if(isset($cons_acc_info)){ foreach ($cons_acc_info as $cons_acc_info) {?>
                      <tr>
                        <td class="col-sm-7">
                          <input type="text" name="charge_id_added[]" value="<?php echo $cons_acc_info->service_id;?>" hidden=""><?php echo $cons_acc_info->service_name;?>
                        </td>
                        <td id="cost" class="col-sm-2">
                          <input type="text" name="charges_amnt_added[]" value="<?php echo $cons_acc_info->cons_acc_info_amount;?>" class="form-control" onkeyup="calculateGrandTotal()" onclick="calculateGrandTotal()">
                        </td>
                        <td class="col-sm-1">
                          <input type="button" id="rmvold" class="btn btn-sm btn-danger" value="Remove" />
                        </td>
                      </tr>
                    <?php }} ?>
                    <tr></tr>
                  </tbody>
                </table>
                <table id="newTable" class="table newcharges table-responsive">
                  <tr>
                    <td class="col-sm-7">
                      <select name="charge_id[]" class="form-control" style="width: 100%;">
                        <option selected="" disabled="">Select charge</option>
                        <?php foreach ($allInvCharges as $allInvCharges):?>
                          <option value="<?php echo $allInvCharges->service_id;?>"><?php echo $allInvCharges->service_name;?></option>
                        <?php endforeach;?>
                      </select>
                    </td>                    
                    <td class="col-sm-2">
                      <input type="number" name="charges_amnt[]" onclick="calculateGrandTotal()" onkeyup="calculateGrandTotal()" class="form-control"/>
                    </td>
                    <td class="col-sm-1">
                      <input type="button" id="rmvnew" class="btn btn-sm btn-danger" value="Remove" />
                    </td>
                  </tr>
                </table>
                <table class="table table-responsive">
                  <tfoot>
                    <tr>
                      <td colspan="3">
                        <input type="button" class="btn btn-block col-sm-10" value="Add New Charge" onclick="addRow('newTable')">
                        <!-- id="addrow" -->
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Total charges</strong></td><td></td><td><strong><p id="grandtotal"></p></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
              <!-- SAVE INVOICE -->
              <div class="form-group">
                <div class="col-sm-10"><hr></div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <button class="btn btn-primary no-print dis-abled" name="saveInv" style="width: 100%;">SAVE INVOICE</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row m-b dis-abled">
          <div class="col-xs-10">
            <div class="row">
            <table border="1" class="tab font10" style="margin-bottom: 5px; width: 100%;">
              <thead>
                <tr>
                  <th>TOTAL CHARGES</th>
                </tr>
              </thead>
            </table>
            <table class="tab font10" border="1" style="margin-bottom: 5px;">
              <tbody>
                <tr>
                  <td style="width: 60%; font-size: 14px;">Please contact us within 7 days should there be any discrepancies</td>
                    <td>
                      <table border="1" style="width: 100%; border-top: none; border-right: none; border-bottom: none; border-left: none; font-size: 14px;">
                        <thead style="border-bottom-color: black;">
                          <tr>
                            <th><strong>SUBTOTAL</strong></th>
                            <th><p id="grandtotal1"></p></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>TOTAL KES</strong> </td>
                            <td><strong><p id="grandtotal2"></p></strong></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                </tr>
              </tbody>
            </table>
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
            <?php echo form_open('accounts/addInvoice');?>
              <div class="form-group">
                <input type="text" name="cid" placeholder="Customer id (Enter name to search)" class="form-control col-sb-8" required>
                <select name="serviceType" class="form-control col-sb-4" required="" title="Select if it is an import or export">
                  <option default="" value="">Select service type</option>
                  <option value="import">Import</option>
                  <option value="export">Export</option>
                  <option value="local">Local</option>
                </select>
                <select name="serviceType" title="Choose if it is by sea or air" class="form-control col-sb-4" required>
                  <option default="" value="">Choose transport mode</option>
                  <option value="air">By Air</option>
                  <option value="sea">By Sea</option>
                  <option value="road">By Road</option>
                </select>
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
<!--LOAD CONSIGNMENTS-->
      <div id="loadConsignment" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">BELOW ARE UNINVOICED CONSIGNMENTS READY FOR INVOICING</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive">
                <thead>
                  <th><strong>Consignment</strong></th><th><strong>Client</strong></th>
                </thead>
                <tbody>
                <?php foreach ($cons_data as $cons_data):?>
                  <tr>
                  <?php echo form_open('accounts/addInvoice');?>
                    <td>
                      <?php echo form_input('cons_id',$cons_data->cons_id,'hidden');?>
                      <button style="background: white; border: none;"><?php echo $cons_data->cons_desc;?></button>
                    </td>
                    <td><?php echo $cons_data->client_name;?></td>
                  <?php echo form_close();?>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<!--/LOAD CONSIGNMENTS-->
      <!-- /main area -->
    <!-- </div> -->
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
         border-bottom-width: 1px;
      }
      td, th{
        min-width: 75px;
      }
      .txt-rt{
        text-align: right;
      }
      .font10{
        font-size: 8px;
      }
    </style>

        <!--FOR DISABLING INVOICE ENTRY PANE-->
    <?php if(isset($cons_inv_data[0]->cons_id)):?>
      <style type="text/css">
        .inv_added{
          display: none;
        }
      </style>
    <?php elseif(isset($new_inv_id)):?>
      <style type="text/css">
        .dis-abled,.inv_not_added{
          display: none;
        }
      </style>
    <?php else:?>
      <style type="text/css">
        .dis-abled, .inv_added{
          display: none;
        }
      </style>
    <?php endif;?>
    <!--END OF DISABLING-->

    <!-- DYNAMICALLY ADD ROWS -->
    <script type="text/javascript">
      // ADD ROW
      function addRow(tableID){
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        for(var i=0; i<colCount; i++) {
          var newcell = row.insertCell(i);
          newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        }
      }
      // REMOVE ROW
      jQuery.noConflict()(function ($) {
        jQuery(document).ready(function($){
          $("table.oldcharges").on("click", "#rmvold", function (event) {
            var rowCount = document.getElementById('oldTable').rows.length;
            if(rowCount <= 1) {
              alert("Cannot delete all the rows.");
            }
            if(rowCount>=2){
              $(this).closest("tr").remove();       
              counter -= 1
            }        
          });
          $("table.newcharges").on("click", "#rmvnew", function (event) {
            var rowCount = document.getElementById('newTable').rows.length;
            if(rowCount <= 1) {
              alert("Cannot delete all the rows.");
            }
            if(rowCount>=2){
              $(this).closest("tr").remove();       
              counter -= 1
            }        
          });
        });
      });
    function calculateGrandTotal(){
      var grandTotal = 0;
      $("table.newcharges").find('input[name="charges_amnt[]"]').each(function () {
        grandTotal += +$(this).val();
      });
      var a=calculateGrandTotalAdded()+grandTotal;
      $("#grandtotal").text(a.toFixed(2));
      $("#grandtotal1").text(a.toFixed(2));
      $("#grandtotal2").text(a.toFixed(2));
      return a;
    }
    function calculateGrandTotalAdded(){
      var grandTotal2 = 0;
      $("table.oldcharges").find('input[name="charges_amnt_added[]"]').each(function () {
        grandTotal2 += +$(this).val();
      });
      return grandTotal2;
    }
    function getVat(){
      var vat=calculateGrandTotal()*0.16;
      $("grandtotal3").text(vat.toFixed(2));
      return vat;
    }
    </script>