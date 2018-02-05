      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
        <div class="pull-left">
        <button class="btn btn-danger">PRINT</button>
        </div>
          <div class="title">Receive payment</div>
          <div class="sub-title">All invoice payments are recorded here</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            <!-- Datatables -->
          </div>
          <div class="card-block">
        <?php if(isset($paidMsg)){ ?>
        <?php echo form_open('accounts/paidInvDetails');?>
          <label class="form-control">PAYMENT FOR INVOICE #<?php echo $paidMsg;?> RECORDED SUCCESSFULLY</label>
          <input type="text" name="inv_id" value="<?php echo $paidMsg;?>" hidden="">
          <button class="btn btn-primary" style="margin-left: 1%; margin-top: 2%;">VIEW PAYMENT DETAILS</button>
          <?php echo form_close();?>
        <?php }?>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->