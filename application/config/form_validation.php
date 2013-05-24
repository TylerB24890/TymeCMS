<?php

/**
 * 
 * @desc    This page sets site-wide custom input validation rules
 * 
 * @author  Tyler Bailey
 * 
 */

//set form input rules
$config = array(
    
        //contact form rules
        'contact_rules' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Full Name',
                'rules' => 'trim|required|xss_clean'
            ),
            'email' => array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|xss_clean'
            ), 
            'subject' => array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'trim|required|xss_clean'
             ),
            'message' => array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'required|xss_clean'
            )
        ),
        
        //admin login rules
        'user_rules' => array(
            'email' => array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|xss_clean'
            ), 
            'password' => array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|required'
            )
        ),
        
        //create new admin rules
        'admin_rules' => array(
            'name' => array(
                'field' => 'name', 
                'label' => 'Name', 
                'rules' => 'trim|required|xss_clean'
            ), 
            'email' => array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
            ), 
            'password' => array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|matches[password_confirm]|required'
            ),
            'password_confirm' => array(
                'field' => 'password_confirm', 
                'label' => 'Confirm password', 
                'rules' => 'trim|matches[password]|required'
            ),
        ),
        
        //edit/create page rules
        'page_rules' => array(
            'parent_id' => array(
                'field' => 'parent_id', 
                'label' => 'Parent', 
                'rules' => 'trim|intval'
            ), 
            'template' => array(
                'field' => 'template', 
                'label' => 'Template', 
                'rules' => 'trim|required|xss_clean'
            ), 
            'title' => array(
                'field' => 'title', 
                'label' => 'Title', 
                'rules' => 'trim|required|max_length[100]|xss_clean'
            ), 
            'slug' => array(
                'field' => 'slug', 
                'label' => 'Slug', 
                'rules' => 'trim|max_length[100]|url_title|callback__unique_slug|xss_clean'
            ), 
            'body' => array(
                'field' => 'body', 
                'label' => 'Body', 
                'rules' => 'trim|required'
            ),
            'slider' => array(
                'field' => 'slider',
                'label' => 'Slider Images',
                'rules' => 'callback_handle_upload'
            ),
        ),
        
        //edit/create blog post rules
        'article_rules' => array(
            'pubdate' => array(
                'field' => 'pubdate', 
                'label' => 'Publication date', 
                'rules' => 'trim|required|exact_length[10]|xss_clean'
            ), 
            'title' => array(
                'field' => 'title', 
                'label' => 'Title', 
                'rules' => 'trim|required|max_length[100]|xss_clean'
            ), 
            'slug' => array(
                'field' => 'slug', 
                'label' => 'Slug', 
                'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
            ), 
            'body' => array(
                'field' => 'body', 
                'label' => 'Body', 
                'rules' => 'trim|required'
            )
        ),
    
);        

