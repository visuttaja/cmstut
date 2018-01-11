<?php
require_once("Database_Asetukset.php");
//on ossi_libloader_helperissä
//require_once("C:\\#datamonnit\\bin\\htdocs\\php\\libloader.php");
//require_once("../../../../php/libloader.php");
class PureMySQL{

private $con;
private $res;
//*****************************
    function __construct(){
      $this->con = $this->open_connection(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//        $con = new mysqli($host,$usr,$pw, $dabase);
    }
//*******************************************
    public function open_connection($host,$usr,$pw,$dabase){
    $c = new mysqli($host,$usr,$pw, $dabase);
        $c->set_charset("utf8");
        return $c;
    }

//******************************
public function close_connection(){
    if(isset($this->con)){
        $this->con->close();
        unset($this->con);
    }


}
//***************QUERY******************
public function q($stmt){

    //$stmt = $this->escape_value($stmt); //escaping all q-stuff like '
    $result = $this->con->query($stmt);

    if(!$this->err_confirm($stmt,$result))
    {

        return false;
    }

    $this->res =$result;
    return $result;
}
//******************************************
    public function err_confirm($stmt,$result)
    {
        if(!$result)
        {
            $err_no=$this->con->errno;
            $err_verbose=$this->con->errno;

          //  SessionStrict::add_message("Virhe numeroo:".$err_no);
            //SessionStrict::add_message("Virheen kuvaus:".$err_verbose."<br>");
           // SessionStrict::add_message("$stmt;");
            return false;
        }
        return $result;
    }
//*********************************
public function last_id(){
    return $this->con->insert_id;
}
//*******************************
public function escape_value($string){
    $escaped = $this->con->real_escape_string($string);
    return $escaped;
}
public function mysql_prep($string){
$escaped = $this->con->real_escape_string($string);
return $escaped;
}
//***************************************************
public function fetch_array($result_set){
    return $result_set->fetch_array();
}
//**************************************************
public function numrows($result){
    $result->num_rows;
}
//**************
public function insert_id(){
    $this->con->insert_id;
}
public function affected_rows(){}

    public function print_table($tablename){
        cspit(HTDOCSROOT."styles/".'style_warm.css');
       $sortable = get_sort_table();
        echo $sortable;
        $query = "select * from ".$tablename;
        $result = $this->q($query);
        if(!$result){
            $err=$this->con->errno;
            echo "virhe no:".$err." kuvaus:".$this->con->error;
            return ;
        }

        $finfo = $result->fetch_fields();

        echo"<table class='sortable'>";
        foreach ($finfo as $val) {
            echo "<th>$val->name</th>";
            // printf("Name:      %s\n", $val->name);
            // printf("Table:     %s\n", $val->table);
            // printf("Max. Len:  %d\n", $val->max_length);
            // printf("Length:    %d\n", $val->length);
            //printf("charsetnr: %d\n", $val->charsetnr);
            //printf("Flags:     %d\n", $val->flags);
            //printf("Type:      %d\n\n<br><br>", $val->type);
        }
        if ($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {
                echo"<tr>";
                foreach ($finfo as $val2)
                {
                    $ny = $val2->name;
                    echo "<td>".$row[$ny]."</td>";
                }
                echo"</tr>";

            }
        }
        else
        {
            echo "0 results";
        }
        echo"</table>";
    }
//*******************************************************
//salasanan uusimisen yhteydessä lähetettävä kooditieto talletetaan
public static function saveResetData($user,$res_key)
{
    $resetting = true;
    $mySql = new MySQL();
    $delete_old = "delete from security where userid=".
    "'".
    $user->ID.
    "'";
    $res = $mySql->q($delete_old);
    $sql = "INSERT INTO security (userid, keystring,reset)".
"VALUES (".
        "'".
        $user->ID.
        "'".
        ",".
        "'".
        $res_key.
        "'".
        ",".
        "'".
        $resetting.
        "'".
        ")";
    $res = $mySql->q($sql);
    $mySql->close_connection();
}
//*******************************************************
//rekisteröinnin yhteydessä varmistetaan sähköposti
    public static function saveConfirmData($user,$res_key)
    {
        $confirming = true;
        $mySql = new MySQL();
        $delete_old = "delete from security where userid=".
            "'".
            $user->ID.
            "'";
        $res = $mySql->q($delete_old);
        $sql = "INSERT INTO security (userid, keystring,confirm)".
            "VALUES (".
            "'".
            $user->ID.
            "'".
            ",".
            "'".
            $res_key.
            "'".
            ",".
            "'".
            $confirming.
            "'".
            ")";
        $res = $mySql->q($sql);
        $mySql->close_connection();
    }
//_______________________________________
}//end Class
//**************************************

//**********************************
 $database  = new PureMySQL();
global $db;
$db = &$database;
global $Mysql;
$Mysql = &$database;
$stop=0;
//******************************
function fail(){

    die("problem:".__FILE__);

}