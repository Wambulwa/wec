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
    <?php if($this->staff_level!=3): redirect('start','refresh'); endif;?>
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
            <a href="<?php echo base_url('cs');?>">
              <i class="icon-compass"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- notes -->
          <li>
            <a href="<?php echo base_url('cs/myNotes');?>">
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
                <a href="<?php echo base_url('cs/addClient');?>">
                  <span>New client</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageClient');?>">
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
                <a href="<?php echo base_url('cs/addProspect');?>">
                  <span>New Prospect</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageProspects');?>">
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
                <a href="<?php echo base_url('cs/addLead');?>">
                  <span>New Lead</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageLead');?>">
                  <span>Manage Leads</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/Leads-->
          <!-- Quotes -->
          <li style="display: none;">
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Quotes</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('cs/addInvoice');?>">
                  <span>New quote</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageQuote');?>">
                  <span>Quote Approvals</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageQuote');?>">
                  <span>Manage Quotes</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/Quotes-->
          <!--agents-->
          <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Consignments</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('cs/addConsigment');?>">
                  <span>New Consignment</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageConsignment');?>">
                  <span title="Send team updates in the shed, Add lodge entries (SIMBA SYSTEM), scan documents related to the consignment, pay for related costs (shed handling fees, entry fees receipt (RDL,IDF,concession fee).">Manage Consignments</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Invoices</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('cs/dispatchInvoices');?>">
                  <span title="View invoiced files from accounts ready for dispatch">Dispatch invoices</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/dispatchedInvoices');?>">
                  <span title="Dispatched invoices not marked as deliverd">Dispatched invoices</span>
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
                <a href="<?php echo base_url('cs/addAgent');?>">
                  <span>New Reminder</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/manageAgents');?>">
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
                <a href="<?php echo base_url('cs/reportsOverview');?>">
                  <span>Overview</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('cs/reportsConsignments');?>">
                  <span>Consignments</span>
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