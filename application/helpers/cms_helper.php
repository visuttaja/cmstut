<?php
function fixCKEditorWrapTags($input){

}
function add_meta_title($str){
    $CI=&get_instance();
$CI->data['meta_title']=e($str).' - '.$CI->data['meta_title'];
}

 function btn_edit($uri){
   return anchor($uri,'<i class="glyphicon glyphicon-edit"></i>');
 }
 function btn_delete($uri){
    return anchor($uri,'<i class="glyphicon glyphicon-remove"></i>',array('onclick'=>"return confirm('Onko varma?poisto')"));
 }

function article_link($article){

    return 'article/'.intval($article->id).'/'.e($article->slug);


}
function article_links($articles){
    $str='<ul>';

foreach($articles as $article){
    $url = article_link($article);
$str.='<li>';
    $str.='<p class="pubdate">'.e($article->pubdate).'</p>';
    $str.='<h3>'.anchor($url,e($article->title)).'</h3>';
    $str.='</li>';
    //$str.=$url;
}
$str.='</ul>';
    return $str;
}
//************************************************
function htmldecode_bodys($pages){

    foreach($pages as $ar=>$jussi) {

        $jussi->body = html_entity_decode($jussi->body);
        //$jussi->body=$r;


    }

}

//****************************************
function onavain($taulu,$avain){
    return array_key_exists($avain, $taulu) ;
}
//*********************************************
function get_excerpt($article,$numwords=15){
$str='';
$url = 'article/'.intval($article->id).'/'.e($article->slug);
$str.='<h5>'.e($article->pubdate)." ".anchor($url,e($article->title)).'</h5>';
    $b = html_entity_decode($article->body);
    $stripped   = strip_tags($b);
    $limited =limit_to_num_words($stripped,$numwords);
    $str.= $limited;

    $str.=" ".anchor($url,'Lue Lisää.....',array('title'=>e($article->title)));

    return $str;
}

function limit_to_num_words($string,$numwords){
$excerpt = explode(' ',$string,$numwords+1);
    if(count($excerpt>= $numwords))
    {
        array_pop($excerpt);

    }
    $excerpt=implode(' ',$excerpt);
    return $excerpt;





}
function e($str){

    //return$str;

    return htmlentities($str);

}
function get_menu
($array,$child=FALSE)
{
 $CI = &get_instance();
    $str = '';

    if (count($array)) {
//  *************************ei lasta**************onlapsi
        $str .= $child == FALSE ? '<ul class ="nav navbar-nav">'.PHP_EOL : '<ul class="dropdown-menu">'.PHP_EOL;

        foreach ($array as $item){
            $active = $CI->uri->segment(1)==$item['slug']?TRUE:FALSE;

            //onko lapsia
            if (isset($item['children']) && count($item['children'])) {
                $str .=$active ? '<li class="dropdown active"':'class="dropdown" >';
                $wref = base_url();
                if(INDEXROUTE)
                    $wref.='index.php/';
                $wref.= e($item['slug']);


                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' . $wref . '">'.e($item['title']);
                $str = '<b class="caret"> </b>' . '</a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);

            }
            else{
                $str .=$active ? '<li class="active">':'<li>';

                $wref = base_url();
                if(INDEXROUTE)
                $wref.='index.php/';
                $wref.= e($item['slug']);

                $str .= '<a  href="' . $wref. '">'.e($item['title'])."</a>";
            }


            $str .='</li>'.PHP_EOL;
        }
        $str .='</ul>'.PHP_EOL;


    }
    return $str;
}
?>