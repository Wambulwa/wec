      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title">MY NOTES</div>
          <!-- <div class="sub-title">UI portlets</div> -->
        </div>
        <div class="row mb25">
        <div class="col-md-12">
            <div class="card bg-white">
              <div class="card-header bg-primary text-white">
                <div class="pull-left">ADD A NOTE</div>
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
              <?php echo form_open('sales/myNotes');?>
                <select name="note_category" class="form-control col-sm-3" title="Select the category under which the note lies. e.g. Personal, Departmental or Organizational. This affects who sees the note you created">
                  <option selected="" disabled="">Category</option>
                  <?php foreach ($category as $category):?>
                  <option title="<?php echo $category->category_desc;?>" value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
                <?php endforeach;?>
                </select>
                <label class="col-sm-1">Visible from </label>
                <input type="date" name="visible_from" class="col-sm-2" title="This note will be not visible until this date. You can use this to schedule notes to be shown at a later date">
                <label class="col-sm-1">to</label>
                <input type="date" name="visible_to" class="col-sm-2" title="This note will be not visible after this date. Only you will be able to see it as an expired note"><br><hr>
                <textarea name="notes" class="form-control col-sb-4 summernote" rows="2">Delete this text to replace with your note here...</textarea><br>
                <button class="btn btn-primary">ADD NOTE</button>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
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
                <p><?php foreach ($myNotes as $notes): ?>
                  <li><?php echo $notes->notes;?></li>
                <?php endforeach ?></p>
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
        <p>Willfreight updates</p>
        <div class="row mb25">
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