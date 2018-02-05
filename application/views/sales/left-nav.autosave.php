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
    <?php if($this->staff_level!=2): redirect('start','refresh'); endif;?>
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
          <a href="<?php echo base_url('sales/myNotes')?>">
            <span class="app-icon bg-danger text-white">
            N
            </span>
            <span class="app-title">NOTES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('sales/addInvoice')?>">
            <span class="app-icon bg-success text-white">
            I
            </span>
            <span class="app-title">INVOICES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('sales/manageClient')?>">
            <span class="app-icon bg-primary text-white">
            C
            </span>
            <span class="app-title">CLIENTS</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('sales/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            R
            </span>
            <span class="app-title">REPORTS</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('sales/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            $
            </span>
            <span class="app-title">CURRENCY</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('sales/overviewReports')?>">
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
            <a href="<?php echo base_url('sales');?>">
              <i class="icon-compass"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- notes -->
          <li>
            <a href="<?php echo base_url('sales/myNotes');?>">
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
                <a href="<?php echo base_url('sales/addClient');?>">
                  <span>New client</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageClient');?>">
                  <span>Manage clients</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /clients -->
          <!--Prospects-->
          <li>
            <a href="javascript:;">
              <i class="icon-cursor"></i>
              <span>Prospects</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('sales/addProspect');?>">
                  <span>New Prospect</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageProspects');?>">
                  <span>Manage Prospects</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/Prospects-->
          <!--Leads-->
                    <li>
            <a href="javascript:;">
              <i class="icon-cursor"></i>
              <span>Leads</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('sales/addLead');?>">
                  <span>New Lead</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageLead');?>">
                  <span>Manage Leads</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/Leads-->
          <!-- Quotes -->
          <!-- <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Quotes</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php //echo base_url('sales/addInvoice');?>">
                  <span>New quote</span>
                </a>
              </li>
              <li>
                <a href="<?php //echo base_url('sales/manageQuote');?>">
                  <span>Quote Approvals</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageQuote');?>">
                  <span>Manage Quotes</span>
                </a>
              </li>
            </ul>
          </li> -->
          <!--/Quotes-->
          <!--agents-->
          <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Marketing</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('sales/addCampaign');?>">
                  <span>New campain</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageCampaigns');?>">
                  <span>Manage campains</span>
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
                <a href="<?php echo base_url('sales/addAgent');?>">
                  <span>New Reminder</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sales/manageAgents');?>">
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
                <a href="#charts-flot.html">
                  <span>Overview</span>
                </a>
              </li>
              <li>
                <a href="#charts-easypie.html">
                  <span>Agents</span>
                </a>
              </li>
              <li>
                <a href="#charts-chartjs.html">
                  <span>Invoices</span>
                </a>
              </li>
              <li>
                <a href="#charts-rickshaw.html">
                  <span>Customer statements</span>
                </a>
              </li>
              <li>
                <a href="#charts-nvd3.html">
                  <span>Management sales</span>
                </a>
              </li>
              <li>
                <a href="#charts-c3js.html">
                  <span>Balance sheet</span>
                </a>
              </li>
              <li>
                <a href="#charts-c3js.html">
                  <span>P&L</span>
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