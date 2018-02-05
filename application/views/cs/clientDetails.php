      <div class="main-content">
        <div class="page-title">
          <div class="title">You are handling <?php echo $client_name; ?></div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
