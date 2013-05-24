<?php

/**
 * 
 * @desc    This class handles database migrations to prevent having to
 *          go and edit SQL statements by hand
 * 
 * @author  Tyler Bailey
 * 
 * 
 */


class Migration extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
	}

	public function index ()
	{
		$this->load->library('migration');
		if (! $this->migration->current()) {
			show_error($this->migration->error_string());
		}
		else {
			echo 'Migration worked!';
		}
	
	}

}