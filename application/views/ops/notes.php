      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="pull-left no-print">
            <button class="btn btn-primary btn-lg" type="button" data-target="#addNotes" data-toggle="modal">ADD NOTES</button>
          </div>
          <div class="pull-left no-print" style="margin-left: 2%;">
            <button class="btn btn-primary btn-lg" type="button" data-target="#myNotes" data-toggle="modal">PERSONAL NOTES</button>
          </div>
          <div class="pull-left no-print" style="margin-left: 2%;">
            <button class="btn btn-primary btn-lg" type="button" data-target="#teamNotes" data-toggle="modal">TEAM NOTES</button>
          </div>
          <div class="pull-left no-print" style="margin-left: 2%;">
            <button class="btn btn-primary btn-lg" type="button" data-target="#clientNotes" data-toggle="modal">CLIENT NOTES</button>
          </div>
          <div class="pull-left no-print" style="margin-left: 2%;">
            <button class="btn btn-primary btn-lg" type="button" data-target="#expiredNotes" data-toggle="modal">EXPIRED NOTES</button>
          </div>
        </div><hr />
        <div class="row mb25" style="display: none;">
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-primary text-white">
                <div class="pull-left">Personal Notes</div>
                <div class="card-controls">
                  <a href="javascript:;" class="card-collapse" data-toggle="card-collapse">
                    <i class="card-icon-collapse"></i>
                  </a>
                  <a href="javascript:;" class="card-remove" data-toggle="card-remove">
                    <i class="card-icon-remove"></i>
                  </a>
                </div>
              </div>
              <div class="card-block">
                <p>
                  <?php foreach ($myNotes as $notes): ?>
                    <li><?php echo $notes->notes;?></li>
                  <?php endforeach ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-primary text-white">
                <div class="pull-left">Me and clients</div>
                <div class="card-controls">
                  <a href="javascript:;" class="card-collapse" data-toggle="card-collapse">
                    <i class="card-icon-collapse"></i>
                  </a>
                  <a href="javascript:;" class="card-refresh" data-toggle="card-refresh">
                    <i class="card-icon-reload"></i>
                  </a>
                  <a href="javascript:;" class="card-remove" data-toggle="card-remove">
                    <i class="card-icon-remove"></i>
                  </a>
                </div>
              </div>
              <div class="card-block">
                <p>Client notes i take come here</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-primary text-white">
                <div class="pull-left">Me and clients</div>
                <div class="card-controls">
                  <a href="javascript:;" class="card-collapse" data-toggle="card-collapse">
                    <i class="card-icon-collapse"></i>
                  </a>
                  <a href="javascript:;" class="card-refresh" data-toggle="card-refresh">
                    <i class="card-icon-reload"></i>
                  </a>
                  <a href="javascript:;" class="card-remove" data-toggle="card-remove">
                    <i class="card-icon-remove"></i>
                  </a>
                </div>
              </div>
              <div class="card-block">
                <p>Client notes i take come here</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-info text-white">
                Team notes
              </div>
              <div class="card-block">
                <p>Team notes come here. They are public to the departmental team.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-danger text-white">
                Other category1
              </div>
              <div class="card-block">
                <p>Other category1 notes.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-header bg-warning text-white">
                Other category2
              </div>
              <div class="card-block">
                <p>Other category1 notes.</p>
              </div>
            </div>
          </div>
        </div>
        <p style="display: none;">Willfreight updates</p>
        <div class="row mb25" style="display: none;">
          <div class="col-md-6">
            <div class="card bg-white">
              <div class="card-header bg-danger text-white">
                Willfreight updates 1
              </div>
              <div class="card-block">
                <div class="scrollable" style="height: 130px;">
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                  <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                  <p>Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Curabitur blandit tempus porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-white">
              <div class="card-header">
                Willfreight updates 2
              </div>
              <div class="card-block">
                <div class="scrollable" style="height: 130px;">
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                  <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                  <p>Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                  <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Curabitur blandit tempus porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <style type="text/css">
      .col-sm-2{
        border-right: none;
        border-top: none;
        border-left: none;
        border-bottom-color: #63D1F4;
        border-bottom-width: 1px;
      }
    </style>
    <!-- /content panel -->
    <!-- bottom footer -->
<!--ADD NOTES-->
<div id="addNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD NOTES BELOW</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <?php echo form_open('ops/myNotes');?>
            <div class="form-group">
              <select name="note_category" class="form-control cust-col" title="Select the category under which the note lies. e.g. Personal, Departmental or Organizational. This affects who sees the note you created" style="width: 100%;">
                <option selected="" disabled=""> Select notes category</option>
                <?php foreach ($category as $category):?>
                <option title="<?php echo $category->category_desc;?>" value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
              <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="visible_from" class="form-control cust-col cust-col1" title="This note will be not visible until this date. You can use this to schedule notes to be shown at a later date" data-provide="datepicker" placeholder="Visble from......">
              <input type="text" name="visible_to" class="form-control cust-col" title="This note will be not visible after this date. Only you will be able to see it as an expired note" data-provide="datepicker" placeholder="Visble to......">
            </div>
            <div class="form-group">
              <textarea name="notes" class="form-control summernote" rows="2" placeholder="Delete this text to replace with your note here..." style="width: 100%; margin-top: 10px;"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary">ADD NOTE</button>
            </div>
          <?php echo form_close();?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//ADD NOTES-->
<!--ADD CLIENT NOTES-->
<div id="addNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD NOTES BELOW</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <?php echo form_open('ops/myNotes');?>
            <select name="note_category" class="form-control" title="Select the category under which the note lies. e.g. Personal, Departmental or Organizational. This affects who sees the note you created" style="width: 100%;">
              <option selected="" disabled="">Category</option>
              <?php foreach ($category as $category):?>
              <option title="<?php echo $category->category_desc;?>" value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
            <?php endforeach;?>
            </select><hr>
            <table style="width: 100%;">
              <tr>
                <td>Visible from</td>
                <td><input type="date" name="visible_from" class="form-control" title="This note will be not visible until this date. You can use this to schedule notes to be shown at a later date"><hr></td>
              </tr>
              <tr>
                <td>Visible until</td>
                <td><input type="date" name="visible_to" class="form-control" title="This note will be not visible after this date. Only you will be able to see it as an expired note"></td>
              </tr>
            </table><hr>
            <textarea name="notes" class="form-control summernote" rows="2" placeholder="Delete this text to replace with your note here..." style="width: 100%;"></textarea><br>
            <button class="btn btn-primary">ADD NOTE</button>
          <?php echo form_close();?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//ADD CLIENT NOTES-->
<!--PERSONAL NOTES-->
<div id="myNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PERSONAL NOTES</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <table style="width: 100%;" class="table table-basic bordered">
            <thead>
              <th>DATE</th><th>NOTE</th>
            </thead>
            <tbody>
              <?php foreach ($myNotes as $notes):
              if($notes->note_category==2): ?>
                <tr>
                  <td><?php echo date('d/M/Y H:i',strtotime($notes->time_created));?></td>
                  <td><?php echo $notes->notes;?></td>
                </tr>
              <?php endif; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//PERSONAL NOTES-->
<!--TEAM NOTES-->
<div id="teamNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TEAM NOTES</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <table style="width: 100%;" class="table table-basic bordered">
            <thead>
              <th>DATE</th><th>NOTE</th>
            </thead>
            <tbody>
              <?php foreach ($myNotes as $notes):
              if($notes->note_category==1): ?>
                <tr>
                  <td><?php echo date('d/M/Y H:i',strtotime($notes->time_created));?></td>
                  <td><?php echo $notes->notes;?></td>
                </tr>
              <?php endif; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//TEAM NOTES-->
<!--CLIENT NOTES-->
<div id="clientNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CLIENT NOTES</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <table style="width: 100%;" class="table table-basic bordered">
            <thead>
              <th>DATE</th><th>NOTE</th>
            </thead>
            <tbody>
              <?php foreach ($myNotes as $notes):
              if($notes->note_category==4): ?>
                <tr>
                  <td><?php echo date('d/M/Y H:i',strtotime($notes->time_created));?></td>
                  <td><?php echo $notes->notes;?></td>
                </tr>
              <?php endif; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//CLIENT NOTES-->
<!--EXPIRED NOTES-->
<div id="expiredNotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EXPIRED NOTES</h4>
      </div>
      <div class="modal-body">
        <div class="card-block">
          <table style="width: 100%;">
            <thead>
              <th>DATE</th><th>NOTE</th>
            </thead>
            <tbody>
              <tr>
                <td>DAte</td>
                <td>Note</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--//EXPIRED NOTES-->
<style type="text/css">
  .cust-col{
    border-right: none;
    border-top: none;
    border-left: none;
    border-bottom-color: #b3b3ff;
    text-align: center;
  }
  .cust-col1{
    margin-bottom: 10px;
  }
  .cust-tr{
    width: 100%;
  }
  .abc{
    width: 10px;
  }
</style>