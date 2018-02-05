      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title"><h2>Manage tariff blocks</h2></div>
          <div class="sub-title">All tariff blocks which dont have charges asigned are lsited here. You can update the charges by clicking on manage option in the table below</div>
        </div>
        <div class="card bg-beige">
          <div class="card-block">
            <?php if (isset($tariffBlocks)&&!isset($manageTariffBlockData)){?>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered" style="overflow: auto;">
              <thead>
                <tr style="font-size: 12px;">
                  <th style="width: 20%;">Tariff block</th>
                  <th style="width: 40%;">Description</th>
                  <th style="width: 10%;">Is active?</th>
                  <th style="width: 10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tariffBlocks as  $tariffBlocks):?>
                  <tr>
                    <td>
                      <?php echo form_open('accounts/manageTariffBlocks');?>
                      <?php echo form_hidden('ctb_id',$tariffBlocks->ctb_id);?>
                      <?php echo form_hidden('ctb_name',$tariffBlocks->ctb_name);?>
                      <?php echo form_hidden('ctb_table_name',$tariffBlocks->ctb_table_name);?>
                      <?php echo $tariffBlocks->ctb_name;?>
                    </td>
                    <td><?php echo $tariffBlocks->ctb_description;?></td>
                    <td><?php if($tariffBlocks->ctb_is_active==1){echo 'YES';}else {echo 'NO';}?></td>
                    <td><button class="btn btn-sm btn-success">OPEN</button>
                      <?php echo form_close();?>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            <?php }?>
            <?php if(isset($manageTariffBlocksAssigned)){?>
            <label style="width: 100%; text-align: center;"><h3 style="margin-top: -20px; text-transform: uppercase;">Your are managing tariff block <strong><?php echo $ctb_name;?></strong></h3></label><hr>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered" style="overflow: auto;">
              <thead style="background: #4b78c1; color: white;">
              <?php echo form_open('accounts/manageTariffBlocks');?>
                <tr>
                  <th>Service</th>
                  <th>Charge</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($manageTariffBlocksAssigned as $data):?>
                <tr>
                  <td>
                    <?php echo form_hidden('tb_service_id[]',$data->tb_service_id);?>
                    <?php echo $data->service_name;?>
                  </td>
                  <td>
                    <span class="input input--focused m-b-md">
                      <input name="cust_id" required="" value="<?php echo $data->tb_service_charge;?>" hidden="">
                      <input class="input__field cust-col" type="text" required="" value="<?php echo $data->tb_service_charge;?>">
                      <label class="input__label" for="input-2">
                        <span class="input__label-content">KES</span>
                      </label>
                    </span>
                  </td>
                  <td><button class="btn btn-success btn-sm">Update</button></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>            
            <tfoot>
              <?php echo form_hidden('ctb_table_name','tariff_block_'.$ctb_name);?>
              <?php echo form_hidden('ctb_name',$ctb_name);?>
              <button class="btn btn-primary" style="width: 90%;">Finish</button>
            </tfoot>     
            <?php echo form_close();?>
            <?php }?>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->