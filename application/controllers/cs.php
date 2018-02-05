<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cs extends CI_Controller 
{
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('cs_m');
			$this->load->view('countries');

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
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/home');
			$this->load->view('footer');
		}
	public function myNotes()
		{
			$note_category=$this->input->post('note_category');
			$staff_id=$this->staff_wec_emp_no;
			if(isset($note_category)):
				$myNotes = array('staff_id'=>$this->staff_wec_emp_no,'note_category' => $note_category, 'notes'=>$this->input->post('notes'));
				$this->cs_m->myNotesInsert($myNotes);
				redirect('cs/myNotes','refresh');
			endif;
			$notes['category']=$this->cs_m->myNotesCategory();
			$notes['myNotes']=$this->cs_m->myNotesGet($staff_id);
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/notes',$notes);
			$this->load->view('footer');
		}
	public function addClient()
		{
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
						'mc_id'=>$this->input->post('mc')
					);
					$custID=$this->cs_m->addClient($clientTable);
					// echo $custID;
					$addClientMsg['addClientMsg']="New customer added successfully. Customer ID ".$custID;
					$this->session->set_flashdata('addClientMsg', $addClientMsg);
					return redirect('cs/addClient');

				}
				else
				{
					$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
					$addClientMsg['marketingChannels']=$this->cs_m->getMarketingChannels();
					$this->load->view('header');
					$this->load->view('cs/left-nav');
					$this->load->view('cs/top-nav');
					$this->load->view('cs/addClient',$addClientMsg);
					$this->load->view('footer');
				}
		}
	public function manageClient()
		{
			$client_id=$this->input->post('client_id');
			if(isset($client_id)){
				$cid=$this->input->post('client_id');
				$manageClient['client_name']=$this->input->post('client_name').' #'.$cid;
				$manageClient['invoice']=$this->cs_m->manageClientQuotes($cid);
				$manageClient['client']=$this->cs_m->getClient($cid);
				$this->load->view('header-table-editable');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/clientDetails',$manageClient);
				$this->load->view('footer-editable-table');
			}
			else{
			$clients['clients']=$this->cs_m->manageClients();
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manage-clients',$clients);
			$this->load->view('footer-editable-table');
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
					$custID=$this->cs_m->addClient($clientTable);
					$addClientMsg['addClientMsg']="New Prospect added successfully. Customer ID ".$custID;
					$this->session->set_flashdata('addClientMsg', $addClientMsg);
					$prospectTable=array('cust_id' =>$custID);
					$this->cs_m->addProspect($prospectTable);
					return redirect('cs/addProspect');

				}
				else
				{
					$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
					$addClientMsg['marketingChannels']=$this->cs_m->getMarketingChannels();
					$this->load->view('header');
					$this->load->view('cs/left-nav');
					$this->load->view('cs/top-nav');
					$this->load->view('cs/addProspect',$addClientMsg);
					$this->load->view('footer');
				}
		}
	public function manageProspects()
		{
			$client_id=$this->input->post('client_id');
			if(isset($client_id)){
				$cid=$this->input->post('client_id');
				$manageClient['invoice']=$this->cs_m->manageClientQuotes($cid);
				$manageClient['client']=$this->cs_m->getClient($cid);
				$this->load->view('header-table-editable');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/prospectDetails',$manageClient);
				$this->load->view('footer-editable-table');
			}
			else{
			$prospects['prospects']=$this->cs_m->manageProspects();
			$prospects['prospects1']=$this->cs_m->manageProspects1();
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manageProspects',$prospects);
			$this->load->view('footer-editable-table');
			}
		}

	public function addLead()
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
					$custID=$this->cs_m->addClient($clientTable);
					$addClientMsg['addClientMsg']="New lead added successfully with unique ID# ".$custID;
					$this->session->set_flashdata('addClientMsg', $addClientMsg);
					$leadTable=array('cust_id' =>$custID);
					$this->cs_m->addLead($leadTable);
					return redirect('cs/addLead');

				}
				else
				{
					$addClientMsg['addClientMsg']=$this->session->flashdata('addClientMsg');
					$addClientMsg['marketingChannels']=$this->cs_m->getMarketingChannels();
					$this->load->view('header');
					$this->load->view('cs/left-nav');
					$this->load->view('cs/top-nav');
					$this->load->view('cs/addLead',$addClientMsg);
					$this->load->view('footer');
				}
		}

	public function manageLead()
		{
			$client_id=$this->input->post('client_id');
			if(isset($client_id)){
				$cid=$this->input->post('client_id');
				$manageClient['invoice']=$this->cs_m->manageClientQuotes($cid);
				$manageClient['client']=$this->cs_m->getClient($cid);
				$this->load->view('header-table-editable');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/leadDetails',$manageClient);
				$this->load->view('footer-editable-table');
			}
			else{
			$leads['leads']=$this->cs_m->manageLeads();
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manageLeads',$leads);
			$this->load->view('footer-editable-table');
			}
		}
	function convertTo()
		{
			$propect_id=$this->input->post('propect_id');
			$lead_id_cust=$this->input->post('lead_id_cust');
			$lead_id_pros=$this->input->post('lead_id_pros');
			if(isset($propect_id)){
				$this->cs_m->convertProspectToCustomer($propect_id);
				redirect ('cs/manageProspects');
			}
			if(isset($lead_id_cust)){
				$this->cs_m->convertLeadToCustomer($lead_id_cust);
				redirect ('cs/manageLead');
			}
			if(isset($lead_id_pros)){
				$this->cs_m->convertLeadToProspect($lead_id_pros);
				redirect ('cs/manageLead');
			}
			else{
				$this->load->view('header-table-editable');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/convertToUI');
				$this->load->view('footer-editable-table');
			}
		}
	public function manageQuote()
		{
			$invoices['invoices']=$this->cs_m->manageQuote();
			$invoices['inv_app_count']=$this->cs_m->manageQuoteCountStatus();
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manageInvoices',$invoices);
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
				
				$charges['charges']=$this->cs_m->getCharges($cid,$createInv);
				$charges['currency']=$this->cs_m->getClientCurrency($cid);
				$charges['cid']=$cid;
				$charges['serviceType']=$createInv;
				$this->load->view('header');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-navInv');
				$this->load->view('cs/addInvoiceNewUI',$charges);
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
				$invID=$this->cs_m->addInvoiceDetails($invDetails);//INSERT INVOICE DETAILS AND RETURN INVOICE_ID
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
		            $this->cs_m->addInvoiceCharges($insert_array);
					// $this->db->insert_batch('invoice_charges', $insert_array);//WORKING BUT MOVEED TO MODEL				
					$this->load->view('header');
					$this->load->view('cs/left-nav');
					$this->load->view('cs/top-navInv');
					$this->load->view('cs/addInvoiceMsg',$invoiceID);
					$this->load->view('footer');
			}
			else
			{
				$this->load->view('header');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-navInv');
				$this->load->view('cs/addInvoiceNewUI');
				$this->load->view('footer');
			}
		}
	function addConsigment()
		{
			$client=$this->input->post('cust_id');
			if(isset($client)){
				$consTable=array(
					'cons_cargo_type'=>$this->input->post('cons_cargo_type'),
					'cons_urgency'=>$this->input->post('cons_urgency'),
					'cons_regime'=>$this->input->post('cons_regime'),
					'cons_desc' =>$this->input->post('cons_desc'),
					'cons_import_export'=>$this->input->post('cons_import_export'),
					'cons_trans_type'=>$this->input->post('cons_trans_type'),
					'cons_entry_number'=>$this->input->post('cons_entry_number'),
					'cons_date_opened'=>$this->input->post('cons_date_opened'),
					'cons_weight'=>$this->input->post('cons_weight'),
					'cons_height'=>$this->input->post('cons_height'),
					'cons_length'=>$this->input->post('cons_length'),
					'cons_width'=>$this->input->post('cons_width'),
					'cons_country_of_origin'=>$this->input->post('cons_country_of_origin'),
					'cons_consignee'=>$this->input->post('cons_consignee'),
					'cons_shipper'=>$this->input->post('cons_shipper'),
					'cons_port_of_delivery'=>$this->input->post('cons_port_of_delivery'),
					'cons_door_of_delivery'=>$this->input->post('cons_door_of_delivery'),
					'cons_flight_no'=>$this->input->post('cons_freight_vessel_no'),
					'cons_etd'=>$this->input->post('cons_etd'),
					'cons_eta'=>$this->input->post('cons_eta'),
					'cust_id'=>$this->input->post('cust_id'),
					//~~NEW
					'cons_airline'=>$this->input->post('cons_airline'),
					'cons_flight_no'=>$this->input->post('cons_flight_no'),
					'cons_no_of_packages'=>$this->input->post('cons_pkgs'),
					'cons_comm_inv_no'=>$this->input->post('comm_inv'),
					'cons_country_of_origin'=>$this->input->post('cons_origin'),
					'cons_port_of_delivery'=>$this->input->post('cons_destination'),
					'cons_category'=>$this->input->post('cons_category'),
					//~~NEW
					'cons_added_by'=>$this->staff_wec_emp_no
					);
				$this->db->insert('consignment',$consTable);
				// commercial invoice
				// cons_comm_inv_no
				// comm_inv_date 
					// 'comm_inv_date'=>$this->input->post('comm_inv_date'),
				// comm_inv_value
				$this->cons_id=$this->db->insert_id();
			}
				$clients['cons_id']=$this->cons_id;
				$clients['clients']=$this->cs_m->manageClients();
				$this->load->view('header');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/addConsigment',$clients);
				$this->load->view('footer');
		}
	function trackConsignment()
		{
			$track_cons_data['charges']=$this->cs_m->getAllCharges();//GET CHARGES
			$track_cons_id_new=$this->input->post('track_cons_id');//GETTING CONSIGNMENT INFO FROM MANAGE CONS
			if(isset($track_cons_id_new)){
				$track_cons_id=$this->input->post('track_cons_id');
			}
			// $track_cons_id=$this->input->post('cons_id');//GETTING CONSIGNMENT AFTER ADDING ACCOUNTING INFO
			//ADD ACCOUNTING INFO
			$acc_info=$this->input->post('charge_id');
			if(isset($acc_info)):
				$charge_id = $this->input->post('charge_id');
			    $charges_amnt = $this->input->post('charges_amnt');
			    $track_cons_id=$this->input->post('acc_cons_id');
			        $accInfo = array();
			        for ($i=0; $i < count($charge_id); $i++) 
			        {
			            $tmp = array();
			            $tmp['cons_cons_id'] = $track_cons_id;
			            $tmp['cons_service_id'] = $charge_id[$i];
			            $tmp['cons_acc_info_amount'] = $charges_amnt[$i];
			            $tmp['cons_acc_info_added_by'] = $this->staff_wec_emp_no;
			            $accInfo[] = $tmp;
			        }
			    $this->cs_m->addAccInfo($accInfo);
			 endif;
			//ADD CONSIGNMENT NOTES
			$cons_notes=$this->input->post('cons_notes');
			if(isset($cons_notes)):
				$cons_notes_array = array(
					'cons_id' => $this->input->post('cons_id'),
					'added_by' => $this->staff_wec_emp_no,
					'cons_notes' => $this->input->post('cons_notes')
					);
				$track_cons_id=$this->input->post('cons_id');
			    $this->cs_m->addConsNotes($cons_notes_array);
			 endif;
			//SEND CONSIGNMENT TO ACCOUNTS FOR INVOICING
			 $send_to_accounts=$this->input->post('send_to_accounts');
			 if(isset($send_to_accounts)):
				//send to accounts code here
				$this->cs_m->sendConsToAccounts($send_to_accounts);
				$track_cons_data['send_to_accounts']=$send_to_accounts;
			endif;
			//OUTSIDE MAIN BODY
			$this->load->model('ops_m');
			$track_cons_data['consData']=$this->ops_m->getConsData($track_cons_id);
			$track_cons_data['cons_notes']=$this->cs_m->getConsNotes($track_cons_id);
			$track_cons_data['track_cons_data']=$this->cs_m->getConsData($track_cons_id);//GET CONS DATA ON CLICK OF VIEW MORE
			$track_cons_data['accInfo']=$this->cs_m->getConsAccInfo($track_cons_id);
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/trackConsignmentNew',$track_cons_data);
			$this->load->view('footer');
		}
	function manageConsignment()
		{
			$cons_id=$this->input->post('cons_id');
			if(isset($cons_id)):
				$cons_id=$this->input->post('cons_id');
				$cons['cons']=$this->cs_m->loadConsDetails($cons_id);
				$this->session->set_flashdata('cons', $cons);
				redirect('cs/trackConsignment');
			endif;
			$consignments['cons']=$this->cs_m->getConsignments();
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manageConsignment1',$consignments);
			// $this->load->view('cs/testFoo',$consignments);
			$this->load->view('footer');
		}
	function dispatchInvoices()
		{
			$cust_id=$this->input->post('cust_id');
			$track_cons_id=$this->input->post('cons_id');
			$notes=$this->input->post('send_invoice_notes');//FOR SENDING INVOICES
		if(isset($cust_id)&&!empty($track_cons_id)):
			//
			$this->load->model('accounts_m');//load accounts model
			// 
			$dispatchInvoices['staffList']=$this->accounts_m->getAllStaff();
			$dispatchInvoices['consNotes']=$this->cs_m->getConsNotes($track_cons_id);
			$dispatchInvoices['consAccInfo']=$this->cs_m->getConsAccInfo($track_cons_id);
			// 
			$dispatchInvoices['consData']=$this->cs_m->getConsData($track_cons_id);//get consignment data
			$invoice_id=$this->input->post('invoice_id');//get invoice data
			$dispatchInvoices['invoices']=$this->accounts_m->printInvoiceDetails($invoice_id);//,,
			$dispatchInvoices['invCharge']=$this->accounts_m->printInvoiceCharges($invoice_id);//,,
			$dispatchInvoices['totals']=$this->accounts_m->printInvoiceTotals($invoice_id);//,,
			$dispatchInvoices['bal_due']=$this->accounts_m->printInvoiceBalDue($invoice_id);//,,
			$dispatchInvoices['invoice_id']=$invoice_id;// //get invoice data
			$dispatchInvoices['freightDocs']=$this->accounts_m->printInvoiceFreightDocs($track_cons_id);// get documents
		elseif (isset($notes)&&!empty($notes)):
			$sender=$this->input->post('sending_person');
			$send_invoice_id=$this->input->post('send_invoice_id');
			$this->db->insert('invoice_dispatch_to_client',array('idtc_invoice_id'=>$send_invoice_id,'dispatch_notes'=>$notes,'dispatched_by'=>$sender,'recorded_by'=>$this->staff_wec_emp_no));
			$dispatchInvoices['send_msg']="Congs! You've marked Invoice #$send_invoice_id as sent by $sender.";
			$dispatchInvoices['send_invoice_id']=$send_invoice_id;
		else:
			$dispatchInvoices['consForDispatch']=$this->cs_m->getConsignmentsForDispatch();
		endif;
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/dispatchConsignment',$dispatchInvoices);
			$this->load->view('footer-editable-table');		
		}
	function dispatchedInvoices()
		{
			$dispatchedInvoices['dispatchedUndeliveredInvoices']=$this->cs_m->getDispatchedUndeliveredInvoices();
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$invoice_id=$this->input->post('invoice_id');
			if(isset($invoice_id)){
				$this->db->where('invoice_id',$invoice_id);
				$this->db->update('invoice',array('inv_delivered'=>1));
				$dispatchedInvoices['invUpdated']="Invoice #$invoice_id marked as delieverd.";
				refresh;
			}
			$this->load->view('cs/dispatchedInvoices',$dispatchedInvoices);
			$this->load->view('footer-editable-table');
		}
	function sendInvoice()
		{
			$notes=$this->input->post('send_invoice_notes');
			$sender=$this->input->post('sending_person');
			$invoice_id=$this->input->post('send_invoice_id');
			if(isset($invoice_id)&&!empty($invoice_id)){
				$this->db->insert('invoice_dispatch_to_client',array('idtc_invoice_id'=>$invoice_id,'dispatch_notes'=>$notes,'dispatched_by'=>$sender,'recorded_by'=>$this->staff_wec_emp_no));
				$sendInvoice['msg']="Congs! You've marked Invoice #invoice_id as sent by $sender.";
				$sendInvoice['invoice_id']=$invoice_id;
			}
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/sendInvoice',$sendInvoice);
			$this->load->view('footer');
		}
	public function addAgent()
		{
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/addAgent');
			$this->load->view('footer');
		}

	public function manageAgents()
		{
			$this->load->view('header-table-editable');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/manageAgents');
			$this->load->view('footer-editable-table');
		}
	function currencies()
		{
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/currencies');
			$this->load->view('footer');
		}
	function printInvoice()
		{
			$invoice_id=$this->input->post('invoice_id');
			$this->load->model('accounts_m');
			$invoices['invoices']=$this->accounts_m->printInvoiceDetails($invoice_id);
			$invoices['invCharge']=$this->accounts_m->printInvoiceCharges($invoice_id);
			$invoices['totals']=$this->accounts_m->printInvoiceTotals($invoice_id);
			$invoices['bal_due']=$this->accounts_m->printInvoiceBalDue($invoice_id);
			$invoices['invoice_id']=$invoice_id;
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-navInv');
			$this->load->view('cs/addInvoiceNew',$invoices);
			$this->load->view('footer');
		}
	function invoiceApprovals()
		{
			$inv_id=$this->input->post('inv_id');
			if(isset($inv_id)){
				$invApproveData = array(
					'invoice_id' =>$this->input->post('inv_id'),
					'staff_id'=>$this->staff_wec_emp_no,
					'approval_status'=>$this->input->post('status'),
					'comments'=>$this->input->post('comments')
					);
				$this->cs_m->invoiceApprovalsInsert($invApproveData);
			}
			$approvals['approvals']=$this->cs_m->invoiceApprovals();
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/invoiceApprovals',$approvals);
			$this->load->view('footer');
		}
	function printInvoiceApproval()
		{
			$invoice_id=$this->input->post('invoice_id');
			$invoices['invoices']=$this->cs_m->printInvoiceDetails($invoice_id);
			$invoices['invCharge']=$this->cs_m->printInvoiceCharges($invoice_id);
			$invoices['totals']=$this->cs_m->printInvoiceTotals($invoice_id);
			$invoices['bal_due']=$this->cs_m->printInvoiceBalDue($invoice_id);
			$invoices['approvedMsg']=$this->cs_m->invoiceApproved($invoice_id);
			$invoices['invoice_id']=$invoice_id;
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/addInvoiceApproval',$invoices);
			$this->load->view('footer');
		}
	function invoicePayment()
		{
			$inv_payment=$this->input->post('inv_payment');
			if(isset($inv_payment)){
				$invPaymentDetails = array(
					'amount_paid' => $this->input->post('inv_payment'),
					'invoice_id' => $this->input->post('inv_id'),
					'date_paid' => $this->input->post('date_paid'),
					'recorded_by' => $this->staff_wec_emp_no
					);
				$this->cs_m->invoicePaymentInsert($invPaymentDetails);
				$paidMsg1['paidMsg']=$this->input->post('inv_id');
				$this->session->set_flashdata('paidMsg1', $paidMsg1);
				redirect('cs/invoicePaymentMsg','refresh');
			}
			else{
				$searchInv=$this->input->post('inv_id');
				$invoicePayment['allData']=$this->cs_m->invoicePaymentLoad($searchInv);
				$this->load->view('header');
				$this->load->view('cs/left-nav');
				$this->load->view('cs/top-nav');
				$this->load->view('cs/invoicePayment',$invoicePayment);
				$this->load->view('footer');
			}
		}
	function invoicePaymentMsg()
		{
			// $this->flashdata('paidMsg',)
			$paidMsg1=$this->session->flashdata('paidMsg1');
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/invoicePaymentMsg',$paidMsg1);
			$this->load->view('footer');
		}
	function paidInvDetails()
		{
			$inv_id=$this->input->post('inv_id');
			$paidInvDetails['paidInvDetails'] = $this->cs_m->paidInvDetails($inv_id);
			$paidInvDetails['paidInvDetailsTotal']=$this->cs_m->paidInvDetailsTotal($inv_id);
			$paidInvDetails['paidInvDetailsPaid']=$this->cs_m->paidInvDetailsPaid($inv_id);
			$paidInvDetails['paidInvDetailsBal']=$this->cs_m->paidInvDetailsBal($inv_id);
			$paidInvDetails['history']=$this->cs_m->paidInvHistory($inv_id);
			$paidInvDetails['invClient']=$this->cs_m->paidInvDetailsClient($inv_id);
			$paidInvDetails['inv_id']=$inv_id;
			$this->load->view('header');
			$this->load->view('cs/left-nav');
			$this->load->view('cs/top-nav');
			$this->load->view('cs/paidInvDetails',$paidInvDetails);
			$this->load->view('footer');
		}
	function reportsOverview(){
		$reportsOverview['reportsOverview']=$this->cs_m->reportsOverview();
		$this->load->view('header');
		$this->load->view('cs/left-nav');
		$this->load->view('cs/top-nav');
		$this->load->view('cs/reportsOverview',$reportsOverview);
	}
	function reportsConsignments(){
		$date1=$this->input->post('date1');
		$date2=$this->input->post('date2');
		if(isset($date1)&&isset($date2)){
			// Converting input to MySQL date format
			$dt1 = new DateTime($date1);
			$date11=$dt1->format('Y-m-d');
			$dt2 = new DateTime($date2);
			$date22=$dt2->format('Y-m-d');
			//end of conversion
            $dates = array('date1'=> $date11,'date2'=> $date22);
            $reportsConsignments['date']=" from $date1 to $date2";
			$reportsConsignments['all']=$this->cs_m->reportsConsignmentsAll($dates);
			$reportsConsignments['imports']=$this->cs_m->reportsConsignmentsImports($dates);
			$reportsConsignments['exports']=$this->cs_m->reportsConsignmentsExports($dates);
			$reportsConsignments['locals']=$this->cs_m->reportsConsignmentsLocal($dates);
			// $reportsConsignments['sheds']=$this->cs_m->reportsConsignmentsSheds($dates);
			// CARGO SHEDS
			$reportsConsignments['dhl']=$this->cs_m->reportsConsignmentsShedsDHL($dates);
			$reportsConsignments['kahl']=$this->cs_m->reportsConsignmentsShedsKAHL($dates);
			$reportsConsignments['achc']=$this->cs_m->reportsConsignmentsShedsACHC($dates);
			$reportsConsignments['siginon']=$this->cs_m->reportsConsignmentsShedsSiginon($dates);
			$reportsConsignments['tcc']=$this->cs_m->reportsConsignmentsShedsTransGlobalCargo($dates);
			$reportsConsignments['swissport']=$this->cs_m->reportsConsignmentsShedsSwissPort($dates);
			// EXPENSES & CHARGES 
			$reportsConsignments['freight']=$this->cs_m->reportsConsignmentsFreightCharges($dates);
			$reportsConsignments['clearance']=$this->cs_m->reportsConsignmentsClearance($dates);
		}
		else{
			$reportsConsignments="";
		}
		$this->load->view('header-table-editable');
		$this->load->view('cs/left-nav');
		$this->load->view('cs/top-nav');
		$this->load->view('cs/reportsConsignments',$reportsConsignments);
		// $this->load->view('footer');
	}
	function reportsFinancials(){
		$date1=$this->input->post('date1');
		$date2=$this->input->post('date2');
		if(isset($date1)&&isset($date2)){
			// Converting input to MySQL date format
			$dt1 = new DateTime($date1);
			$date11=$dt1->format('Y-m-d');
			$dt2 = new DateTime($date2);
			$date22=$dt2->format('Y-m-d');
			//end of conversion
            $dates = array('date1'=> $date11,'date2'=> $date22);
            $reportsConsignments['date']=" from $date1 to $date2";
			$reportsConsignments['all']=$this->cs_m->reportsConsignmentsAll($dates);
			$reportsConsignments['imports']=$this->cs_m->reportsConsignmentsImports($dates);
			$reportsConsignments['exports']=$this->cs_m->reportsConsignmentsExports($dates);
			$reportsConsignments['locals']=$this->cs_m->reportsConsignmentsLocal($dates);
			// $reportsConsignments['sheds']=$this->cs_m->reportsConsignmentsSheds($dates);
			// CARGO SHEDS
			$reportsConsignments['dhl']=$this->cs_m->reportsConsignmentsShedsDHL($dates);
			$reportsConsignments['kahl']=$this->cs_m->reportsConsignmentsShedsKAHL($dates);
			$reportsConsignments['achc']=$this->cs_m->reportsConsignmentsShedsACHC($dates);
			$reportsConsignments['siginon']=$this->cs_m->reportsConsignmentsShedsSiginon($dates);
			$reportsConsignments['tcc']=$this->cs_m->reportsConsignmentsShedsTransGlobalCargo($dates);
			$reportsConsignments['swissport']=$this->cs_m->reportsConsignmentsShedsSwissPort($dates);
			// EXPENSES & CHARGES 
			$reportsConsignments['freight']=$this->cs_m->reportsConsignmentsFreightCharges($dates);
			$reportsConsignments['clearance']=$this->cs_m->reportsConsignmentsClearance($dates);
		}
		else{
			$reportsConsignments="";
		}
		$this->load->view('header-table-editable');
		$this->load->view('cs/left-nav');
		$this->load->view('cs/top-nav');
		$this->load->view('cs/reportsConsignments',$reportsConsignments);
		// $this->load->view('footer');
	}
}