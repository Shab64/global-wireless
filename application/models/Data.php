<?php

class Data extends CI_Model{
    function scrubbing($data){
        if(!empty($data)){
            foreach($data as $k=>$v){
                $data[$k]=htmlspecialchars($v);
            }
        }
        return $data;
    }
    function insert($table,$data){
        $this->db->insert($table,$data);
    }
    function update($w,$table,$data){
        $this->db->where($w);
        $this->db->update($table,$data);
    }

    function fetch($table,$where=null,$limit=null,$col=null){
        $this->db->select('*')->from($table);
        if(is_array($where) && $where != null){
            foreach($where as $key => $value){
                $this->db->where($key, $value);
            }
        }
        if($limit != null)
            $this->db->limit($limit);
        if(!empty($col))
            $this->db->order_by($col,'DESC');
        return   $this->db->get()->result_array();
    }

    public function singledata($table, $id)
    {
        $this->db->where($id);
        $data= $this->db->get($table)->result_array();
        return $data;
    }

    public function select_sum($sum,$table,$where){
        foreach($where as $key=>$val)
        {
            $this->db->where($key, $val);
        }
        $this->db->select($sum)->from($table);
        return   $this->db->get()->result_array();
    }

    public function join($col= '*' , $from , $join ,$to_join, $type){
        $this->db->select($col);
        $this->db->from($from);
        $this->db->join($join, $to_join,$type);
        return   $this->db->get()->result_array();
    }

    public function delete($table,$w){
        $this->db->where($w);
        $this->db->delete($table);
    }

    public function myquery($q)
    {
        //     return $this->db->query($q)->result_array();
        $x = $this->db->query($q);
        return (method_exists($x, "result_array")) ? $x->result_array() : "";
    }

}