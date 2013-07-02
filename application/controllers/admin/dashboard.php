<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @desc    This class provides functions for displaying the Admin Dashboard
 * 
 * @author  Tyler Bailey
 * 
 */

class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
		
		$ga_profile = '73714230';
		
		$params = array(
			'email' => 'automatedgroup@gmail.com',
			'password' => 'Automated1'
		);
		$this->load->library('gapi', $params);
		
		$dimensions = array(
			'date'
		);
		$metrics = array(
			'pageviews',
			'visits',
			'percentNewVisits',
			'avgTimeOnSite',
			'newVisits'
		);
		

		$start_date = date('Y-m-d', strtotime('-15 days'));
		$this->gapi->requestReportData($ga_profile, $dimensions, $metrics, $sort='date', $filter = NULL, $start_date, $end_date = NULL, $start_index = 1, $max_results = 15);
		
		$this->data['analytics'] = $this->gapi->getResults();
    	$this->data['subview'] = 'admin/dashboard/index';
    	$this->load->view('admin/_layout_main', $this->data);
    }
    
    public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }
}