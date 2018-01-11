<?php
class Admin_Controller extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->data['meta_title']="Ohjausvipstaakit ";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_m');
       // var_dump("hello from Admin_Controller<br>");
//login varmistus
$exception_uris=array('admin/userCO/login','admin/userCO/logout');
        $uri_geller = uri_string();
        if(in_array(uri_string(),$exception_uris)==FALSE) {
    if ($this->user_m->loggedin() == FALSE) {
        redirect('admin/userCO/login');

    }
}

    }
//*******************************
public function set_iconpath()
{
    $this->data['iconpath'] = "cicms/admin/pomot.ico";
}
//*******************************
public function kasaaPerusSivu($title){

$this->halo = $this;
    $this->set_iconpath();
    $this->data['meta_title'] = $title;
    $this->load->view('adminvi/components/tutheadVI', $this->data);
    $this->load->view("adminvi/components/bodystartVI");

    $this->load->view("adminvi/_layout_mainVI",$this->data);

    //$q= $this->load->view('MY_View',$this,$tit);

    $this->load->view("adminvi/components/bodyendVI");
    $this->load->view("adminvi/components/tuttailVI");


}
public function toString(){
    echo "toString";

}
    public function kasaaPerusSivuExp($title){


        $tit['meta_title'] = $title;
        $this->load->view('adminvi/components/tutheadVI', $tit);
        $this->load->view("adminvi/components/bodystartVI");

        $this->load->view("adminvi/_main_explode",$this->data);


        $this->load->view("adminvi/components/bodyendVI");
        $this->load->view("adminvi/components/tuttailVI");


    }
}