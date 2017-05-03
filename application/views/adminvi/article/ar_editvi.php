
<h3><?php
    echo empty($article->id)?'Lisää uusi Artikkeli':'Muokkaa artikkelia:'.$article->title;
    ?> </h3>

<?php echo validation_errors()."<br>"; ?>
<?php echo form_open() //actionin hoitaa viewin koonnut controlleri;?>
<table class="table">
    <tr>
        <td>Julkaisupäivä</td>
        <td><?php

            echo form_input('pubdate',set_value('pubdate',$article->pubdate),'class="datepicker"');

            ?>

        </td>

    </tr>
    <tr>
                <td>Otsikko</td>
                <td><?php
                    $otsikkoFormSetup= array(
                        'title'=> 'Otsikko',
                        'name'=> 'title',
                        'id'=> 'test',
                        'value'=>$article->title,
                        'style'=> 'width: 80ch;',
                    );
                    echo form_input($otsikkoFormSetup); ?></td>
            </tr>
            <tr>
                <td>Slug</td>
                <td><?php
                    $slugFormSetup= array(
                        'title'=> 'Tunniste',
                        'name'=> 'slug',
                        'id'=> 'test',
                        'value'=>$article->slug,
                        'style'=> 'width: 60ch;',
                    );
                    echo form_input($slugFormSetup);
                    echo form_submit('submit', 'Save', 'class="btn btn-primary"');
                    ?></td>
            </tr>
            <tr>
                <td>Body</td>

                <td>
                    <textarea name="body" id="ckeditor" id="ckeditor" cols="50" rows="10"></textarea>


                </td>

            </tr>

            <tr>
                <td>


                </td>
                <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
            </tr>
   <!-- <tr>
      <td>
        <textarea name="bodyB" id="tinymce" id="tinymce" cols="50" rows="10"></textarea>
      </td>
    </tr>-->

        </table>

        <?php echo form_close(); ?>
<script>

</script>

        <div class="footer">
            &#169; <?php echo date('Ymd');echo " ". $meta_title; ?>
        </div>

<script>

    $(function(){
        $('.datepicker').datepicker({format:'yyyy-mm-dd'});
    })

</script>





<?php

echo "<script>";
//article.body on muutettu ensin entiteeteistä html muoton
//tässä sen lisäksi lopettavien tagien etukenot escapoidaan takakenoilla
$out = html_entity_decode($article->body);
$out = json_encode($out);
//se mahdollistaa editoitavan teksti siirtämisen js-muuttujaan:

$res =  ' var textbody ='.$out;
echo $res;
echo "</script>";

echo "\n";
echo "<script>";
 $script_start  ='"'.'\<script\>';
//str_replace( '"', '\"', json_encode('<script>'));
$script_end  = '\<\/script\>'.'"';
//str_replace( '"', '\"', json_encode('</script>'));
echo "var textbody3 ="   .$script_start.'koodiii;'.$script_end ;

echo "</script>";
echo "<script>";
echo "var textbody2 =". '"'.'Mitä ihmettä?'.'"'.";";
echo "</script>";
echo "\n";





?>