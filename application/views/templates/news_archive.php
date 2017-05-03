<div class="container">


<div class="row">

    <div class="col-lg-8">
        <div class="row">
            <?php if(count($articles)):foreach($articles as $article): ?>

            <article class="col-lg-8">
                <?php
                echo get_excerpt($article,18);
                ?>
<!--                <hr>-->
            </article>

            <?php endforeach; endif; ?>

        </div>



    </div>
    <div class="col-lg-4 sidebar">
        <h2>Uusimmat</h2>
        <?php $this->load->view('sidebar') ?>

    </div>
</div>
    <div class="row">
    <?php
    if($pagination) :
        ?>
        <!--<section class="pagination">-->
        <?php
        echo $pagination ;
        ?>
        <!--</section>-->
    <?php
    endif;
    ?>
</div>
</div>



