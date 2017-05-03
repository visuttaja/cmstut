<?php
echo  get_ol($pages,$child=false);
//var_dump($pages);
function get_ol($array,$child=FALSE)
{
    $str = '';

    if (count($array)) {
//  *************************ei lasta**************onlapsi
        $str .= $child == FALSE ? '<ol class ="sortable">' : '<ol>';

        foreach ($array as $item){
            $str .= '<li id="list_' . $item['id'] . '">';
            $str .= '<div>' . $item['title'] . '</div>';

       //onko lapsia
            if(isset($item['children'])&&count($item['children']))
            {
              $str.= get_ol($item['children'],TRUE);
            }
        $str .='</li>'.PHP_EOL;
        }
$str .='</ol>'.PHP_EOL;


    }
return $str;
}?>
<script>
    $(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div'

        });

    });
</script>





