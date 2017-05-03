<?php

class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_rules = array();
    protected $_timestamps = FALSE;


    public function __construct()
    {
        parent::__construct();
        //var_dump(__FILE__ ." <br>");
    }
   function array_from_post($fields){
       $data=array();
       foreach($fields as $field){
$data[$field]= $this->input->post($field);
           ;

       }

return $data;
   }
    public function get($id=NULL,$single=FALSE){

        if(!$id==NULL)
        {
           $filter=$this->_primary_filter;
            $id=$filter($id);
            $this->db->where($this->_primary_key,$id);
            $method='row';
           // var_dump("row '!id=NULL' ");
       }
        elseif($single==TRUE){
            $method ='row';
           // var_dump("single");
        }
    else{

        $method ='result';

    }
        if(!count($this->db->order_by($this->_order_by)))
        { $this->db->order_by($this->_order_by);}


        return $this->db->get($this->_table_name)->$method();

    }
    public function get_by($columnsentence,$single=FALSE){
        //return $this->db->get_where($this->_table_name, array($columnsentence))->row();
       // $this->db->select('slug');
       // $query = $this->db->get_where($this->_table_name, $columnsentence)->row();
        //var_dump($query );
        $this->db->where($columnsentence);
       return $this->get(NULL,$single);
    }

    public function save($data,$id=NULL){
        if($this->_timestamps==TRUE){
            $now=date('Y-m-d H:i:s' );
            $id||$data['created']=$now;
            $data['modified']=$now;
        }
        //Insert
        if($id===NULL){

            !isset($data[$this->_primary_key])||$data[$this->_primary_key]=NULL;
            $this->db->set($data);

            $this->db->insert($this->_table_name);
            $id= $this->db->insert_id();
        }
        //Update
        else{
       $filter= $this->_primary_filter;
           $id=$filter($id);
           $this->db->set($data);
           $this->db->where($this->_primary_key,$id);
           $this->db->update($this->_table_name);
           ;
       }
       return $id;

    }
    public function delete($idn){
        $filter= $this->_primary_filter;
        $idn=$filter($idn);
        if(!$idn)
            return FALSE;
        $this->db->where($this->_primary_key,$idn);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }
}