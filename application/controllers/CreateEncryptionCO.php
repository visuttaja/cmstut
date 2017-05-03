<?php
class CreateEncryptionCO extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');

    }
public function index(){

    $key = bin2hex($this->encryption->create_key(16));
    //$key = $this->encryption->create_key(16);
    var_dump($key);

}
}
