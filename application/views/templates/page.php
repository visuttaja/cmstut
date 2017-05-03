<!--Main content-->
<div class="col-lg-10">
<article>
    <h2><?php echo e($page->title); ?></h2>
<p class="pubdate"><?php echo e($page->title); ?></p>
    <?php echo $page->body; ?>
</article>

</div>
<!-- SideBar-->
<div class="col-lg-2 sidebar">
    <h2>Freeeshh!</h2>
    <?php $this->load->view('sidebar') ?>
    </div>