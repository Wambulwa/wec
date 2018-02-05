      <div class="main-content">
        <div class="page-title">
          <div class="title">Manage Leads</div>
          <!-- <div class="sub-title">Tariffs for client </div> -->
          <ol class="breadcrumb no-bg pl0">
            <li>
              <a href="<?php echo base_url('sales');?>">sales</a>
            </li>
            <li>
              <a href="<?php echo base_url('sales/manageLead');?>">Leads</a>
            </li>
            <li class="active">Manage Leads</li>
          </ol>
        </div>
        <!-- <p>Vertical Tabs</p>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-block p-a-0">
                <div class="box-tab vertical m-b-0">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#home2" data-toggle="tab">Home</a>
                    </li>
                    <li><a href="#profile2" data-toggle="tab">Profile</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active in" id="home2">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                    </div>
                    <div class="tab-pane" id="profile2">
                      <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum. Etiam porta sem malesuada magna mollis euismod.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <p>Wizard steps</p> -->
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
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($client as $client):?>
                      <tr>
                        <td><?php echo "Client name: $client->client_name<br>Client ID: $client->cust_id";?></td>
                        <td><?php echo "Phone: $client->client_phone<br>Email: $client->client_email";?></td>
                        <td><?php echo "Name: $client->contact_person_name <br>Email: $client->contact_person_email<br>Phone: $client->contact_person_phone<br> Designation: $client->contact_person_designation";?></td>
                        <td><?php echo "Country: $client->client_country<br>State: $client->client_state<br>City: $client->client_city";?></td>
                        <td><?php echo $client->client_since;?></td>
                        <td><?php echo form_open('sales/convertTo');?><input type="text" name="lead_id_cust" value="<?php echo $client->cust_id;?>" hidden=""><button class="btn btn-primary btn-sm">CONVERT TO CLIENT</button><?php echo form_close();?><br>
                        <?php echo form_open('sales/convertTo');?><input type="text" name="lead_id_pros" value="<?php echo $client->cust_id;?>" hidden=""><button class="btn btn-primary btn-sm">CONVERT TO PROSPECT</button><?php echo form_close();?></td>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
