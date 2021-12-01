<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
     * 
	 */
    public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	

	
	//load Model
	$this->load->model('Invoice_Model','invoicemodel');
	}
	public function addinvoice()
	{
        $this->load->library('session');
        $this->load->library('form_validation');
        $data['recods'] =  $this->invoicemodel->fetchrecords();
        
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


            $this->form_validation->set_rules('uname', 'Name', 'required|min_length[2]|max_length[15]');

            $this->form_validation->set_rules('quantity', 'Quantity', 'required');


            $this->form_validation->set_rules('unit_price', 'Unit price', 'required');


            $this->form_validation->set_rules('tax', 'Tax', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('invoice_add', $data);
        } else {
        $this->load->view('invoice_add', $data);
            
            // $this->load->view('invoice_add', $data);
            echo "here";
        $data = array(
        'name' => $this->input->post('uname'),
        'Quantity' => $this->input->post('quantity'),
        'Unit_Price' => $this->input->post('unit_price'),
        'Tax' => $this->input->post('tax')
        );
        // $this->form_validation->clear_field_data();
        $this->invoicemodel->saverecords($data);
        // $data['message'] = 'Data Inserted Successfully';
        $this->session->set_flashdata('message','Data Inserted Successfully');
        
        redirect(base_url('invoice'));

        }

	}
    public function index(){
        $this->load->library('session');
        $this->load->library('form_validation');

        $data['recods'] =  $this->invoicemodel->fetchrecords();
        $this->load->view('invoice_add', $data);

    }
    public function deletedata($id)
    {
        $this->load->library('session');

    // $id=$this->input->get('id');
    // $item = $this->itemCRUD->find_item($id);
    $this->session->set_flashdata('delete','Data Removed Successfully');

    $response=$this->invoicemodel->deleterecords($id);
    redirect(base_url('invoice'));
    }
    public function printinvoice()
    {
        $this->load->library('form_validation');
        if($this->input->post('discount'))
        {
            $discount=$this->input->post('discount');
            $disctype=$this->input->post('disctype');
            $totdisco=$this->input->post('totdiss');
        $data['recods'] =  $this->invoicemodel->fetchrecords();
        if($disctype=="$")
        $data['discount']=$disctype." ".$discount;
        else
        $data['discount']=$discount." ".$disctype;

        $data['totalprice']=$totdisco;
        $this->load->view('invoice_print',$data);
        }
        else
        redirect(base_url('invoice'));

    }
}
