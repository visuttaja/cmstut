<?php

class PageCO extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_m');



    }
    public function index(){
//hae kaikki käyttäjät
        $this->data['pages']=$this->page_m->get_with_parent();
        //kehitä näkymä
        $this -> data['subview']='adminvi/page/index.php';
        $this->kasaaPerusSivu("Sivut Koti");
        //$this ->load->view('adminvi/');

    }

    public function edit($id = null){
        //haetaan sivu tai luodaan uusi
        $id==null || ($this->data['page'] = $this->page_m->get($id));
        if($id){
            $this->page_m->get($id);
            count($this->data['page'])||($this->data['errors'][]='page not found');
        }else{
            $this->data['page'] = $this->page_m->get_new();
        }
//sivut alasvetoon
        $this->data['pages_no_parents']=$this->page_m->get_no_parents();


//asetellaan säännöt
        $rules=$this->page_m->rules;

        $this->form_validation->set_rules($rules);

        //tehdään sääntöjen tarkastus
        if ($validated =$this->form_validation->run() ==TRUE) {
            $data= $this->page_m->array_from_post(array('title','slug','template','body','parent_id'));

            $this->page_m->save($data,$id);
            redirect('admin/pageco');
        }
//kehitetään näkymä
        $this-> data['subview']='adminvi/page/editvi.php';//'login5VI';//
        $this->kasaaPerusSivu("Käyttäjä Ediitti");

    }
  public function order(){
      $this->data['sortable']=true;
      $this->data['subview']='adminvi/page/ordervi';
      $this->kasaaPerusSivu("Order");
  }
    public function order_ajax(){

        if(isset($_POST['sortable'])){
$this->page_m->save_order($_POST['sortable']);

        }

        $this->data['pages']=$this->page_m->get_nested();
        //kehitä näkymä
        $this->load->view("adminvi/page/order_ajaxvi",$this->data);



    }
    public function addpage($id = null){
        $id==null || ($this->data['page'] = $this->page_m->get($id));


        $rules=$this->page_m->rules_admin;
        !$id || $rules['password']['rules'].='|required';
        $this->form_validation->set_rules($rules);
        //!$id || $rules['password'].='|required';
        if ($this->form_validation->run() ==TRUE) {

        }

        $this-> data['subview']='adminvi/page/addpagevi.php';//'login5VI';//
        $this->kasaaPerusSivu("Sivu Ediitti");

    }
    public function delete($id){
        $this->page_m->delete($id);
        redirect('admin/pageco');
    }


    public function tarkista_email($annettu_email)
    {
        if ($annettu_email != 'emailerr') {
            //var_dump($str);
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

//CALLbACK**************
    function unique_slug($str){
        //älä tarkasta slugiaa jos se jo on kannassa,
        //PAITSI jos se on tämänhetkisen sivn slugi

        $id=$this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id!=',$id);
        $page = $this->page_m->get();
        if(count($page))
        {
            $this->form_validation->set_message('unique_slug',' sivutunnus on jo olemassa');
            return FALSE;

        }
        return TRUE;
    }


}