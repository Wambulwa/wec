      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Wizard</div>
          <div class="sub-title">Steps wizard</div>
        </div>
        <form id="wizardForm" class="form-horizontal" role="form">
          <div class="card">
            <div class="card-block p-a-0">
              <div class="box-tab m-b-0" id="rootwizard">
                <ul class="wizard-tabs">
                  <li><a href="#tab1" data-toggle="tab">Account details</a>
                  </li>
                  <li><a href="#tab2" data-toggle="tab">Your profile</a>
                  </li>
                  <li><a href="#tab3" data-toggle="tab">Billing</a>
                  </li>
                  <li><a href="#tab4" data-toggle="tab">Additional information</a>
                  </li>
                  <li><a href="#tab5" data-toggle="tab">Register</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane p-x-lg" id="tab1">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Email address</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="emailfield" name="emailfield">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="namefield" name="namefield">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="passwordfield" name="passwordfield">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Confirm password</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="cpasswordfield" name="cpasswordfield">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-4">
                        <select class="form-control">
                          <option selected="" disabled="" value="Status">Status</option>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane p-x-lg" id="tab2">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Short bio</label>
                      <div class="col-sm-4">
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Job description</label>
                      <div class="col-sm-4">
                        <select class="form-control" id="description" name="description">
                          <option>Human resources</option>
                          <option>Frontend developer</option>
                          <option>Backend developer</option>
                          <option>Network engineer</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Interests</label>
                      <div class="col-sm-4 pt5 mt2">
                        <label class="cb-checkbox">
                          <input type="checkbox" name="interests" value="hr" />Human resources
                        </label>
                        <br>
                        <label class="cb-checkbox">
                          <input type="checkbox" name="interests" value="chess" />Chess
                        </label>
                        <br>
                        <label class="cb-checkbox">
                          <input type="checkbox" name="interests" value="soccer" />Soccer
                        </label>
                        <br>
                        <label class="cb-checkbox">
                          <input type="checkbox" name="interests" value="web" />Web design
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane p-x-lg" id="tab3">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Card number</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="number">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Full name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Expiration date</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="expiry">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">CVC number</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="cvc">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="credit-card"></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane p-x-lg" id="tab4">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Gender</label>
                      <div class="col-sm-4 pt5 mt2">
                        <label class="cb-radio">
                          <input type="radio" name="gender" value="male" />male
                        </label>
                        <br>
                        <label class="cb-radio">
                          <input type="radio" name="gender" value="female" />Female
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nationality</label>
                      <div class="col-sm-4">
                        <select class="form-control">
                          <option>American</option>
                          <option>Italian</option>
                          <option>South African</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Number of children</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control required">
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane p-x-lg" id="tab5">Congradulations your account has been created</div>
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
