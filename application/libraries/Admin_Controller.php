<?php

/**
 * 
 * @desc    This class provides a base controller for the administration panel
 * 
 * @author  Tyler Bailey
 * 
 */

class Admin_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'TymeCMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_m');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		// Login check
		$exception_uris = array(
			'admin/user/login', 
			'admin/user/logout'
		);
		
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}
	
	}
}