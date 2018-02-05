<?php 
class Ops_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function homeReport(){
	}
	function weekReport(){
	}
	function myReport(){
	}
	function myNotesCategory(){
		$this->db->select('*');
		return $this->db->get('staff_notes_category')->result();
	}
	function myNotesGet($staff_id){
		$this->db->select('*');
		$this->db->where('staff_id',$staff_id);
		// $this->db->where('')
		return $this->db->get('staff_notes')->result();
	}
	function myNotesInsert($myNotes){
		if(isset($myNotes)):
			extract($myNotes);
			$this->db->trans_start();
			$this->db->insert('staff_notes',array('staff_id'=>$staff_id,'note_category'=>$category,'notes'=>$notes));
			$note_id=$this->db->insert_id();
			$this->db->insert('staff_notes_visibility',array('note_id'=>$note_id, 'visible_from'=>$visible_from, 'visible_to'=>$visible_to));
			$this->db->trans_complete();
		endif;
	}
	function getConsignments(){
		$this->db->select('*');
		$this->db->where('sent_to_accounts=0 AND sent_to_cs=0');
		$this->db->where('consignment.cust_id=clients.cust_id');
		return $this->db->get('consignment,clients')->result();
	}
	function getConsData($track_cons_id){
		$this->db->select('*');
		$this->db->where('cons_id',$track_cons_id);
		return $this->db->get('consignment')->result();
	}
	function getClientShipmentsWithUs($cid){
		$this->db->select('*');
		$this->db->where('cust_id',$cid);
		return $this->db->get('consignment')->result();
	}
	function addAWB($awb_docdata){
		$this->db->insert('cons_bill_of_landing',$awb_docdata);
	}
	function getAWB($track_cons_id){
		$this->db->select('*');
		$this->db->where('bol_cons_id',$track_cons_id);
		$this->db->where('bol_doc_id=doc_id');
		return $this->db->get('cons_bill_of_landing,cs_rbd_docs')->result();
	}
	function consHandled(){
		$this->db->select('count(cons_id) consignments, cons_import_export cie');
		$this->db->where('cons_id=bol_cons_id');
		$this->db->where('DATE(bol_added_on)=DATE(CURDATE())');
		return $this->db->get('consignment,cons_bill_of_landing')->result();
	}
	function consHandledImport(){
		$this->db->select('count(consignment.cons_id) imports');
		$this->db->where('consignment.cons_id=cons_bill_of_landing.bol_cons_id');
		$this->db->where('DATE(cons_bill_of_landing.bol_added_on)=DATE(CURDATE())');
		$this->db->where('consignment.cons_import_export="Import"');
		return $this->db->get('consignment,cons_bill_of_landing')->result();
	}
	function consHandledExport(){
		$this->db->select('count(consignment.cons_id) exports');
		$this->db->where('consignment.cons_id=cons_bill_of_landing.bol_cons_id');
		$this->db->where('DATE(cons_bill_of_landing.bol_added_on)=DATE(CURDATE())');
		$this->db->where('consignment.cons_import_export="Export"');
		return $this->db->get('consignment,cons_bill_of_landing')->result();
	}
	function consHandledLocal(){
		$this->db->select('count(consignment.cons_id) locals');
		$this->db->where('consignment.cons_id=cons_bill_of_landing.bol_cons_id');
		$this->db->where('DATE(cons_bill_of_landing.bol_added_on)=DATE(CURDATE())');
		$this->db->where('consignment.cons_import_export="Local"');
		return $this->db->get('consignment,cons_bill_of_landing')->result();
	}
	function consHandledType(){
		$this->db->select('cons_import_export cie');
		$this->db->where('consignment.cons_id=cons_bill_of_landing.bol_cons_id');
		$this->db->where('DATE(cons_bill_of_landing.bol_added_on)=DATE(CURDATE())');
		$this->db->distinct('cons_import_export');
		return $this->db->get('consignment,cons_bill_of_landing')->result();
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
		$this->db->where('sent_to_accounts',1);
		$this->db->where('cons_date_opened>=',$date1);
		$this->db->where('cons_date_opened<=',$date2);
		$this->db->where('cons_import_export="Import" OR cons_import_export="Export"');
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
		$this->db->group_by('cons_cons_id');
		return $this->db->get('consignment, cons_acc_info')->result();
	}
}
?>