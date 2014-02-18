<?php
/**
 * Short description for lualog.php
 *
 * @package lualog
 * @author wangkun <wangkun@playcrab.com>
 * @version 0.1
 * @copyright (C) 2014 wangkun <wangkun@playcrab.com>
 * @license MIT
 */

class Lua_log extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
         

    public function getList($dis_number = 30, $offset = 0){
        $this->load->database();
        $q['version']  = $_REQUEST['version'];
        $q['platform'] = $_REQUEST['platform'];
        $q['uid']  = $_REQUEST['uid'];
        $q['pid']  = $_REQUEST['pid'];
        $q['sec']  = $_REQUEST['section'];
        error_log(print_r($q,true));
        foreach($q as $key=>$value){
            if(strlen($value) == 0){
                unset($q[$key]);
            }
        }
        error_log(print_r($q,true));
        $query = $this->db->get_where('lualog',$q, $dis_number,$offset);
        //$query = $this->db->query("select * from lualog order by err_id desc limit $dis_number offset $offset");
        return $query;
    }

    /**
     * 获取错误列表
     */
    public function getErrorList(){
    }

    /**
     * 获取错误详情
     */
    public function getErrorDetail($id){
    }

    /**
     * 获取统计信息
     */
    public function getStatistic(){
    }

    /**
     * 插入一条数据
     */
    public function insert(){
    }
}
?>

