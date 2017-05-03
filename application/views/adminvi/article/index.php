<section>
    
    <h2>
        Pages
    </h2>
    <?php echo anchor('/admin/articleco/edit/','<i class="glyphicon glyphicon-plus"></i> Lisää Artikkeli'); ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Pubdate</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        </thead>
        <tbody>
        <?php if(count($articles)):
            foreach($articles as $article): ?>

            <tr>
                <td>
           <?php $url = 'article/'.intval($article->id).'/'.e($article->slug);
           echo anchor($url,$article->title);
           //echo anchor('/admin/articleco/edit/'.$article->id,$article->title);
           ?>


                </td>
                <td>
                    <?php echo $article->pubdate;?>
                </td>
                <td>
                    <?php /*echo btn_edit('/admin/articleco/edit/'.$article->id);*/?>
                    <?php echo btn_edit('/admin/articleco/edit/'.$article->id);?>
                </td>
                <td>
                    <?php echo btn_delete('/admin/articleco/delete/'.$article->id);?>
                </td>
            </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="3">Yht├ñ├ñn sivua ei l├Âytynyt</td>
            </tr>

        <?php endif; ?>
        </tbody>
    </table>

</section>