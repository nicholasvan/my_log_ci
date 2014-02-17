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

        $this->load->model('lua_log');
        $data['query'] = $this->lua_log->getList();
        $this->load->view('lua_list', $data);
        /*
        die();
        $dis_number = 30;
        $offset = 0;
        $this->load->database();
        $query = $this->db->query("select * from lualog order by err_id desc limit $dis_number offset $offset");
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>时间</th><th>平台</th><th>版本号</th><th>错误信息</th><th>UID</th><th>PID</th><th>分区</th></tr>";
        echo "<thead>";
        echo "<tbody>";
        foreach ($query->result() as $row){
            $error_id = $row->err_id;
            $time     = $row->time;
            $platform = $row->platform;
            $version  = $row->version;
            $function = $row->function;
            $uid      = $row->uid ? $row->uid : "nil";
            $pid      = $row->pid ? $row->pid : "nil";
            $sec      = $row->section ? $row->section : "nil";

            echo "<tr><td>$error_id</td><td>$time</td><td>$platform</td><td>$version</td>
                <td>$function</td><td>$uid</td><td>$pid</td><td>$sec</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        
        die();
        $this->load->model('lua_log');
        $list = $this->lua_log->getList();
        echo "<pre>";
        var_dump($list);
        echo "</pre>";
		//$this->load->view('welcome_message');
         */
	}
}
?>

