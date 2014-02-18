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
        $game = $_REQUEST['game'];
        if(empty($game) || $game == 'ares'){
            $this->table = 'ares_lualog';
        }else{
            $this->table = "{$game}_lualog";
        }
    }
         

    public function getList($dis_number = 30, $offset = 0){
        $table = $this->table;

        $q['version']  = $_REQUEST['version'];
        $q['platform'] = $_REQUEST['platform'];
        $q['uid']  = $_REQUEST['uid'];
        $q['pid']  = $_REQUEST['pid'];
        $q['sec']  = $_REQUEST['section'];

        //error_log(print_r($q,true));
        foreach($q as $key=>$value){
            if(strlen($value) == 0){
                unset($q[$key]);
            }
        }
        //error_log(print_r($q,true));
        $this->db->order_by('time', 'desc')->limit($dis_number)->offset($offset);
        $this->db->where($q);
        $query = $this->db->get($table);
        //$query = $this->db->get_where($table, $q, $dis_number,$offset);
        //$query = $this->db->query("select * from lualog order by err_id desc limit $dis_number offset $offset");
        return $query;
    }

    /**
     * 获取所有版本号列表
     */
    public function getVersions($limit = 20, $key = 'version'){
        $table = $this->table;
        /*
        $q['version']  = $_REQUEST['version'];
        $q['platform'] = $_REQUEST['platform'];
        $q['uid']  = $_REQUEST['uid'];
        $q['pid']  = $_REQUEST['pid'];
        $q['sec']  = $_REQUEST['section'];

        //error_log(print_r($q,true));
        foreach($q as $key=>$value){
            if(strlen($value) == 0){
                unset($q[$key]);
            }
        }
         */

        //error_log(print_r($q,true));
        $this->db->select('version, count(version) as cnt')->group_by('version');
        $this->db->order_by($key, 'desc');
        $this->db->limit($limit);
        $query = $this->db->get($table);
        return $query;
    }

    /**
     * 获取错误详情
     */
    public function getErrorDetail($id){
        $table = $this->table;
        $this->db->where('err_id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    /**
     * 获取统计信息
     */
    public function getVersionSum($version){
        $table = $this->table;
        $this->db->select('function, count(function) as number')->where('version',$version)->group_by('function');
        $this->db->having('number > ',0)->order_by('number','desc');
        $query = $this->db->get($table);
        return $query;
    }
}
?>

