<?php

/**
 * 
 * @desc    This class provides a alternate method for handling PHP Sessions in CI
 * 
 * @author  Tyler Bailey
 * 
 */

class MY_Session extends CI_Session
{

	function sess_update ()
	{
		// Listen to HTTP_X_REQUESTED_WITH
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
			// This is NOT an ajax call
			parent::sess_update();
		}
	}
}