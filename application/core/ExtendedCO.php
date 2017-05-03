<?php
class ExtendedCO extends MY_Controller{
    public $data = array();
    function __construct(){
        parent::__construct();

        $this->data['errors']=array();
        $this->data['site_name']=config_item('site_name');
        var_dump("ExtendedCO");

    }
    public function index()
    {




    }

}