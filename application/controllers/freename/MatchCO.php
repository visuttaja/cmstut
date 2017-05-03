<?php
class MatchCO extends MiunCO
{
    public $data = array();

    function __construct()
    {
        parent::__construct();


        var_dump("MatchCO");

    }

    public function index()
    {


        $s1 = "testing";
        $s2 = "ing";

        echo $this->loppuuJonoon($s1, $s2);


    }

    function loppuuJonoon($s1, $s2)
    {
        return substr($s1, -strlen($s2)) == $s2 ? "true" : "false";
    }
}
?>
/**
 * Created by PhpStorm.
 * User: Uranus
 * Date: 6.1.2017
 * Time: 13.12
 */ 