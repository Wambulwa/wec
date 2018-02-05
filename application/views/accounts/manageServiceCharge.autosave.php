      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">Manage Service Charges</div>
          <!-- <div class="sub-title">UI editable datatables</div> -->
        </div>
        <div class="card bg-white">
          <div class="card-header">
            Datatables
          </div>
          <div class="card-block">
            <table class="table table-bordered table-striped datatable editable-datatable responsive align-middle bordered">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Charges (KES)</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Is active?</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($serviceCharges as $serviceCharges):?>
                  <tr>
                    <td><?php echo $serviceCharges->service_name;?></td>
                    <td><?php echo $serviceCharges->service_min_rate.' - '.$serviceCharges->service_max_rate;?></td>
                    <td><?php echo $serviceCharges->service_category;?></td>
                    <td><?php echo $serviceCharges->service_notes;?></td>
                    <td><?php if($serviceCharges->is_active==1){echo 'YES';}else{ echo 'NO';}?></td>
                    <td><a href="javascript:;" class="delete">Hide</a></td>
                  </tr>
                <?php endforeach;?>
                <!-- <tr>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>5407</td>
                  <td>2008/11/28</td>
                  <td><a href="javascript:;" class="edit">Edit</a>
                  </td>
                  <td><a href="javascript:;" class="delete">Delete</a>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->