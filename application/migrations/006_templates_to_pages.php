<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_templates_to_pages extends CI_Migration {

    public function up()
    {
        $fields = (array(

            'template' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
            ),

        ));
        $this->dbforge->add_column('pages', $fields);


    }

    public function down()
    {
        $this->dbforge->drop_column('pages','template');

    }
    public function hep()    {
        var_dump("palsa");
    }
}
/**
 * Created by PhpStorm.
 * User: Uranus
 * Date: 1.1.2017
 * Time: 11.15
 */ 