      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Add new client</div>
          <div class="sub-title">
        <?php if(isset($addClientMsg)){ ?>
          <div class="card-header"> 
              <strong style="color: red; font-size: 16px;"><?php echo $addClientMsg['addClientMsg']; ?></strong>
          </div>
          <?php }?>
        </div>
        <form id="wizardForm" class="form-horizontal" role="form" method="post" action="<?php echo base_url('cs/addClient'); ?>">
          <div class="card">
            <div class="card-block p-a-0">
              <div class="box-tab m-b-0" id="rootwizard">
                <ul class="wizard-tabs">
                  <li><a href="#tab1" data-toggle="tab">Basic details</a>
                  </li>
                  <li><a href="#tab2" data-toggle="tab">Address</a>
                  </li>
                  <li><a href="#tab3" data-toggle="tab">Contact person</a>
                  </li>
                  <li><a href="#tab4" data-toggle="tab">Notes about client</a>
                  </li>
                  <li><a href="#tab5" data-toggle="tab">Finish</a>
                  </li>
                </ul>
                <div class="tab-content">
<!--contact-->
                  <div class="tab-pane p-x-lg" id="tab1">
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <input class="input__field cust-col" type="text" name="fname" placeholder="Enter client name here" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client name</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field cust-col" type="text" name="phone" placeholder="Enter client phone no here" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Phone no.</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field cust-col" type="email" name="email" placeholder="Enter client email here" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Email address</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="client_type" required="">
                          <option selected="" disabled="">Select business type here</option>
                          <option value="1">Regular</option>
                          <option value="2">One-off</option>
                        </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client business type</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="client_category" style="width: 100%;" required="">
                          <option selected="" disabled="">Select client category here</option>
                          <option value="1">Corporate</option>
                          <option value="0">Individual</option>
                        </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client category</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="currency" style="width: 100%;" required="">
                          <option selected="" disabled="">Select client preferred currency here</option>
                          <option value="USD">USD</option>
                          <option value="KES">KES</option>
                        </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client preferred currency</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="client_since" data-provide="datepicker" placeholder="Enter date business began with client" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client since...</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="mc" required="" style="width: 100%;">
                          <option selected="" disabled="">Select marketing channel used here</option>
                          <?php foreach ($marketingChannels as $mc):?>
                          <option value="<?php echo $mc->ch_id;?>" title="<?php echo $mc->ch_notes;?>"><?php echo $mc->ch_name;?></option>
                        <?php endforeach;?>
                        </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Marketing channel used</span>
                          </label>
                        </span>
                      </div>
                    </div>
                  </div>
<!--/contact-->
<!--address-->
                  <div class="tab-pane p-x-lg" id="tab2">
                    <div class="form-group">
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" id="description" required="" style="width: 100%;" name="country">
                            <option selected="" disabled="">Select client country here</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="South Africa">South Africa</option>
                          </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client Country</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <input type="text" class="input__field form-control cust-col" name="state" placeholder="Enter client state here" required="" style="width: 100%;">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client State</span>
                          </label>
                        </span>                        
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <input type="text" class="input__field form-control cust-col" name="city" placeholder="Enter client city here" required="" style="width: 100%;">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client city</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <br>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <input type="text" class="input__field form-control cust-col" name="postal_address" placeholder="P.O Box here" required="" style="width: 100%;">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client postal address</span>
                          </label>
                         </span>
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <input type="text" class="input__field form-control cust-col" name="postal_code" placeholder="Postal/Zip code here" required="" style="width: 100%;">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client postal/zip code</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-3">
                        <span class="input input--focused m-b-md">
                          <input type="text" class="input__field form-control cust-col" name="postal_city" placeholder="City/Town here" required="" style="width: 100%;">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Client City/Town</span>
                          </label>
                        </span>
                      </div>
                    </div>
                  </div>
<!--/address-->
<!--company details-->                   
                  <div class="tab-pane p-x-lg" id="tab3">
                        <div class="form-group">
                          <div class="col-sm-10">
                            <span class="input input--focused m-b-md">
                              <input type="text" class="input__field form-control cust-col" name="cname" placeholder="Contact person name here" required="" style="width: 100%;">
                              <label class="input__label" for="input-2">
                                <span class="input__label-content">Contact person name</span>
                              </label>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-5">
                            <span class="input input--focused m-b-md">
                              <input type="text" class="input__field form-control cust-col" name="cmail" placeholder="Contact person email here" required="" style="width: 100%;">
                              <label class="input__label" for="input-2">
                                <span class="input__label-content">Contact person email</span>
                              </label>
                            </span>
                          </div>
                          <div class="col-sm-5">
                            <span class="input input--focused m-b-md">
                              <input type="text" class="input__field form-control cust-col" name="cphone" placeholder="Contact person phone here" required="" style="width: 100%;">
                              <label class="input__label" for="input-2">
                                <span class="input__label-content">Contact person phone</span>
                              </label>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10">
                            <span class="input input--focused m-b-md">                              
                              <select class="form-control cust-col input__field" name="cdesignation" style="width: 100%;">
                                <option disabled="" selected="">Select contact person designation</option>
                                <option value="Manager">Manager</option>
                                <option value="Director">Director</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Salespersion">Salesperson</option>
                                <option value="Receptionist">Receptionist</option>
                              </select>
                              <label class="input__label" for="input-2">
                                <span class="input__label-content">Contact person designation</span>
                              </label>
                            </span>
                          </div>
                        </div>

                      <!-- </div>  -->
                      <div class="form-group">
                      <div class="col-sm-1">
                        <div class="credit-card" style="display: none;"></div>
                      </div>
                      </div>
                    <!-- </div> -->
                  </div>
<!--/company details-->
<!--other info-->  
                  <div class="tab-pane p-x-lg" id="tab4">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Notes</label>
                      <div class="m-b clearfix">
                      <textarea class="summernote" name="notes"></textarea>
                      </div>
                    </div>
                  </div>
<!--/other info-->  
                  <div class="tab-pane p-x-lg" id="tab5">You are about to add a new customer. Click <strong>Finish</strong> to proceed; <strong>Previous</strong> to review details or simply <strong>leave this window</strong>to ignore <?php if(isset($msg)){ echo "$fname added";}?>
                  <br>
                  <div class="form-group" align="center">
                    <button class="btn btn-primary" name="addClient" >Finish</button>
                  </div>
                  </div>
                  <div class="wizard-pager">
                    <div class="pull-right">
                      <button type="button" class="btn btn-primary button-next">Next</button>
                    </div>
                    <div class="pull-left">
                      <button type="button" class="btn btn-default button-previous">Previous</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <!-- Modal -->
<div id="newCompany" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new company</h4>
      </div>
      <div class="modal-body">
      <form role="form" method="post" action="<?php echo base_url('sales/addClient');?>" >
        <div class="form-group">
          <input type="text" name="cname" class="form-control" placeholder="Company name">
        </div>
        <div class="form-group">
          <input type="text" name="cemail" class="form-control" placeholder="Company email">
        </div>
        <div class="form-group">
          <input type="text" name="cphone" class="form-control" placeholder="Company Telephone no.">
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Finish</button>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
  .cust-col{
    border-right: none; 
    border-top: none;
    border-left: none; 
    border-bottom-color: #b3b3ff; 
  }
</style>


