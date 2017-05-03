<div class="row">
    <div class="col-lg-4 col-lg-offset-7">
        <h1>Hallintoon kirjautuminen</h1>


        <?php echo validation_errors(); ?>
        <?php echo form_open($actor,array('class'=>'form-horizontal'));?>
        <div class="form-group">
            <?php echo form_label($field1_lab,$field1_id);?>
            <?php echo form_error($field1_id);?>
            <?php echo form_input($field1_id,$field1_def,'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo form_label($field2_lab,$field2_id);?>
            <?php echo form_error($field2_id);?>
            <?php echo form_password($field2_id,$field2_def,'class="form-control"');?>
        </div>
        <div class="form-group">
            <label>

                <?php /*echo form_checkbox('muistele','1',FALSE);*/?><!--
                Muista miuta-->

            </label>
        </div>
        <?php echo form_submit('submit', $btnmsg, 'class="btn btn-primary btn-lg btn-block"');?>
        <?php echo form_close();?>
    </div>
</div>