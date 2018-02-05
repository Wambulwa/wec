      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <!-- <div class="title">VIEW ACCOINTING INFO</div> -->
          <div class="sub-title">
        <?php if(isset($addClientMsg)){ ?>
          <div class="card-header"> 
              <strong style="color: red; font-size: 16px;"><?php echo $addClientMsg['addClientMsg']; ?></strong>
          </div>
          <?php }?>
        </div>
        </div>  
        <div class="row m-b">
          <div class="col-xs-12">
            <div class="row">  
        <!-- <div class="card-block"> -->
                <table class="table table-responsive" border="1" style="width: 100%; border-right: none; border-left:none;">
                    <thead style="background-color: #D8D7E7;">
                      <th  style="font-weight: bold;">Consignment details</th><th style="font-weight: bold;">Client & Consignee</th><th style="font-weight: bold;">Shipment details</th><th style="max-width: 2%;">Action</th>
                    </thead>
                    <tbody>
                      <?php foreach ($cons as $cons):?>
                      <tr style="width: 100%;">
                        <td>
                          <table border="1" class="cust-table" ">
                            <tbody>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Description</strong></td>
                                <td><?php echo $cons->cons_desc;?></td>
                              </tr>
                              <tr>
                                <td><strong>Entry no.</strong></td>
                                <td><?php echo $cons->cons_entry_number;?></td>
                              </tr>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>File no.</strong></td>
                                <td><?php echo $cons->cons_id;?></td>
                              </tr>
                              <tr>
                                <td><strong>HAWB: </strong><?php echo 'bill_of_landing';?></td>
                                <td><strong>MAWB: </strong><?php echo 'bill_of_landing';?></td>
                              </tr>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Comm inv no.</strong></td>
                                <td><?php echo 'cons_comm_invoice';?></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td>
                          <table border="1" class="cust-table">
                            <tbody>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Client </strong></td>
                                <td><?php echo 'Name ('.$cons->cust_id.')';?></td>
                              </tr>
                              <tr>
                                <td><strong>Consignee</strong></td>
                                <td><?php echo $cons->cons_consignee;?></td>
                              </tr>
                              <tr style="background-color: #CBC5C4;">
                                <td>Contact</td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td>
                          <table border="1" class="cust-table">
                            <tbody>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Shipper</strong></td>
                                <td><?php echo $cons->cons_shipper;?></td>
                              </tr>
                              <tr>
                                <td><strong>Mode of trans</strong></td>
                                <td><?php echo $cons->cons_trans_type;?></td>
                              </tr>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Moving from</strong></td>
                                <td><?php echo $cons->cons_country_of_origin;?></td>
                              </tr>
                              <tr>
                                <td><strong>Port of delivery</strong></td>
                                <td><?php echo $cons->cons_port_of_delivery;?></td>
                              </tr>
                              <tr style="background-color: #CBC5C4;">
                                <td><strong>Door of delivery</strong></td>
                                <td><?php echo $cons->cons_door_of_delivery;?></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="align-content: center;">
                          <?php echo form_open('cs/trackConsignment');?>
                          <input type="text" name="track_cons_id" value="<?php echo $cons->cons_id;?>" hidden="">
                          <button class="btn btn-default btn-sm" style="margin-top: 40%; margin-bottom: 40%;">View more</button>
                          <?php echo form_close();?>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              <div class="form-group"><h3 style="text-transform: uppercase; text-align: center;"><strong>NOTE:<br><hr></strong> this part is only for consignments not completed. Completed ones can be found at the reports section</h3><hr></div>
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
      <form role="form" method="post" action="<?php echo base_url('sales/addClient');?>" >
        <div class="form-group">
          <input type="text" name="cname" class="form-control" placeholder="Company name">
        </div>
        <div class="form-group">
          <input type="text" name="cemail" class="form-control" placeholder="Company email">
        </div>
        <div class="form-group">
          <input type="text" name="cphone" class="form-control" placeholder="Company Telephone no.">
        </div>
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
<!--/ADD NOTES/REMARKS-->
<!--CLIENT LIST-->
<datalist id="clients">
    <?php foreach ($clients as $clients):?>
        <option value="<?php echo $clients->cust_id;?>"><?php echo $clients->client_name;?></option>
    <?php endforeach;?>
</datalist>
<datalist id="shipper">
    <option value="Avmax">Avmax</option>
</datalist>
<!--CSS-->
<style type="text/css">
  .cust-col{
    border-right: none; border-top: none; border-left: none; border-bottom-color: #b3b3ff; 
  }
  .cust-table{
    border-left: none; border-right: none; width: 100%; background-color: #D8D7E7;
  }
</style>

