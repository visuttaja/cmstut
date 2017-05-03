
<div>

    <nav class="navbar navbar-static-top navbar-inverse">

    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><?php /*echo $meta_title; */?></a>
        </div>
        <ul class="nav navbar-nav">


            <li><?php echo anchor('admin/dashboardco',"Kojelauta")?></li>
            <li><?php echo anchor('admin/pageco','Sivut'); ?></li>
            <li><?php echo anchor('admin/pageco/order','Sivujen Järjestely'); ?></li>
            <li><?php echo anchor('admin/userco','Käyttäjät'); ?></li>
            <li><?php echo anchor('admin/articleco','Uutisartikkelit'); ?></li>
            <li><?php echo anchor('salatco','Salasanan Uusiminen'); ?></li>
            <li><?php echo anchor('/','Käyttäjän näkymä'); ?></li>
        </ul>

    </div>
        <script>

            $(".nav a").on("click", function(){
                $(".nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });
        </script>
    </nav>
</div>


<div class="container">



        <div class="row">

        <!--   pääsarake-->
        <div class="col-lg-10">

<!--<span> <img src="/kuvat/logot/cicms/admin/admin100.png"></img>-->


        </div>
        <!--  sivubaari-->
        <div class="col-lg-2">

            <section>


                <?php echo mailto('valeri.kursk@gmail.com','<i class="glyphicon glyphicon-user"></i>valeri.kursk@gmail.com'); ?><br>

                <?php echo anchor('admin/userCO/logout','<i class="glyphicon glyphicon-log-out"></i> Logout');  ?>

            </section>

        </div>


    </div>

    <div class="row">
        <div class="col-lg-1">
            <img class="tanssi" src="/kuvat/logot/cicms/admin/admin150.png">
            </div>
        <div class="col-lg-11">

        <?php
        $this->load->view($subview);
        ;
        ?>
        </div>
    </div>

</div>
<!--container-->






