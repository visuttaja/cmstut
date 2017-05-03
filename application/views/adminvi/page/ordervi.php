<?php
function relativeroot(){
return relaroot();//libloader.php sitewide
}
?>
<section>
    <h2>
        <p class="alert alert-info">
            Rahaa sivu toisen yli/päälle


        </p>
        <div id="orderresult"></div>
        <input type="button" id = "save" value ="Save" class="btn btn-primary" />

    </h2>

</section>
<script>
    var jqxhr = $.post(
        <?php
           echo('"');
             // $muu = relativeroot()."admin/pageco/order_ajax";
        echo(relativeroot()."admin/pageco/order_ajax");
         echo('"');
        ?>

        ,
        function(data) {
       // alert( data);
        $("#orderresult").html(data);

    })
        .done(function() {
         ;
        })
        .fail(function() {
        ;  //  alert( "error" );
        })
        .always(function() {
        ;
        });





$('#save').click(function(){

oSortable = $('.sortable').nestedSortable('toArray');


        $.post(
        <?php
        echo('"');
        echo relativeroot()."admin/pageco/order_ajax";
        echo('"');
        ?>,
        {sortable:oSortable},
    function(data) {
        $("#orderresult").html(data);

    });

    }

);









</script>


