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
              <thead style="background: #4b78c1; color: #fff;">
                <tr>
                  <th>Client ID</th>
                  <th>Client name</th>
                  <th>Contacts</th>
                  <th>Client since</th>
                  <th>About</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php if(isset($clients)){ foreach ($clients as $clients) {?>
                <tr>
                  <td>
                    <?php echo form_open('ops/manageClient');?>
                    <?php echo form_hidden('client_id',$clients->cust_id);?>
                    <?php  echo $clients->cust_id;?>
                  </td>
                  <td>
                    <?php echo form_hidden('client_name',$clients->client_name);?>
                    <?php  echo $clients->client_name;?>                     
                  </td>
                  <td><?php  echo "Tel: $clients->client_phone";?><br>
                    <?php  echo "Email:  $clients->client_email";?><br>
                    <?php  echo "Location: $clients->client_city, $clients->client_country";?>
                  </td>
                  <td><?php  echo $clients->client_since;?></td>
                  <td>
                    <?php
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
                      } ?>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm">Open</button>
                      <?php echo form_close();?>
                    </td>
                </tr>
              <?php } }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>