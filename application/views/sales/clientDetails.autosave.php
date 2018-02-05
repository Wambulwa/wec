      <div class="main-content">
        <div class="page-title">
          <div class="title">Managing <?php $session_client=$client[0]->cust_id; $client_name=$client[0]->client_name; echo $client_name.' ('.$session_client.')';?></div>
          <!-- <div class="sub-title">Tariffs for client </div> -->
          <ol class="breadcrumb no-bg pl0">
            <li>
              <a href="<?php echo base_url('sales');?>">sales</a>
            </li>
            <li>
              <a href="<?php echo base_url('sales/manageClient');?>">Clients</a>
            </li>
            <li class="active">Manage Client</li>
          </ol>
        </div>
        <div class="card">
          <div class="card-block p-a-0">
            <div class="box-tab justified m-b-0">
              <ul class="wizard-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                </li>
                <li><a href="#quotes" data-toggle="tab">Quotes</a>
                </li>
                <li><a href="#sessions" data-toggle="tab">Sessions</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active in" id="profile">
                  <h3>CLIENT PROFILE</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                  <h4>1. ABOUT</h4>
                  <table style="width: 100%;" class="table table-bordered" border="1">
                    <thead style="font-weight: bold; background: #D8D7E7;">
                      <th>ABOUT</th>
                      <th>Contact</th>
                      <th>Contact person</th>
                      <th>Address</th>
                      <th>Added on</th>
                      <th>Currency</th>
                    </thead>
                    <tbody>
                    <?php foreach ($client as $client):?>
                      <tr>
                        <td><?php echo "Client name: $client->client_name<br>Client ID: $client->cust_id";?></td>
                        <td><?php echo "Phone: $client->client_phone<br>Email: $client->client_email";?></td>
                        <td><?php echo "Name: $client->contact_person_name <br>Email: $client->contact_person_email<br>Phone: $client->contact_person_phone<br> Designation: $client->contact_person_designation";?></td>
                        <td><?php echo "Country: $client->client_country<br>State: $client->client_state<br>City: $client->client_city";?></td>
                        <td><?php echo $client->client_since;?></td>
                        <td><?php echo $client->cust_currency;?></td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="quotes">
                  <h3>Client quotes</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                </div>
                <div class="tab-pane" id="sessions">
                  <h3>Client sessions</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                  <div class="form-group">
                    <i class="fas fa-check">Record all sessions with the client here. This includes meetings, calls, or mail follow ups with the client. You wont need to remeber this next time huh</i><br>
                    <i class="fa fa-check">Kindly enter all fields accordingly</i><br>
                    <button class="btn btn-success" data-toggle="modal" data-target="#clientSessionNotes">click here to view recorded sessions</button>
                    <hr>
                    <?php echo form_open('sales/addClientSessionNotes');?>
                    <div class="form-group row">
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="session_date" data-provide="datepicker" placeholder="Enter date you conversed with <?php echo $client_name;?>" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Session Date</span>
                          </label>
                        </span>
                      </div>
                      <div class="col-sm-5">
                        <span class="input input--focused m-b-md">
                          <select class="input__field cust-col" name="session_type" required="" style="width: 100%;">
                            <option selected="" disabled="">Session type</option>
                            <option value="Phone call">Phone Call</option>
                            <option value="Email conversation">Email conversation</option>
                            <option value="Skype/VOIP">Skype/VOIP call</option>
                            <option value="Client Visit">Client Visit</option>
                            <option value="Luncheon/Dinner">Luncheon/Dinner</option>
                            <option value="Other">Other</option>
                          </select>
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Select session type</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="session_person" placeholder="Enter the person you discussed with from <?php echo $client_name;?>" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Person you had a session with</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <input class="input__field form-control" type="text" name="session_topic" placeholder="Enter the topic discussed about e.g. lapsed business" required="">
                          <label class="input__label" for="input-2">
                            <span class="input__label-content">Topic discussed about</span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label" style="color: #8eafe5;">Discussion notes and content</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <span class="input input--focused m-b-md">
                          <textarea class="summernote input__field form-control" name="session_notes" required="">Delete this text to enter the summary of your conversation with <?php echo $client_name;?></textarea>
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <?php echo form_hidden('client_id',$session_client,'class="form-control"');?>
                        <button class="btn btn-sm btn-primary" style="width: 100%;">Add session notes</button>
                      </div>
                    </div>
                    <?php echo form_close();?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="clientSessionNotes" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Meeting/communication session notes with <?php echo $client_name; ?></h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive table-bordered table-striped table-condensed datatable m-b-0">
                <thead style="background-color: #3868b5;color: #fff;">
                  <th>Date</th><th>Mode</th><th>Notes</th><th>by</th>
                </thead>
                <tbody>
                  <?php if(isset($getSessionNotes)) foreach ($getSessionNotes as $getSessionNotes):?>
                  <tr>
                    <td><?php echo date('D M d Y',strtotime($getSessionNotes->session_date));?></td>
                    <td><?php echo $getSessionNotes->session_type;?></td>
                    <td><?php echo "<b>Topic:<u> $getSessionNotes->session_topic </u></b><br> $getSessionNotes->session_notes";?></td>
                    <td><?php echo $getSessionNotes->staff_fname.' '.$getSessionNotes->staff_sname;?></td>
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
      <!-- /main area -->
    </div>