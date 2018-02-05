<?php 
Class Ops extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('ops_m');
		//UPLOADING
		$config['upload_path']='./uploads/';
        $config['allowed_types']='jpg|jpeg|png|pdf|doc|ocx|xls|xlsx|gif';
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
	public function index(){
		$consHandled['consHandled']=$this->ops_m->consHandled();
		$consHandled['imports']=$this->ops_m->consHandledImport();
		$consHandled['exports']=$this->ops_m->consHandledExport();
		$consHandled['locals']=$this->ops_m->consHandledLocal();
		$consHandled['cie']=$this->ops_m->consHandledType();
		$this->load->view('header');
		$this->load->view('ops/left-nav');
		$this->load->view('ops/top-nav');
		$this->load->view('ops/charts',$consHandled);
		// $this->load->view('footer');
		}
	public function myNotes()
		{
			$note_category=$this->input->post('note_category');
			$staff_id=$this->staff_wec_emp_no;
			if(isset($note_category)):
				$myNotes = array('staff_id'=>$this->staff_wec_emp_no,'category' => $note_category, 'notes'=>$this->input->post('notes'),'visible_from'=>$this->input->post('visible_from'),'visible_to'=>$this->input->post('visible_to'));
				$this->ops_m->myNotesInsert($myNotes);
				//visible_from, visible_to
				redirect('ops/myNotes','refresh');
			endif;
			$notes['category']=$this->ops_m->myNotesCategory();
			$notes['myNotes']=$this->ops_m->myNotesGet($staff_id);
			$this->load->view('header');
			$this->load->view('ops/left-nav');
			$this->load->view('ops/top-nav');
			$this->load->view('ops/notes',$notes);
			$this->load->view('footer');
		}
	function manageClient()
		{
			$this->load->model('cs_m');
			$client_id=$this->input->post('client_id');						
			$track_cons_id=$this->input->post('cons_id');
			if(isset($client_id)):
				$cid=$this->input->post('client_id');
				$manageClient['shipments']=$this->ops_m->getClientShipmentsWithUs($cid);
				$manageClient['client']=$this->cs_m->getClient($cid);
				$manageClient['client_name']=$this->input->post('client_name').' #'.$cid;//DISPLAY CLIENT NAME IN VIEW
				$this->load->view('header-table-editable');
				$this->load->view('ops/left-nav');
				$this->load->view('ops/top-nav');
				$this->load->view('ops/clientDetails',$manageClient);
				$this->load->view('footer-editable-table');
			elseif(isset($track_cons_id)&&!empty($track_cons_id)):
				$consData['consData']=$this->cs_m->getConsData($track_cons_id);
				$this->load->view('header-table-editable');
				$this->load->view('ops/left-nav');
				$this->load->view('ops/top-nav');
				$this->load->view('ops/clientConsignmentDetails',$consData);
				$this->load->view('footer-editable-table');
			else:
				$clients['clients']=$this->cs_m->manageClients();
				$this->load->view('header-table-editable');
				$this->load->view('ops/left-nav');
				$this->load->view('ops/top-nav');
				$this->load->view('ops/manage-clients',$clients);
				$this->load->view('footer-editable-table');
			endif;
		}
	function trackConsignment()
		{
			$this->load->model('cs_m');
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
			    $cargo_shed=$this->input->post('cargo_shed');
			        $accInfo = array();
			        for ($i=0; $i < count($charge_id); $i++) 
			        {
			            $tmp = array();
			            $tmp['cons_cons_id'] = $track_cons_id;
			            $tmp['cons_service_id'] = $charge_id[$i];
			            $tmp['cons_acc_info_amount'] = $charges_amnt[$i];
			            $tmp['cai_cargo_shed_id'] = $cargo_shed;
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
			 //ADD DOCUMENTS
			$doc_type=$this->input->post('doc_type');
			if(isset($doc_type)):
				if ( ! $this->upload->do_upload('doc_name'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        $this->load->view('upload', $error);
	                }
                else
	                {
						$docdata = array('upload_data' => $this->upload->data());
			            $docdata['file_name']=$this->upload->data();
			            $file=$docdata['file_name'];
			            $this->db->insert('cs_rbd_docs',array('doc_name' =>$file['file_name'],'doc_description'=>$this->input->post('doc_desc')));
			            $doc_id=$this->db->insert_id();
			            $track_cons_id=$this->input->post('doc_cons_id');
			            $awb_docdata = array(
            				'bill_of_landing_no' => $this->input->post('doc_number'),
             				'bill_of_landing_type' => $this->input->post('doc_type'),
             				'bill_of_landing_charge' => $this->input->post('doc_charge'),
             				'bol_cons_id' => $this->input->post('doc_cons_id'),
             				'bol_added_by' => $this->staff_wec_emp_no,
             				'bol_doc_id' => $doc_id
             				);
			            $this->ops_m->addAWB($awb_docdata);
		        	}
			endif;
			$send_to_cs=$this->input->post('send_to_cs');
			if(isset($send_to_cs)):
				$this->db->where('cons_id',$send_to_cs);
				$this->db->update('consignment',array('sent_to_cs' => 1));
				$track_cons_data['sent_to_cs']=$send_to_cs;
			endif;
			 //OUTSIDE MAIN BODY
			$track_cons_data['awb_details']=$this->ops_m->getAWB($track_cons_id);
			$track_cons_data['cons_notes']=$this->cs_m->getConsNotes($track_cons_id);
			$track_cons_data['track_cons_data']=$this->cs_m->getConsData($track_cons_id);//GET CONS DATA ON CLICK OF VIEW MORE
			$track_cons_data['accInfo']=$this->cs_m->getConsAccInfo($track_cons_id);
			$track_cons_data['cargo_sheds']=$this->ops_m->getCargoSheds();
			$track_cons_data['consData']=$this->ops_m->getConsData($track_cons_id);
			$this->load->view('header');
			$this->load->view('ops/left-nav');
			$this->load->view('ops/top-nav');
			$this->load->view('ops/manageSelectedCons',$track_cons_data);
			$this->load->view('footer');
		}
	function manageConsignment()
		{
			$this->load->model('cs_m');
			$cons_id=$this->input->post('cons_id');
			if(isset($cons_id)):
				$cons_id=$this->input->post('cons_id');
				$cons['cons']=$this->cs_m->loadConsDetails($cons_id);
				$this->session->set_flashdata('cons', $cons);
				redirect('ops/trackConsignment');
			endif;

			$consignments['cons']=$this->ops_m->getConsignments();
			$this->load->view('header');
			$this->load->view('ops/left-nav');
			$this->load->view('ops/top-nav');
			$this->load->view('ops/manageConsignment1',$consignments);
			$this->load->view('footer');
		}
	function reportsOverview()
		{
			$reportsOverview['reportsOverview']=$this->ops_m->reportsOverview();
			$this->load->view('header');
			$this->load->view('ops/left-nav');
			$this->load->view('ops/top-nav');
			$this->load->view('ops/reportsOverview',$reportsOverview);
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
			$reportsConsignments['all']=$this->ops_m->reportsConsignmentsAll($dates);
			$reportsConsignments['imports']=$this->ops_m->reportsConsignmentsImports($dates);
			$reportsConsignments['exports']=$this->ops_m->reportsConsignmentsExports($dates);
			$reportsConsignments['locals']=$this->ops_m->reportsConsignmentsLocal($dates);
			// $reportsConsignments['sheds']=$this->ops_m->reportsConsignmentsSheds($dates);
			// CARGO SHEDS
			$reportsConsignments['dhl']=$this->ops_m->reportsConsignmentsShedsDHL($dates);
			$reportsConsignments['kahl']=$this->ops_m->reportsConsignmentsShedsKAHL($dates);
			$reportsConsignments['achc']=$this->ops_m->reportsConsignmentsShedsACHC($dates);
			$reportsConsignments['siginon']=$this->ops_m->reportsConsignmentsShedsSiginon($dates);
			$reportsConsignments['tcc']=$this->ops_m->reportsConsignmentsShedsTransGlobalCargo($dates);
			$reportsConsignments['swissport']=$this->ops_m->reportsConsignmentsShedsSwissPort($dates);
			// EXPENSES & CHARGES 
			$reportsConsignments['freight']=$this->ops_m->reportsConsignmentsFreightCharges($dates);
			$reportsConsignments['clearance']=$this->ops_m->reportsConsignmentsClearance($dates);
		}
		else{
			$reportsConsignments="";
		}
		$this->load->view('header-table-editable');
		$this->load->view('ops/left-nav');
		$this->load->view('ops/top-nav');
		$this->load->view('ops/reportsConsignments',$reportsConsignments);
		// $this->load->view('footer');
		}
	function reportsExpenses(){
		$consHandled['consHandled']=$this->ops_m->consHandled();
		$consHandled['imports']=$this->ops_m->consHandledImport();
		$consHandled['exports']=$this->ops_m->consHandledExport();
		$consHandled['locals']=$this->ops_m->consHandledLocal();
		$consHandled['cie']=$this->ops_m->consHandledType();
		$this->load->view('header');
		$this->load->view('ops/left-nav');
		$this->load->view('ops/top-nav');
		$this->load->view('ops/charts',$consHandled);
		// $this->load->view('footer');
		}
	function reportsMyReport(){
		$consHandled['consHandled']=$this->ops_m->consHandled();
		$consHandled['imports']=$this->ops_m->consHandledImport();
		$consHandled['exports']=$this->ops_m->consHandledExport();
		$consHandled['locals']=$this->ops_m->consHandledLocal();
		$consHandled['cie']=$this->ops_m->consHandledType();
		$this->load->view('header');
		$this->load->view('ops/left-nav');
		$this->load->view('ops/top-nav');
		$this->load->view('ops/charts',$consHandled);
		// $this->load->view('footer');
	}
}