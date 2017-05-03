<?php
function phpinfobuf(){
    ob_start();//otetaan bufferi outputille
    phpinfo();//ei echota lainkaan
    $info = ob_get_clean(); //otetaan html sisältö puskurista
    $dom = new domDocument();//alustaa dom metodit
    @$dom->loadHTML($info); //puretaan saatu dom-osiin
    $tables = $dom->getElementsByTagName('table');//tälläkertaa näin...
    $inner = "";
    if ( $tables && 0<$tables->length )
        foreach ($tables as $table) {

            $inner.= $dom->saveHTML($table);
        }
    $inner = preg_replace( "/\r|\n/", "", $inner );//js ei lopulta tykkää rivin vaihdoista
    $inner =addslashes($inner);//js haluaa heittomerkkeihin muuttujaan \" escapet
    $temp = jsvar('php_info_js',$inner);
}
//to_jsvar ekottaa javascript-muuttujan sivuun haluttuun kohtaan
function to_jsvar($nimi,$instr){



    $ret =
        '<script> var '.
        $nimi.
        '='.
        '"'.
        $instr.
        '"'.
        ';'.
        '</script>'."\n";
    echo $ret;
    return $ret;




}
//**************************

?>