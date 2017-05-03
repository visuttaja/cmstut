<?php

class Frontend_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_m');
        $this->load->model('article_m');
        //TODO remove all other article_m loads
        $this->data['menu'] = $this->page_m->get_nested();
        $this->data['news_archive_link'] = $this->page_m->get_archive_link();

    }

    public function set_iconpath()
    {
        $this->data['iconpath'] = "cicms/tava/tava1.ico";
    }
    public function kasaaPerusSivu($title)
    {

        $this->halo = $this;
        $this->data['iconpath'] = "cicms/tava/tava1.ico";
        $this->data['meta_title'] = $title;
        $this->load->view('tava/ucomponents/headVI',  $this->data);
        $this->load->view("tava/ucomponents/bodystartVI");

        $this->load->view("tava/u_layout_mainvi", $this->data);

        //$q= $this->load->view('MY_View',$this,$tit);

        $this->load->view("tava/ucomponents/bodyendVI");
        $this->load->view("tava/ucomponents/footVI");


    }


}