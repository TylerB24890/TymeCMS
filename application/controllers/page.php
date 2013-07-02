<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @desc    This class handles all page construction
 * 
 * @author  Tyler Bailey
 * 
 */

class Page extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
		$this->load->model('store_m');
    }

	//loads on every page
    public function index() {
    	// Fetch the page template
    	$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
    	count($this->data['page']) || show_404(current_url());
    	
    	add_meta_title($this->data['page']->title);
    	
    	// Fetch the page data
    	$method = '_' . $this->data['page']->template;
    	if (method_exists($this, $method)) {
    		$this->$method();
    	}
    	else {
    		log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    		show_error('Could not load template ' . $method);
    	}
		
    	// Load the view
    	$this->data['subview'] = $this->data['page']->template;
    	$this->load->view('_main_layout', $this->data);
    }
    
    //standard page template
    private function _page(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
    }
    
    //homepage template
    private function _homepage(){
    	
    	$this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articles'] = $this->article_m->get();
    }
    

    //archive page template
    private function _news_archive(){
    	
    	$this->data['recent_news'] = $this->article_m->get_recent();
    	
		// Count all articles
		$this->article_m->set_published();
		$count = $this->db->count_all_results('articles');
		
		// Set up pagination
		$perpage = 4;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		} else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
		// Fetch articles
		$this->article_m->set_published();
		$this->db->limit($perpage, $offset);
		$this->data['articles'] = $this->article_m->get();
    }
    
	
	//store front template
	private function _store_front() {
		
		$this->load->library('cart');
		$this->load->helper('text');
		
		//count all products
		$count = $this->db->count_all_results('products');
		
		$perpage = 5;
		if($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		} else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
		$this->db->limit($perpage, $offset);
		$this->data['products'] = $this->store_m->getProducts();
		$this->data['cart'] = $this->cart->contents();
		$this->data['subtotal'] = $this->cart->total();
		
	}
	
	
	
    //contact page template
    private function _contact(){
        
        $this->data['recent_news'] = $this->article_m->get_recent();
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //set custom form input error messages
        $this->form_validation->set_message('required', '%s is required');
        $this->form_validation->set_message('valid_email', 'You have entered an invalid email address');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if ($this->form_validation->run('contact_rules') == TRUE) {
            
            //send email
            
        }
    }
}