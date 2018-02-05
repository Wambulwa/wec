      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">

      	<script async="" src="<?php echo base_url('scripts/reports/line/analytics.js');?>"></script>
  		<script src="<?php echo base_url('scripts/reports/line/Chart.bundle.js');?>"></script>
  		<style type="text/css">/* Chart.js */
    		@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
  		</style>
  		<script src="<?php echo base_url('scripts/reports/line/utils.js');?>"></script>

        <div class="page-title" style="display: none;">
          <div class="title">Easypie</div>
          <div class="sub-title">Easypie pie charts</div>
        </div>
        <!-- <div class="row"> -->
        <!-- FORMULA AND VARIABLES -->
        <!-- //FORMULA AND VARIABLES -->
        <!-- CONSIGNMENTS -->
            <div style="width: 90%;">
		        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
		            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
		                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
		            </div>
		            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
		                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
		            </div>
		        </div>
		        <canvas id="canvas" width="1013" height="506" class="chartjs-render-monitor" style="display: block; width: 1013px; height: 506px;"></canvas>
		    	<progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>
		    </div>
		    <br>
		    <br>
		    <!-- RANDOMIZE BUTTON -->
		    <!-- <button id="randomizeData">Randomize Data</button> -->
		    <!-- //RANDOMIZE BUTTON -->
		    <!-- ALL CONSIGNMENTS DATA -->
		    <?php
		    $january=$this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="1" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $february=$this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="2" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $march = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="3" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $april = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="4" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $may = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="5" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $june = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="6" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $july = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="7" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $august=$this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="8" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $september=$this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="9" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $october = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="10" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $november = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="11" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		    $december = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="12" AND sent_to_accounts="1" AND (cons_import_export="Export" OR cons_import_export="Import") GROUP BY bol_cons_id');
		     ?>
		     <!-- //ALL CONSIGNMENTS DATA-->
		     <!-- ALL IMPORTS DATA -->
		    <?php
		    $import1 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="1" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import2 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="2" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import3 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="3" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import4 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="4" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import5 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="5" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import6 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="6" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import7 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="7" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import8 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="8" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import9 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="9" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import10 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="10" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import11 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="11" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $import12 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="12" AND cons_import_export="Import" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		     ?>
		     <!-- //ALL IMPORTS DATA-->
		      <!-- ALL EXPORTS DATA -->
		    <?php
		    $export1 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="1" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export2 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="2" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export3 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="3" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export4 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="4" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export5 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="5" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export6 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="6" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export7 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="7" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export8 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="8" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export9 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="9" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export10 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="10" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export11 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="11" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		    $export12 = $this->db->query('SELECT cons_id FROM Consignment,cons_bill_of_landing where cons_id=bol_cons_id AND month(bol_added_on)="12" AND cons_import_export="Export" AND sent_to_accounts="1" GROUP BY bol_cons_id');
		     ?>
		     <!-- //ALL EXPORTS DATA-->
		    <script>
		        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		        var progress = document.getElementById('animationProgress');
		        var config = {
		            type: 'line',
		            data: {
		                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		                datasets: [{
		                    label: "Exports cleared",
		                    fill: false,
		                    borderColor: window.chartColors.red,
		                    backgroundColor: window.chartColors.red,
		                    data: [
		                    	// NUMBER OF EXPORTS CLEARED
		                    	<?php echo $export1->num_rows().','.$export2->num_rows().','.$export3->num_rows().','.$export4->num_rows().','.$export5->num_rows().','.$export6->num_rows().','.$export7->num_rows().','.$export8->num_rows().','.$export9->num_rows().','.$export10->num_rows().','.$export11->num_rows().','.$export12->num_rows();?>
		                    ]
		                }, {
		                    label: "Imports cleared",
		                    fill: false,
		                    borderColor: window.chartColors.blue,
		                    backgroundColor: window.chartColors.blue,
		                    data: [
		                    	// NUMBER OF IMPORTS CLEARED
		                    	<?php echo $import1->num_rows().','.$import2->num_rows().','.$import3->num_rows().','.$import4->num_rows().','.$import5->num_rows().','.$import6->num_rows().','.$import7->num_rows().','.$import8->num_rows().','.$import9->num_rows().','.$import10->num_rows().','.$import11->num_rows().','.$import12->num_rows();?>
		                    ]
		                },
		                {
		                    label: "Total Consignments cleared",
		                    fill: false,
		                    borderColor: window.chartColors.orange,
		                    backgroundColor: window.chartColors.orange,
		                    data: [
		                    	// NUMBER OF TOTAL CONSIGNMENTS
		                    	<?php echo $january->num_rows().','.$february->num_rows().','.$march->num_rows().','.$april->num_rows().','.$may->num_rows().','.$june->num_rows().','.$july->num_rows().','.$august->num_rows().','.$september->num_rows().','.$october->num_rows().','.$november->num_rows().','.$december->num_rows();?>
		                    ]
		                }]
		            },
		            options: {
		                title:{
		                    display:true,
		                    text: "Summary Report of Consignments Cleared"
		                },
		                animation: {
		                    duration: 2000,
		                    onProgress: function(animation) {
		                        progress.value = animation.currentStep / animation.numSteps;
		                    },
		                    onComplete: function(animation) {
		                        window.setTimeout(function() {
		                            progress.value = 0;
		                        }, 2000);
		                    }
		                }
		            }
		        };

		        window.onload = function() {
		            var ctx = document.getElementById("canvas").getContext("2d");
		            window.myLine = new Chart(ctx, config);
		        };

		        document.getElementById('randomizeData').addEventListener('click', function() {
		            config.data.datasets.forEach(function(dataset) {
		                dataset.data = dataset.data.map(function() {
		                    return randomScalingFactor();
		                });
		            });

		            window.myLine.update();
		        });
		    </script>
        <!-- </div> -->
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
  <!-- end initialize page scripts -->

  <style>
    canvas {
        /*-moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;*/
        }
  </style>
</body>

</html>