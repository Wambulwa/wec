      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Add new client</div>
          <div class="sub-title">
        <?php if(isset($addClientMsg)){ ?>
          <div class="card-header"> 
              <strong style="color: red; font-size: 16px;"><?php echo $addClientMsg; ?></strong>
          </div>
          <?php }?>
        </div>
        <form id="wizardForm" class="form-horizontal" role="form" method="post" action="<?php echo base_url('accounts/addClient'); ?>">
          <div class="card">
            <div class="card-block p-a-0">
              <div class="box-tab m-b-0" id="rootwizard">
                <ul class="wizard-tabs">
                  <li><a href="#tab1" data-toggle="tab">Contact details</a>
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
                    <div class="form-group">
                      <label class="col-sm-1 control-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control cust-col" id="namefield" name="fname" placeholder="Client name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-1 control-label" style="margin-left: 15px;">Contacts</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control cust-col" name="phone" placeholder="Phone no." style="">
                      </div>
                      <div class="col-sm-5">
                        <input type="email" class="form-control cust-col" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-1 control-label" style="margin-left: 0px;">About client</label>
                      <div class="col-sm-2">
                        <select class="form-control cust-col" name="client_type" required="" title="Can be Regular or One-off">
                          <option selected="" disabled=""><--Business type--></option>
                          <option value="1">Regular</option>
                          <option value="2">One-off</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-control cust-col" name="client_category" required="" title="can be corporate or an individual">
                          <option selected="" disabled=""><--Client type--></option>
                          <option value="1">Corporate</option>
                          <option value="0">Individual</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-control cust-col" name="currency" required="" data-toggle="tool-tip" title="Client preferred currency">
                          <option selected="" disabled=""><--Currency--></option>
                          <option value="USD">USD</option>
                          <option value="KES">KES</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <input type="date" name="client_since" class="form-control cust-col" title="Client since">
                      </div>
                    </div>
                  </div>
<!--/contact-->
<!--address-->
                  <div class="tab-pane p-x-lg" id="tab2">
                    <div class="form-group">
                      <label class="col-sm-1 control-label">Locality</label>
                      <div class="col-sm-3">
                        <select class="form-control cust-col" id="description" name="country" required="">
                          <option selected="" disabled="">Country</option>
                          <option>Kenya</option>
                          <option>Uganda</option>
                          <option>Tanzania</option>
                          <option>South Africa</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control cust-col" id="namefield" name="state" placeholder="State" required="">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" name="city" class="form-control cust-col" placeholder="City" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-1 control-label">Postal Address</label>                      
                    <div class="col-sm-3">
                        <input type="text" class="form-control cust-col" name="postal_address" placeholder="P.O Box">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control cust-col" name="postal_code" placeholder="Postal/Zip code">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control cust-col" name="postal_city" placeholder="City/Town">
                    </div>
                    </div>
                  </div>
<!--/address-->
<!--company details-->                   
                  <div class="tab-pane p-x-lg" id="tab3">
                    <!-- <div class="row"> -->
                      <!-- <div class="col-sm-6"> -->
                        <div class="form-group">
                          <label class="col-sm-1 control-label">Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control cust-col" name="cname" placeholder="Contact person name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-1 control-label">Contacts</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control cust-col" name="cmail" placeholder="Contact person email">
                          </div>
                          <div class="col-sm-4">
                            <input type="text" class="form-control cust-col" name="cphone" placeholder="Contact person phone">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-1 control-label">Designation</label>
                          <div class="col-sm-8">
                            <select class="form-control cust-col" name="cdesignation">
                              <option disabled="" selected=""><--Select Designation--></option>
                              <option value="Manager">Manager</option>
                              <option value="Director">Director</option>
                              <option value="Accountant">Accountant</option>
                              <option value="Salespersion">Salesperson</option>
                              <option value="">Receptionist</option>
                            </select>
                          </div>
                        </div>
                        <!-- <div class="form-group" align="center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newCompany">New Company</button>
                        </div> -->

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
      <form role="form" method="post" action="<?php echo base_url('accounts/addClient');?>" >
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

