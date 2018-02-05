      <!-- main area -->
      <div class="main-content" style="">
        <div class="page-title" style="">
        <div class="pull-left">
            <button class="btn btn-info no-print"><a href="<?php echo base_url('sales/addInvoice');?>">GO BACK</a></button>
        </div>
        <div class="pull-right">
        <?php echo form_open('sales/printInvoice');?>
            <label style="font-size: 16px; ">New invoice successfully added. Invoice ID <?php echo $inv;?></label>
            <input type="text" name="invoice_id" value="<?php echo $inv;?>" hidden>
            <button class="btn btn-info">VIEW INVOICE</button>
         <?php echo form_close();?> 
        </div>
        </div>
        
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->