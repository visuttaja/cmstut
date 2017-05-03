<?php

class UserCO extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        ;



    }
public function index(){
//hae kaikki käyttäjät
    $this->data['users']=$this->user_m->get();
    //kehitä näkymä
    $this -> data['subview']='adminvi/user/index.php';
    $this->kasaaPerusSivu("Käyttäjä Koti");
    //$this ->load->view('adminvi/');

}

    public function edit($id = null){
       //haetaan käyttäjä tai luodaan uusi
        $id==null || ($this->data['user'] = $this->user_m->get($id));
if($id){
    $this->user_m->get($id);
count($this->data['user'])||($this->data['errors'][]='user not found');
}else{
    $this->data['user'] = $this->user_m->get_new();
}
//asetellaan säännöt
       $rules=$this->user_m->rules_admin;
        $id || $rules['password']['rules'].='|required';
        $this->form_validation->set_rules($rules);

        //tehdään sääntöjen tarkastus
        if ($validated =$this->form_validation->run() ==TRUE) {
           $data= $this->user_m->array_from_post(array('name','email','password'));
            $data['password']= $this->user_m->hash($data['password']);
            $this->user_m->save($data,$id);
            redirect('admin/userco');
        }
//kehitetään näkymä
        $this-> data['subview']='adminvi/user/editvi.php';//'login5VI';//
        $this->kasaaPerusSivu("Käyttäjä Ediitti");

    }
    public function adduser($id = null){
        $id==null || ($this->data['user'] = $this->user_m->get($id));


        $rules=$this->user_m->rules_admin;
        !$id || $rules['password']['rules'].='|required';
        $this->form_validation->set_rules($rules);
        //!$id || $rules['password'].='|required';
        if ($this->form_validation->run() ==TRUE) {

        }

        $this-> data['subview']='adminvi/user/adduservi.php';//'login5VI';//
        $this->kasaaPerusSivu("Käyttäjä Ediitti");

    }
    public function delete($id){
$this->user_m->delete($id);
        redirect('admin/userco');
    }

    public function tarkista_email($annettu_email)
    {
        if ($annettu_email != 'emailerr') {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function tarkista_salasana($annettu_salasana){
        if ($annettu_salasana != 'passerr') {

            return TRUE;
        } else {return FALSE;}
    }
    public function login(){
        $usersession = $this->session;

$dashboard='/admin/dashboardCO';
//uudelleen ohjataan käyttäjä jos on jo kirjautunut,False jatkaa
        $this->user_m->loggedin()==FALSE || redirect($dashboard);

        $fls=$this->session->flashdata('item');
if($fls!=null){

    ;
}
        $pw_virheviesti=array('tarkista_salasana'=>'tarkista_salasana joku virho');
   //asetellaan ehdot
    $this->form_validation->set_rules('password',
        'Salasana',
        'callback_tarkista_salasana|required'
        ,$pw_virheviesti);


        $email_virheviesti=array('tarkista_email'=>'joku sähköpostiosoitteeseen liittyvä virhe');

    $this->form_validation->set_rules(
        'email',
        'Sähköposti',
        'callback_tarkista_email|trim|required|valid_email',
        $email_virheviesti);


//tarkastetaan ehdot
    if ($this->form_validation->run() ==TRUE) {

        if($this->user_m->login()==TRUE){
            redirect($dashboard);
        }else{
            $this->session->set_flashdata('item','item');




            redirect('admin/userCO/login');
        }

    }

        $this->data['meta_title'] = "MeisterLogin!";
        $this->set_iconpath();
        $this->load->view('adminvi/components/tutheadVI',  $this->data);
        $this->load->view("adminvi/components/bodystartVI");

        $this->cmsYleisLomake();

        $this->load->view("adminvi/components/bodyendVI");
        $this->load->view("adminvi/components/tuttailVI");


}
    public function cmsYleisLomake()
    {

        $this->action_arr['field1_id'] = 'email';
        $this->action_arr['field2_id'] = 'password';
        $this->action_arr['field1_def'] = 'bon.scott@acdc.com';
        $this->action_arr['field2_def'] = '';
        $this->action_arr['field1_lab'] = 'Sähköposti';
        $this->action_arr['field2_lab'] = 'Salasana';
        $this->action_arr['btnmsg'] = 'Kirjaudu tästä';
        //$base = config_item('base_url') . 'index.php' . '/';
        //$subaction = 'salat/formhandlerSkeleton';
        //$this->action_arr['actor'] = $base . $subaction;

        $this->action_arr['actor'] = '';
        $dat['nestedView']['action_arr'] =$this->action_arr;
        //$this->load->view('login5VI', $this->action_arr);
        $this->load->view('adminvi/_layout_login',$dat);

    }
//CALLACK**************
    function unique_email($str){
        //älä tarkasta emailia jos käyttäjä jo on,
        //PAITSI jos se on tämänhetkisen käyttäjän email

        $id=$this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
!$id || $this->db->where('id!=',$id);
        $user = $this->user_m->get();
        if(count($user))
        {
            $this->form_validation->set_message('unique_email',' on jo olemassa');
            return FALSE;

        }
        return TRUE;
}

//********************************************
public function logout(){
    $this->user_m->logout();
redirect('admin/userCO/login');
}
}