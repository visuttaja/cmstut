<?php //$this->load->view("adminvi/components/tutheadVI"); ?>
<div>
    <nav class="navbar navbar-static-top navbar-inverse">

        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><?php /*echo $meta_title; */?></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php /*echo base_url('/adminvi/dashboard')*/?> ">Dashboard</a></li>
                <li><?php echo anchor('adminvi/pages','pages'); ?></li>
                <li><?php echo anchor('adminvi/users','users'); ?></li>

            </ul>

        </div>
    </nav>
</div>

<div class="container">


    <div class="row">
        <!--   pääsarake-->
        <div class="col-md-8">
            <section>
                <h2>Page name</h2>
            </section>

        </div>
        <!--  sivubaari-->
        <div class="col-md-4">

            <section>


                <?php echo mailto('valeri.kursk@gmail.com','<i class="glyphicon glyphicon-user"></i>valeri.kursk@gmail.com'); ?><br>

                <?php

                echo anchor('admin/userCO/logout','<i class="glyphicon glyphicon-log-out"></i> Logout');

                ?>

            </section>

        </div>


    </div>
    <div>
        <?php
      echo $dynstring;
        //$this->load->view($subview);
        ;
        ?>
    </div>
</div>






