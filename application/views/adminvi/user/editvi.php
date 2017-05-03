<div class="header">
    <p>Login</p>

    <h3><?php echo empty($user->id)?'Lisää uusi käyttäjä':'Muokkaa Käyttäjää:'.$user->name; ?> </h3>

</div>

<div>
    <?php echo validation_errors()."<br>"; ?>

    <div>
<?php //echo '<pre>'.  print_r($this->session->userdata,TRUE).'</pre>'; ?>
        <!--    --><?php //echo '<pre>'.  print_r($this->session,TRUE).'</pre>'; ?>


        <?php echo form_open();//actionin hoitaa viewin koonnut controlleri ?>
        <table class="table">

            <tr>
                <td>Nimi</td>
                <td><?php echo form_input('name',set_value('name',$user->name)); ?></td>
            </tr>
            <tr>
                <td>Sähköposti</td>
                <td><?php echo form_input('email',set_value('email',$user->email)); ?></td>
            </tr>
            <tr>
                <td>Salasana</td>
                <td><?php echo form_password('password'); ?></td>
            </tr>
            <tr>
                <td>Vahvista Salasana</td>
                <td><?php echo form_password('password_confirm'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
            </tr>

        </table>
        <?php echo form_close(); ?>

        <div class="footer">
            &#169; <?php /*echo date('Y');echo $meta_title; */?>
        </div>

    </div>
</div>
