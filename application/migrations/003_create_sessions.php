<?php
class Migration_Create_Sessions extends CI_Migration {
//EI TOIMI!käytä SQLlää.
public function up()
{
//vanha taulumuoto ei toimi
/*
    $fields = array(
'session_id VARCHAR(40) DEFAULT \'0\' NOT NULL',
'ip_address VARCHAR(45) DEFAULT \'0\' NOT NULL',
'user_agent VARCHAR(120) NOT NULL',
'last_activity INT(10) unsigned DEFAULT 0 NOT NULL',
'user_data text NOT NULL'
);
    */
  //uusi -ei toimi
    $fields = array(

        'ip_address VARCHAR(45) DEFAULT \'0\' NOT NULL',
        'timestamp int(10)unsigned DEFAULT \'0\' NOT NULL',
        'last_activity INT(10) unsigned DEFAULT 0 NOT NULL',
        'data blob NOT NULL'

    );
    //'KEY `ci_sessions_timestamp` (`timestamp`)'
   /*
    CREATE TABLE IF NOT EXISTS `ci_sessions` (
`id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
   */

$this->dbforge->add_field($fields);
//$this->dbforge->add_key('session_id', TRUE);
    $this->dbforge->add_key('ci_sessions_timestamp', TRUE);
    $this->dbforge->create_table('ci_sessions');
//$this->db->query('ALTER TABLE 'ci_sessions' ADD KEY 'last_activity_idx' ('last_activity`)');
}

public function down()
{
$this->dbforge->drop_table('ci_sessions');
}

}
?>