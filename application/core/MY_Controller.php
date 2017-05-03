<?php
class MY_Controller extends CI_Controller{
public $data = array();
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->data['hyper_logo'] = "CI";
        $this->data['errors']=array();
        $this->data['site_name']=config_item('site_name');

        $this->data['viewname']="";
        $this->data['title'] = '';
}


}
/**
 * Created by PhpStorm.
 * User: Uranus
 * Date: 31.12.2016
 * Time: 15.33
 */ 