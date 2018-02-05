      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Manage campaigns</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">This part is for managing all active, uopcoming and past campaigns</div>
<!-- List of active campaigns -->          
          <div class="card-block">
            <div class="form-group">
              <h3><i class="fa fa-list"> Active campaigns</i></h3>
            </div>
            <?php if(isset($currentCampaigns)): if(count($currentCampaigns)>0):
            foreach ($currentCampaigns as $currentCampaigns):?>
                  <button class="accordion">
                    <b>
                      <?php echo $currentCampaigns->campaign_name.'</b> created on <b>'.date('M d Y h:i A',strtotime($currentCampaigns->campaign_added_on)).'</b> running from <b>'.date('M d Y',strtotime($currentCampaigns->campaign_start_date)).'</b> to <b>'.date('M d Y',strtotime($currentCampaigns->campaign_end_date));?>
                    </b>
                  </button>
                  <div class="panel">
                    <?php echo form_open('sales/manageCampainGoals','target="_blank"');?>
                    <?php echo form_hidden('campaign_id',$currentCampaigns->campaign_id);?>
                    <?php echo form_hidden('campaign_name',$currentCampaigns->campaign_name);?>
                    <?php echo form_hidden('added_on',date('M d Y h:i A',strtotime($currentCampaigns->campaign_added_on)));?>
                    <?php echo form_hidden('end_date',date('M d Y',strtotime($currentCampaigns->campaign_end_date)));?>
                    <?php echo form_hidden('created_by',$currentCampaigns->staff_fname." ".$currentCampaigns->staff_sname);?>
                    <br><button class="btn btn-primary">Load more info..</button><?php echo form_close();?>
                  </div>
                <?php endforeach;
                elseif(count($currentCampaigns<1)):?>
                <p>Seems there are no active campaigns</p>
                <?php endif;endif;?><hr/>
            </div>
<!-- end of active campaigns] -->
<!-- List of unstarted campaigns -->          
          <div class="card-block">
            <div class="form-group">
              <h3><i class="fa fa-list"> Inactive campaigns</i></h3>
            </div>
            <?php if(isset($inactiveCampaigns)): if(count($inactiveCampaigns)>0):
            foreach ($inactiveCampaigns as $inactiveCampaigns):?>
                  <button class="accordion">
                    <b>
                      <?php echo $inactiveCampaigns->campaign_name.'</b> created on <b>'.date('M d Y h:i A',strtotime($inactiveCampaigns->campaign_added_on)).'</b> running from <b>'.date('M d Y',strtotime($inactiveCampaigns->campaign_start_date)).'</b> to <b>'.date('M d Y',strtotime($inactiveCampaigns->campaign_end_date));?>
                    </b>
                  </button>
                  <div class="panel">
                    <?php echo form_open('sales/manageCampainGoals','target="_blank"');?>
                    <?php echo form_hidden('campaign_id',$inactiveCampaigns->campaign_id);?>
                    <?php echo form_hidden('campaign_name',$inactiveCampaigns->campaign_name);?>
                    <?php echo form_hidden('added_on',date('M d Y h:i A',strtotime($inactiveCampaigns->campaign_added_on)));?>
                    <?php echo form_hidden('end_date',date('M d Y',strtotime($inactiveCampaigns->campaign_end_date)));?>
                    <?php echo form_hidden('created_by',$inactiveCampaigns->staff_fname." ".$inactiveCampaigns->staff_sname);?>
                    <br><button class="btn btn-primary">Load more info..</button><?php echo form_close();?>
                  </div>
                <?php endforeach;
                elseif(count($inactiveCampaigns<1)):?>
                  <p>Seems there are no inactive campaigns</p>
                <?php endif;endif;?><hr/>
            </div>
<!-- end of unstarted campaigns] -->
<!-- list of upcoming events -->
            <div class="card-block">
            <div class="form-group">
              <h3><i class="fa fa-list"> Upcoming campaigns</i></h3>
            </div>
            <?php if(isset($upcomingCampaigns)): if(count($upcomingCampaigns)): foreach ($upcomingCampaigns as $upcomingCampaigns):?>
                  <button class="accordion">
                    <b>
                      <?php echo $upcomingCampaigns->campaign_name.'</b> created on <b>'.date('M d Y h:i A',strtotime($upcomingCampaigns->campaign_added_on)).'</b> running from <b>'.date('M d Y',strtotime($upcomingCampaigns->campaign_start_date)).'</b> to <b>'.date('M d Y',strtotime($upcomingCampaigns->campaign_end_date));?>
                    </b>
                  </button>
                  <div class="panel">
                    <?php echo form_open('sales/manageCampainGoals','target="_blank"');?>
                    <?php echo form_hidden('campaign_id',$upcomingCampaigns->campaign_id);?>
                    <?php echo form_hidden('campaign_name',$upcomingCampaigns->campaign_name);?>
                    <?php echo form_hidden('added_on',date('M d Y h:i A',strtotime($upcomingCampaigns->campaign_added_on)));?>
                    <?php echo form_hidden('end_date',date('M d Y',strtotime($upcomingCampaigns->campaign_end_date)));?>
                    <?php echo form_hidden('created_by',$upcomingCampaigns->staff_fname." ".$upcomingCampaigns->staff_sname);?>
                    <br><button class="btn btn-primary">Load more info..</button><?php echo form_close();?>
                  </div>
                <?php endforeach;
                elseif(count($upcomingCampaigns<1)):?>
                  <p>Seems there are no upcoming campaigns in here</p>
                <?php endif;endif;?><hr/>
            </div>
<!-- //end of upcoming events -->
<!-- list of complete campaigns] -->
            <div class="card-block">
            <div class="form-group">
              <h3><i class="fa fa-list"> Complete campaigns</i></h3>
            </div>
            <?php if(isset($completeCampaigns)): if(count($completeCampaigns)): foreach ($completeCampaigns as $completeCampaigns):?>
                  <button class="accordion">
                    <b>
                      <?php echo $completeCampaigns->campaign_name.'</b> created on <b>'.date('M d Y h:i A',strtotime($completeCampaigns->campaign_added_on)).'</b> running from <b>'.date('M d Y',strtotime($completeCampaigns->campaign_start_date)).'</b> to <b>'.date('M d Y',strtotime($completeCampaigns->campaign_end_date));?>
                    </b>
                  </button>
                  <div class="panel">
                    <?php echo form_open('sales/manageCampainGoals','target="_blank"');?>
                    <?php echo form_hidden('campaign_id',$completeCampaigns->campaign_id);?>
                    <?php echo form_hidden('campaign_name',$completeCampaigns->campaign_name);?>
                    <?php echo form_hidden('added_on',date('M d Y h:i A',strtotime($completeCampaigns->campaign_added_on)));?>
                    <?php echo form_hidden('end_date',date('M d Y',strtotime($completeCampaigns->campaign_end_date)));?>
                    <?php echo form_hidden('created_by',$completeCampaigns->staff_fname." ".$completeCampaigns->staff_sname);?>
                    <br><button class="btn btn-primary">Load more info..</button><?php echo form_close();?>
                  </div>
                <?php endforeach;
                elseif(count($completeCampaigns<1)):?>
                  <p>Seems there are no upcoming campaigns in here</p>
                <?php endif;endif;?><hr/>
            </div>
<!-- //end of complete events -->
          </div>
        </div>
      <!-- /main area -->
      </div>
    <!-- /content panel -->
    <!-- bottom footer -->

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
      <style type="text/css">
        /*ACCORDION*/
        button.accordion{
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

        button.accordion.active, button.accordion:hover{
          background-color: #ccc; 
        }

        div.panel{
          padding: 0 18px;
          display: none;
          background-color: white;
        }
      </style>