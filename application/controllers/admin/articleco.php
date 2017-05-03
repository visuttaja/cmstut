<?php

class ArticleCO extends Admin_Controller
{
//**************************************
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_m');



    }
//****************************************************
    public function index(){

        $this->data['articles']=$this->article_m->get();
        //kehitä näkymä
        $this -> data['subview']='adminvi/article/index.php';
        $this->kasaaPerusSivu("Sivut Koti");
        //$this ->load->view('adminvi/');
    }

//***************************************
    function date_valid(){
        $date = $_POST['pubdate'];
        $this->form_validation->set_message('date_valid',' joku ongelma article');
        $year = (int) substr($date, 0, 4);
        $day = (int) substr($date, 8,2);
        $month = (int) substr($date, 5, 2);
        $chk = checkdate($month, $day, $year);
        return $chk;
    }
//******************************************
    public function edit($id = null){
        //haetaan vanha sivu tai luodaan uusi
        //jos id on olemassa
        //vasen on epätosi ja oikea on tutkittava,arvoa ei käytetä
        $id==null || ($this->data['article'] = $this->article_m->get($id));
        if($id){
            $this->article_m->get($id);
            count($this->data['article'])||($this->data['errors'][]='article not found');
        }else{
            $this->data['article'] = $this->article_m->get_new();
            //käyttäjä ei halua menettäää työtään.....
            if(isset($_POST['body']))
                $this->data['article']->body=$_POST['body'];//korvaa tyhjän
            else $this->data['article']->body="alkuteksti";
        }
//sivut alasvetoon



//asetellaan säännöt
        $rules=$this->article_m->rules;

        $this->form_validation->set_rules($rules);


        if ($validated =$this->form_validation->run() ==TRUE) {
            //siirtää arvot post muutujasta data-tauluun
            $data= $this->article_m->array_from_post(array('title','slug','body','pubdate'));
            //$data['body'] = $this->nl2br2($data['body']);
            $data['body'] = htmlentities($data['body']);

            $this->article_m->save($data,$id);
            redirect('admin/articleco');
        }
//kehitetään näkymä
        $this-> data['subview']='adminvi/article/ar_editvi.php';//'login5VI';//
        $this->kasaaPerusSivu("Käyttäjä Ediitti");

    }
//******************************************************************************
    public function nl2br2($string) {
        $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
        // $string = str_replace(array("\r\n", "\r", "\n"), " ", $string);
        return $string;
    }
//**********************************************************
    public function delete($id){
        $this->article_m->delete($id);
        redirect('admin/articleco');
    }
//*************************************************
public function _output($buffer){
    $a=$buffer;
    $qu =$this->db->last_query();
    echo $buffer;
    $b=1;
}

}