      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title"><h2>Assign charges to tariff blocks</h2></div>
          <div class="sub-title">All tariff blocks get charges assigned here</div>
        </div>
        <div class="card bg-beige">
          <div class="card-block">
            <?php if (isset($tariffBlocks)&&!isset($manageTariffBlockData)){?>
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered" style="overflow: auto;">
              <thead>
                <tr style="font-size: 12px;">
                  <th style="width: 20%;">Tariff block</th>
                  <th style="width: 40%;">Description</th>
                  <th style="width: 10%;">Is active</th>
                  <th style="width: 15%;">Assigned?</th>
                  <th style="width: 10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tariffBlocks as  $tariffBlocks):?>
                  <tr>
                    <td>
                      <?php echo form_open('accounts/assignTariffBlocks');?>
                      <?php echo form_hidden('ctb_id',$tariffBlocks->ctb_id);?>
                      <?php echo form_hidden('ctb_name',$tariffBlocks->ctb_name);?>
                      <?php echo form_hidden('ctb_table_name',$tariffBlocks->ctb_table_name);?>
                      <?php echo $tariffBlocks->ctb_name;?>
                    </td>
                    <td><?php echo $tariffBlocks->ctb_description;?></td>
                    <td><?php if($tariffBlocks->ctb_is_active==1){echo 'YES';}else {echo 'NO';}?></td>
                    <td><?php echo 'NO';?></td>
                    <td><button class="btn btn-sm btn-success">OPEN</button>
                      <?php echo form_close();?>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            <?php }?>
            <?php if(isset($manageTariffBlockData)){?>
            <label style="width: 100%; text-align: center;"><h3 style="margin-top: -20px; text-transform: uppercase;">Your are handling tariff block <strong><?php echo $ctb_name;?></strong></h3></label><hr>
            <table class="table table-bordered table-striped responsive align-middle bordered">
              <thead style="background: #4b78c1; color: whi">
              <?php echo form_open('accounts/assignTariffBlocks');?>
                <tr>
                  <th>Service Charge</th>
                  <th>Min</th>
                  <th>Max</th>
                  <th>Average</th>
                  <th>Block charge</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allCharges as $allCharges):?>
                <tr>
                  <td>
                    <?php echo form_hidden('tb_service_id[]',$allCharges->service_id);?>
                    <?php echo $allCharges->service_name;?>
                  </td>
                  <td><?php echo $allCharges->service_min_rate;?></td>
                  <td><?php echo $allCharges->service_max_rate;?></td>
                  <td><?php echo ($allCharges->service_min_rate+$allCharges->service_max_rate)/2;?></td>
                  <td>
                    <span class="input input--focused m-b-md">
                      <input class="input__field cust-col" type="text" required="" name="tb_service_charge[]" value="<?php echo ($allCharges->service_min_rate+$allCharges->service_max_rate)/2;?>">
                      <label class="input__label" for="input-2">
                        <span class="input__label-content">KES</span>
                      </label>
                    </span>
                  </td>
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