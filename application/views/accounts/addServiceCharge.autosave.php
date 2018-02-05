      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Service Charges</div>
          <div class="sub-title">This pane allows you to add new service charges</div>
        </div>        
          <?php if(isset($addChargeMsg)){ ?>
            <div class="card bg-white">
              <label><strong style="color: red; font-size: 16px;"><?php echo $addChargeMsg; ?></strong></label>
            </div>
          <?php }?>
        <div class="card bg-beige">
          <div class="card-block">
            <!-- <div class="row m-a-0"> -->
              <!-- <div class="col-lg-12"> -->
                <?php echo form_open('accounts/addServiceCharge');?>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <span class="input input--focused m-b-md">
                        <input class="input__field cust-col" type="text" name="service_name" placeholder="Enter service name here" required="">
                        <label class="input__label" for="input-2">
                          <span class="input__label-content">Service name</span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5">
                      <span class="input input--focused m-b-md">
                        <input class="input__field cust-col" type="number" name="min_rate" placeholder="Enter service minimum charge here" required="">
                        <label class="input__label" for="input-2">
                          <span class="input__label-content">Minimum charge</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-sm-5">
                      <span class="input input--focused m-b-md">
                        <input class="input__field cust-col" type="text" name="max_rate" placeholder="Enter service maximum charge here" required="">
                        <label class="input__label" for="input-2">
                          <span class="input__label-content">Maximum charge</span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5">
                      <span class="input input--focused m-b-md">
                        <select name="service_category" class="input__field cust-col" required="">
                          <option value="Not assigned" selected="" disabled="">Select service category</option>
                          <option value="Pre-carriage">Pre-carriage</option>
                          <option value="Main carriage">Main carriage</option>
                          <option value="On-carriage">On-carriage</option>
                          <option value="Customs">Customs</option>
                          <option value="Willfreight Handling fees">Willfreight Handling fees</option>
                          <option></option>
                        </select>
                        <label class="input__label" for="input-2">
                          <span class="input__label-content">Service category</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-sm-5">
                      <span class="input input--focused m-b-md">
                        <select name="is_active" class="input__field cust-col" required="">
                          <option value="" selected="" disabled="">Service status</option>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <label class="input__label" for="input-2">
                          <span class="input__label-content">Service status</span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <label class="control-label" style="color: #7799d1;">Service charge description</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <span class="input input--focused m-b-md">
                        <textarea class="summernote input__field cust-col" name="service_notes" title="Write charge description here e.g. when its applicable, etc."></textarea>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <button class="btn btn-primary" style="width: 100%;" name="addChargeBtn">Add charge</button>
                    </div>
                  </div>
                <?php echo form_close();?>
              <!-- </div> -->
            <!-- </div> -->
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->