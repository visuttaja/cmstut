<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $hyper_logo." ".$meta_title; ?></title>

    <?php
    
    echo get_icon($iconpath) ;
    echo getjquery() ;
    echo getbootstrap();
    echo get_jquery_gui_js();
    echo get_jquery_gui_css();
    echo get_nested_sortable();
    echo get_datepicker_js();
    echo get_datepicker_css();
    echo get_ckeditor_youtube();
   
    $this->load->view('editor_inits/ckeditorinit');
    //$this->load->view('editor_inits/tinymceinit');
    echo get_cms_warmer_css();
    
    ?>



</head>


