<div>
    <textarea name='fields[body]' cols='35' rows='12'>
        <?php
        echo htmlentities($article->body );

        ?>

    </textarea>

<span>
    <textarea name='fields[body]' cols='35' rows='12'>
        <?php
        echo htmlentities($article->body );

        ?>

    </textarea>
</span>
    <span>
    <textarea name='fields[body]' cols='35' rows='12'>
        <?php
        echo $article->body ;

        ?>

    </textarea>
</span>
</div>
<?php

function nl2br2($string) {
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
    // $string = str_replace(array("\r\n", "\r", "\n"), " ", $string);
    return $string;
}

//$inner = preg_replace( "/\r|\n/", "\\", $article->body );

$inner = preg_replace( "/\r|\n/", "",$article->body);

//$inner = str_replace( array( "\n", "\r" ), array( "\\n", "\\r" ),  $article->body );
//$inner = preg_replace( "/\n/", "\\\n", $article->body );
$inner =addslashes($inner);
//$inner = json_encode(utf8_encode($inner));
//$inner = str_replace( "\\n", "\\\\\\n", $$article->body );
//$message = preg_replace("/\r?\n/", "\\n", addslashes($message));
$table = get_html_translation_table(HTML_ENTITIES);
$table[' '] = '&nbsp;';

echo "<script>";
print_r($table);
echo "</script>";
echo "\n";


echo "<script>";
echo "var oikein =".'"'.'\<script\>'. 'siis miksi?'  .'\<\/script\> \<h1\>  why   \<\/h1\>'.'"';
echo "</script>";
echo "\n";
echo "<script>";
echo "var body1 =".'"'.$article->body.'"';
echo "</script>";
echo "\n";



//echo "var body2=".'"'."<div></div>". $inner. '"';
//$scr1 = 'var bod='.'"'.'<script> Hello"Man" </script>'.'"';

$scr1 = $article->body;
echo "<script>";
echo "original:".$scr1;
echo "</script>";
echo "\n";
echo '1:'.$scr1;

echo "<script>";
$scr2 = addslashes($scr1);
echo "addslashes:".$scr2;
echo "</script>";
echo "\n";
echo '2:'.$scr2;

echo "<script>";
$scr3 = htmlentities($scr1);
echo "htmlentities:".$scr3;
echo "</script>";
echo "\n";
echo '3:'.$scr3;


echo "<script>";
$out = html_entity_decode($scr3);
echo "edellinen html_entity_decode:".$out;
echo "</script>";
echo "\n";
echo 'o1:'.$out;

echo "<script>";
$scr4 = htmlspecialchars($scr1);
echo "htmlspecialchars_encode:".$scr4;
echo "</script>";
echo "\n";
echo '4:'.$scr4;

echo "<script>";
$scr5 = htmlspecialchars_decode($scr4);
echo "onko  alkuperäinen? htmlspecialchars_decode:".$scr5;
echo "</script>";
echo "\n";
echo '5:'.$scr5;

echo "<script>";
$out = strip_tags($scr1);
echo " strip_tags:".$out;
echo "</script>";
echo "\n";
echo 'o2:'.$out;

echo "<script>";
$out = json_encode($scr1);
$res =  ' var body ='.$out;
echo $res;
echo "</script>";
echo "\n";
echo 'o3:'.$out;

echo "<script>";
//rimpulasta tavalis_seksi html sivuksi
$article->body = html_entity_decode($article->body);
echo "</script>";



