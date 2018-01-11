<?php

class DashboardCO extends Admin_Controller
{
//************************************
    function __construct()
    {
        parent::__construct();
    
    }
//************************************
    public function index()
    {

        $this->list_all_articles();
      
}
//******************************************
    public function list_all_articles(){

        
        $this->load->model('article_m');
        $this->db->order_by('modified desc');
        
        $this->data['kaikki_articles']=$this->article_m->get();

        $this->data['users']=$this->user_m->get();
        $this -> data['subview']='adminvi/dashboard/index';
        $this->kasaaPerusSivu("Meister Koti");
    }
    
//****************************************************
    public function modal()
    {
        $sivuotsikko = 'perusmodaali';

        $this->load->view('adminvi/_layout_modalVI',$this->data);

    }
//*********************************************************
    public function refs_und_envs()
    {
        $this->load->view('refs_und_envs',$this->data);

    }
//*********************************************************
    public function w3modal()
    {
        $this->load->view('adminvi/w3modalVI',$this->data);

    }
}