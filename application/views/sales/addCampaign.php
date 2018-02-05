      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Add new marketing campaign</div>
          <div class="sub-title">
        <?php if(isset($message)){ ?>
          <div class="card-header"> 
              <h5 style="color: red; font-size: 16px;"><?php echo $message; ?></h5>
          </div>
          <?php }?>
        </div><hr>
        <?php echo form_open('sales/addCampaign','id="wizardForm"','class="form-horizontal"');?>
          <div class="card">
            <div class="card-block p-a-0">
              <!-- <div class="box-tab m-b-0" id="rootwizard"> -->
                <!-- <div class="tab-content"> -->
<!--contact-->
                  <div class="tab-pane p-x-lg" id="tab1">
                    <div class="form-group row">
                      <br>
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <input class="input__field cust-col" type="text" name="cname" placeholder="Enter campaign name here" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Campaign name</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="cbeneficiary" required="">
                            <option selected="" disabled="">Select campaign beneficiary</option>
                            <option value="TALC">TALC</option>
                            <option value="WEC">WEC</option>
                            <option value="SIGRUT">SIGRUT</option>
                            <option value="Other">Other</option>
                          </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Campaign beneficiary</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="mchanel" required="">
                          <option selected="" disabled="">Select marketing channel</option>
                          <?php foreach ($marketingChannels as $mc):?>
                          <option value="<?php echo $mc->ch_id;?>" title="<?php echo $mc->ch_notes;?>"><?php echo $mc->ch_name;?></option>
                        <?php endforeach;?>
                          </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Marketing chanel category</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="cstartdate" data-provide="datepicker" placeholder="Enter Campaign start date" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Campaign start date</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="cenddate" data-provide="datepicker" placeholder="Enter Campaign end date" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Campaign end date</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="cbudget" placeholder="Enter Campaign budget in KES" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Campaign budget (KES)</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <!-- <div class="form-group row"> -->
                    <div class="form-group row">
                      <div class="col-xs-10">
                        <table id="newTable" class="table newcharges table-basic">
                          <tr>
                            <td class="col-sm-11">
                              <span class="input input--focused m-b-md">
                                <input class="input__field form-control" type="text" name="cgoals[]" placeholder="Enter your campaign goal here. To add more goals, click add new row" required="">
                                <label class="input__label" for="input-2">
                                  <span class="input__label-content">Campaign goals</span>
                                </label>
                              </span>

                              <!-- <input type="text" name="goal[]" class="form-control" placeholder="Enter your marketing goal here"> -->
                            </td>
                            <td class="col-sm-1">
                              <button id="rmvnew" class="btn btn-sm btn-danger">Remove</button>
                            </td>
                          </tr>
                        </table>
                        <table class="table table-basic">
                          <tfoot>
                            <tr>
                              <td colspan="3">
                                <input type="button" class="btn btn-block col-sm-10" value="Add New Row" onclick="addRow('newTable')">
                                <!-- id="addrow" -->
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                        <table class="table table-basic col-sm-10">
                          <tbody>
                            <tr>
                              <td colspan="1">
                                <label class="control-label"><strong>Mark campaign as started?</strong></label>
                              </td>
                              <td colspan="1">
                                <input type="radio" name="start_campaign" value="YES" class=""><strong>YES</strong>
                              </td>
                              <td colspan="1">
                                <input type="radio" name="start_campaign" value="NO" class=""><strong>NO</strong>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label class="control-label">Some notes about the campaign</label>
                          </div>
                          <div class="col-sm-12">
                            <textarea class="summernote" name="cnotes">Delete this to write some notes about the campaign here</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <button class="btn btn-primary" style="width: 80%;" name="addClient">Finish</button>
                    </div>
                  </div>
                  </div>
            </div>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
<style type="text/css">
  .cust-col{
    border-right: none; 
    border-top: none;
    border-left: none; 
    border-bottom-color: #b3b3ff; 
  }
</style>
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
              alert("Cannot delete all the rows. You need at least one goal");
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