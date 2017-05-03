<!--//**********************EXAMPLE
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Pageijuoiuopiupouipoui 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>
    //***********************-->


<div class="container">

    <section>

        <h1>
           <span> <img src="/kuvat/logot/cicms/admin/kala.ico">
            </span>


            <?php echo anchor('',strtoupper(config_item('site_name'))); ?>
        </h1>

        </h1>
    </section>
        <nav class="navbar navbar-default" style=background-color: #112233;>
<!--    <nav class="navbar navbar-fixed-left" style=background-color: #112233;>-->


    <?php echo get_menu($menu);
if($adminuser) {
    echo '<ul class ="nav navbar-nav">';
    echo '<li>';
    echo anchor('admin/dashboardco', "Takaisin Hallintoon");
    echo '</li>';
    echo '<ul>';

}else{
    echo '<ul class ="nav navbar-nav">';
    echo '<li>';
    echo anchor('admin/dashboardco', "Kirjaudu Meisterina");
    echo '</li>';
    echo '<ul>';
}

    ;
    ?>


        </nav>

    <div class="container">
        <div class="row">
            <?
            if($adminuser) {
                echo "Koska olet masteruser...!";

if(isset($cur_art_id)) {
    $id = $cur_art_id;
    echo anchor('admin/articleco/edit/' . $id, " Voit editoida tätäkin artikkelia...");

}


            }

            if($subview)
            $this->load->view('/templates/'.$subview);
            ?>
        </div>
    </div>

</div>

