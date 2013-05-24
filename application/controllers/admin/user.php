<?php

/**
 * 
 * @desc    This class handles all administrator user interaction (edit, login, etc..)
 * 
 * @author  Tyler Bailey
 * 
 */


class User extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
	}
    
	public function index ()
	{
		// Fetch all users
		$this->data['users'] = $this->user_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
    
    //edit admin user
	public function edit ($id = NULL)
	{
		// Fetch a user or set a new one
		if ($id) {
            
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
            
		} else {            
			$this->data['user'] = $this->user_m->get_new();
		}
		
		// Process the form
		if ($this->form_validation->run('admin_rules') == TRUE) {
			$data = $this->user_m->array_from_post(array('name', 'email', 'password'));
			$data['password'] = $this->user_m->hash($data['password']);
			$this->user_m->save($data, $id);
			redirect('admin/user');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
    
    //Delete an Admin User
	public function delete ($id)
	{
		$this->user_m->delete($id);
		redirect('admin/user');
	}
    
    //Login Admin User
	public function login ()
	{
		// Redirect a user if their already logged in
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		// Process form
		if ($this->form_validation->run('user_rules') == TRUE) {
			// We can login and redirect
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect('admin/user/login');
			}
		}
		
		// Load view
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}
    
    //Logout Admin User
	public function logout ()
	{
		$this->user_m->logout();
		redirect('admin/user/login');
	}
    
    //Check For Unique Email Address
	public function _unique_email ($str)
	{
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}