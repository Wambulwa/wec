      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Manage clients</div>
          <div class="sub-title">This pane allows you to view and manipulate client data</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            <!-- Datatables -->
          </div>
          <div class="card-block">
            <table class="table table-bordered table-condensed datatable m-b-0">
              <thead style="background: #D8D7E7; color: black;">
                <tr>
                  <th>Client ID</th>
                  <th>Client name</th>
                  <th>Contacts</th>
                  <th>Client since</th>
                  <th>About</th>
                </tr>
              </thead>
              <tbody>
              <?php if(isset($clients)){ foreach ($clients as $clients) {?>
                <tr>
                  <td><?php echo form_open('sales/manageClient');?><input type="text" name="client_id" value="<?php  echo $clients->cust_id;?>" hidden=""><button style="background: white; border-style: none;"><?php  echo $clients->cust_id;?></button><?php echo form_close();?></td>
                  <td><?php echo form_open('sales/manageClient');?><input type="text" name="client_id" value="<?php  echo $clients->cust_id;?>" hidden=""><button style="background: white; border-style: none;"><?php  echo $clients->client_name;?></button><?php echo form_close();?></td>
                  <td><?php  echo "Tel: $clients->client_phone";?><br><?php  echo "Email:  $clients->client_email";?><?php  //echo "$clients->client_postal_address";?><br><?php  echo "Location: $clients->client_city, $clients->client_country";?></td>
                  <!-- <td>25</td> -->
                  <td><?php  echo $clients->client_since;?></td>
                  <td><?php 
                  if(($clients->client_type)=='1' && ($clients->is_company)=='1'){
                    echo "Corporate Regular client";
                    }
                  if(($clients->client_type)=='1' && ($clients->is_company)=='0'){
                    echo "Individual Regular client";
                    }
                  if(($clients->client_type)=='2' && ($clients->is_company)=='1'){
                    echo "Corporate one-off client";
                    }
                  if(($clients->client_type)=='2' && ($clients->is_company)=='0'){
                    echo "Individual one-off client";
                    } ?></td>
                </tr>
              <?php } }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>