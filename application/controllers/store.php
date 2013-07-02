<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 * @desc    This class controlls all image uploading from the admin panel
 * 
 * @author  Tyler Bailey
 * 
 * 
 * Store index() function is located in the controllers/page.php function _store();
 * 
 */


class Store extends Frontend_Controller {

        public function __construct()
        {
            parent::__construct();
			$this->load->library('cart');
			$this->load->model('store_m');
        }


		//add item to shopping cart
		public function addCartItem()
		{
			if(isset($_GET['pid'])) {
			
				$product_id = $_GET['pid'];
				
				//check that product ID is valid number
				if(!is_numeric($product_id)) {
					echo "Invalid product ID";
					die();
				}
				
				$productData = $this->store_m->getSingleProduct($product_id);
				
				$data = array(
					'id' => $product_id,
					'qty' => '1',
					'price' => $productData['0']['price'],
					'name' => $productData['0']['name'],
					'options' => array('sku' => $productData['0']['code'], 'photo' => $productData['0']['photo'])
				);
				
				$this->cart->insert($data);
				redirect('store', 'refresh');
				
			} else {
				echo "No Product Found.";
				die();
			}
		}
		
		
		
		//view items in shopping cart
		public function viewCart()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->data['subview'] = 'store/cart';			
			$this->data['products'] = $this->store_m->getProducts();	
			$this->data['cart'] = $this->cart->contents();
            $this->load->view('_main_layout', $this->data);
			
			if($this->form_validation->run() == TRUE) {			
				$this->_updateCart();
			}
		}
		
			
		//update cart quantities & items
		public function _updateCart()
		{
			$data = array(
				'rowid' => $this->input->post('rowid'),
				'qty' => $this->input->post('qty')
			);
				
			$this->cart->update($data);	
			redirect('store/viewCart', 'refresh');
		}
		
				
		//clear all items in shopping cart
		public function clearCart()
		{
			$this->cart->destroy();
			redirect('store/viewCart');
		}
			
		
		//checkout overview page
		public function checkout()
		{
			$this->data['subview'] = 'store/checkout';			
			$this->data['cart'] = $this->cart->contents();		
			$this->data['subtotal'] = $this->cart->total();	
            $this->load->view('_main_layout', $this->data);	
		}
		
		
		//process checkout request
		public function processCheckout()
		{
			$this->load->library('merchant');
			$this->merchant->load('paypal_express');
			
			$settings = array(
				'username' => '',
				'password' => '',
				'signature' => 'Automated Solutions',
				'test_mode' => true
			);
			
			$this->merchant->initialize($settings);
			
			$params = array(
				'amount' => $this->cart->total(),
				'currency' => 'USD',
				'return_url' => site_url() . 'store/thankyou',
				'cancel_url' => site_url() . 'store/cancel'
			);
		}
		
		
		//full product view
		public function viewProduct()
		{
			if(isset($_GET['pid'])) {
				
				//check product ID is valid number
				if(!is_numeric($_GET['pid'])) {
					echo "Invalid product ID";
					die();
				}
				
				//get requested product information from db
				$this->data['product'] = $this->store_m->getSingleProduct($_GET['pid']);
				$this->data['cart'] = $this->cart->contents();
				$this->data['subview'] = 'store/product';				
				$this->data['subtotal'] = $this->cart->total();	
				
				$this->load->view('_main_layout', $this->data);	
				
			} else {
				echo "No Product Found.";
				die();
			}
		}
		
		
		//thank you page after purchase
		public function thankyou()
		{
			$this->data['subview'] = 'store/thankyou';			
			$this->data['products'] = $this->store_m->getProducts();			
            $this->load->view('_main_layout', $this->data);
		}
		
			
		//page to redirect to if customer cancels current order
		public function cancel()
		{
			$this->data['subview'] = 'store/cancel';			
			$this->data['products'] = $this->store_m->getProducts();			
            $this->load->view('_main_layout', $this->data);		
		}
    
}
