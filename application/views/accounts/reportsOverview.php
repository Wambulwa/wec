      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">
	<!-- MONTHLY REVENUE COLLECTION -->
		    <?php
		    if($jan[0]->jan==""){ $january=0; $a=1;$b=$january;} else { $january=$jan[0]->jan;$a=1;$b=$january; }
		    if($feb[0]->feb==""){ $february=0;$a=2;$b=$february; } else { $february=$feb[0]->feb;$a=2;$b=$february; }
		    if($mar[0]->mar==""){ $march=0;$a=3;$b=$march; } else { $march=$mar[0]->mar;$a=3;$b=$march; }
		    if($apr[0]->apr==""){ $april=0;$a=4;$b=$april; } else { $april=$apr[0]->apr;$a=4;$b=$april; }
		    if($may[0]->may==""){ $may=0;$a=5;$b=$may; } else { $may=$may[0]->may;$a=5;$b=$may; }
		    if($jun[0]->jun==""){ $june=0;$a=6;$b=$june; } else { $june=$jun[0]->jun;$a=6;$b=$june; }
		    if($jul[0]->jul==""){ $july=0;$a=7;$b=$july; } else { $july=$jul[0]->jul;$a=7;$b=$july; }
		    if($aug[0]->aug==""){ $august=0;$a=8;$b=$august; } else { $august=$aug[0]->aug;$a=8;$b=$august; }
		    if($sep[0]->sep==""){ $september=0;$a=9;$b=$september; } else { $september=$sep[0]->sep;$a=9;$b=$september; }
		    if($oct[0]->oct==""){ $october=0;$a=10;$b=$october; } else { $october=$oct[0]->oct;$a=10;$b=$october; }
		    if($nov[0]->nov==""){ $november=0;$a=11;$b=$november; } else { $november=$nov[0]->nov;$a=11;$b=$november; }
		    if($dece[0]->dece==""){ $december=0;$a=12;$b=$december; } else { $december=$dece[0]->dece;$a=12;$b=$december; }
		     ?>
	<!-- //MONTHLY REVENUE COLLECTION-->
      	<script async="" src="<?php echo base_url('scripts/reports/line/analytics.js');?>"></script>
  		<script src="<?php echo base_url('scripts/reports/line/Chart.bundle.js');?>"></script>
  		<style type="text/css">/* Chart.js */
    		@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
  		</style>
  		<script src="<?php echo base_url('scripts/reports/line/utils.js');?>"></script>
        <!-- <div class="row"> -->
        <!-- FORMULA AND VARIABLES -->
        <!-- //FORMULA AND VARIABLES -->
        <!-- CONSIGNMENTS -->
        <div style="width: 100%;">
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
	    <div class="card bg-white no-border">
            <div class="row text-center">
              <div class="col-sm-4 col-xs-6 p-t p-b">
                <h4 class="m-t-0 m-b-0">KES <?php if($a=date('m')){ echo $b;}?></h4>
                <small class="text-muted bold"><?php echo date('F') ?> Revenue</small>
              </div>
              <div class="col-sm-4 col-xs-6 p-t p-b">
                <h4 class="m-t-0 m-b-0"><?php $diff=$b-$lastMonth[0]->lastMonth; $xyz=($diff/$b)*100; echo $xyz; ?>%</h4>
                <small class="text-muted bold">Revenue growth from last month</small>
              </div>
              <div class="col-sm-4 col-xs-6 p-t p-b">
                <h4 class="m-t-0 m-b-0">KES <?php echo $january+$february+$march+$april+$may+$june+$july+$august+$september+$october+$november+$december;?></h4>
                <small class="text-muted bold">Year's Revenue</small>
              </div>
            </div>
      	</div>
      	<div class="row same-height-cards">
          <div class="col-md-8">
            <div class="card no-border bg-white">
              <div class="card-block row-equal align-middle">
                <div class="column p-r">
                  <div class="h6 text-uppercase">Upcoming due invoices.</div>
                  <p>All upcoming due invoices will appear here (Those invoices with less than 7 days remaining to be overdue).</p>
                  <div class="widget-card-title">
                    <div class="pull-right">
                      <span class="m-r"><i class="icon-bar-chart text-primary"></i>&nbsp;One-off</span>
                      <span><i class="icon-bar-chart text-success"></i>&nbsp;Regular</span>
                    </div>
                    <h5 class="text-success">KES 56,873 </h5><p>(sum of upcoming due invoices)</p>
                  </div>
                </div>
                <div class="column p-l">
                  <div class="dashboard-barO" style="height:200px"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card no-border bg-white">
              <div class="card-block">
                <div class="text-center p-a">
                  <h4 class="card-title p-a-lg m-b-0">General updates and news from team for team.</h4>
                </div>
                <div class="">
                  <a href="#" class="card-link pull-right"><i class="icon-clock"></i>&nbsp;Date/Time posted</a>
                  <a href="#" class="card-link m-l-0">Phoebe Sample</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card card-block no-border bg-primary">
              <div class="card-title text-center">
                <h5 class="m-a-0 text-uppercase">Monthly invoice projection</h5>
                <!-- <small>the quick brew</small> -->
              </div>
              <div class="canvas-holder">
                <div class="chart labels-white dashboard-bar2" style="height:71px"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="row">
              <div class="col-sm-6">
                <div class="card card-block no-border bg-white row-equal align-middle">
                  <div class="column">
                    <h6 class="m-a-0 text-uppercase">PAID</h6>
                    <small class="bold text-muted">KES 10,499.71</small>
                  </div>
                  <div class="column">
                    <h3 class="m-a-0 text-danger">(40%)</h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card card-block no-border bg-white row-equal align-middle">
                  <div class="column">
                    <h6 class="m-a-0 text-uppercase">UNPAID</h6>
                    <small class="bold text-muted">KES 10,142.72</small>
                  </div>
                  <div class="column">
                    <h3 class="m-a-0 text-success">(20%)</h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card card-block no-border bg-white row-equal align-middle">
                  <div class="column">
                    <h6 class="m-a-0 text-uppercase">OVERDUE</h6>
                    <small class="bold text-muted">KES 17,392.22</small>
                  </div>
                  <div class="column">
                    <h3 class="m-a-0 text-danger">20%</h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card card-block no-border bg-white row-equal align-middle">
                  <div class="column">
                    <h6 class="m-a-0 text-uppercase">PARTIALLY PAID</h6>
                    <small class="bold text-muted">KES 651.23</small>
                  </div>
                  <div class="column">
                    <h3 class="m-a-0 text-success">(40%)</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="card card-block no-border bg-white">
              <div class="circle-icon bg-info text-white m-r">
                <i class="icon-bulb"></i>
              </div>
              <div class="overflow-hidden" style="margin-top:1px;">
                <h4 class="m-a-0">93</h4>
                <h6 class="m-a-0 text-muted">Invoices created</h6>
              </div>
            </div>
            <div class="card card-block no-border bg-white">
              <div class="circle-icon bg-danger text-white m-r">
                <i class="icon-user"></i>
              </div>
              <div class="overflow-hidden" style="margin-top:1px;">
                <h4 class="m-a-0">8.3K (10%)</h4>
                <h6 class="m-a-0 text-muted">Revenue increase</h6>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-lg-4">
            <div class="card card-block no-border bg-white">
              <div class="circle-icon bg-info text-white m-r">
                <i class="icon-bulb"></i>
              </div>
              <div class="overflow-hidden" style="margin-top:1px;">
                <h4 class="m-a-0">KES 760</h4>
                <h6 class="m-a-0 text-muted">Paid to creditors</h6>
              </div>
            </div>
            <div class="card card-block no-border bg-white">
              <div class="circle-icon bg-danger text-white m-r">
                <i class="icon-user"></i>
              </div>
              <div class="overflow-hidden" style="margin-top:1px;">
                <h4 class="m-a-0">KES 212</h4>
                <h6 class="m-a-0 text-muted">Still to be paid</h6>
              </div>
            </div>
          </div>
        </div>
		    <br>
		    <br>
		    <!-- RANDOMIZE BUTTON -->
		    <button id="randomizeData">Randomize Data</button>
		    <!-- //RANDOMIZE BUTTON -->
		    
		    <script>
		        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		        var progress = document.getElementById('animationProgress');
		        var config = {
		            type: 'line',
		            // radar,polar,pie,line,doughnut,scatter,bar,area
		            data: {
		                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		                datasets: [
		                {
		                    label: "Revenue",
		                    fill: false,
		                    borderColor: window.chartColors.purple,
		                    backgroundColor: window.chartColors.purple,
		                    data: [
		                    	// REVENUE GENERATES IN MONTHS
		                    	<?php echo $january.','.$february.','.$march.','.$april.','.$may.','.$june.','.$july.','.$august.','.$september.','.$october.','.$november.','.$december;?>
		                    ]
		                }
		                ]
		            },
		            options: {
		                title:{
		                    display:true,
		                    text: "Revenue Overview For This Year (<?php echo date('Y');?>)"
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
  <!-- <script src="<?php //echo base_url('scripts/helpers/modernizr.js');?>"></script>
  <script src="<?php //echo base_url('vendor/jquery/dist/jquery.js');?>"></script>
  <script src="<?php //echo base_url('vendor/bootstrap/dist/js/bootstrap.js');?>"></script>
  <script src="<?php //echo base_url('vendor/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?php //echo base_url('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js');?>"></script>
  <script src="<?php //echo base_url('scripts/helpers/smartresize.js');?>"></script>
  <script src="<?php //echo base_url('scripts/constants.js');?>"></script>
  <script src="<?php //echo base_url('scripts/main.js');?>"></script> -->
  <!-- endbuild -->
  <!-- page scripts -->
  <!-- end initialize page scripts -->

  <style>
    canvas{
        /*-moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;*/
        }
  </style>