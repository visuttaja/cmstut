<?php
function jsvar($nimi,$litania_pil){
    $ret =
        '<script> var '.
        $nimi.
        '='.
        '"'.
        $litania_pil.
        '"'.
        ';'.
        '</script>'."\n";
echo $ret;
    return $ret;
}

//****************************************
function jsvar_plain($nimi,$litania_pil){
    $ret =
        'var '.
        $nimi.
        '='.
        '"'.
        $litania_pil.
        '"'.
        ';'.
        "\n";

    return $ret;
}
//****************************************
function jsvar_noeko($nimi,$litania_pil){
    $ret =
        '<script> var '.
        $nimi.
        '='.
        '"'.
        $litania_pil.
        '"'.
        ';'.
        '</script>'."\n";

    return $ret;
}
//***************************************************************
if ( ! function_exists('cspit')) {
    function cspit($cs = '')
    {
        //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        $linkrel = '<link href='.
            '"'.
            $cs.
            '"'.
            ' rel='.
            '"'.
            'stylesheet'.
            '"'.
            '>'.
            "\n";
        ;

        echo $linkrel;
        return $linkrel;
    }
}
if ( ! function_exists('jspit')) {
    function jspit($src = '')
    {
        $js = "<script " .
            'src="' . $src .
            '" language="' .
            'javascript"' .
            ' type="' .
            'text/javascript"' .
            ">" .
            "</script>" .
            "\n";

        echo $js;
        return $js;
    }
}
    function jscal($src = '')
    {
        $js = '<script>'.
            $src.
            '</script>'.
            "\n";

        echo $js;
        return $js;
    }
    function jscalid($id='',$src = '')
    {
        $js = '<script '.'id='.
            '"'.
            $id.
            '"'.'>'.
            $src.
            '</script>'.
            "\n";

        echo $js;
        return $js;
    }

function jstex($text){

    jscalid(
        'acdc',
        'tekstiSisar('.
        '"'.
        'acdc'.
        '"'.
        ','.
        '"'.
        $text.
        '"'.
        ');'
    );


}
function clean_for_js($input){
    $clean = preg_replace( "/\r|\n/", "", $input );//rivinvaihdot pois
    $clean =addslashes($clean);//heittomerkit etumerkitään esim \"
return $clean;
}
