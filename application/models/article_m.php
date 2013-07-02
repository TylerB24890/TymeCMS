<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @desc    This class provides database interaction for retrieving/setting published articles
 * 
 * @author  Tyler Bailey
 * 
 */

class Article_m extends MY_Model
{
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;

	public function get_new ()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	}
	
	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d'));
	}
	
	public function get_recent($limit = 3){
		
		// Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}

}