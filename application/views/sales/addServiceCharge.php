      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Service Charges</div>
          <div class="sub-title">This pane allows you to add new service charges</div>
        </div>
        <div class="card bg-white">
        <?php if(isset($addChargeMsg)){ ?>
          <div class="card-header"> 
              <strong style="color: red; font-size: 16px;"><?php echo $addChargeMsg; ?></strong>
          </div>
          <?php }?>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('sales/addServiceCharge') ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Service name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="service_name" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Service Rates</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" name="min_rate" placeholder="Minimum rate" required="">
                      <p class="help-block">Minimum amount that can be charged</p>
                    </div>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" name="max_rate" placeholder="Maximum rate" required="">
                      <p class="help-block">Maximum amount that can be charged</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Service category</label>
                    <div class="col-sm-4">
                      <select name="service_category" class="form-control" required="">
                        <option value="Not assigned" selected="" disabled="">Select service category</option>
                        <option value="Pre-carriage">Pre-carriage</option>
                        <option value="Main carriage">Main carriage</option>
                        <option value="On-carriage">On-carriage</option>
                        <option value="Customs">Customs</option>
                        <option value="Willfreight Handling fees">Willfreight Handling fees</option>
                        <option></option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <select name="is_active" class="form-control" required="">
                        <option value="" selected="" disabled="">Service status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Service notes</label>
                    <div class="col-sm-8">
                    <textarea class="summernote" name="service_notes"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                    <button class="btn btn-primary" style="align-items: center;" name="addChargeBtn">Add charge</button>
                    </div>
                  </div>
<!--end of form-->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->