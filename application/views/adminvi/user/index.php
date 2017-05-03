?
<section>
    <h2>
        Users
    </h2>
    <?php echo anchor('/admin/userco/edit/','<i class="glyphicon glyphicon-plus"></i> Lisää käyttäjä'); ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        </thead>
        <tbody>
        <?php if(count($users)):
            foreach($users as $user): ?>

            <tr>
                <td>
           <?php echo anchor('/admin/userco/edit/'.$user->id,$user->email);?>
                </td>
                <td>
                    <?php /*echo btn_edit('/admin/userco/edit/'.$user->id);*/?>
                    <?php echo btn_edit('/admin/userco/edit/'.$user->id);?>
                </td>
                <td>
                    <?php echo btn_delete('/admin/userco/delete/'.$user->id);?>
                </td>
            </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="3">Yhtään käyttäjää ei löytynyt</td>
            </tr>

        <?php endif; ?>
        </tbody>
    </table>

</section>