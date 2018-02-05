      <!-- main area -->
      <div class="main-content">
        <div class="page-title dis_abled">
         <div class="pull-left">
            <button class="btn btn-primary btn-sm" type="button" data-target="#viewConsData" data-toggle="modal">VIEW CONSIGNMENT DATA</button>
            <button type="button" class="btn btn-danger no-print btn-sm" data-target="#addNotes" data-toggle="modal">ADD CASE HISTORY</button>
            <button type="button" class="btn btn-primary no-print btn-sm" data-target="#viewNotes" data-toggle="modal">VIEW CASE HISTORY</button>
         </div>
         <div class="pull-right">
            <button type="button" class="btn btn-primary no-print btn-sm" data-target="#addAccInfo" data-toggle="modal">ADD ACCOUNTING INFO</button>
            <button type="button" class="btn btn-danger no-print btn-sm" data-target="#viewAccInfo" data-toggle="modal">VIEW ACCOINTING INFO</button>
         </div>
        </div>

        <!--AFTER SEND TO ACCOUNTS-->
          <div class="sub-title">
            <?php if(isset($send_to_accounts)):?>
              <style type="text/css">
                .dis_abled{
                  display: none;
                }
              </style>
            <h1 style="text-align: center;">CONSIGNMENT #<?php echo $send_to_accounts;?> SENT TO ACCOUNTS FOR INVOICING<hr /><a href="<?php echo base_url('cs/manageConsignment');?>"><button class="btn btn-primary btn-lg">GO BACK TO CONSIGNMENT LIST</button></a></h1>
            <?php endif;?>
            <?php if(count($accInfo[0]->amount)<1||count($cons_notes[0]->cons_notes)<1):?>
              <style type="text/css">
                .invoice_not_sent{
                  display: none;
                }
              </style>
            <?php endif;?>
          </div>
      <!--//AFTER SEND TO ACCOUNTS-->

        <div class="row m-b dis_abled">

          <?php if(isset($track_cons_data)){
          $cons_id=$track_cons_data[0]->cons_id; } ?>
          <div class="col-xs-12">
            <div class="row">  
        <!-- <div class="card-block"> -->
                <table class="table table-responsive" style="display: none;">
                    <thead>
                    <th><?php //foreach ($track_cons_data as $track_cons_data){
                     //echo $track_cons_data->cons_id;       } ?></th><th>#2</th>
                    </thead>
                </table>
              <div class="form-group">
                <h1 style="background-color: beige; text-align: center; margin-left: 10%; margin-right: 10%; margin-top: 10%; text-transform: uppercase;"><?php echo "Managing accounting and case history for consignment #".$cons_id;?></h1>
              </div>
        <!--SEND TO ACCOUNTS FOR INVOICING-->
              <div class="form-group invoice_not_sent">
                <?php echo form_open('cs/trackConsignment');?>
                <?php echo form_input('send_to_accounts',$cons_id,'hidden');?>
                <button style="text-align: center; margin-left: 20%; margin-right: 10%; margin-top: 10%; text-transform: uppercase;" class="btn btn-primary">CLOSE CONSIGNMENT#<?php echo $cons_id;?> AND SEND TO ACCOUNTS FOR INVOICING</button>
                <?php echo form_close();?>
              </div>                
        <!--END OF SEND CONS TO ACCOUNTS-->
        <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <!-- Modal -->
<!--ADD NOTES/REMARKS-->
<div id="addNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD CONSIGNMENT NOTES AND REMARKS</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('cs/trackConsignment');?>
        <div class="form-group">
          <label class="label-control">Add notes & remarks below</label>
        </div>
        <div class="form-group">
          <textarea class="summernote" name="cons_notes"></textarea>
          <input type="text" name="cons_id" value="<?php echo $cons_id;?>" style="display: none;">
        </div>
        <div class="form-group">
          <button class="btn btn-danger">Finish</button>
        </div>
      <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/ADD NOTES/REMARKS-->


<!--ADD ACCOUNTING INFO-->
<div id="addAccInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD ACCOUNTING INFO</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('cs/trackConsignment');?>
        <style type="text/css">
            form{
                margin: 20px 0;
            }
            form input, button{
                padding: 5px;
            }
            table{
                width: 100%;
                margin-bottom: 20px;
            border-collapse: collapse;
            }
            table, th, td{
                border: 1px solid #cdcdcd;
            }
            table th, table td{
                padding: 10px;
                text-align: left;
            }
          </style>
          <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function(){
                $(".add-row").click(function(){
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var markup = "<tr><td class='abc'><input type='checkbox' name='record'></td><td><input type='text' value='" + name + "' name='charge_id[]'></td><td><input type='text' value='" + email + "' name='charges_amnt[]'></td></tr>";
                    $("table tbody").append(markup);
                });
                
                // Find and remove selected table rows
                $(".delete-row").click(function(){
                    $("table tbody").find('input[name="record"]').each(function(){
                      if($(this).is(":checked")){
                            $(this).parents("tr").remove();
                        }
                    });
                });
            });    
          </script>
        <!-- ADDING ROW -->
          <div class="form-group">
            <select id="name" name="" class="form-control col-xs-4" style="width: 40%;">
              <option selected="" disabled="">Select Acc info</option>
              <?php foreach ($charges as $charges):?>
                <option value="<?php echo $charges->service_id;?>" title="Recommended Ksh.<?php echo $charges->service_min_rate;?> - Ksh.<?php echo $charges->service_max_rate;?>"><?php echo $charges->service_name;?></option>
              <?php endforeach;?>
            </select>
            <input type="number" name="" id="email" placeholder="Amount" class="form-control col-xs-4" style="width: 30%; margin-top: 5px;">
            <input type="text" name="acc_cons_id" value="<?php echo $cons_id;?>" hidden="">
            <input type="button" class="add-row btn-sm btn btn-danger" value="Add Row" style="width: 20%; margin-top: 5px;"><hr>
          </div>
        <!--//END OF ADDING ROW-->
          <table>
            <thead>
              <tr>
                <th>Select</th>
                <th>Accounting info</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <button type="button" class="delete-row button btn-danger btn-sm">Delete Row</button>
<!--//END OF ADD ACCOUNTING INFORMATION-->

        <div class="form-group">
          <button class="btn btn-primary btn-lg" style="margin-left: 40%; width: 20%; ">Finish</button>
        </div>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/ADD ACCOUNTING INFO-->
<!--VIEW ACCOUNTING INFO-->
<div id="viewAccInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">VIEW ACCOUNTING INFO</h4>
      </div>
      <div class="modal-body">
        <table class="table table-responsive bordered">
          <thead><th style="font-weight: bold;">Accountng info</th><th style="font-weight: bold;">Amount</th></thead>
          <tbody>
            <?php $sum=0;?>
            <?php foreach ($accInfo as $accInfo):?>
            <tr>
              <td><?php echo $accInfo->charge;?></td><td><?php echo $accInfo->amount;?></td>
            </tr>
            <?php $sum+=$accInfo->amount; endforeach;?>
            <tr style="font-weight: bold; text-transform: uppercase;"><td>Total charges</td><td><?php echo $sum;?></td></tr>            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/VIEW ACCOUNTING INFO-->
<!--VIEW NOTES/REMARKS-->
<div id="viewNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">VIEW CASE HISTORY FOR CONSIGNMENT #<?php echo $cons_id; ?></h4>
      </div>
      <div class="modal-body">
        <table class="table table-responsive bordered">
          <thead><th>Details</th><th>Notes/Remarks</th></thead>
          <tbody>
          <?php foreach ($cons_notes as $cons_notes) {?>
            <tr>
              <td>Added on <?php echo date('d-M-Y  H:i ',strtotime($cons_notes->added_on));?><br>
               by <?php echo $cons_notes->staff_fname.' '.$cons_notes->staff_sname;?></td>
              <td><?php echo $cons_notes->cons_notes;?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/VIEW NOTES/REMARKS-->
<!--CLIENT LIST-->
<datalist id="clients">
    <?php foreach ($clients as $clients):?>
        <option value="<?php echo $clients->cust_id;?>"><?php echo $clients->client_name;?></option>
    <?php endforeach;?>
</datalist>
<datalist id="shipper">
    <option value="Avmax">8#@Auwuwla242!
</datalist>
<!--CSS-->
<style type="text/css">
  .cust-col{
    border-right: none; 
    border-top: none;
    border-left: none; 
    border-bottom-color: #b3b3ff; 
  }
  .abc{
    width: 10px;
  }
</style>
<!-- consignment info/details -->
<div id="viewConsData" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DETAILS FOR FILE #<?php echo $cons_id; ?></h4>
      </div>
      <div class="modal-body">
        <!--  -->
              <!-- main area -->
      <div class="main-content" style="background: #fff;">
        <div class="page-title">
          <!-- <div class="title ifcons">FILE NUMBER # #<?php //echo $cons_id; ?></div> -->
        <div class="ifcons" style="margin-right: 0%;">
          <?php echo form_open_multipart('ops/manageClient','role="form"');?>
            <div class="form-group">
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_cargo_type',$consData[0]->cons_cargo_type.' cargo','class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Cargo type</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_urgency',$consData[0]->cons_urgency,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Urgency</span>
                  </label>
                </span>               
              </div>
              <div class="col-sm-4">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_regime',$consData[0]->cons_regime,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Regime</span>
                  </label>
                </span> 
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_import_export',$consData[0]->cons_import_export,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Is import or export?</span>
                  </label>
                </span>               
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_trans_type',$consData[0]->cons_trans_type,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Mode of transport</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-10">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_entry_number',$consData[0]->cons_entry_number,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Entry number</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-10">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_date_opened',$consData[0]->cons_date_opened,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Date opened</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cust_id',$consData[0]->cust_id,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Client #</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_shipper',$consData[0]->cons_shipper,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Shipper</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-4">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_consignee',$consData[0]->cons_consignee,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Consignee</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-10">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_desc',$consData[0]->cons_desc,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Consignment Description</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_airline',$consData[0]->cons_airline,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Airline name</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_flight_no',$consData[0]->cons_flight_no,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Flight no</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_weight',$consData[0]->cons_weight,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Weight in Kgs</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_pkgs',$consData[0]->cons_no_of_packages,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">No of packages</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_length',$consData[0]->cons_length,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Length in Mtrs</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_width',$consData[0]->cons_width,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Width in Mtrs</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-4">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_height',$consData[0]->cons_height,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Height in Mtrs</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('comm_inv',$consData[0]->cons_comm_inv_no,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Commercial invoice number</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-3">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('comm_inv_date',$consData[0]->cons_comm_inv_date,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Commercial invoice date</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-4">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('comm_inv_value',$consData[0]->cons_comm_inv_value,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Commercial invoice value</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">              
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_etd',$consData[0]->cons_etd,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Consignment ETD</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_eta',$consData[0]->cons_eta,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Consignment ETA</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">              
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_origin_country',$consData[0]->cons_country_of_origin ,'class="cust-col form-control input__field"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Country Origin</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_destination_country',$consData[0]->cons_country_of_destination,'class="cust-col form-control input__field"','list="country"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Country destination</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">              
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_origin_door',$consData[0]->cons_door_of_origin ,'class="cust-col form-control input__field"','list="country"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Origin port</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_destination_door',$consData[0]->cons_door_of_delivery,'class="cust-col form-control input__field"','list="country"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Destination port</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">              
              <div class="col-sm-10">
                <span class="input input--focused m-b-md">
                  <?php echo form_input('cons_category',$consData[0]->cons_category,'class="cust-col form-control input__field"','list="country"');?>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content">Consignment category</span>
                  </label>
                </span>
              </div>
            </div><br><br>
            <div class="form-group">
              <div class="col-sm-10">
                <!-- <button class="btn btn-primary" style="width:100%;">ADD CONSIGNMENT</button> -->
              </div>
            </div><br><br><br><br><br><br><br><br><br>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
        <!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <!-- //consignment details -->