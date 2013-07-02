<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
			$this->data['logo_dir'] = config_item('logo_dir');
		}
}