<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
            array(
                'field' => 'name',
                'label' => 'Full Name',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|xss_clean'
            ), 
            array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'trim|required|xss_clean'
             ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'trim|required|xss_clean'
            )
        ),
        
        //admin login rules
        'user_rules' => array(
            array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|xss_clean'
            ), 
            array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|required'
            )
        ),
        
        //create new admin rules
        'admin_rules' => array(
            array(
                'field' => 'name', 
                'label' => 'Name', 
                'rules' => 'trim|required|xss_clean'
            ), 
            array(
                'field' => 'email', 
                'label' => 'Email', 
                'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
            ), 
            array(
                'field' => 'password', 
                'label' => 'Password', 
                'rules' => 'trim|matches[password_confirm]|required'
            ),
            array(
                'field' => 'password_confirm', 
                'label' => 'Confirm password', 
                'rules' => 'trim|matches[password]|required'
            ),
        ),
        
        //edit/create page rules
        'page_rules' => array(
            array(
                'field' => 'parent_id', 
                'label' => 'Parent', 
                'rules' => 'trim|intval'
            ), 
            array(
                'field' => 'template', 
                'label' => 'Template', 
                'rules' => 'trim|required|xss_clean'
            ), 
            array(
                'field' => 'title', 
                'label' => 'Title', 
                'rules' => 'trim|required|max_length[100]|xss_clean'
            ), 
            array(
                'field' => 'slug', 
                'label' => 'Slug', 
                'rules' => 'trim|max_length[100]|url_title|callback__unique_slug|xss_clean'
            ), 
            array(
                'field' => 'body', 
                'label' => 'Body', 
                'rules' => 'trim|required'
            ),
        ),
        
        //edit/create blog post rules
        'article_rules' => array(
            array(
                'field' => 'pubdate', 
                'label' => 'Publication date', 
                'rules' => 'trim|required|exact_length[10]|xss_clean'
            ), 
            array(
                'field' => 'title', 
                'label' => 'Title', 
                'rules' => 'trim|required|max_length[100]|xss_clean'
            ), 
            array(
                'field' => 'slug', 
                'label' => 'Slug', 
                'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
            ), 
            array(
                'field' => 'body', 
                'label' => 'Body', 
                'rules' => 'trim|required'
            )
        ),
		
		//add product
		'add_product' => array(
			array(
				'field' => 'product_name',
				'label' => 'Product Name',
				'rules' => 'trim|required|xss_clean|max_length[255]'
			),
			array(
				'field' => 'product_price',
				'label' => 'Product Price',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'product_id',
				'label' => 'Product ID',
				'rules' => 'trim|xss_clean|required'
			),
			array(
				'field' => 'quantity',
				'label' => 'Available Quantity',
				'rules' => 'trim|is_natural|required'
			),
			array(
				'field' => 'product_description',
				'label' => 'Product Description',
				'rules' => 'trim|xss_clean|required'
			)
		),
		
		//edit cart quantities
		'store/viewCart' => array(
			array(
				'field' => 'qty',
				'label' => 'QTY',
				'rules' => 'trim|required|is_natural|xss_clean'
			)
		),
		
		//edit product
		'update_product' => array(
			array(
				'field' => 'product_name',
				'label' => 'Product Name',
				'rules' => 'trim|required|xss_clean|max_length[255]'
			),
			array(
				'field' => 'product_price',
				'label' => 'Product Price',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'product_id',
				'label' => 'Product ID',
				'rules' => 'trim|xss_clean|required'
			),
			array(
				'field' => 'quantity',
				'label' => 'Available Quantity',
				'rules' => 'trim|is_natural|required'
			),
			array(
				'field' => 'product_description',
				'label' => 'Product Description',
				'rules' => 'trim|xss_clean|required'
			)
		),
    
);        

