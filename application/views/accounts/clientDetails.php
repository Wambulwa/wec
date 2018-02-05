      <div class="main-content">
        <div class="page-title">
          <div class="title">You are handling <strong><?php echo $client_name;?></strong></div>
          <!-- <div class="sub-title">Tariffs for client </div> -->
          <ol class="breadcrumb no-bg pl0">
            <li>
              <a href="<?php echo base_url('accounts');?>">Accounts</a>
            </li>
            <li>
              <a href="<?php echo base_url('accounts/manageClient');?>">Clients</a>
            </li>
            <li class="active">Manage Client</li>
          </ol>
        </div>
        <p>Click on any tab to view info under it</p>
        <div class="card">
          <div class="card-block p-a-0">
            <div class="box-tab justified m-b-0">
              <ul class="wizard-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                </li>
                <li><a href="#quotes" data-toggle="tab">Quotes</a>
                </li>
                <li><a href="#invoices" data-toggle="tab">Invoices</a>
                </li>
                <li><a href="#sessions" data-toggle="tab">Sessions</a>
                </li>
                <li><a href="#tariffs" data-toggle="tab">Tariffs</a>
                </li>
                <li><a href="#settings" data-toggle="tab">Settings</a>
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
                      <th>Client since</th>
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
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                  <h4>2. CREDIT INFORMATION</h4>
                  <h5 style="margin-left: 10px;">2.1 CREDIT TERMS</h5>
                  <table style="width: 100%;" border="1">
                    <thead style="background: #D8D7E7; text-transform: uppercase;">
                      <th>Credit days</th>
                      <th>Credit limit</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>15 days</td>
                        <td>KES 150,000</td>
                      </tr>
                    </tbody>
                  </table>
                  <h5 style="margin-left: 10px; margin-top: 10px;">2.2 CREDIT WORTHINESS</h5>
                  <table border="1" style="width: 100%;">
                    <thead style="background: #D8D7E7; text-transform: uppercase;">
                      <th>#times paid late</th>
                      <th>#times paid on time</th>
                      <th>#times made invoice change</th>
                      <th>#times defaulted</th>
                    </thead>
                    <tbody style="text-align: center;">
                      <tr>
                        <td>0</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                    </tbody>
                  </table>
                  <h5 style=" font-weight: bold; text-transform: uppercase; font-size: 18px;">Customer badge: Excellent credit score</h5>
                </div>
                <div class="tab-pane" id="quotes">
                  <h3>Client quotes</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                </div>
                <div class="tab-pane" id="invoices">
                  <h3>List of invoices sent to client</h3>
                  <h5>The client has disbursed <?php foreach ($total_received as $total_received) { echo "$total_received->inv_currency $total_received->total_received in total since start of business";} ?></h5>
<!--FOR BORDER--><table style="width: 100%; border-style: dashed; margin-bottom: 5px;" border="1"><thead><th></th></thead></table>
                  <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered" style="width: 100%;">
                    <thead style="background: #D8D7E7; color: black;">
                      <th style="height: 20px;">Date</th>
                      <th>Invoice#</th>
                      <th>Invoice amount</th>
                      <th>Invoice terms</th>
                      <th>payment status</th>
                    </thead>
                    <tbody>
                    <?php foreach ($invoice as $invoice):?>        
                      <tr>
                        <?php echo form_open('accounts/printInvoice');?>
                        <td><?php echo "Created on: ".date('M d, Y',strtotime($invoice->inv_date))."<br>Due date: ".date('M d, Y',strtotime($invoice->inv_due_date));?></td>
                        <td><button style="border:none; width: 100%; background-color: inherit;color: black;"><a target="_blank"><input type="text" name="invoice_id" value="<?php echo $invoice->invoice_id;?>" readonly="" style="border:none;"></a></button></td>
                        <td><?php echo $invoice->inv_currency.' '.$invoice->amount;?></td>
                        <td><?php echo $invoice->terms.' days';?></td>
                        <td><?php if($invoice->bal<=0): echo "Fully paid"; elseif($invoice->bal>0&&$invoice->bal<$invoice->amount): echo "Partly paid<br><b>$invoice->inv_currency $invoice->bal </b> remaining"; else: echo "Nothing paid. Balance still stands at <b>$invoice->inv_currency $invoice->bal</b>"; endif;?></td>
                        <td><?php $data=json_encode($invoice); ?></td>
                        <?php echo form_close();?>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p></p>
                </div>
                <div class="tab-pane" id="sessions">
                  <h3>Client sessions</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                </div>
                <div class="tab-pane" id="tariffs">
                  <h3>Client service tariffs</h3><p>The client is on tariff block <strong><?php echo $tariff_name; ?></strong>. Below are the charges in the tariff block</p>
<!--FOR BORDER--><table style="width: 100%; border-style: dashed; margin-bottom: 5px;" border="1"><thead><th></th></thead></table>
                  <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered" style="width: 100%;">
                    <thead style="background: #D8D7E7; color: black;">
                      <th>Service</th>
                      <th>Charges</th>
                    </thead>
                    <tbody>
                      <?php foreach ($tariff_block_data as $tariff_block_data):?>
                      <tr>
                        <td><?php echo $tariff_block_data->service_name;?></td>
                        <td><?php echo $tariff_block_data->tb_service_charge;?></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <h3>Client settings</h3>
                  <table style="width: 100%; border-style: dashed;" border="1"><thead><th></th></thead></table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
