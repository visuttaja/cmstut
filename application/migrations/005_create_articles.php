<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_articles extends CI_Migration {

    public function up()
    {
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
                'constraint' => '128',
            ),
            'pubdate' => array(
                'type' => 'DATE',

            ),
            'body' => array(
                'type' => 'TEXT',

            ),
            'created' => array(
                'type' => 'DATETIME',

            ),
            'modified' => array(
                'type' => 'DATETIME',

            ),
        ));
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('articles');
    }

    public function down()
    {
        $this->dbforge->drop_table('articles');
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