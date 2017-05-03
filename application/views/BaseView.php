<?php
class BaseView extends MY_View{
    public $data = array();
    function __construct(){
        parent::__construct();


        var_dump("HeadView");

    }
    public function index()
    {
        var_dump("HeadView ");

    }
}