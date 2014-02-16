<?php
/**
 * Short description for catalog.php
 *
 * @package catalog
 * @author wangkun <wangkun@playcrab.com>
 * @version 0.1
 * @copyright (C) 2014 wangkun <wangkun@playcrab.com>
 * @license MIT
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->database();
        $this->db->query('select * from lualog order by err_id desc limit 10 offset 0');


        die();
        $this->load->model('lua_log');
        $list = $this->lua_log->getList();
        echo "<pre>";
        var_dump($list);
        echo "</pre>";
		//$this->load->view('welcome_message');
	}
}
?>

