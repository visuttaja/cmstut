<?php

if(count($articles)) {
    foreach ($articles as $article) {

      echo  "<div class=\"row\">";
        echo "<td>";
        echo $article->pubdate;
        echo "</td>    ";

        echo "<tr><td>";
        $url = 'article/' . intval($article->id) . '/' . e($article->slug);
        if($adminuser){

            echo btn_edit('/admin/articleco/edit/'.$article->id);
            echo "       ";
        }

        echo anchor($url, $article->title);
        //echo anchor('/admin/articleco/edit/'.$article->id,$article->title);
        echo "</td>";



        echo "</tr>";
echo "</div>";

    }
}
