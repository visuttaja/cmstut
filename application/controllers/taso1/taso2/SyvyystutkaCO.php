<?php
class SyvyystutkaCO extends my_controller
{
    public function __construct()
    {
        parent::__construct();
        var_dump("Viesti Syvältä!<br>");

    }

    public function index()
    {

        $muu['pitkä'] = "pumppa på";
       // $muu2['älämölö'] = "ilimoo perkele!";
       // $muu3['pump'] = "heliumia saatana!";

        $this->load->view('/lev1/lev2/deep1/diverVI', $muu);
        //$this->load->view('/lev1/lev2/deep1/diverVI', $muu2);


    }
}