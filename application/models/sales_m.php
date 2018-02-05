<?php

class Sales_m extends CI_Model
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
		$this->db->select('*');
		$this->db->where('cust_id',$cid);
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
	function addCampaign($addCampaign){
		$this->db->insert('marketing_campaigns',$addCampaign);
		return $this->db->insert_id();
	}
	function addCampaignGoals($campaignGoals){
		$this->db->insert_batch('marketing_campaign_goals',$campaignGoals);
	}
	function getAllCurrentCampaigns(){
		$this->db->select('campaign_id, mcg_name, mcg_achieved,campaign_name, campaign_beneficiary, ch_name, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname');
		$this->db->where('DATE(campaign_end_date)>=DATE(CURDATE())');
		$this->db->where('DATE(campaign_start_date)<=DATE(CURDATE())');
		$this->db->where('campaign_id=marketing_campaign_id');
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->where('campaign_started=1');
		$this->db->where('campaign_stopped=0');
		$this->db->group_by('campaign_id');
		$this->db->order_by('campaign_id','DESC');
		return $this->db->get('marketing_campaigns,marketing_campaign_goals,marketing_channels,employee')->result();
	}
	function getAllUpcomingCampaigns(){
		$this->db->select('campaign_id, mcg_name, mcg_achieved,campaign_name, campaign_beneficiary, ch_name, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname');
		$this->db->where('DATE(campaign_start_date)>DATE(CURDATE())');
		$this->db->where('campaign_id=marketing_campaign_id');
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->where('campaign_started=0');
		$this->db->where('campaign_stopped=0');
		$this->db->group_by('campaign_id');
		$this->db->order_by('campaign_id','DESC');
		return $this->db->get('marketing_campaigns,marketing_campaign_goals,marketing_channels,employee')->result();
	}
	function getAllCompleteCampaigns(){
		$this->db->select('campaign_id, mcg_name, mcg_achieved,campaign_name, campaign_beneficiary, ch_name, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname');
		$this->db->where('DATE(campaign_start_date)>=DATE(CURDATE())');
		$this->db->where('campaign_id=marketing_campaign_id');
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->where('campaign_started=1');
		$this->db->where('campaign_stopped=1');
		$this->db->group_by('campaign_id');
		$this->db->order_by('campaign_id','DESC');
		return $this->db->get('marketing_campaigns,marketing_campaign_goals,marketing_channels,employee')->result();
	}
	function getAllInactiveCampaigns(){
		$this->db->select('campaign_id, mcg_name, mcg_achieved,campaign_name, campaign_beneficiary, ch_name, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname');
		$this->db->where('DATE(campaign_end_date)>=DATE(CURDATE())');
		$this->db->where('DATE(campaign_start_date)<=DATE(CURDATE())');
		$this->db->where('campaign_id=marketing_campaign_id');
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->where('campaign_started=0');
		$this->db->where('campaign_stopped=0');
		$this->db->group_by('campaign_id');
		$this->db->order_by('campaign_id','DESC');
		return $this->db->get('marketing_campaigns,marketing_campaign_goals,marketing_channels,employee')->result();
	}
	function getAllCampaignsExceptUpcoming(){
		$this->db->select('campaign_id, campaign_name, campaign_beneficiary, ch_name, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname');
		$this->db->where('DATE(campaign_start_date)<=DATE(CURDATE())');
		// $this->db->where('campaign_id=marketing_campaign_id');
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->where('campaign_started=1');
		$this->db->where('campaign_stopped=0');
		$this->db->group_by('campaign_id');
		$this->db->order_by('campaign_id','DESC');
		return $this->db->get('marketing_campaigns,marketing_channels,employee')->result();
	}
	function getCampaignGoals($campaign_id){
		$this->db->select('*');
		$this->db->where('marketing_campaign_id',$campaign_id);
		return $this->db->get('marketing_campaign_goals')->result();
	}
	function getCampaignGoalsAchieved($campaign_id){
		$this->db->select('*');
		$this->db->where('marketing_campaign_id',$campaign_id);
		$this->db->where('mcg_achieved="YES"');
		return $this->db->get('marketing_campaign_goals')->result();
	}
	function getCampaignGoalsNotAchieved($campaign_id){
		$this->db->select('*');
		$this->db->where('marketing_campaign_id',$campaign_id);
		$this->db->where('mcg_achieved="NO"');
		return $this->db->get('marketing_campaign_goals')->result();
	}
	function getSelectedCampaign($campaign_id){
		$this->db->select('campaign_name, campaign_beneficiary, campaign_budget, campaign_start_date, campaign_end_date, campaign_notes, campaign_added_on, staff_fname, staff_sname, ch_name');
		$this->db->where('campaign_id',$campaign_id);
		$this->db->where('mc_id=ch_id');
		$this->db->where('campaign_added_by=staff_wec_emp_no');
		$this->db->group_by('campaign_id');
		return $this->db->get('marketing_campaigns,marketing_channels,employee')->result();
	}
	function getDailyNotes($campaign_id){
		$this->db->select('mcn_added_on, mcn_notes, staff_fname, staff_sname');
		$this->db->where('mcn_campaign_id',$campaign_id);
		$this->db->where('mcn_type','Daily notes');
		$this->db->where('mcn_added_by=staff_wec_emp_no');
		return $this->db->get('marketing_campaign_notes,employee')->result();
	}
	function getSummaryNotes($campaign_id){
		$this->db->select('mcn_added_on, mcn_notes, staff_fname, staff_sname');
		$this->db->where('mcn_campaign_id',$campaign_id);
		$this->db->where('mcn_type','Campaign summary');
		$this->db->where('mcn_added_by=staff_wec_emp_no');
		return $this->db->get('marketing_campaign_notes,employee')->result();
	}
	function getClientSessionNotes($cid){
		$this->db->select('session_date, session_type, session_person, session_topic, session_notes, csn_added_at, staff_fname, staff_sname');
		$this->db->where('csn_added_by=staff_wec_emp_no');
		$this->db->where('csn_client_id',$cid);
		$this->db->group_by('csn_id');
		$this->db->order_by('csn_id','DESC');
		return $this->db->get('client_session_notes,employee,clients')->result();
	}
}
?>