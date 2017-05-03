<h3><?php echo empty($page->id)?'Lisää uusi Sivu':'Muokkaa Sivua:'.$page->title; ?> </h3>

<?php echo validation_errors()."<br>"; ?>
<?php echo form_open() //actionin hoitaa viewin koonnut controlleri;?>

<table class="table">
    <tr>
        <td>Parent</td>
        <td><?php echo form_dropdown('parent_id',$pages_no_parents, $this->input->post('parent_id')?$this->input->post('parent_id'):$page->parent_id);?></td>

    </tr>
    <tr>
        <td>Template</td>
        <td><?php echo form_dropdown('template',array(
                'page'=>'page',
                'news_archive'=>'News archive',
                'homepage'=>'Homepage'),
                $this->input->post('template')? $this->input->post('template'):$page->template);?></td>

    </tr>
    <tr>
                <td>Otsikko</td>
                <td><?php echo form_input('title',set_value('title',$page->title)); ?></td>
            </tr>
            <tr>
                <td>Slug</td>
                <td><?php echo form_input('slug',set_value('slug',$page->slug)); ?></td>
            </tr>
            <tr>
                <td>Body</td>
                <td><?php echo form_textarea('body',set_value('body',$page->body),'id="mytextarea"'); ?>

                </td>

            </tr>

            <tr>
                <td>


                </td>
                <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
            </tr>

        </table>

        <?php echo form_close(); ?>

        <div class="footer">
            &#169; <?php echo date('Y');echo $meta_title; ?>
        </div>


