      <!-- main area -->
      <div class="main-content">
        <div class="page-title col-sm-10">
          <div class="title"><br><h2>ADD TARIFF BLOCKS</h2></div>
          <div class="sub-title">Tariff blocks define charges that clients are charged. Each block has unique charges which clients belong to. A client who does not have a tariff block will be automatically enrolled in a default block <strong>"A"</strong></div>
        </div>
        <div class="card">
          <div class="card-header col-sm-10" style="margin-bottom: 2%;">
            <?php if(isset($result)){?>
              <div class="alert alert-success">
                <?php echo "<b>Success!</b>$result";?>
              </div>
            <?php }?>
          </div>
        </div>
          <div class="card-block">
          <?php echo form_open('accounts/addTariffBlock');?>
            <div class="form-group">
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <input class="input__field cust-col" type="text" name="ctb_name" placeholder="Enter one word tariff block name here e.g. Platinum" required="" style="background-color: #fff;">
                  <label class="input__label" for="input-2">
                    <span class="input__label-content" style="font-size: 16px;">Tariff block name</span>
                  </label>
                </span>
              </div>
              <div class="col-sm-5">
                <span class="input input--focused m-b-md">
                  <select class="input__field cust-col" type="text" name="ctb_is_active" required="" style="background-color: #fff;">
                    <option selected="" disabled="">Select one</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content" style="font-size: 16px;">Activate tariff block?</span>
                  </label>
                </span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <span class="input input--focused m-b-md">
                  <textarea class="input__field cust-col" type="text" name="ctb_description" placeholder="<brDescribe the block here e.g. Which type of clients it applies to, etc." required="" style="height: 20%; background-color: #ffffff;"></textarea>
                  <label class="input__label" for="input-2">
                    <span class="input__label-content" style="margin-bottom: 20px;">Tariff block description</span>
                  </label>
                </span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <button class="bt btn-primary" style="width: 100%;">Add tariff block</button>
              </div>
            </div>
            <?php echo form_close();?>
          </div>
        <!-- </div> -->
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->