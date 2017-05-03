<?php

class user_m extends MY_Model
{

    protected $_table_name = 'users';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'),
    );

    public $rules_admin = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),

        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback_unique_email'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]') ,

        'password_confirm' => array(
'field' => 'password_confirm',
'label' => 'Confirm Password',
'rules' => 'trim|matches[password]'
),
    );
//***********************************************************
    public function login(){
    $pwrd= $this->hash($this->input->post('password'));

    $user=$this->get_by(array(
        'email'=>$this->input->post('email') ,
    'password'=>$this->hash($this->input->post('password')),  ),TRUE);

//jos user array ei ole tyhjä kaiken tämän jälkee
    if(count($user)){

    //logga sinne
        $data =array(
            'name'=>$user->name,
            'email'=>$user->email,
             'id'=>$user->id,
            'loggedin'=>TRUE,

        );
       //echo $user->password;
         $this->session->set_userdata($data);

}


}
//*************************************************
function get_new(){
$user = new stdClass();
       $user ->name = '';
       $user -> email= '';
       $user -> password= '';
       return $user;
   }
//******************************

    public function logout(){
$this->session->sess_destroy();

    }
//********************************
    public function loggedin(){

    return (bool)$this->session->userdata('loggedin');
}
//**********************************
public function hash($string){
    return hash('sha512',config_item('encryption_key').$string  );
}
//******************************************


}