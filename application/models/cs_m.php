<?php

class Cs_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function addClient($clientTable)
	{
		$this->db->insert('clients',$clientTable);
		$custID=$this->db->insert_id();
		return (isset($custID)) ? $custID : FALSE;
	}
	function addProspect($prospectTable)
	{
		$this->db->insert('prospects',$prospectTable);
	}
	function addLead($leadTable)
	{
		$this->db->insert('leads',$leadTable);
	}
	function getMarketingChannels(){
		$this->db->select('*');
		return $this->db->get('marketing_channels')->result();
	}
	function getClient($cid)
	{
		$this->db->select('');
		$this->db->where('cust_id',$cid);
		// $this->db->where('is_customer','1');
		return $this->db->get('clients')->result();
	}
	function getProspects($cid)
	{
		$this->db->select('*');
		$this->db->where('clients.cust_id',$cid);
		$this->db->where('prospects.cust_id',$cid);
		return $this->db->get('clients, prospects')->result();
	}
	function manageProspects()
	{
		$this->db->select('*');
		$this->db->where('clients.cust_id=prospects.cust_id AND prospects.is_customer="0"');
		return $this->db->get('clients,prospects')->result();
	}
	function manageProspects1()
	{
		$this->db->select('*');
		$this->db->where('clients.cust_id=leads.cust_id AND leads.is_customer="0" AND leads.is_prospect="1"');
		return $this->db->get('clients,leads')->result();
	}
	function manageLeads(){
		$this->db->select('*');
		$this->db->where('clients.cust_id=leads.cust_id');
		$this->db->where('leads.is_customer','0');
		$this->db->where('leads.is_prospect','0');
		return $this->db->get('clients,leads')->result();
	}
	function manageClients()
	{
		$this->db->select('*');
		$this->db->where('is_customer','1');
		return $this->db->get('clients')->result();
	}
	function convertProspectToCustomer($propect_id){
		//UPDATING PROSPECTS TABLE
		$this->db->where('prospects.cust_id',$propect_id);
		$this->db->where('prospects.is_customer','0');
		$this->db->set('prospects.is_customer','1');
		$this->db->update('prospects');
		//UPDATE LEAD TABLE
		$this->db->where('leads.cust_id',$propect_id);
		$this->db->where('leads.is_customer','0');
		$this->db->where('leads.is_prospect','1');
		$this->db->set('leads.is_customer','1');
		$this->db->update('leads');
	}
	function convertLeadToCustomer($lead_id_cust){
		$this->db->where('cust_id',$lead_id_cust);
		$this->db->where('is_customer','0');
		$this->db->set('is_customer','1');
		$this->db->update('leads');
	}
	function convertLeadToProspect($lead_id_pros){
		$this->db->where('cust_id',$lead_id_pros);
		$this->db->where('is_prospect','0');
		$this->db->set('is_prospect','1');
		$this->db->update('leads');
	}
	function manageClientQuotes($cid){
		$this->db->select('invoice.invoice_id invoice_id, invoice.inv_date inv_date, invoice.inv_due_date, invoice.cust_id cust_id, invoice.amount_paid amount_paid, invoice.inv_currency inv_currency, sum(invoice_charges.amount) amount, datediff(inv_due_date,inv_date) terms, sum(invoice_charges.amount)-invoice.amount_paid bal');
		$this->db->where('invoice.cust_id',$cid);
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice, invoice_charges')->result();
	}
	function getCharges($cid,$createInv)
	{
		$this->db->select('service_charges.service_id as service_id, service_charges.service_name as service_name, customer_rates.cust_id as cust_id, customer_rates.cust_rate as cust_rate, clients.cust_currency curency');
		$this->db->where('customer_rates.service_id=service_charges.service_id AND customer_rates.cust_id=clients.cust_id');
		$this->db->where('service_charges.service_id=customer_rates.service_id');
		$this->db->where("service_charges.service_category='All' OR service_charges.service_category='$createInv'");
		$this->db->where('customer_rates.cust_id',$cid);
		$this->db->group_by('service_charges.service_id','ASC');
		return $this->db->get('service_charges,customer_rates,clients')->result();
	}
	function getClientCurrency($cid)
	{
		$this->db->select('cust_currency currency');
		$this->db->where('cust_id',$cid);
		return $this->db->get('clients')->result();
	}
	function addQuoteDetails($invDetails){
		$this->db->insert('invoice',$invDetails);
		$invID=$this->db->insert_id();
		return (isset($invID)) ? $invID : FALSE;
	}
	function addQuoteCharges($insert_array){
		$this->db->insert_batch('invoice_charges',$insert_array);
	}
	function manageQuote()
	{
		$this->db->select('invoice.invoice_id invoice_id, invoice.cust_id cust_id, invoice.inv_date, invoice.inv_currency inv_currency, sum(invoice_charges.amount)-invoice.amount_paid amount_due');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('invoice.invoice_id=invoice_approval.invoice_id');
		$this->db->where('invoice_approval.approval_status','1');
		$this->db->group_by('invoice_approval.invoice_id','ASC');
		return $this->db->get('invoice, invoice_charges, invoice_approval')->result();
	}
	function manageQuoteCountStatus(){
		$this->db->select('count(invoice_approval.approval_status) inv_app_count');
		$this->db->where('invoice_approval.invoice_id=invoice.invoice_id');
		$this->db->where('invoice.invoice_id=invoice_approval.invoice_id');
		$this->db->where('invoice_approval.approval_status','1');
		$this->db->distinct('invoice_approval.invoice_id');
		return $this->db->get('invoice, invoice_approval')->result();
	}
	function printQuoteDetails($invoice_id)
	{
		$this->db->select('inv_date, cust_id, shipment, datediff(inv_due_date,inv_date) termss, service_type, regime, urgency, shipper, consignee, our_ref, your_ref, goods_desc, vessel_no, mawb, hawb, origin, destination, etd, eta, inv_due_date, inv_currency');
		$this->db->where('invoice.invoice_id',$invoice_id);
		return $this->db->get('invoice')->result();
	}
	function printQuoteCharges($invoice_id){
		$this->db->select('service_charges.service_name as charge, invoice_charges.amount as amount');
		$this->db->where('service_charges.service_id=invoice_charges.service_id');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		$this->db->where('invoice_charges.amount>0');
		return $this->db->get('service_charges, invoice_charges')->result();
	}
	function printQuoteTotals($invoice_id)
	{
		$this->db->select('sum(invoice_charges.amount) as total');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		return $this->db->get('invoice_charges')->result();
	}
	function printQuoteBalDue($invoice_id)
	{
		$this->db->select('sum(invoice_charges.amount)-invoice.amount_paid as bal_due');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		$this->db->where('invoice_charges.invoice_id=invoice.invoice_id');
		return $this->db->get('invoice, invoice_charges')->result();
	}
	function quoteApprovals(){
		$this->db->select('invoice.invoice_id invoice_id, sum(invoice_charges.amount) as total, DATE(invoice.inv_date) as inv_date, clients.client_name as client_name, invoice.amount_paid amount_paid');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('invoice.cust_id=clients.cust_id');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice, clients, invoice_charges')->result();
	}
	function quoteApprovalsNoApproved($invoice_id){
		$this->db->select('count(approval_status)');
		$this->db->where('invoice_id',$invoice_id);
		return $this->db->get('invoice_approval')->result();
	}
	function quoteApproved($invoice_id){
		$this->db->select('invoice_approval.invoice_id app_invoice_id, invoice_approval.approval_status approval_status, invoice_approval.staff_id staff_id, invoice_approval.comments comments');
		$this->db->where('invoice_approval.invoice_id',$invoice_id);
		$this->db->where('invoice_approval.invoice_id=invoice.invoice_id');
		$this->db->order_by('invoice_approval.approved_at','DESC');
		$this->db->limit(1);
		return $this->db->get('invoice_approval, invoice')->result();
	}
	function quoteApprovalsInsert($invApproveData){
		$this->db->trans_start();
		$this->db->insert('invoice_approval',$invApproveData);
		$this->db->trans_complete();
	}
	function myNotesCategory(){
		$this->db->select('*');
		return $this->db->get('staff_notes_category')->result();
	}
	function myNotesInsert($myNotes){
		if(isset($myNotes)):
			$this->db->trans_start();
			$this->db->insert('staff_notes',$myNotes);
			$this->db->trans_complete();
		endif;
	}
	function myNotesGet($staff_id){
		$this->db->select('*');
		$this->db->where('staff_id',$staff_id);
		return $this->db->get('staff_notes')->result();
	}
	function upload($msg){
		$this->db->select('doc_name,doc_description');
		$this->db->where('doc_id',$msg);
		return $this->db->get('cs_rbd_docs')->result();
	}
	function getConsignments(){
		$this->db->select('*');
		$this->db->where('sent_to_accounts=0');
		$this->db->where('consignment.cust_id=clients.cust_id');
		$this->db->group_by('cons_id');
		return $this->db->get('consignment,clients')->result();
	}
	function getConsignmentsForDispatch(){
		$this->db->select('client_name,invoice.invoice_id invoice_id,sum(amount) inv_amount,inv_date,created_by,inv_currency,staff_sname,staff_mname,staff_fname,invoice.cust_id cust_id,shipment as cons_id');
		$this->db->where('clients.cust_id=invoice.cust_id');
		$this->db->where('invoice_charges.invoice_id=invoice.invoice_id');
		$this->db->where('employee.staff_wec_emp_no=invoice.created_by');
		$this->db->where('sent_to_cs=1 AND inv_sent=0');
		$this->db->where('invoice.shipment>0');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice,clients,invoice_charges,employee')->result();
	}
	function getDispatchedUndeliveredInvoices(){
		$this->db->select('client_name,invoice.invoice_id invoice_id,sum(amount) inv_amount,inv_date,created_by,inv_currency,staff_sname,staff_mname,staff_fname,invoice.cust_id cust_id,cons_id,dispatched_by');
		$this->db->where('clients.cust_id=invoice.cust_id');
		$this->db->where('invoice_charges.invoice_id=invoice.invoice_id');
		$this->db->where('employee.staff_wec_emp_no=invoice.created_by');
		$this->db->where('invoice.invoice_id=invoice_dispatch_to_client.idtc_invoice_id');
		$this->db->where('inv_sent=1 AND inv_delivered=0');
		$this->db->where('invoice.cons_id>0');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice,clients,invoice_charges,employee,invoice_dispatch_to_client')->result();
	}
	function loadConsDetails($cons_id){
		$this->db->select('*');
		$this->db->where('cons_id',$cons_id);
		return $this->db->get('consignment')->result();
	}
	function getAllCharges(){
		$this->db->select('*');
		return $this->db->get('service_charges')->result();
	}
	function getConsData($track_cons_id){
		$this->db->select('*');
		$this->db->where('cons_id',$track_cons_id);
		return $this->db->get('consignment')->result();
	}
	function addConsNotes($cons_notes_array){
		$this->db->insert('cons_notes',$cons_notes_array);
	}
	function getConsNotes($track_cons_id){
		$this->db->select('cons_notes, staff_fname, staff_sname, added_on,cons_id');
		$this->db->where('cons_id',$track_cons_id);
		$this->db->where('staff_wec_emp_no=added_by');
		return $this->db->get('cons_notes,employee')->result();
	}
	function addAccInfo($accInfo){
		$this->db->insert_batch('cons_acc_info',$accInfo);
	}
	function getConsAccInfo($track_cons_id){
		$this->db->select('service_name charge,cons_acc_info_amount amount');
		$this->db->where('cons_cons_id',$track_cons_id);
		$this->db->where('cons_service_id=service_id');
		// $this->db->order_by('service_name','ASC');
		return $this->db->get('cons_acc_info,service_charges')->result();
	}
	function addConsignmentParties($consParties){
		extract($consParties);
		$this->db->insert('cons_parties',$consParties);
	}
	function sendConsToAccounts($send_to_accounts){
		$this->db->where('cons_id',$send_to_accounts);
		$this->db->update('consignment',array('sent_to_accounts' => 1));
	}
	function consHandled(){
		$this->db->select('count(consignment.cons_id) as consignments');
		$this->db->group_start();
			$this->db->where('consignment.cons_id=cons_bill_of_landing.bol_cons_id');
			$this->db->or_where('consignment.cons_id=cons_notes.cons_id');
			$this->db->or_where('consignment.cons_id=cons_acc_info.cons_cons_id');
		$this->db->group_end();
		$this->db->group_start();
			$this->db->where('cons_acc_info.cons_acc_info_added_on=DATE(CURDATE)');
			$this->db->or_where('cons_bill_of_landing.bol_added_on=DATE(CURDATE)');
			$this->db->or_where('cons_notes.added_on=DATE(CURDATE)');
		$this->db->group_end();
		return $this->db->get('consignment,cons_notes,cons_bill_of_landing,cons_acc_info')->result();

	}
	function reportsOverview(){
		$this->db->select('cons_id');
		$this->db->where('cons_id=bol_cons_id');
		// $this->db->where('sent_to_cs',1);
		return $this->db->get('consignment,cons_bill_of_landing')->result();
	}
	function getCargoSheds(){
		$this->db->select('*');
		return $this->db->get('cargo_sheds')->result();
	}
	function reportsConsignmentsAll($dates){
		extract($dates);
		$this->db->select('*');
		$this->db->where('sent_to_accounts="1"');
		$this->db->group_start();
		$this->db->where('cons_import_export="Import"');
		$this->db->or_where('cons_import_export="Export"');
		$this->db->group_end();
		$this->db->where('cons_date_opened>=',$date1);
		$this->db->where('cons_date_opened<=',$date2);
		return $this->db->get('consignment')->result();
	}
	function reportsConsignmentsImports($dates){
		extract($dates);
		$this->db->select('*');
		$this->db->where('sent_to_accounts="1"');
		$this->db->where('cons_import_export="Import"');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		return $this->db->get('consignment')->result();
	}
	function reportsConsignmentsExports($dates){
		extract($dates);
		$this->db->select('*');
		$this->db->where('sent_to_accounts="1"');
		$this->db->where('cons_import_export="Export"');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		return $this->db->get('consignment')->result();
	}
	function reportsConsignmentsLocal($dates){
		extract($dates);
		$this->db->select('*');
		$this->db->where('sent_to_accounts="1"');
		$this->db->where('cons_import_export="Local"');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		return $this->db->get('consignment')->result();
	}
	function reportsConsignmentsShedsDHL($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1001);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsShedsSwissPort($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1002);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsShedsTransGlobalCargo($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1003);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsShedsSiginon($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1004);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsShedsACHC($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1005);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsShedsKAHL($dates){
		extract($dates);
		$this->db->select('cai_cargo_shed_id');
		$this->db->where('cai_cargo_shed_id>0');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cai_cargo_shed_id',1006);
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment,cons_acc_info')->result();
	}
	function reportsConsignmentsFreightCharges($dates){
		extract($dates);
		$this->db->select('sum(bill_of_landing_charge) sum_freight, bol_cons_id, cust_id, cons_date_opened, cons_desc');
		$this->db->where('cons_id=bol_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->group_start();
		$this->db->where('cons_import_export="Import"');
		$this->db->or_where('cons_import_export="Export"');
		$this->db->group_end();
		$this->db->group_by('bol_cons_id');
		return $this->db->get('cons_bill_of_landing,consignment')->result();
	}
	function reportsConsignmentsClearance($dates){
		extract($dates);
		$this->db->select('sum(cons_acc_info_amount) clearance, cons_cons_id, cust_id, cons_date_opened, cons_desc');
		$this->db->where('cons_id=cons_cons_id');
		$this->db->where("cons_date_opened>=",$date1);
		$this->db->where("cons_date_opened<=",$date2);
		$this->db->where('sent_to_accounts',1);
		$this->db->group_start();
		$this->db->where('cons_import_export="Import"');
		$this->db->or_where('cons_import_export="Export"');
		$this->db->group_end();
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment, cons_acc_info')->result();
	}

}
?>