<?php

/**
 * 
 * @desc    This class constructs the errors and site configuration
 * @author  Tyler Bailey
 * 
 */

class MY_Controller extends CI_Controller {
	
	public $data = array();
		function __construct() {
			parent::__construct();
			$this->data['errors'] = array();
			$this->data['site_name'] = config_item('site_name');
		}
}