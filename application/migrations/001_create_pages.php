<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_pages extends CI_Migration {

    public function up()
    {
       var_dump(__FILE__);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'order' => array(
                'type' => 'int',
                'constraint' => '11',
            ),
            'body' => array(
                'type' => 'text',

            ),
        ));
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('pages');
    }

    public function down()
    {
        $this->dbforge->drop_table('pages');
    }
}
/**
 * Created by PhpStorm.
 * User: Uranus
 * Date: 1.1.2017
 * Time: 11.15
 */ 