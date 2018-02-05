<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // $this->load->helper(array('form', 'url'));
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|ppt|pptx|doc|docx';
                $this->load->library('upload', $config); 
                $this->load->model('cs_m');
        }

        public function index()
        {
                $this->load->view('upload', array('error' => ' ' ));
        }

        public function do_upload()
        {
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $data['file_name']=$this->upload->data();
                        $file=$data['file_name'];
                        $this->db->insert('cs_rbd_docs',array('doc_name' =>$file['file_name'],'doc_description'=>$this->input->post('doc_desc')));
                        $msg=$this->db->insert_id();
                        $data['msg']=$this->cs_m->upload($msg);

                        $this->load->view('upload_success', $data);
                }
        }
}
?>