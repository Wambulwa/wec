<?php

class Accounts_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getAllStaff(){
		$this->db->select('*');
		return $this->db->get('employee')->result();
	}
	function addClient($clientTable)
	{
		$this->db->trans_start();
		$this->db->insert('clients',$clientTable);
		$this->db->trans_complete();
		if($this->db->trans_status()==FALSE):
			return $addClientMsg['addClientMsg']="Not successful. Please try again";
		elseif ($this->db->trans_status()==TRUE):
			return $addClientMsg['addClientMsg']="New client added successfully";
		endif;
	}
	function addServiceCharge($addCharge)
	{
		$this->db->trans_start();
		$this->db->insert('service_charges',$addCharge);
		// $this->db->query('ANOTHER QUERY...');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return $error['error']="Not successful. Please try again";
		}
		else if ($this->db->trans_status() === TRUE)
		{
			return $error['error']="Service added successfully";
		}
	}
	function addTariffBlock($clientRate)
	{
		// moved to controller in function addTariffBlock
	}
	function getClientRate($cid)
	{
		$this->db->select('service_charges.service_id as service_id, service_charges.service_name as service_name, service_charges.service_max_rate as max_rate, service_charges.service_min_rate as min_rate, clients.cust_id as cust_id');
		$this->db->group_by('service_charges.service_id');
		return $this->db->get('clients,service_charges, customer_rates')->result();
	}
	function getClient($cid)
	{
		$this->db->select('');
		$this->db->where('cust_id',$cid);
		return $this->db->get('clients')->result();
	}
	function manageTariffBlocks()
	{
		$this->db->select('*');		
		$this->db->where('ctb_is_assigned=0');
		return $this->db->get('client_tariff_blocks')->result();
	}
	function manageTariffBlockData($ctb_id){
		$this->db->select('*');
		$this->db->where('ctb_id',$ctb_id);
		return $this->db->get('client_tariff_blocks')->result();
	}
	function manageTariffBlocksAssigned(){
		$this->db->select('*');		
		$this->db->where('ctb_is_assigned=1');
		return $this->db->get('client_tariff_blocks')->result();
	}
	function manageTariffBlocksAssignedData($ctb_table){
		$this->db->select('tb_service_charge, service_name, tb_service_id');
		$this->db->where('service_id=tb_service_id');
		return $this->db->get("$ctb_table,service_charges")->result();
	}
	function insertTariffBlockCharges($insertTariffCharges,$ctb_table_name,$ctb_name){
		// moved to controller
	}
	function manageClients()
	{
		$this->db->select('*');
		return $this->db->get('clients')->result();
	}
	function manageClientInvoice($cid){
		$this->db->select('invoice.invoice_id invoice_id, invoice.inv_date inv_date, invoice.inv_due_date, invoice.cust_id cust_id, invoice.amount_paid amount_paid, invoice.inv_currency inv_currency, sum(invoice_charges.amount) amount, datediff(inv_due_date,inv_date) terms, sum(invoice_charges.amount)-invoice.amount_paid bal');
		$this->db->where('invoice.cust_id',$cid);
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice, invoice_charges')->result();
	}
	function getTariffCharges($tariff_block){
		$this->db->select('service_name,tb_service_charge');
		$this->db->where('service_id=tb_service_id');
		$tables="service_charges,$tariff_block";
		return $this->db->get($tables)->result();
	}
	function manageClientTotalTransactions($cid){
		$this->db->select('sum(amount_paid) total_received, inv_currency');
		$this->db->where('cust_id',$cid);
		return $this->db->get('invoice')->result();
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
	function addInvoiceDetails($invDetails){
		$this->db->insert('invoice',$invDetails);
		return $this->db->insert_id();
		// return (isset($invID)) ? $invID : FALSE;
	}
	function addInvoiceCharges($insert_charges){
		$this->db->insert_batch('invoice_charges',$insert_charges);
	}
	function manageInvoice()
	{
		$this->db->select('invoice.invoice_id invoice_id, invoice.cust_id cust_id, invoice.inv_date, invoice.inv_currency inv_currency, sum(invoice_charges.amount)-invoice.amount_paid amount_due, invoice.approvals approvals');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('invoice.invoice_id=invoice_approval.invoice_id');
		$this->db->where('invoice_approval.approval_status','1');
		$this->db->where('invoice.sent_to_cs','0');
		$this->db->group_by('invoice_approval.invoice_id','ASC');
		return $this->db->get('invoice, invoice_charges, invoice_approval')->result();
	}
	function getUnpaidDueInvoices(){
		$this->db->select('invoice.invoice_id invoice_id, clients.client_name client_name, invoice.inv_date, inv_due_date, invoice.inv_currency inv_currency, sum(invoice_charges.amount) invoiced_value, invoice.amount_paid amount_paid, sum(invoice_charges.amount)-invoice.amount_paid amount_due, datediff(DATE(invoice.inv_due_date),DATE(CURDATE())) days_due');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('clients.cust_id=invoice.cust_id');
		$this->db->where('invoice.sent_to_cs','1');
		$this->db->where('invoice.approvals>=1');
		$this->db->where('datediff(DATE(invoice.inv_due_date),DATE(CURDATE()))=0');
		return $this->db->get('invoice, invoice_charges,clients')->result();
	}
	function getUnpaidUndueInvoices(){
		$this->db->select('invoice.invoice_id invoice_id, clients.client_name client_name, invoice.inv_date, inv_due_date, invoice.inv_currency inv_currency, sum(invoice_charges.amount) invoiced_value, invoice.amount_paid amount_paid, sum(invoice_charges.amount)-invoice.amount_paid amount_due');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('clients.cust_id=invoice.cust_id');
		$this->db->where('invoice.sent_to_cs','1');
		$this->db->where('invoice.approvals>=1');
		$this->db->where('datediff(DATE(invoice.inv_due_date),DATE(CURDATE()))>0');
		return $this->db->get('invoice, invoice_charges,clients')->result();
	}
	function getOverdueInvoices(){
		$this->db->select('invoice.invoice_id invoice_id, clients.client_name client_name, invoice.inv_date, inv_due_date, invoice.inv_currency inv_currency, sum(invoice_charges.amount) invoiced_value, invoice.amount_paid amount_paid, sum(invoice_charges.amount)-invoice.amount_paid amount_due, datediff(DATE(invoice.inv_due_date),DATE(CURDATE())) days_due');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('clients.cust_id=invoice.cust_id');
		$this->db->where('invoice.sent_to_cs','1');
		$this->db->where('invoice.approvals>=1');
		$this->db->where('datediff(DATE(invoice.inv_due_date),DATE(CURDATE()))<0');
		return $this->db->get('invoice, invoice_charges,clients')->result();
	}
	function printInvoiceDetails($invoice_id)
	{
		$this->db->select('inv_date, cust_id, shipment, datediff(inv_due_date,inv_date) termss, service_type, regime, urgency, shipper, consignee, our_ref, your_ref, goods_desc, vessel_no, mawb, hawb, origin, destination, etd, eta, inv_due_date, inv_currency');
		$this->db->where('invoice.invoice_id',$invoice_id);
		return $this->db->get('invoice')->result();
	}
	function printInvoiceCharges($invoice_id){
		$this->db->select('service_charges.service_name as charge, invoice_charges.amount as amount');
		$this->db->where('service_charges.service_id=invoice_charges.service_id');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		$this->db->where('invoice_charges.amount>0');
		return $this->db->get('service_charges, invoice_charges')->result();
	}
	function printInvoiceTotals($invoice_id)
	{
		$this->db->select('sum(invoice_charges.amount) as total');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		return $this->db->get('invoice_charges')->result();
	}
	function printInvoiceBalDue($invoice_id)
	{
		$this->db->select('sum(invoice_charges.amount)-invoice.amount_paid as bal_due');
		$this->db->where('invoice_charges.invoice_id',$invoice_id);
		$this->db->where('invoice_charges.invoice_id=invoice.invoice_id');
		return $this->db->get('invoice, invoice_charges')->result();
	}
	function printInvoiceFreightDocs($track_cons_id){
		$this->db->select('bill_of_landing_no,bill_of_landing_type,doc_name');
		// $this->db->where('bol_cons_id=cons_id');
		$this->db->where('doc_id=bol_doc_id');
		$this->db->where('bol_cons_id',$track_cons_id);
		$this->db->group_by('bill_of_landing_no');
		return $this->db->get('consignment,cons_bill_of_landing,cs_rbd_docs')->result();
	}
	function invoiceApprovals(){
		$this->db->select('invoice.invoice_id invoice_id, sum(invoice_charges.amount) as total, DATE(invoice.inv_date) as inv_date, clients.client_name as client_name, invoice.amount_paid amount_paid, approvals');
		$this->db->where('invoice.invoice_id=invoice_charges.invoice_id');
		$this->db->where('invoice.cust_id=clients.cust_id');
		$this->db->where('approvals<1');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice, clients, invoice_charges')->result();
	}
	function invoiceApprovalsNoApproved($invoice_id){
		$this->db->select('count(approval_status)');
		$this->db->where('invoice_id',$invoice_id);
		return $this->db->get('invoice_approval')->result();
	}
	function invoiceApproved($invoice_id){
		$this->db->select('invoice_approval.invoice_id app_invoice_id, invoice_approval.approval_status approval_status, invoice_approval.staff_id staff_id, invoice_approval.comments comments');
		$this->db->where('invoice_approval.invoice_id',$invoice_id);
		$this->db->where('invoice_approval.invoice_id=invoice.invoice_id');
		$this->db->order_by('invoice_approval.approved_at','DESC');
		$this->db->limit(1);
		return $this->db->get('invoice_approval, invoice')->result();
	}
	function invoiceApprovalsInsert($invApproveData){
		$this->db->trans_start();
		$this->db->insert('invoice_approval',$invApproveData);
		$this->db->trans_complete();
	}
	function invoicePaymentLoad($searchInv)
	{		
		$this->db->select('invoice.invoice_id invoice_id, invoice.cust_id cust_id, invoice.inv_due_date inv_due_date, invoice.created_at created_at, invoice.inv_currency inv_currency, sum(invoice_charges.amount) amounts, sum(invoice_charges.amount)-invoice.amount_paid amount_dues');
		$this->db->where('invoice.invoice_id',$searchInv);
		$this->db->where('invoice_charges.invoice_id',$searchInv);
		return $this->db->get('invoice, invoice_charges')->result();
	}
	function invoicePaymentInsert($invPaymentDetails)
	{
		$this->db->trans_start();
		$this->db->insert('invoice_payments',$invPaymentDetails);
		$this->db->trans_complete();
	}
	function paidInvDetails($inv_id){
		$this->db->select('invoice.invoice_id invoice_id, invoice.cust_id cust_id, invoice.inv_currency inv_currency');
		$this->db->where('invoice.invoice_id',$inv_id);
		$this->db->where('invoice_payments.invoice_id=invoice_charges.invoice_id');
		$this->db->group_by('invoice.invoice_id');
		return $this->db->get('invoice_charges, invoice, invoice_payments')->result();
	}
	function paidInvDetailsTotal($inv_id){
		$this->db->select('sum(invoice_charges.amount) inv_total');
		$this->db->where('invoice_charges.invoice_id',$inv_id);
		return $this->db->get('invoice_charges')->result();
	}
	function paidInvDetailsPaid($inv_id){
		$this->db->select('sum(invoice_payments.amount_paid) amount_paid');
		$this->db->where('invoice_payments.invoice_id',$inv_id);
		return $this->db->get('invoice_payments')->result();
	}
	function paidInvDetailsBal($inv_id){
		$this->db->select('sum(invoice_charges.amount)-invoice.amount_paid amount_due');
		$this->db->where('invoice_charges.invoice_id',$inv_id);
		$this->db->where('invoice_charges.invoice_id=invoice.invoice_id');
		return $this->db->get('invoice_charges, invoice')->result();
	}
	function paidInvHistory($inv_id){
		$this->db->select('invoice_payments.recorded_at recorded_at, invoice_payments.transaction_id transaction_id, invoice_payments.amount_paid amount_paid, employee.staff_fname staff_fname, employee.staff_sname staff_sname');
		$this->db->where('invoice_payments.invoice_id',$inv_id);
		$this->db->where('employee.staff_wec_emp_no=invoice_payments.recorded_by');
		return $this->db->get('invoice_payments, employee')->result();
	}
	function paidInvDetailsClient($inv_id){
		$this->db->select('invoice.cust_id cid, clients.client_name cname');
		$this->db->where('invoice.invoice_id',$inv_id);
		$this->db->where('invoice.cust_id=clients.cust_id');
		return $this->db->get('invoice, clients')->result();
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
	function getConsignments(){
		$this->db->select('consignment.cons_desc cons_desc, consignment.cons_id cons_id, consignment.cons_import_export cons_import_export, consignment.cons_trans_type cons_trans_type, consignment.cons_date_opened cons_date_opened, clients.client_name client_name, clients.cust_id cust_id');
		$this->db->where('consignment.cust_id=clients.cust_id');
		$this->db->where('consignment.cons_is_invoiced=0 AND consignment.sent_to_accounts=1');
		$this->db->group_by('consignment.cons_id');
		return $this->db->get('consignment,clients')->result();
	}
	function getConsChargesData($cons_id){
		$this->db->select('*');
		$this->db->where('cons_id',$cons_id);
		return $this->db->get('consignment')->result();
	}
	function getConsChargesClient($cons_id){
		$this->db->select('client_name');
		$this->db->where('cons_id',$cons_id);
		$this->db->where('consignment.cust_id=clients.cust_id');
		return $this->db->get('consignment,clients')->result();
	}
	function getConsAccountingInfo($cons_id){
		$this->db->select('cons_acc_info.cons_acc_info_amount cons_acc_info_amount, service_charges.service_name service_name, service_charges.service_max_rate service_max_rate,service_charges.service_min_rate service_min_rate,service_charges.service_id service_id');
		$this->db->where('cons_acc_info.cons_cons_id',$cons_id);
		$this->db->where('cons_service_id=service_id');
		return $this->db->get('cons_acc_info,service_charges')->result();
	}
	function getAllCharges(){
		$this->db->select('*');
		return $this->db->get('service_charges')->result();
	}
// REPORTS SECTION
	function reportsOverviewJan(){
		$this->db->select('sum(amount_paid) as jan');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=1');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewFeb(){
		$this->db->select('sum(amount_paid) as feb');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=2');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewMar(){
		$this->db->select('sum(amount_paid) as mar');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=3');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewApr(){
		$this->db->select('sum(amount_paid) as apr');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=4');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewMay(){
		$this->db->select('sum(amount_paid) as may');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=5');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewJun(){
		$this->db->select('sum(amount_paid) as jun');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=6');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewJul(){
		$this->db->select('sum(amount_paid) as jul');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=7');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewAug(){
		$this->db->select('sum(amount_paid) as aug');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=8');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewSep(){
		$this->db->select('sum(amount_paid) as sep');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=9');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewOct(){
		$this->db->select('sum(amount_paid) as oct');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=10');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewNov(){
		$this->db->select('sum(amount_paid) as nov');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=11');
		return $this->db->get('invoice_payments')->result();
	}
	function reportsOverviewDec(){
		$this->db->select('sum(amount_paid) as dece');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=12');
		return $this->db->get('invoice_payments')->result();
	}
	function lastMonthRevenue(){
		$this->db->select('sum(amount_paid) as lastMonth');
		$this->db->where('year(date_paid)=year(CURDATE())');
		$this->db->where('month(date_paid)=(month(CURDATE())-1)');
		return $this->db->get('invoice_payments')->result();
	}
//END OF REPORTS SECTION
}
?>