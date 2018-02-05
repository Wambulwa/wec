<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane" style="display: none;"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app layout-fixed-header">
    <!-- sidebar panel -->
    <?php if($this->staff_level!=4): redirect('start','refresh'); endif;?>
    <div class="sidebar-panel offscreen-left">
      <div class="brand">
        <!-- toggle small sidebar menu -->
        <a href="javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">
          <i class="icon-grid"></i>
        </a>
        <!-- /toggle small sidebar menu -->
        <!-- toggle offscreen menu -->
        <div class="toggle-offscreen">
          <a href="javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
        <!-- /toggle offscreen menu -->
        <!-- logo -->
        <a class="brand-logo">
          <span>WEC</span>
        </a>
        <a href="#" class="small-menu-visible brand-logo">WEC</a>
        <!-- /logo -->
      </div>
      <ul class="quick-launch-apps hide">
        <li>
          <a href="<?php echo base_url('cs/myNotes')?>">
            <span class="app-icon bg-danger text-white">
            N
            </span>
            <span class="app-title">NOTES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('cs/addInvoice')?>">
            <span class="app-icon bg-success text-white">
            I
            </span>
            <span class="app-title">INVOICES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('cs/manageClient')?>">
            <span class="app-icon bg-primary text-white">
            C
            </span>
            <span class="app-title">CLIENTS</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('cs/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            R
            </span>
            <span class="app-title">REPORTS</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('cs/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            $
            </span>
            <span class="app-title">CURRENCY</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('cs/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            *
            </span>
            <span class="app-title">SETTINGS</span>
          </a>
        </li>
      </ul>
      <!-- main navigation -->
      <nav role="navigation">
        <ul class="nav">
          <!-- dashboard -->
          <li>
            <a href="<?php echo base_url('ops');?>">
              <i class="icon-compass"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- notes -->
          <li>
            <a href="<?php echo base_url('ops/myNotes');?>">
              <!-- <span class="badge pull-right">4</span> -->
              <i class="icon-drop"></i>
              <span>Notes</span>
            </a>
          </li>
          <!-- /notes -->
          <!-- clients -->
          <li>
            <a href="javascript:;">
              <i class="icon-cursor"></i>
              <span>Clients</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('ops/manageClient');?>">
                  <span>Manage clients</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /clients -->
          <!--agents-->
          <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Consignments</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('ops/manageConsignment');?>">
                  <span title="Send team updates in the shed, Add lodge entries (SIMBA SYSTEM), scan documents related to the consignment, pay for related costs (shed handling fees, entry fees receipt (RDL,IDF,concession fee).">Manage Consignments</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /agents -->
          <!--Reminders-->
          <li style="display: none;">
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Reminders</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('ops/addAgent');?>">
                  <span>New Reminder</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('ops/manageAgents');?>">
                  <span>Manage reminders</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/Reminders-->
          <!-- reports -->
          <li>
            <a href="javascript:;">
              <i class="icon-pie-chart"></i>
              <span>Reports</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('ops/reportsOverview');?>">
                  <span>Overview</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('ops/reportsConsignments');?>">
                  <span>Consignments</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('ops/reportsExpenses');?>">
                  <span>Expenses</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('ops/reportsMyReport');?>">
                  <span>My Report</span>
                </a>
              </li>          
            </ul>
          </li>
          <!-- /repoprts -->
        </ul>
      </nav>
      <!-- /main navigation -->
    </div>
    <!-- /sidebar panel -->