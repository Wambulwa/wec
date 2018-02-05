<!--  SELECTED CONSIGNMENT IS HERE -->
      <div class="main-content">
        <div class="page-title">
          <ol class="breadcrumb no-bg pl0 no-print">
            <li>
              <a href="<?php echo base_url('cs');?>">CS</a>
            </li>
            <li>
              <a href="<?php echo base_url('cs/manageConsignment');?>">Consignments</a>
            </li>
            <li class="active">Dispatch Consignments</li>
          </ol>
          <div class="pull-left set">
            <?php echo form_open('cs/printInvoice','target="_blank"'); echo form_hidden('invoice_id',$invoice_id);?>
            <button class="btn btn-danger no-print btn-sm">
               <i class="icon-printer m-r"></i>Print invoice
            </button>
            <?php echo form_close();?>
         </div>
         <div class="pull-right set">
            <button type="button" class="btn btn-primary no-print btn-sm" data-target="#viewAccInfo" data-toggle="modal">ACCOUNTING INFO</button>
            <button type="button" class="btn btn-danger no-print btn-sm" data-target="#caseHistory" data-toggle="modal">CASE HISTORY</button>
            <button type="button" class="btn btn-primary no-print btn-sm" data-target="#sendInvoice" data-toggle="modal">SEND INVOICE</button>
            <!-- <button type="button" class="btn btn-danger no-print btn-sm" data-target="#markAsDelivered" data-toggle="modal">MARK AS DELIVERED</button> -->
         </div>
        </div><br><br><br>
        <!-- LIST OF CONSIGNMENTS FROM ACCOUNTS-->
        <div class="card bg-white notset">
          <div class="card-block">
            <table class="table table-bordered table-striped datatable editable-datatable responsive bordered">
              <thead style="background: #4b78c1; color: #fff;">
                <tr>
                  <th>Client</th>
                  <th>Invoice#</th>
                  <th>Invoice amount</th>
                  <th>INVOICE DATE</th>
                  <th>Created by</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($consForDispatch)): foreach ($consForDispatch as $consForDispatch):?>
                  <tr>                    
                    <td>
                      <?php echo form_open('cs/dispatchInvoices','target="_blank"');?>
                      <?php echo $consForDispatch->client_name;?>
                      <?php echo form_hidden('cust_id',$consForDispatch->cust_id,'class="form-control"');?>
                    </td>
                    <td>
                      <?php echo $consForDispatch->invoice_id;?>
                      <?php echo form_hidden('invoice_id',$consForDispatch->invoice_id,'class="form-control"');?>
                      <?php echo form_hidden('cons_id',$consForDispatch->cons_id,'class="form-control"');?>
                    </td>
                    <td><?php echo $consForDispatch->inv_currency.' '.$consForDispatch->inv_amount;?></td>
                    <td><?php echo $consForDispatch->inv_date;?></td>
                    <td><?php echo $consForDispatch->staff_fname.' '.$consForDispatch->staff_mname.' '.$consForDispatch->staff_sname;?></td>
                    <td>
                      <?php echo form_submit('submit','Open','class="btn btn-primary btn-sm"') ?>
                      <?php echo form_close();?>
                    </td>                    
                  </tr>
                <?php endforeach;endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- //LIST OF CONSIGNMENTS FROM ACCOUNTS-->
        <!-- MARK INVOICE AS SENT -->
        <div class="card bg-white sendInvoice">
          <div class="card-block">
            <label><h3><?php echo $send_msg;?></h3></label>
          </div>
        </div>
        <!-- //MARK INVOICE AS SENT -->
        <!-- <p>Wizard steps</p> -->
        <div class="card set">
          <div class="card-block p-a-0">
            <div class="box-tab justified m-b-0">
              <ul class="wizard-tabs no-print">
                <li class="active">
                  <a href="#consinfo" data-toggle="tab">Consignment info</a>
                </li>
                <li>
                  <a href="#invoice" data-toggle="tab">Invoice</a>
                </li>
                <li>
                  <a href="#docs" data-toggle="tab">Documents</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active in" id="consinfo">
                  <h3>CONSIGNMENT INFO</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                  <!-- CONS DATA -->
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
                  <!-- //CONS DATA -->
                </div>  
                <div class="tab-pane" id="invoice">
                  <div class="page-title" style="margin-top: 0%;">
                    <div class="pull-right" style="display: none;">
                      <?php echo form_open('cs/printInvoice','target="_blank"');?>
                      <?php echo form_hidden('invoice_id',$invoice_id);?>
                      <!-- <?php //echo form_submit('','Print friendly','class="btn btn-danger no-print btn-sm"');?> -->
                      <button class="btn btn-danger no-print btn-sm">
                        <i class="icon-printer m-r"></i>Print freindly
                      </button>
                      <?php echo form_close();?>
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

                            <td><p style="padding-left: 40px; font-size: 10px;">WILLFREIGHT EXPRESS CARGO SERVICES<br>ATTN: THE ACCOUNTS PAYABLE MANAGER<br>AVIATION CARGO CENTER<br>WILSON AIRPORT<br>NAIROBI 00100<br>KENYA</p></td>
                              <td style="font-size: 8px;">
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>INVOICE DATE</strong></th><th style="">
                                      <?php echo form_input('inv_date',date('d-M-Y',strtotime($invoices[0]->inv_date)),'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>CUSTOMER ID</strong></th><th>
                                      <?php echo form_input('cust_id',$invoices[0]->cust_id,'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>SHIPMENT</strong></th><th>
                                      <?php echo form_input('shipment',$invoices[0]->shipment,'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>TERMS</strong></th><th>
                                      <?php echo form_input('inv_due_date',$invoices[0]->termss.' days from invoice date','class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>SERVICE TYPE</strong></th><th>
                                      <?php echo form_input('',$invoices[0]->service_type,'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>REGIME</strong></th><th>
                                      <?php echo form_input('',$invoices[0]->regime,'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                                <table style="margin-top: 5px;" border="1" class="tab">
                                  <thead>
                                    <tr><th class="txt-rt font10"><strong>URGENCY</strong></th><th>
                                      <?php echo form_input('',$invoices[0]->urgency,'class="bord font10"');?></th></tr>
                                  </thead>
                                </table>
                              </td>
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
                                <table border="1" style="width: 100%; border-top: none; border-right: none; border-bottom: none; border-left: none;">
                                  <thead style="border-bottom-color: black;">
                                    <tr>
                                      <th class="font10"><strong>SUBTOTAL</strong></th>
                                      <th><input type="text" name="" class="bord font10" value="<?php echo $total->total;?>" style="text-align: right;" readonly></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="font10"><strong>TOTAL USD</strong> </td>
                                      <td><input type="text" name="" class="bord font10" value="<?php echo $total->total;?>" style="text-align: right;" readonly></td>
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
                        </thead>
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
                              <table class="tab-bottom" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th class="font10"><strong>Transfer funds to</strong></th></tr></thead></table>
                              <table class="tab-bottom" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th class="font10"><strong>NBK</strong><input type="text" name="" class="bord font10" style="width: 50%;"></th><th class="font10"><strong>SWIFT</strong><input type="text" name="" class="bord font10" style="width: 50%;"></th></tr></thead></table>
                              <table class="tab-bottom" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th class="font10"><strong>Account</strong><input type="text" name="" class="bord font10" style="width: 65%;"></th></tr></thead></table>
                              <table class="tab-bottom" border="1" style="width: 100%; margin-bottom: 5px;"><thead><tr><th class="font10">WILLFREIGHT: 012512478<br>NATIONAL BANK, NAIROBI KENYA</th></tr></thead></table>
                              <table class="tab-bottom" border="1" style="width: 100%; margin-bottom: 5px;"><tbody><tr><td class="font10">Pay Ref: CUSTOMERID WEC12547854</td></tr></tbody></table>
                            </td>
                            <td style="width: 50%;">
                              <table border="1" style="width: 100%; margin-left: 3px;" class="tab-bottom">
                                <thead><tr><td style="padding-bottom: 37px; padding-top: 5px; padding-left: 2%;" class="font10"><strong>Address:<br></strong>Willfreight Express Cargo<br>Wilson Airport<br>Lang'ata Road<br>Nairobi - Kenya</td></tr></thead>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
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
                  padding-left: 2px;
                }
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
                   text-align: left;
                   border-color: black;
                   border-bottom-width: 1px;
                   border-top-width: 1px;
                   border-right-width: 1px;
                   border-left-width: 1px;
                }
                td, th{
                  min-width: 75px;
                }
                .txt-rt{
                  text-align: right;
                }
                .font10{
                  font-size: 10px;
                }
                .font12{
                  font-size: 12px;
                }
              </style>
<!-- INVOICE END -->
                </div>
                <div class="tab-pane" id="docs">
                  <h3>CONSIGNMENT DOCUMENTS</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                  <h5>AIRWAY BILLS</h5>
                  <table class="table table-responsive table-hover table-condensed">
                    <thead>
                      <th>DOC TYPE</th><th>AWB NO</th><th>Document</th>
                    </thead>
                    <tbody>
                      <?php foreach ($freightDocs as $freightDocs):?>
                      <tr>
                        <td><?php echo $freightDocs->bill_of_landing_type;?></td>
                        <td><?php echo $freightDocs->bill_of_landing_no; ?></td>
                        <td><a href="<?php echo base_url('/uploads/'.$freightDocs->doc_name);?>" target="_blank">View</a></td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
<!-- ACCOUNTING INFO -->
    <div id="viewAccInfo" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ACCOUNTING INFO ATTACHED TO THE SHIPMENT</h4>
          </div>
          <div class="modal-body">
            <table class="table table-striped alert-dismissable table-condensed table-bordered table-basic font12">
              <thead>
                <th>Charge</th>
                <th>Amount</th>
              </thead>
              <tbody>
                <?php foreach ($consAccInfo as $consAccInfo):?>
                <tr>
                  <td><?php echo $consAccInfo->charge;?></td>
                  <td><?php echo $consAccInfo->amount;?></td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
<!-- //ACCOUNTING INFO -->
<!-- CASE HISTORY -->
    <div id="caseHistory" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">CASE HISTORY FOR THE SHIPMENT</h4>
          </div>
          <div class="modal-body">
            <table class="table table-striped alert-dismissable table-condensed table-bordered table-basic font12">
              <thead>
                <th>Date</th>
                <th>Notes</th>
                <th>By</th>
              </thead>
              <tbody>
                <?php foreach ($consNotes as $consNotes):?>
                <tr>
                  <td><?php echo $consNotes->added_on;?></td>
                  <td><?php echo $consNotes->cons_notes;?></td>
                  <td><?php echo $consNotes->staff_sname.' '.$consNotes->staff_fname;?></td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
<!-- //CASE HISTORY -->
<!-- SEND INVOICE -->
    <div id="sendInvoice" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">SEND INVOICE # <strong><?php echo $invoice_id;?></strong></h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('cs/dispatchInvoices');?>
              <div class="form-group">
                <div class="col-sm-12">
                  <?php echo form_hidden('send_invoice_id',$invoice_id);?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Person incharge of delivery</label>
              </div>
              <div class="form-group">
                <input type="text" name="sending_person" class="form-control" list="senders" placeholder="Type sender name to autocomplete">
              </div>
              <div class="form-group">
                <label class="control-label">Some special notes</label>
              </div>
              <textarea name="send_invoice_notes" class="form-control" placeholder="Some delivery notes to be appended at the invoice footer" rows="4"></textarea>
              <div class="form-group">
                <button class="btn btn-primary">Finish</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
<!-- //SEND INVOICE -->
<!-- MARK AS DELIVERED -->
    <div id="markAsDelivered" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
          <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div> -->
          <div class="modal-body">
            <h3 align="center">You are about to mark invoice as delivered</h3>
            <form role="form" method="post" action="<?php echo base_url('');?>" >
              <div class="form-group" style="margin-left: 20%;margin-right: 20%;">
                <div class="col-sm-3 pull-left">
                  <button class="btn btn-danger btn-lg"><i class="fa fa-check" aria-hidden="true"></i>Confirm</button>
                </div>
                <div class="col-sm-3 pull-right">
                  <button class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
                </div>                
              </div>
            </form><br><br>
          </div>
        </div>

      </div>
    </div>
<!-- //MARK AS DELIVERED -->
<!-- BUGS FEEDBACK -->
    <div id="feedback" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">We're collecting bugs...kindly write us below</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" action="<?php echo base_url('');?>" >
              <div class="form-group">
                <input type="text" name="cname" class="form-control" value="<?php echo $this->staff_fname.' '.$this->staff_lname;?>" placeholder="Your name" readonly="">
              </div>
              <div class="form-group">
                <input type="text" name="cemail" class="form-control" value="<?php echo $this->staff_email;?>" placeholder="Company email" readonly="">
              </div>
              <div class="form-group">
                <input type="text" name="cphone" class="form-control" placeholder="Issue subject">
              </div>
              <textarea class="form-control" placeholder="Describe the issue" rows="4"></textarea>
              <div class="form-group">
                <button class="btn btn-primary">Report bug</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
 <!--//BUGS FEEDBACK -->
    <?php if(isset($consForDispatch)&&!isset($consData)):?>
      <style type="text/css">
        .set{
          display: none;
        }
        .sendInvoice{
          display: none;
        }
      </style>
    <?php elseif(isset($consData)&&!isset($consForDispatch)):?>
      <style type="text/css">
        .notset{
          display: none;
        }
        .sendInvoice{
          display: none;
        }
      </style>
    <?php elseif (isset($send_msg)&&!empty($send_msg)):?>
      <style type="text/css">
        .set{
          display: none;
        }
        .notset{
          display: none;
        }
      </style>
    <?php else: endif; ?>
    <datalist id="senders">
      <?php foreach ($staffList as $staffList):?>
        <option value="<?php echo $staffList->staff_fname.' '.$staffList->staff_sname.' ('.$staffList->staff_wec_emp_no.')';?>"></option>
      <?php endforeach;?> 
    </datalist>