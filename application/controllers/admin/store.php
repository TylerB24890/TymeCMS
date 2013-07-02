<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 * @desc    This class provides functions for controlling the online store
 * 
 * @author  Tyler Bailey
 * 
 */


class Store extends Admin_Controller {

        public function __construct()
        {
            parent::__construct();
			
			//load the required files
			$this->load->library('cart');
			$this->load->library('form_validation');
			$this->load->model('store_m');
        }
		
		
		//initial view
        public function index()
        {
			$ga_profile = '73714230';
		
			$params = array(
				'email' => 'automatedgroup@gmail.com',
				'password' => 'Automated1'
			);
			
			$this->load->library('gapi', $params);
			
			$dimensions = array(
				'date',
				'pagePath'
			);
			$metrics = array(
				'pageviews',
				'avgTimeOnPage'
			);
			
			$filter = "ga:pagePath=~store/.*";
			
			$start_date = date('Y-m-d', strtotime('-15 days'));
			
			$this->gapi->requestReportData($ga_profile, $dimensions, $metrics, $sort='date', $filter, $start_date, $end_date = NULL, $start_index = 1, $max_results = 500);
			
			$this->data['analytics'] = $this->gapi->getResults();
		
			$this->data['subview'] = 'admin/store/home';					
            $this->load->view('admin/_layout_main', $this->data);	
        }
		
		
		
		//add new products
		public function addProduct()
		{
			if($this->form_validation->run('add_product') == TRUE) {
				
				//check for uploaded file & process upload
				if(isset($_FILES['userfile'])) {
					$photoData = $this->uploadFile();
				}	
			
				if($this->store_m->insertProduct($photoData) == TRUE) {			
					$this->session->set_flashdata('msg', '<div class="success">Product Added Successfully!</div>');
					redirect('admin/store/addProduct');				
				} else {			
					$this->session->set_flashdata('msg', '<div class="error">Add Product Failed.</div>');
					redirect('admin/store/addProduct');				
				}		
			} else {		
				$this->data['subview'] = 'admin/store/add';					
				$this->load->view('admin/_layout_main', $this->data);			
			}						
		}
		
		
		
		//page displaying all current products with edit/delete buttons
		public function editProduct()
		{
			$this->load->helper('text');
			$this->data['subview'] = 'admin/store/edit';			
			$this->data['products'] = $this->store_m->getProducts();			
            $this->load->view('admin/_layout_main', $this->data);
		}
		
		
		//page displaying single product w/ form for editing
		public function updateProduct()
		{
			$this->load->library('form_validation');
			
			if(isset($_GET['pid'])) {
				
				if(!is_numeric($_GET['pid'])) {
					$this->session->set_flashdata('msg', '<div class="error">Invalid Product ID.</div>');
					redirect('admin/store/editProduct');
				}
				
				$this->data['subview'] = 'admin/store/edit_product';			
				$this->data['product'] = $this->store_m->getSingleProduct($_GET['pid']);			
				$this->load->view('admin/_layout_main', $this->data);
				
			} else {
				$this->session->set_flashdata('msg', '<div class="error">Could not edit product. No product ID found.</div>');
				redirect('admin/store/editProduct');
			}		

			if($this->form_validation->run('update_product') == TRUE) {
					
				if($this->store_m->updateProduct($_GET['pid']) == TRUE) {
					$this->session->set_flashdata('msg', '<div class="success">Product Updated Successfully!</div>');
					redirect('admin/store/editProduct');		
				} else {
					$this->session->set_flashdata('msg', '<div class="error">Update Product Failed.</div>');
					redirect('admin/store/editProduct');		
				}				
			}
		}

		
		//delete a product & send messages
		public function deleteProduct()
		{
			if(isset($_GET['pid'])) {
				
				//check that the product ID is a numeric value
				if(!is_numeric($_GET['pid'])) {
					echo "Invalid Product ID";
					die();
				}
				
				if($this->store_m->deleteProduct($_GET['pid'])) {
					$this->session->set_flashdata('msg', '<div class="success">Product Successfully Deleted!</div>');
					redirect('admin/store/editProduct');
				} else {
					$this->session->set_flashdata('msg', '<div class="error">Failed to delete product.</div>');
					redirect('admin/store/editProduct');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="error">No Product ID Found...</div>');
				redirect('admin/store/editProduct');
			}
		}
		
		
		
		//view all current orders
		public function viewOrders()
		{
			$this->data['subview'] = 'admin/store/orders';			
			$this->data['orders'] = $this->store_m->getOrders();			
            $this->load->view('admin/_layout_main', $this->data);
		}
		
		
		//process image upload
		public function uploadFile()
        {
            $upload_path_url = site_url() . 'uploads/';

            $config['upload_path'] = FCPATH . 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
            $config['max_size'] = '30000000';
			$config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
			
			$productData = array();

            if ( ! $this->upload->do_upload()) {
				
                $this->session->set_flashdata('msg', '<div class="error">Error uploading product photo</div>');
				redirect('admin/store/addProduct');

            } else {
				
				//getting photo data
                $photoData = $this->upload->data();       
				
				return $photoData;
				
            }
        }
    
}
