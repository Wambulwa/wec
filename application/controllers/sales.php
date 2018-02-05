<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('sales_m');

		if($this->session->userdata('logged_in')):
	     $session_data = $this->session->userdata('logged_in');
	     $this->staff_wec_emp_no = $session_data['staff_wec_emp_no'];
	     $this->staff_email = $session_data['staff_email'];
		 $this->staff_fname = $session_data['staff_fname'];
		 $this->staff_lname = $session_data['staff_lname'];
		 $this->staff_level = $session_data['staff_level'];
		 $this->is_invoice_approver = $session_data['is_invoice_approver'];
	   else:
	      //If no session, redirect to login page
	      redirect('start', 'refresh');
	  endif;
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/home');
		$this->load->view('footer');
	}
		public function myNotes()
	{
		$note_category=$this->input->post('note_category');
		$staff_id=$this->staff_wec_emp_no;
		if(isset($note_category)):
			$myNotes = array('staff_id'=>$this->staff_wec_emp_no,'note_category' => $note_category, 'notes'=>$this->input->post('notes'));
			$this->sales_m->myNotesInsert($myNotes);
			redirect('sales/myNotes','refresh');
		endif;
		$notes['category']=$this->sales_m->myNotesCategory();
		$notes['myNotes']=$this->sales_m->myNotesGet($staff_id);
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/notes',$notes);
		$this->load->view('footer');
	}
	public function addClient()
		{
			$this->load->model('cs_m');
			$addClient=$this->input->post('addClient');
			if(isset($addClient))
				{
					$client_since=$this->input->post('client_since');
					$new_client_since = new DateTime($client_since);
					$date=$new_client_since->format('Y-m-d');
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
						'client_postal_address' =>$this->input->post('postal_address').' - '.$this->input->post('postal_code').' '.$this->input->post('postal_city'),
						'client_notes' =>$this->input->post('notes'),
						'client_type' =>$this->input->post('client_type'),
						'is_company' =>$this->input->post('client_category'),
						'added_by'=>$this->staff_wec_emp_no,
						'cust_currency'=>$this->input->post('currency'),
						'client_since'=>$date,
						'is_customer'=>1,
						'mc_id'=>$this->input->post('mc'),
						'marketing_campaign_id'=>$this->input->post('mcampaign_id')
					);
					$custID=$this->cs_m->addClient($clientTable);
					// echo $custID;
					$addClientMsg['addClientMsg']="New customer added successfully. Customer ID ".$custID;
					$this->session->set_flashdata('addClientMsg', $addClientMsg);
					return redirect('sales/addClient');

				}
				else
				{
					$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
					$addClientMsg['marketingChannels']=$this->cs_m->getMarketingChannels();
					$addClientMsg['marketingCampaigns']=$this->sales_m->getAllCampaignsExceptUpcoming();
					$this->load->view('header');
					$this->load->view('sales/left-nav');
					$this->load->view('sales/top-nav');
					$this->load->view('sales/addClient',$addClientMsg);
					$this->load->view('footer');
				}
		}
	public function manageClient()
	{
		$cid=$this->input->post('client_id');
		if(isset($cid)){
			$manageClient['client_id']=$cid;
			$manageClient['invoice']=$this->sales_m->manageClientQuotes($cid);
			$manageClient['client']=$this->sales_m->getClient($cid);
			$manageClient['getSessionNotes']=$this->sales_m->getClientSessionNotes($cid);
			$this->load->view('header-table-editable');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/clientDetails',$manageClient);
			$this->load->view('footer-editable-table');
		}
		else{
		$clients['clients']=$this->sales_m->manageClients();
		$this->load->view('header-table-editable');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/manage-clients',$clients);
		$this->load->view('footer-editable-table');
		}
	}
	public function addClientSessionNotes(){
		$session_date=$this->input->post('session_date');
		$cid=$this->input->post('client_id');
		$session_date1 = new DateTime($session_date);
		$new_session_date=$session_date1->format('Y-m-d');
		if(isset($session_date)){
			$data = array(
				'session_date' => $new_session_date, 
				'session_type' => $this->input->post('session_type'),
				'session_person' => $this->input->post('session_person'),
				'session_topic' => $this->input->post('session_topic'),
				'session_notes' => $this->input->post('session_notes'),
				'csn_client_id' => $cid,
				'csn_added_by' => $this->staff_wec_emp_no
			);
			$this->db->insert('client_session_notes',$data);
			return $this->manageClient($cid);
		}
		else{
			return $this->manageClient($cid);
		}
	}
	public function addProspect()
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
					'is_customer'=>0,
					'mc_id'=>$this->input->post('mc')
				);
				$custID=$this->sales_m->addClient($clientTable);
				$addClientMsg['addClientMsg']="New Prospect added successfully. Customer ID ".$custID;
				$this->session->set_flashdata('addClientMsg', $addClientMsg);
				$prospectTable=array('cust_id' =>$custID);
				$this->sales_m->addProspect($prospectTable);
				return redirect('sales/addProspect');

			}
			else
			{
				$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
				$addClientMsg['marketingChannels']=$this->sales_m->getMarketingChannels();
				$this->load->view('header');
				$this->load->view('sales/left-nav');
				$this->load->view('sales/top-nav');
				$this->load->view('sales/addProspect',$addClientMsg);
				$this->load->view('footer');
			}
	}
	public function manageProspects()
	{
		$client_id=$this->input->post('client_id');
		if(isset($client_id)){
			$cid=$this->input->post('client_id');
			$manageClient['invoice']=$this->sales_m->manageClientQuotes($cid);
			$manageClient['client']=$this->sales_m->getClient($cid);
			$this->load->view('header-table-editable');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/prospectDetails',$manageClient);
			$this->load->view('footer-editable-table');
		}
		else{
		$prospects['prospects']=$this->sales_m->manageProspects();
		$prospects['prospects1']=$this->sales_m->manageProspects1();
		$this->load->view('header-table-editable');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/manageProspects',$prospects);
		$this->load->view('footer-editable-table');
		}
	}

	public function addLead()
	{
		$addClient=$this->input->post('addClient');
		if(isset($addClient)){
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
				'is_customer'=>0,
				'mc_id'=>$this->input->post('mc')
			);
			$custID=$this->sales_m->addClient($clientTable);
			$addClientMsg['addClientMsg']="New lead added successfully with unique ID# ".$custID;
			$this->session->set_flashdata('addClientMsg', $addClientMsg);
			$leadTable=array('cust_id' =>$custID);
			$this->sales_m->addLead($leadTable);
			return redirect('sales/addLead');
		}
		else
		{
			$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
			$addClientMsg['marketingChannels']=$this->sales_m->getMarketingChannels();
			$this->load->view('header');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/addLead',$addClientMsg);
			$this->load->view('footer');
		}
	}

	public function manageLead()
	{
		$client_id=$this->input->post('client_id');
		if(isset($client_id)){
			$cid=$this->input->post('client_id');
			$manageClient['invoice']=$this->sales_m->manageClientQuotes($cid);
			$manageClient['client']=$this->sales_m->getClient($cid);
			$this->load->view('header-table-editable');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/leadDetails',$manageClient);
			$this->load->view('footer-editable-table');
		}
		else{
		$leads['leads']=$this->sales_m->manageLeads();
		$this->load->view('header-table-editable');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/manageLeads',$leads);
		$this->load->view('footer-editable-table');
		}
	}
	function convertTo(){
		$propect_id=$this->input->post('propect_id');
		$lead_id_cust=$this->input->post('lead_id_cust');
		$lead_id_pros=$this->input->post('lead_id_pros');
		if(isset($propect_id)){
			$this->sales_m->convertProspectToCustomer($propect_id);
			redirect ('sales/manageProspects');
		}
		if(isset($lead_id_cust)){
			$this->sales_m->convertLeadToCustomer($lead_id_cust);
			redirect ('sales/manageLead');
		}
		if(isset($lead_id_pros)){
			$this->sales_m->convertLeadToProspect($lead_id_pros);
			redirect ('sales/manageLead');
		}
		else{
			$this->load->view('header-table-editable');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/convertToUI');
			$this->load->view('footer-editable-table');
		}
	}
	public function manageQuote()
	{
		$invoices['invoices']=$this->sales_m->manageQuote();
		$invoices['inv_app_count']=$this->sales_m->manageQuoteCountStatus();
		$this->load->view('header-table-editable');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/manageInvoices',$invoices);
		$this->load->view('footer-editable-table');
	}
	public function addInvoice()
	{	
		$cid=$this->input->post('cid');
		$createInv=$this->input->post('serviceType');
		$service_type=$this->input->post('service_type');
		$cust_id=$this->input->post('cust_id');
		if(isset($cid))
		{
			$cid=$this->input->post('cid');
			$createInv=$this->input->post('serviceType');
			
			$charges['charges']=$this->sales_m->getCharges($cid,$createInv);
			$charges['currency']=$this->sales_m->getClientCurrency($cid);
			$charges['cid']=$cid;
			$charges['serviceType']=$createInv;
			$this->load->view('header');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-navInv');
			$this->load->view('sales/addInvoiceNewUI',$charges);
			$this->load->view('footer');
		}
		else if((isset($cust_id))&&$service_type=='Airfreight Export')
		{
			$invDetails = array(
				'inv_date' =>$this->input->post('invoice_date'),
				'cust_id' =>$this->input->post('cust_id'), 
				'shipment' =>$this->input->post('shipment'),
				'service_type' =>$this->input->post('service_type') , 
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
				'etd' =>$this->input->post('etd') ,
				'destination' =>$this->input->post('destination') ,
				'eta' =>$this->input->post('eta'),
				'inv_due_date' => $this->input->post('inv_due_date'),
				'inv_currency'=>$this->input->post('currency'),
				'created_by' => $this->staff_wec_emp_no
				);
			$invID=$this->sales_m->addInvoiceDetails($invDetails);//INSERT INVOICE DETAILS AND RETURN INVOICE_ID
			$invoiceID['inv']=$invID;
//inserting charges
			// function insert_data() {
	            $product = $this->input->post('charge_id');
	            $cost = $this->input->post('charges_amnt');
	            $insert_array = array();
	            for ($i=0; $i < count($product); $i++) 
	            {
	                $tmp = array();
	                $tmp['invoice_id'] = $invID;
	                $tmp['service_id'] = $product[$i];
	                $tmp['amount'] = $cost[$i];
	                $insert_array[] = $tmp;
	            }
	            $this->sales_m->addInvoiceCharges($insert_array);
				// $this->db->insert_batch('invoice_charges', $insert_array);//WORKING BUT MOVEED TO MODEL				
				$this->load->view('header');
				$this->load->view('sales/left-nav');
				$this->load->view('sales/top-navInv');
				$this->load->view('sales/addInvoiceMsg',$invoiceID);
				$this->load->view('footer');
		}
		else
		{
			$this->load->view('header');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-navInv');
			$this->load->view('sales/addInvoiceNewUI');
			$this->load->view('footer');
		}
	}
		

	public function addCampaign()
	{
		$cname=$this->input->post('cname');
		$cgoals=$this->input->post('cgoals');
		if(!empty($cname)){
			$date1 =$this->input->post('cstartdate');
			$date2 =$this->input->post('cenddate');
			$dt1 = new DateTime($date1);
			$campaign_start_date=$dt1->format('Y-m-d');
			$dt2 = new DateTime($date2);
			$campaign_end_date=$dt2->format('Y-m-d');
			$addCampaign = array(
				'campaign_name' =>$cname,
				'campaign_beneficiary' =>$this->input->post('cbeneficiary'),
				'mc_id' =>$this->input->post('mchanel'),
				'campaign_budget' =>$this->input->post('cbudget'),
				'campaign_start_date' =>$campaign_start_date,
				'campaign_end_date' =>$campaign_end_date,
				'campaign_notes' =>$this->input->post('cnotes'),
				'campaign_added_by' =>$this->staff_wec_emp_no,
				'campaign_started' =>$this->input->post('start_campaign')
			);
			$campaign_id=$this->sales_m->addCampaign($addCampaign);
			$campaignGoals = array();
	        for ($i=0; $i < count($cgoals); $i++){
	        	$tmp = array();
	            $tmp['marketing_campaign_id'] = $campaign_id;
	            $tmp['mcg_name'] = $cgoals[$i];
	            $campaignGoals[] = $tmp;
	        }
	        $this->sales_m->addCampaignGoals($campaignGoals);
	        $addCampaign['message']="You've successfully added campaign name <b>$cname</b> scheduled to run from $campaign_start_date to $campaign_end_date";
	        $addCampaign['campaign_id']=$campaign_id;
		}
		$this->load->model('cs_m');
		$addCampaign['marketingChannels']=$this->cs_m->getMarketingChannels();
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/addCampaign',$addCampaign);
		$this->load->view('footer');
	}

	public function manageCampaigns()
	{
			$manageCampaigns['currentCampaigns']=$this->sales_m->getAllCurrentCampaigns();
			$manageCampaigns['inactiveCampaigns']=$this->sales_m->getAllInactiveCampaigns();
			$manageCampaigns['upcomingCampaigns']=$this->sales_m->getAllUpcomingCampaigns();
			$manageCampaigns['completeCampaigns']=$this->sales_m->getAllCompleteCampaigns();
			$this->load->view('header-table-editable');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/manageCampaigns',$manageCampaigns);
			$this->load->view('footer-editable-table');
		
	}
	function manageCampainGoals(){
		$campaign_id=$this->input->post('campaign_id');
		if(isset($campaign_id)){
			$manageCampaigns['campaign_id']=$campaign_id;
			$manageCampaigns['getSelectedCampaign']=$this->sales_m->getSelectedCampaign($campaign_id);
			$manageCampaigns['campaignGoals']=$this->sales_m->getCampaignGoals($campaign_id);
			$manageCampaigns['achieved']=$this->sales_m->getCampaignGoalsAchieved($campaign_id);
			$manageCampaigns['notAchieved']=$this->sales_m->getCampaignGoalsNotAchieved($campaign_id);
			$manageCampaigns['dailyNotes']=$this->sales_m->getDailyNotes($campaign_id);
			$manageCampaigns['summaryNotes']=$this->sales_m->getSummaryNotes($campaign_id);
			$this->load->view('header');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/manageCampainGoals',$manageCampaigns);
			$this->load->view('footer');
		}else {
			redirect('sales/manageCampaigns');
		}
	}
	function updateCampaignGoal(){
		$mcg_id=$this->input->post('mcg_id');
		$campaign_id=$this->input->post('campaign_id');
		if(isset($mcg_id)){
			$this->db->where('mcg_id',$mcg_id);
			$this->db->update('marketing_campaign_goals',array('mcg_achieved'=>"YES"));
			return $this->manageCampainGoals($campaign_id);
		}
		else {
			redirect('sales/manageCampaigns');
		}
	}
	function addDailyCampaignNotes(){
		$campaign_id=$this->input->post('campaign_id');
		if(isset($campaign_id)){
			$notes=$this->input->post('notes');
			$this->db->insert('marketing_campaign_notes',array('mcn_campaign_id'=>$campaign_id,'mcn_notes'=>$notes,'mcn_type'=>"Daily notes",'mcn_added_by'=>$this->staff_wec_emp_no));
			return $this->manageCampainGoals($campaign_id);
		}else{
			redirect('sales/manageCampaigns');
		}
	}
	function addCampaignSummary(){
		$campaign_id=$this->input->post('campaign_id');
		if(isset($campaign_id)){
			$notes=$this->input->post('notes');
			$this->db->insert('marketing_campaign_notes',array('mcn_campaign_id'=>$campaign_id,'mcn_notes'=>$notes,'mcn_type'=>"Campaign summary",'mcn_added_by'=>$this->staff_wec_emp_no));
			return $this->manageCampainGoals($campaign_id);
		}else{
			redirect('sales/manageCampaigns');
		}
	}
	function currencies(){
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/currencies');
		$this->load->view('footer');
	}
	function printInvoice()
	{
		$invoice_id=$this->input->post('invoice_id');
		$invoices['invoices']=$this->sales_m->printInvoiceDetails($invoice_id);
		$invoices['invCharge']=$this->sales_m->printInvoiceCharges($invoice_id);
		$invoices['totals']=$this->sales_m->printInvoiceTotals($invoice_id);
		$invoices['bal_due']=$this->sales_m->printInvoiceBalDue($invoice_id);
		$invoices['invoice_id']=$invoice_id;
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-navInv');
		$this->load->view('sales/addInvoiceNew',$invoices);
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
			$this->sales_m->invoiceApprovalsInsert($invApproveData);
		}
		$approvals['approvals']=$this->sales_m->invoiceApprovals();
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/invoiceApprovals',$approvals);
		$this->load->view('footer');
	}
	function printInvoiceApproval(){
		$invoice_id=$this->input->post('invoice_id');
		$invoices['invoices']=$this->sales_m->printInvoiceDetails($invoice_id);
		$invoices['invCharge']=$this->sales_m->printInvoiceCharges($invoice_id);
		$invoices['totals']=$this->sales_m->printInvoiceTotals($invoice_id);
		$invoices['bal_due']=$this->sales_m->printInvoiceBalDue($invoice_id);
		$invoices['approvedMsg']=$this->sales_m->invoiceApproved($invoice_id);
		$invoices['invoice_id']=$invoice_id;
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/addInvoiceApproval',$invoices);
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
			$this->sales_m->invoicePaymentInsert($invPaymentDetails);
			$paidMsg1['paidMsg']=$this->input->post('inv_id');
			$this->session->set_flashdata('paidMsg1', $paidMsg1);
			redirect('sales/invoicePaymentMsg','refresh');
		}
		else{
			$searchInv=$this->input->post('inv_id');
			$invoicePayment['allData']=$this->sales_m->invoicePaymentLoad($searchInv);
			$this->load->view('header');
			$this->load->view('sales/left-nav');
			$this->load->view('sales/top-nav');
			$this->load->view('sales/invoicePayment',$invoicePayment);
			$this->load->view('footer');
		}
	}
	function invoicePaymentMsg(){
		// $this->flashdata('paidMsg',)
		$paidMsg1=$this->session->flashdata('paidMsg1');
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/invoicePaymentMsg',$paidMsg1);
		$this->load->view('footer');
	}
	function paidInvDetails(){
		$inv_id=$this->input->post('inv_id');
		$paidInvDetails['paidInvDetails'] = $this->sales_m->paidInvDetails($inv_id);
		$paidInvDetails['paidInvDetailsTotal']=$this->sales_m->paidInvDetailsTotal($inv_id);
		$paidInvDetails['paidInvDetailsPaid']=$this->sales_m->paidInvDetailsPaid($inv_id);
		$paidInvDetails['paidInvDetailsBal']=$this->sales_m->paidInvDetailsBal($inv_id);
		$paidInvDetails['history']=$this->sales_m->paidInvHistory($inv_id);
		$paidInvDetails['invClient']=$this->sales_m->paidInvDetailsClient($inv_id);
		$paidInvDetails['inv_id']=$inv_id;
		$this->load->view('header');
		$this->load->view('sales/left-nav');
		$this->load->view('sales/top-nav');
		$this->load->view('sales/paidInvDetails',$paidInvDetails);
		$this->load->view('footer');
	}
}