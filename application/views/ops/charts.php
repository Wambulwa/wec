      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">
        <div class="page-title" style="display: none;">
          <div class="title">Easypie</div>
          <div class="sub-title">Easypie pie charts</div>
        </div>
        <div class="row">
        <!-- FORMULA AND VARIABLES -->
        <?php
          // $imports=($consHandled[0]->consignments/$imports[0]->imports)*100;
          // $exports=($consHandled[0]->consignments/$exports[0]->exports)*100;
          // $local=($consHandled[0]->consignments/$locals[0]->locals)*100;
         ?>
        <!-- //FORMULA AND VARIABLES -->
        <!-- CONSIGNMENTS -->
          <div class="col-md-6 col-lg-3">
            <div class="card bg-white">
              <div class="card-header">
                Consignments handled
              </div>
              <div class="card-block text-center">
                <div class="piechart">
                  <div class="bounce" data-percent="<?php 67;?>">
                    <div>
                      <!-- <div class="percent h1"></div>
                      <small>of target</small> -->
                      <div class="h1"><?php echo $consHandled[0]->consignments;?></div>
                      <small>today</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
          <!-- EXPORTS -->
            <div class="card bg-white">
              <div class="card-header">
                Exports handled
              </div>
              <div class="card-block text-center">
                <div class="piechart">
                  <?php if($cie[0]->cie="Export"): $exports=($exports[0]->exports/$consHandled[0]->consignments)*100;?>
                  <div class="signup" data-percent="<?php echo $exports;?>">
                    <div>
                      <div class="percent h1"></div>
                      <small><?php echo $cie[0]->cie;?></small>
                    </div>
                  </div>
                <?php else:?>
                  <div class="signup" data-percent="0">
                    <div>
                      <div class="percent h1"></div>
                      <small></small>
                    </div>
                  </div>
                <?php endif;?>
                </div>
              </div>
            </div>
          </div>
          <!-- IMPORTS -->
          <div class="col-md-6 col-lg-3">
            <div class="card bg-white">
              <div class="card-header">
                Imports handled
              </div>
              <div class="card-block text-center">
                <div class="piechart">                  
                 <?php if($cie[0]->cie='Import'): $imports=($imports[0]->imports/$consHandled[0]->consignments)*100;?>
                  <div class="visitor" data-percent="<?php echo $imports;?>">
                    <div>
                      <div class="percent h1"></div>
                      <small><?php echo $cie[0]->cie;?></small>
                    </div>
                  </div>
                <?php else:?>
                  <div class="visitor" data-percent="0">
                    <div>
                      <div class="percent h1"></div>
                      <small></small>
                    </div>
                  </div>
                <?php endif;?>
                </div>
              </div>
            </div>
          </div>
          <!-- LOCAL -->
          <div class="col-md-6 col-lg-3">
            <div class="card bg-white">
              <div class="card-header">
                Local handled
              </div>
              <div class="card-block text-center">
                <div class="piechart">                  
                 <?php if($cie[0]->cie='Local'): $local=($locals[0]->locals/$consHandled[0]->consignments)*100;?>
                  <div class="visitor" data-percent="<?php echo $local;?>">
                    <div>
                      <div class="percent h1"></div>
                      <small><?php echo $cie[0]->cie;?></small>
                    </div>
                  </div>
                <?php else:?>
                  <div class="visitor" data-percent="0">
                    <div>
                      <div class="percent h1"></div>
                      <small></small>
                    </div>
                  </div>
                <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="<?php echo base_url('scripts/helpers/modernizr.js');?>"></script>
  <script src="<?php echo base_url('vendor/jquery/dist/jquery.js');?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/dist/js/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('vendor/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?php echo base_url('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js');?>"></script>
  <script src="<?php echo base_url('scripts/helpers/smartresize.js');?>"></script>
  <script src="<?php echo base_url('scripts/constants.js');?>"></script>
  <script src="<?php echo base_url('scripts/main.js');?>"></script>
  <!-- endbuild -->
  <!-- page scripts -->
  <script src="<?php echo base_url('vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js');?>"></script>
  <!-- end page scripts -->
  <!-- initialize page scripts -->
  <script src="<?php echo base_url('scripts/charts/easypie.js');?>"></script>
  <!-- end initialize page scripts -->
</body>

</html>