<div class="header">
    <p>adminvi/user/loginvi</p>

    <h3>Muokataan </h3>
    <?php echo validation_errors()."<br>"; ?>
</div>
<!--<div class="modal show" role="dialog" >
    <div class="modal-body">
-->
<div>
    <div>
        <?php //echo '<pre>'.  print_r($this->session->userdata,TRUE).'</pre>'; ?>
        <!--    --><?php //echo '<pre>'.  print_r($this->session,TRUE).'</pre>'; ?>


        <?php echo form_open();//actionin hoitaa viewin koonnut controlleri ?>
        <table class="table">

            <tr>
                <td>Email</td>
                <td><?php echo form_input('email'); ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo form_password('password'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"'); ?></td>
            </tr>

        </table>
        <?php echo form_close(); ?>

        <div class="footer">
            &#169; <?php /*echo date('Y');echo $meta_title; */?>
        </div>

    </div>
</div>
