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
                <table class="table table-responsive" border="1" style="width: 100%; border-right: none; border-left:none; display: none;">
                    <thead style="background-color: #D8D7E7;">
                      <th  style="font-weight: bold;">Consignment details</th><th style="font-weight: bold;">Client & Consignee</th><th style="font-weight: bold;">Shipment details</th><th style="max-width: 2%;">Action</th>
                    </thead>
                </table>
                <h2>All consignments created & not sent to Customer Service</h2>
                <p3>Click on any consignment to view more details and take an action on the consignment</p3><hr />
                <?php foreach ($cons as $cons):?>
                  <button class="accordion"><?php echo $cons->cons_desc.' for '.$cons->client_name;?></button>
                  <div class="panel">
                    <table border="1" class="cust-table table table-responsive" style="width: 100%">
                      <thead style="background: #4b78c1;color: #fff;"><th>Consignment</th><th>Client</th><th>Consignee</th><th>Shipper</th><th>Other details</th><th>Action</th></thead>
                      <tbody>
                        <tr style="background-color: #CBC5C4;">
                          <td><?php echo $cons->cons_desc.' (#'.$cons->cons_id.')';?></td>
                          <td><?php echo $cons->client_name.' (#'.$cons->cust_id.')';?></td>
                          <td><?php echo $cons->cons_consignee;?></td>
                          <td><?php echo $cons->cons_shipper;?></td>
                          <td>
                            <table><tbody>
                            <tr><td>Entry no. </td><td><?php echo $cons->cons_entry_number;?></td></tr>
                            <tr><td>Transport. </td><td><?php echo $cons->cons_trans_type;?></td></tr>
                          </tbody></table>
                          </td>
                          <td>
                          <?php echo form_open('ops/trackConsignment');?>
                          <input type="text" name="track_cons_id" value="<?php echo $cons->cons_id;?>" hidden="">
                          <button class="btn btn-primary btn-sm">Open</button>
                          <?php echo form_close();?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                <?php endforeach;?><hr />
              <div class="form-group"><p style="text-transform: uppercase; text-align: center;"><strong><i>NOTE:</strong> This part is only for consignments not completed. Completed ones can be found at the reports section</i></p><hr></div>
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
  /*ACCORDION*/
  button.accordion {
    background-color: #fff;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: solid;
    outline-width: 1px;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ccc; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}
</style>
<!-- ACCORDION -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>

