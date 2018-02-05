      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title"><?php echo "Managing <b>".$getSelectedCampaign[0]->campaign_name."</b> campaign created by ".$getSelectedCampaign[0]->staff_sname.' '.$getSelectedCampaign[0]->staff_fname;?></div>
        </div>
        <div class="card bg-white" style="background: #fff;">
          <div class="card-header">
            <?php echo "This campaign created on ".$getSelectedCampaign[0]->campaign_added_on." is scheduled to end on ".$getSelectedCampaign[0]->campaign_end_date;?>
          </div>
          <div class="card-block">
            <table class="table table-bordered table-striped responsive bordered">
              <thead style="background: #3868b5;color: #fff;">
                <tr>
                  <th><b>Goals</b></th>
                  <th><b>Achieved?</b></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($campaignGoals as $campaignGoals):?>
                <tr>
                  <td><?php echo $campaignGoals->mcg_name;?></td>
                  <td><?php  if($campaignGoals->mcg_achieved=="NO"):?>
                    <p><b><i class="fa fa-times" aria-hidden="true">Not Achieved</i></b>&nbsp;&nbsp;<?php echo form_open('sales/updateCampaignGoal');?><?php echo form_hidden('campaign_id',$campaign_id);?><?php echo form_hidden('mcg_id',$campaignGoals->mcg_id);?><button class="btn btn-sm btn-default">Click here to mark it as achieved</button><?php echo form_close();?></p>
                    <?php  else:?>
                      <i class="fa fa-check" aria-hidden="true">Achieved</i>
                    <?php endif;?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" style="background-color: #d4f7f2;"><b>% of goals Complete <?php echo (sizeof($achieved)/(sizeof($achieved)+sizeof($notAchieved)))*100;?>%</b></td>
                </tr>
              </tfoot>
            </table>
            
            <div class="form-group" style="background: #fff;">
              <div class="col-sm-12">
                <div class="control-label" style="font-size: 19px;font-weight: bold;"><hr>Daily campaign notes & activities<button class="btn btn-sm btn-block" data-toggle="modal" data-target="#dailyNotes">view daily notes</button><hr></div>
              </div>
            </div>
            <?php echo form_open('sales/addDailyCampaignNotes');?>
            <div class="form-group">
              <div class="col-sm-12">
                <?php echo form_hidden('campaign_id',$campaign_id);?>
                <textarea class="summernote" name="notes"></textarea>
              </div>
              <div class="col-sm-12">
                <button class="btn btn-primary col-sm-12">Add daily notes</button>
              </div>
            </div>
            <?php echo form_close();?>
            
            <div class="form-group">
              <div class="col-sm-12 control-label" style="font-size: 19px;font-weight: bold;"><hr>Campaign Conclusion Summary
                <button class="btn btn-sm btn-block" data-toggle="modal" data-target="#summaryNotes">view campaign summary</button><hr>
              </div>
            </div>
            <?php echo form_open('sales/addCampaignSummary');?>
            <div class="form-group">
              <div class="col-sm-12">                
                <?php echo form_hidden('campaign_id',$campaign_id);?>
                <textarea class="summernote" name="notes"></textarea>
                <button class="btn btn-primary col-sm-12">Add campaign summary</button>
              </div>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
      <!-- /main area -->
      <!-- DAILY NOTES -->
      <div id="dailyNotes" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Daily notes for <?php echo $getSelectedCampaign[0]->campaign_name; ?> campaign</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive table-bordered table-striped">
                <thead style="background-color: #3868b5;color: #fff;">
                  <th>Date</th><th>Notes</th><th>by</th>
                </thead>
                <tbody>
                  <?php if(isset($dailyNotes)) foreach ($dailyNotes as $dailyNotes):?>
                  <tr>
                    <td><?php echo date('D M d Y h:i A',strtotime($dailyNotes->mcn_added_on));?></td>
                    <td><?php echo $dailyNotes->mcn_notes;?></td>
                    <td><?php echo $dailyNotes->staff_fname.' '.$dailyNotes->staff_sname;?></td>
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
      <!-- SUMMARY NOTES -->
      <div id="summaryNotes" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Summary notes for <?php echo $getSelectedCampaign[0]->campaign_name; ?> campaign</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive table-bordered table-striped">
                <thead style="background-color: #3868b5;color: #fff;">
                  <th>Date</th><th>Notes</th><th>by</th>
                </thead>
                <tbody>
                  <?php if(isset($summaryNotes)) foreach ($summaryNotes as $summaryNotes):?>
                  <tr>
                    <td><?php echo date('D M d Y h:i A',strtotime($summaryNotes->mcn_added_on));?></td>
                    <td><?php echo $summaryNotes->mcn_notes;?></td>
                    <td><?php echo $summaryNotes->staff_fname.' '.$summaryNotes->staff_sname;?></td>
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
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->