<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Welcome extends CI_Controller 
{
 
//     public function index()
//     {
//         $data = [];
//         //load the view and saved it into $html variable
//         // $html=$this->load->view('welcome_message', $data, true);

//         $html=$this->load->view('welcome_message');
//         //this the the PDF filename that user will get to download
//         $pdfFilePath = "output_pdf_name.pdf";
 
//         //load mPDF library
//         $this->load->library('m_pdf');
 
//        //generate the PDF from the given html
//         $this->m_pdf->pdf->WriteHTML($html);
 
//         //download it.
//         $this->m_pdf->pdf->Output($pdfFilePath, "D");        
//     }
// }
 
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
// See more at: https://arjunphp.com/generating-a-pdf-in-codeigniter-using-mpdf/#sthash.5hvvYs9I.dpuf


//NEW ONE

// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
// $filename='100';
function index(){
$pdfFilePath = FCPATH."/vendor/abcd.pdf";

$data['page_title'] = 'Hello world'; // pass data to the view

if (file_exists($pdfFilePath) == FALSE)

{

	ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)

	// $html = $this->load->view('header',true);
	$html = $this->load->view('accounts/manageClientRates',$data,true);
	$html = $this->load->view('accounts/addAgent');
	// $html = $this->load->view('footer',true); // render the view into HTML


	$this->load->library('pdf');

	$pdf = $this->pdf->load();

	$pdf->SetFooter('|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)

	$pdf->WriteHTML($html); // write the HTML into the PDF

	$pdf->Output($pdfFilePath, 'F'); // save to file because we can

}


redirect("/vendor/abcd.pdf");
}
}