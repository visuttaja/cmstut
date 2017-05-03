<?php
class VartestCO extends MY_Controller {

    function index()
    {
        $data['pitkä'] = "pumppa på";
        $data['älämölö'] = "ilimoo perkele!";
        $data['pump'] = "ilimoo perkele!";

        $this->load->view('/lev1/lev2/deep1/diverVI', $data);

    }
}
?>