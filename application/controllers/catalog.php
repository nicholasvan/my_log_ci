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

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->game = $_REQUEST['game'];
        if(empty($this->game)){
            $this->game = "ares";
        }
    }

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
        if(isset($_GET['offset'])){
            $offset = $_GET['offset'];
        }else{
            $offset = 0;
        }

        $data['query'] = $this->lua_log->getList(30, $offset);
        $data['title'] = "错误报告系统";
        $data['game']  = $this->game;
        $this->load->view('lua_list', $data);
	}

    public function topbug(){
        $this->load->model('lua_log');
        $data['query'] = $this->lua_log->getVersions(20, 'cnt');
        $data['title'] = "最多错误统计详情";
        $data['bugtype'] = "错误top";
        $data['game']  = $this->game;
        $this->load->view('lua_sum', $data);
    }

    public function newest(){
        $this->load->model('lua_log');
        $data['query'] = $this->lua_log->getVersions();
        $data['title'] = "最新版本统计详情";
        $data['bugtype'] = "最新发布";
        $data['game']  = $this->game;
        $this->load->view('lua_sum', $data);
    }

    public function detail(){
        $this->load->model('lua_log');
        $id = $_GET['id'];
        $data['query'] = $this->lua_log->getErrorDetail($id);
        $data['title'] = "错误详情";
        $data['game']  = $this->game;
        $this->load->view('lua_detail', $data);
    }

    public function version(){
        $this->load->model('lua_log');
        $version = $_GET['ver'];
        $data['query'] = $this->lua_log->getVersionSum($version);
        $data['version'] = $version;
        $data['game']  = $this->game;
        $this->load->view('lua_version',$data);
        /*
        echo "<pre>";
        foreach($data['query']->result() as $row){
            print_r($row);
        }
        echo "</pre>";
         */
    }
}
?>

