<section>

    <?php echo anchor('/admin/pageco/edit/','<i class="glyphicon glyphicon-plus"></i> Lisää Sivu'); ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Otsikko</th>
            <th>Parent</th>
            <th>Muokkaa</th>
            <th>Hävitä</th>
        </tr>

        </thead>
        <tbody>
        <?php if(count($pages)):
            foreach($pages as $page): ?>

            <tr>
                <td>
           <?php echo anchor('/admin/pageco/edit/'.$page->id,$page->title);?>
                </td>
                <td>
                    <?php echo $page->parent_slug;?>
                </td>
                <td>
                    <?php /*echo btn_edit('/admin/pageco/edit/'.$page->id);*/?>
                    <?php echo btn_edit('/admin/pageco/edit/'.$page->id);?>
                </td>
                <td>
                    <?php echo btn_delete('/admin/pageco/delete/'.$page->id);?>
                </td>
            </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="3">Yhtään sivua ei löytynyt</td>
            </tr>

        <?php endif; ?>
        </tbody>
    </table>

</section>