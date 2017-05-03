<?php echo anchor('/admin/articleco/edit/','<i class="glyphicon glyphicon-plus"></i> Lisää Artikkeli'); ?>
<?php if(count($kaikki_articles)):; ?>
<ul>
    <?php foreach($kaikki_articles as $article) :; ?>
<li>
    <?php echo anchor('admin/articleco/edit/'.$article->id,e($article->title)); ?>
    <?php echo date('d-m-Y',strtotime(e($article->modified))); ?>

</li>
        <?php endforeach;  ?></ul>
<?php endif; ?>
