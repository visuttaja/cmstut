<!--Main content-->
<div class="col-lg-10">
    <article>
        <h2><?php
            echo e($article->title); ?>
        </h2>
        <p class="pubdate">
            <?php echo e($article->pubdate); ?></p>
            <?php echo html_entity_decode($article->body); ?>

    </article>

</div>
<!-- SideBar-->
<div class="col-lg-2">
    <h2>Viimeisimmät</h2>

    <?php $this->load->view('sidebar') ?>

</div>