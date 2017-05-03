<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $hyper_logo." ". $meta_title; ?></title>

    <?php
    echo get_icon($iconpath) ;

    echo getjquery() ;
    echo getbootstrap();
    echo get_tinymce();

    //echo get_sort_table();
    echo get_jquery_gui_js();
    echo get_jquery_gui_css();
    $nst=get_nested_sortable();
    echo get_datepicker_js();
    echo get_datepicker_css();
    echo get_cmstut_css();

    echo $nst;
    //echo getfontawesome();
    ?>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>


