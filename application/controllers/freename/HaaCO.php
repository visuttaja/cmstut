<?php
class HaaCO extends MiunCO{
    public $data = array();
    function __construct(){
        parent::__construct();

        $this->data['errors']=array();
        $this->data['site_name']=config_item('site_name');
        var_dump("OQ");

    }
    public function index()
    {
        var_dump("OQ");



    }
function lopussaOnMerkkijono1($tutkittava,$haettava){

    $sa = substr($tutkittava, strlen($tutkittava)-1);

    $sb = substr($haettava, strlen($haettava)-1);

    if( $sa === $sb)
    {
        // Do something when character at the last matches
    }
    else{
        // Do something when doesn't match
    }

}
function listdb(){

        $tables = $this->db->list_tables();

        foreach ($tables as $table)
        {
            echo "<br>".$table." ";
            $query = $this->db->query('SELECT * FROM '.$table);
            foreach ($query->list_fields() as $field)
            {
                echo $field ."<br>";
                // echo $field->name;
                //echo $field->type;
                //  echo $field->max_length;
                //echo $field->primary_key;
            }
        }

}
}