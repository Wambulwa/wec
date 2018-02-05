<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane" style="display: none;"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app layout-fixed-header">
  <?php if($this->staff_level!=1): redirect('start','refresh'); endif;?>
    <!-- sidebar panel -->
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
          <!-- <span>WILLFREIGHT</span> -->
        </a>
        <a href="#" class="small-menu-visible brand-logo">WEC</a>
        <!-- /logo -->
      </div>
      <ul class="quick-launch-apps hide">
        <li>
          <a href="<?php echo base_url('accounts/myNotes')?>">
            <span class="app-icon bg-danger text-white">
            N
            </span>
            <span class="app-title">NOTES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('accounts/addInvoice')?>">
            <span class="app-icon bg-success text-white">
            I
            </span>
            <span class="app-title">INVOICES</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('accounts/manageClient')?>">
            <span class="app-icon bg-primary text-white">
            C
            </span>
            <span class="app-title">CLIENTS</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('accounts/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            R
            </span>
            <span class="app-title">REPORTS</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('accounts/overviewReports')?>">
            <span class="app-icon bg-info text-white">
            $
            </span>
            <span class="app-title">CURRENCY</span>
          </a>
        </li>
        <li>
          <a href="#<?php echo base_url('accounts/overviewReports')?>">
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
            <a href="<?php echo base_url('accounts');?>">
              <i class="icon-compass"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- notes -->
          <li>
            <a href="<?php echo base_url('accounts/myNotes');?>">
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
                <a href="<?php echo base_url('accounts/addClient');?>">
                  <span>New client</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/manageClient');?>">
                  <span>Manage clients</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /clients -->
          <!--client rates-->
          <li>
            <a href="javascript:;">
              <i class="icon-cursor"></i>
              <span>Tariff blocks</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('accounts/addTariffBlock');?>">
                  <span>New tariff block</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/assignTariffBlocks');?>">
                  <span>Assign charges to tariff blocks</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/manageTariffBlocks');?>">
                  <span>Manage tariff blocks</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/client rates-->
          <!--services-->
                    <li>
            <a href="javascript:;">
              <i class="icon-cursor"></i>
              <span>Service charges</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('accounts/addServiceCharge');?>">
                  <span>New charge</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/manageServiceCharge');?>">
                  <span>Manage charges</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/services-->
          <!-- Invoices -->
          <li>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Invoices</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('accounts/addInvoice');?>">
                  <span>New invoice</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/invoiceApprovals');?>">
                  <span>Invoice approvals</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/invoiceDispatch');?>">
                  <span>Invoice dispatch</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/manageInvoice');?>">
                  <span>Invoice payment</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/invoices-->
          <!--agents-->
          <li sty>
            <a href="javascript:;">
              <i class="icon-loop"></i>
              <span>Agents</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url('accounts/addAgent');?>">
                  <span>New agent</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('accounts/manageAgents');?>">
                  <span>Manage agents</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /agents -->
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
                  <span>Management accounts</span>
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