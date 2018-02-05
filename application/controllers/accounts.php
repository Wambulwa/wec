<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller 
{
	// private $staff_wec_emp_no;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('accounts_m');
		//UPLOADING
		$config['upload_path']='./uploads/';
        $config['allowed_types']='gif|jpg|jpeg|png|pdf|xls|xlsx|ppt|pptx|doc|docx';
        $this->load->library('upload', $config);
        //-UPLOADING

		if($this->session->userdata('logged_in'))
	   		{
	     $session_data = $this->session->userdata('logged_in');
	     $this->staff_wec_emp_no = $session_data['staff_wec_emp_no'];
	     $this->staff_email = $session_data['staff_email'];
		 $this->staff_fname = $session_data['staff_fname'];
		 $this->staff_lname = $session_data['staff_lname'];
		 $this->staff_level = $session_data['staff_level'];
		 $this->is_invoice_approver = $session_data['is_invoice_approver'];
	   		}
	   	else
	   		{
	      //If no session, redirect to login page
	      redirect('login', 'refresh');
	    	}
	    // $level=$this->db->select('')
	}
	public function index()
	{
		$reportsOverview['jan']=$this->accounts_m->reportsOverviewJan();
		$reportsOverview['feb']=$this->accounts_m->reportsOverviewFeb();
		$reportsOverview['mar']=$this->accounts_m->reportsOverviewMar();
		$reportsOverview['apr']=$this->accounts_m->reportsOverviewApr();
		$reportsOverview['may']=$this->accounts_m->reportsOverviewMay();
		$reportsOverview['jun']=$this->accounts_m->reportsOverviewJun();
		$reportsOverview['jul']=$this->accounts_m->reportsOverviewJul();
		$reportsOverview['aug']=$this->accounts_m->reportsOverviewAug();
		$reportsOverview['sep']=$this->accounts_m->reportsOverviewSep();
		$reportsOverview['oct']=$this->accounts_m->reportsOverviewOct();
		$reportsOverview['nov']=$this->accounts_m->reportsOverviewNov();
		$reportsOverview['dece']=$this->accounts_m->reportsOverviewDec();
		$reportsOverview['lastMonth']=$this->accounts_m->lastMonthRevenue();
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/reportsOverview',$reportsOverview);
		// $this->load->view('accounts/home');
		$this->load->view('footer');
	}
		public function myNotes()
	{
		$note_category=$this->input->post('note_category');
		$staff_id=$this->staff_wec_emp_no;
		if(isset($note_category)):
			$myNotes = array('staff_id'=>$this->staff_wec_emp_no,'note_category' => $note_category, 'notes'=>$this->input->post('notes'));
			$this->accounts_m->myNotesInsert($myNotes);
			redirect('accounts/myNotes','refresh');
		endif;
		$notes['category']=$this->accounts_m->myNotesCategory();
		$notes['myNotes']=$this->accounts_m->myNotesGet($staff_id);
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/notes',$notes);
		$this->load->view('footer');
	}
		public function addClient()
	{
		$addClient=$this->input->post('addClient');
		if(isset($addClient))
			{
				$clientTable = array
				(
					'client_name' =>$this->input->post('fname'),
					'contact_person_name' =>$this->input->post('cname'),
					'contact_person_email' =>$this->input->post('cmail'),
					'contact_person_phone' =>$this->input->post('cphone'),
					'contact_person_designation' =>$this->input->post('cdesignation'),
					'client_phone' =>$this->input->post('phone'),
					'client_email' =>$this->input->post('email'),
					'client_country' =>$this->input->post('country'),
					'client_state' =>$this->input->post('state'),
					'client_city' =>$this->input->post('city'),
					'client_postal_address' =>$this->input->post('postal'.' '.'zip'.' '.'city'),
					'client_notes' =>$this->input->post('notes'),
					'client_type' =>$this->input->post('client_type'),
					'is_company' =>$this->input->post('client_category'),
					'added_by'=>$this->staff_wec_emp_no,
					'cust_currency'=>$this->input->post('currency'),
					'client_since'=>$this->input->post('client_since'),
					'is_customer'=>1
				);
				$addClientMsg['addClientMsg']=$this->accounts_m->addClient($clientTable);
				$this->session->set_flashdata('addClientMsg', $addClientMsg);
				return redirect('accounts/addClient');

			}
			else
			{
				$addClientMsg=$this->session->flashdata('addClientMsg');
				$this->load->view('header');
				$this->load->view('accounts/left-nav');
				$this->load->view('accounts/top-nav');
				$this->load->view('accounts/addClient',$addClientMsg);
				$this->load->view('footer');
			}
	}
	public function manageClient()
	{
		$client_id=$this->input->post('client_id');
		if(isset($client_id)){
			$cid=$this->input->post('client_id');
			$manageClient['client_name']=$this->input->post('client_name').' #'.$cid;
			$pre_tariff_block=$this->input->post('tariff_block');
			if(empty($pre_tariff_block)||$pre_tariff_block==''){
				$tariff_block='tariff_block_default';//Set client_tariff_block table to default
				$manageClient['tariff_name']='Default';//Set tariff block name to Default & send it to view
			}
			if(!empty($pre_tariff_block)){
				$tariff_block='tariff_block_'.$this->input->post('tariff_block');//convert the tariff block to tariff_block_table name
				$manageClient['tariff_name']=$this->input->post('tariff_block');//send the tariff block name to view
			}
			$manageClient['invoice']=$this->accounts_m->manageClientInvoice($cid);
			$manageClient['tariff_block_data']=$this->accounts_m->getTariffCharges($tariff_block);//get tariff charges for the tariff block
			$manageClient['client']=$this->accounts_m->getClient($cid);
			$manageClient['total_received']=$this->accounts_m->manageClientTotalTransactions($cid);
			$this->load->view('header-table-editable');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-nav');
			$this->load->view('accounts/clientDetails',$manageClient);
			$this->load->view('footer-editable-table');
		}
		else{
		$clients['clients']=$this->accounts_m->manageClients();
		$this->load->view('header-table-editable');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/manage-clients',$clients);
		$this->load->view('footer-editable-table');
	}
	}

	public function addTariffBlock()
	{
		$ctb_name=$this->input->post('ctb_name');
		$ctb_is_active=$this->input->post('ctb_is_active');
		$ctb_description=$this->input->post('ctb_description');
		if(isset($ctb_name)&&isset($ctb_is_active)&&isset($ctb_description)){
			$this->db->insert('client_tariff_blocks',array('ctb_name'=>$ctb_name,'ctb_table_name'=>'tariff_block_'.$ctb_name,'ctb_is_active'=>$ctb_is_active,'ctb_description'=>$ctb_description,'ctb_added_by'=>$this->staff_wec_emp_no));
			// CREATE TARIFF BLOCK TABLE
			$this->db->query("CREATE TABLE tariff_block_$ctb_name(tb_service_id int(11) not null UNIQUE,tb_service_charge int(11) NOT null)");
			// END OF CREATE TABLE
			$result['result']=" Tariff block <b>$ctb_name</b> added. It is described as follows: <b><i>$ctb_description</i></b>";
		}
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/addTariffBlock',$result);
		$this->load->view('footer');
	}
	public function assignTariffBlocks()
	{
		$ctb_id=$this->input->post('ctb_id');
		$tb_service_id=$this->input->post('tb_service_id');
		$tb_service_charge=$this->input->post('tb_service_charge');
		$ctb_table_name=$this->input->post('ctb_table_name');
		$ctb_name=$this->input->post('ctb_name');
		// GET ALL CHARGES AND SUPPLY THEM TO THE TARIFF BLOCK ADDING PANE
		if(isset($ctb_id)){
			$tariffBlocks['manageTariffBlockData']=$this->accounts_m->manageTariffBlockData($ctb_id);
			$tariffBlocks['allCharges']=$this->accounts_m->getAllCharges();
			$tariffBlocks['ctb_name']=$ctb_name;
		}
		if(!isset($ctb_id)){
			$tariffBlocks['tariffBlocks']=$this->accounts_m->manageTariffBlocks();
		}
		// INSERTING CHARGES AND MARKING TARIFF BLOCKS TABLE AS ASSIGNED AGAINST THE TABLE ASSIGNED
		if(isset($tb_service_id)){
			$insertTariffCharges = array();
			for ($i=0; $i < count($tb_service_id); $i++){
				$tmp=array();
				$tmp['tb_service_id'] = $tb_service_id[$i];
				$tmp['tb_service_charge'] = $tb_service_charge[$i];
				$insertTariffCharges[] = $tmp;
			}
			$tariffBlocks['insertTariffCharges']=$insertTariffCharges;
			$this->db->trans_start();
				$this->db->group_start();
					$this->db->insert_batch("$ctb_table_name",$insertTariffCharges);
				$this->db->group_end();
				$this->db->group_start();
					$this->db->query("update client_tariff_blocks set ctb_is_assigned=1 where ctb_name='$ctb_name'");
				$this->db->group_end();
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				redirect('accounts/assignTariffBlocks','refresh');
			}
		}
			$this->load->view('header-table-editable');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-nav');
			$this->load->view('accounts/assignTariffBlocks',$tariffBlocks);
			$this->load->view('footer-editable-table');
	}
	public function manageTariffBlocks()
	{		
		$ctb_table=$this->input->post('ctb_table_name');
		if(!isset($ctb_table)){
			$tariffBlocks['tariffBlocks']=$this->accounts_m->manageTariffBlocksAssigned();
		}
		// MANAGE TARIFF BLOCKS
		if(isset($ctb_table)){
			$tariffBlocks['ctb_name']=$this->input->post('ctb_name');
			$tariffBlocks['manageTariffBlocksAssigned']=$this->accounts_m->manageTariffBlocksAssignedData($ctb_table);
		}
			$this->load->view('header-table-editable');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-nav');
			$this->load->view('accounts/manageTariffBlocks',$tariffBlocks);
			$this->load->view('footer-editable-table');
	}

	public function addServiceCharge()
	{
		$addChargeBtn=$this->input->post('addChargeBtn');
		if(isset($addChargeBtn))
		{
			$addCharge= array(
				'service_name' =>$this->input->post('service_name') ,
				'service_min_rate'=>$this->input->post('min_rate'),
				'service_max_rate'=>$this->input->post('max_rate'),
				'service_category'=>$this->input->post('service_category'),
				'service_notes' =>$this->input->post('service_notes'),
				'is_active'=>$this->input->post('is_active'),
				'added_by'=>$this->staff_wec_emp_no
				);
			$error['addChargeMsg']=$this->accounts_m->addServiceCharge($addCharge);
			$this->session->set_flashdata('data_name', $error);
			return redirect('accounts/addServiceCharge');
		}
		else
		{
			$message = $this->session->flashdata('data_name');
			$this->load->view('header');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-nav');
			$this->load->view('accounts/addServiceCharge',$message);
			$this->load->view('footer');
		}
		
	}

	// public function 
	public function manageServiceCharge()
	{
		$serviceCharges['serviceCharges']=$this->db->get('service_charges')->result();
		$this->load->view('header-table-editable');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/manageServiceCharge',$serviceCharges);
		$this->load->view('footer-editable-table');
	}	

	public function manageInvoice()
	{
		$invoices['invoices_due']=$this->accounts_m->getUnpaidDueInvoices();
		$invoices['invoices_undue']=$this->accounts_m->getUnpaidUndueInvoices();
		$invoices['invoices_overdue']=$this->accounts_m->getOverdueInvoices();
		// $invoices['inv_app_count']=$this->accounts_m->manageInvoiceCountStatus();
		$this->load->view('header-table-editable');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/manageInvoices',$invoices);
		$this->load->view('footer-editable-table');
	}
	public function addInvoice()
	{
		// $cid=$this->input->post('cid');//CUSTOMER ID FOR LOADING TARIFF
		// $createInv=$this->input->post('serviceType');//SERVICE TYPE SPECIFIC TARIFF
		// $service_type=$this->input->post('service_type');//AS ABOVE
		$cust_id=$this->input->post('cust_id');//CUSTOMER ID
		$new_acc_info=$this->input->post('charge_id');
		$already_added_acc_info=$this->input->post('charge_id_added');
		if(isset($cid))//GETTING THE TARIFF FOR CLIENT
		{
			$cid=$this->input->post('cid');
			$createInv=$this->input->post('serviceType');
			
			$cons_data['charges']=$this->accounts_m->getCharges($cid,$createInv);
			$cons_data['currency']=$this->accounts_m->getClientCurrency($cid);
			$cons_data['cid']=$cid;
			$cons_data['serviceType']=$createInv;
		}
		if(isset($cust_id))
		{
			// CONVERT DATES
		$a = new DateTime($this->input->post('invoice_date'));$invoice_date=$a->format('Y-m-d');
		$b = new DateTime($this->input->post('inv_due_date'));$inv_due_date=$b->format('Y-m-d');
		$c = new DateTime($this->input->post('eta'));$eta=$c->format('Y-m-d');
		$d = new DateTime($this->input->post('etd'));$etd=$d->format('Y-m-d');
			$invDetails = array(
				'inv_date' =>$invoice_date,
				'cust_id' =>$cust_id, 
				'shipment' =>$this->input->post('shipment'),
				'service_type' =>$this->input->post('service_type'), 
				'regime' =>$this->input->post('regime') , 
				'urgency' =>$this->input->post('urgency') , 
				'shipper' =>$this->input->post('shipper') , 
				'consignee' =>$this->input->post('consignee') , 
				'your_ref' =>$this->input->post('your_ref') , 
				'our_ref' =>$this->input->post('our_ref') , 
				'goods_desc' =>$this->input->post('goods_desc') , 
				'vessel_no' =>$this->input->post('vessel_no') , 
				'mawb' =>$this->input->post('mawb') , 
				'hawb' =>$this->input->post('hawb') , 
				'origin' =>$this->input->post('origin') ,
				'etd' =>$etd,
				'destination' =>$this->input->post('destination') ,
				'eta' =>$eta,
				'inv_due_date' => $inv_due_date,
				'inv_currency'=>$this->input->post('currency'),
				'created_by' => $this->staff_wec_emp_no
				);
			$invID=$this->accounts_m->addInvoiceDetails($invDetails);//INSERT INVOICE DETAILS AND RETURN INVOICE_ID
			$cons_data['new_inv_id']=$invID;
//inserting charges
			// function insert_data()
			// INSERT EXISTING CHARGES FROM CS
			$charge_id_from_cs=$this->input->post('charge_id_added[]');
			$charges_amnt_from_cs=$this->input->post('charges_amnt_added[]');
			if(isset($charge_id_from_cs)){
				$insert_charges_from_cs = array();
				for ($ics=0; $ics < count($charge_id_from_cs); $ics++){
					$ics_tmp=array();
					$ics_tmp['invoice_id'] = $invID;
					$ics_tmp['service_id'] = $charge_id_from_cs[$ics];
					$ics_tmp['amount'] = $charges_amnt_from_cs[$ics];
					$insert_charges_from_cs[] = $ics_tmp;
				}
				$cons_data['myarray']=$insert_charges_from_cs;
				// $this->db->insert_batch('invoice_charges', $insert_charges_from_cs);
			}
			// end
			// BEGIN::INSERT NEW CHARGES
            $charge_id = $this->input->post('charge_id[]');
            $charges_amnt = $this->input->post('charges_amnt[]');
            if(isset($charge_id)){
	            $insert_charges = array();
	            for ($i=0; $i<count($charge_id); $i++)
	            {
	                $ic_tmp = array();
	                $ic_tmp['invoice_id'] = $invID;
	                $ic_tmp['service_id'] = $charge_id[$i];
	                $ic_tmp['amount'] = $charges_amnt[$i];
	                $insert_charges[] = $ic_tmp;
	            }
	            // $this->accounts_m->addInvoiceCharges($insert_charges);
	            // $cons_data['myarray1']=$insert_charges;
	            $this->db->insert_batch('invoice_charges',$insert_charges);
	        }
		}
		//LOADING CONSIGNMENT INFO
		$cons_id=$this->input->post('cons_id');
		if(isset($cons_id)){
			$cons_data['cons_inv_data']=$this->accounts_m->getConsChargesData($cons_id);
			$cons_data['client']=$this->accounts_m->getConsChargesClient($cons_id);
			$cons_data['cons_acc_info']=$this->accounts_m->getConsAccountingInfo($cons_id);
		}
			$cons_data['allInvCharges']=$this->accounts_m->getAllCharges();
			$cons_data['cons_data']=$this->accounts_m->getConsignments();
			$this->load->view('header');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-navInv');
			// $this->load->view('accounts/addInvoice1',$cons_data);
			$this->load->view('accounts/addInvoice2',$cons_data);
			$this->load->view('footer');
	}

	public function addAgent()
	{
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/addAgent');
		$this->load->view('footer');
	}

	public function manageAgents()
	{
		$this->load->view('header-table-editable');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/manageAgents');
		$this->load->view('footer-editable-table');
	}
	function currencies(){
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/currencies');
		$this->load->view('footer');
	}
	function printInvoice()
	{
		$invoice_id=$this->input->post('invoice_id');
		$invoices['invoices']=$this->accounts_m->printInvoiceDetails($invoice_id);
		$invoices['invCharge']=$this->accounts_m->printInvoiceCharges($invoice_id);
		$invoices['totals']=$this->accounts_m->printInvoiceTotals($invoice_id);
		$invoices['bal_due']=$this->accounts_m->printInvoiceBalDue($invoice_id);
		$invoices['invoice_id']=$invoice_id;
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-navInv');
		$this->load->view('accounts/addInvoiceNew',$invoices);
		$this->load->view('footer');
	}
	function invoiceApprovals(){
		$inv_id=$this->input->post('inv_id');
		if(isset($inv_id)){
			$invApproveData = array(
				'invoice_id' =>$this->input->post('inv_id') ,
				'staff_id'=>$this->staff_wec_emp_no, 
				'approval_status'=>$this->input->post('status'),
				'comments'=>$this->input->post('comments')
				);
			$this->accounts_m->invoiceApprovalsInsert($invApproveData);
		}
		$approvals['approvals']=$this->accounts_m->invoiceApprovals();
		$this->load->view('header-table-editable');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/invoiceApprovals',$approvals);
		$this->load->view('footer-editable-table');
	}
	function printInvoiceApproval(){
		$invoice_id=$this->input->post('invoice_id');
		$invoices['invoices']=$this->accounts_m->printInvoiceDetails($invoice_id);
		$invoices['invCharge']=$this->accounts_m->printInvoiceCharges($invoice_id);
		$invoices['totals']=$this->accounts_m->printInvoiceTotals($invoice_id);
		$invoices['bal_due']=$this->accounts_m->printInvoiceBalDue($invoice_id);
		$invoices['approvedMsg']=$this->accounts_m->invoiceApproved($invoice_id);
		$invoices['invoice_id']=$invoice_id;
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/addInvoiceApproval',$invoices);
		$this->load->view('footer');
	}
	function invoicePayment(){
		$inv_payment=$this->input->post('inv_payment');
		if(isset($inv_payment)){
			$invPaymentDetails = array(
				'amount_paid' => $this->input->post('inv_payment'),
				'invoice_id' => $this->input->post('inv_id'),
				'date_paid' => $this->input->post('date_paid'),
				'recorded_by' => $this->staff_wec_emp_no
				);
			$this->accounts_m->invoicePaymentInsert($invPaymentDetails);
			$paidMsg1['paidMsg']=$this->input->post('inv_id');
			$this->session->set_flashdata('paidMsg1', $paidMsg1);
			redirect('accounts/invoicePaymentMsg','refresh');
		}
		else{
			$searchInv=$this->input->post('inv_id');
			$invoicePayment['allData']=$this->accounts_m->invoicePaymentLoad($searchInv);
			$this->load->view('header');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-nav');
			$this->load->view('accounts/invoicePayment',$invoicePayment);
			$this->load->view('footer');
		}
	}
	function invoicePaymentMsg(){
		// $this->flashdata('paidMsg',)
		$paidMsg1=$this->session->flashdata('paidMsg1');
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/invoicePaymentMsg',$paidMsg1);
		$this->load->view('footer');
	}
	function paidInvDetails(){
		$inv_id=$this->input->post('inv_id');
		$paidInvDetails['paidInvDetails'] = $this->accounts_m->paidInvDetails($inv_id);
		$paidInvDetails['paidInvDetailsTotal']=$this->accounts_m->paidInvDetailsTotal($inv_id);
		$paidInvDetails['paidInvDetailsPaid']=$this->accounts_m->paidInvDetailsPaid($inv_id);
		$paidInvDetails['paidInvDetailsBal']=$this->accounts_m->paidInvDetailsBal($inv_id);
		$paidInvDetails['history']=$this->accounts_m->paidInvHistory($inv_id);
		$paidInvDetails['invClient']=$this->accounts_m->paidInvDetailsClient($inv_id);
		$paidInvDetails['inv_id']=$inv_id;
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/paidInvDetails',$paidInvDetails);
		$this->load->view('footer');
	}
	function invoiceDispatch(){
		
		$invoice_id=$this->input->post('invoice_id');
		if(isset($invoice_id))
		{
			$dispatch['invoices']=$this->accounts_m->printInvoiceDetails($invoice_id);
			$dispatch['invCharge']=$this->accounts_m->printInvoiceCharges($invoice_id);
			$dispatch['totals']=$this->accounts_m->printInvoiceTotals($invoice_id);
			$dispatch['bal_due']=$this->accounts_m->printInvoiceBalDue($invoice_id);
			$dispatch['invoice_id']=$invoice_id;
			$this->load->view('header');
			$this->load->view('accounts/left-nav');
			$this->load->view('accounts/top-navInv');
			$this->load->view('accounts/addInvoiceDispatchInvoice',$dispatch);
			$this->load->view('footer');
		}
		else{
		$invoices['invoices']=$this->accounts_m->manageInvoice();
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/invoiceDispatch',$invoices);
		$this->load->view('footer');
		}
	}
	function invoiceDispatchSuccess(){
		$invoice_id=$this->input->post('invoice_id');
		if(isset($invoice_id)){
			$dispatchData=array(
				'id_invoice_id'=>$invoice_id,
				'dispatched_by'=>$this->staff_wec_emp_no
			);
			$dispatchDataStatus=$this->db->insert('invoice_dispatch_from_acc',$dispatchData);
			if ($dispatchDataStatus==true){
				$this->db->where('sent_to_cs',0);
				$this->db->where('invoice_id',$invoice_id);
				$this->db->set('sent_to_cs',1);
				$updateInvTable=$this->db->update('invoice');
			}
		}
		$this->load->view('header');
		$this->load->view('accounts/left-nav');
		$this->load->view('accounts/top-nav');
		$this->load->view('accounts/invoiceDispatch',$invoices);
		$this->load->view('footer');
	}
}