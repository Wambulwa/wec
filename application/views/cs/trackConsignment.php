      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
         <div class="pull-left">
            <button type="button" class="btn btn-danger no-print btn-lg" data-target="#addNotes" data-toggle="modal">ADD CONSIGNMENT NOTES</button>
            <button type="button" class="btn btn-primary no-print btn-lg" data-target="#viewNotes" data-toggle="modal">VIEW CONSIGNMENT NOTES</button>
         </div>
         <div class="pull-right">
            <button type="button" class="btn btn-primary no-print btn-lg" data-target="#addAccInfo" data-toggle="modal">ADD ACCOUNTING INFO</button>
            <button type="button" class="btn btn-danger no-print btn-lg" data-target="#viewAccInfo" data-toggle="modal">VIEW ACCOINTING INFO</button>
         </div>
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
                <table class="table table-responsive">
                    <thead>
                    <th>#1</th><th>#2</th>
                    </thead>
                </table>
              <div class="form-group"> body here</div>
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
      <?php echo form_open('sales/traceConsignment');?>
        <div class="form-group">
          <label class="label-control">Add notes & remarks below</label>
        </div>
        <div class="form-group">
          <textarea class="summernote" name="cons_notes"></textarea>
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
      <!-- <?php echo form_open('sales/traceConsignment');?> -->
        <div class="form-group">
          <label>Add accounting info below</label>
        </div>
        <table class="table table-responsive">
          <thead><th>Acc info</th><th>Amount</th><th>Comments</th></thead>
        </table>
  <!--hhhh-->
        <form>
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="email" placeholder="Email Address">
      <input type="button" class="add-row" value="Add Row">
        </form>
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td>Peter Parker</td>
                <td>peterparker@mail.com</td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
<!--hhhh-->
        <div class="form-group">
          <button class="btn btn-primary">Finish</button>
        </div>
      <!-- </form> -->
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
          <thead><th>Accountng info</th><th>Amount</th><th>Comments</th></thead>
          <tbody>
            <tr>
              <td>Breakbulk fee</td><td>$ 1200</td><td>sample comment</td>
            </tr>
            <tr>
              <td>Breakbulk fee</td><td>$ 1200</td><td>sample comment</td>
            </tr>
            <tr>
              <td>Breakbulk fee</td><td>$ 1200</td><td>sample comment</td>
            </tr>
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
        <h4 class="modal-title">VIEW CONSIGNMENT NOTES & REMARKS</h4>
      </div>
      <div class="modal-body">
        <table class="table table-responsive bordered">
          <thead><th>Details</th><th>Notes/Remarks</th></thead>
          <tbody>
            <tr>
              <td>Date: today<br>Added by: Mirriam</td>
              <td>Some notes/remarks here</td>
            </tr>
            <tr>
              <td>Date: today<br>Added by: Mirriam</td>
              <td>Some notes/remarks here</td>
            </tr>
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
    <option value="Avmax">Avmax</option>
</datalist>
<!--CSS-->
<style type="text/css">
  .cust-col{
    border-right: none; 
    border-top: none;
    border-left: none; 
    border-bottom-color: #b3b3ff; 
  }
</style>