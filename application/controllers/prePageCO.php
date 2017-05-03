<?php

class PageCO extends Frontend_Controller
{
    //public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('page_m');
        //var_dump(__FILE__ ."<br>");
       /*
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
       */
    }
public function index()
{
    //Hae sivun kaavion mukaan
    $uriseg1 = $this->uri->segment(1);
    $sivu = array('slug'=>$uriseg1);
    $this->data['page']=$this->page_m->get_by($sivu,TRUE);
count($this->data['page'])||show_404(current_url());
$method ='_'. $this->data['page']->template;
if(method_exists($this,$method)){
    $this->$method();
}
    else{
        log_message('error','Ei voitu ladata:'.$method.' tiedostossa '.__FILE__.' rivill� '.__LINE__ );
        show_error('Ei voitu ladata:'.$method);
    }

//Lataa näkymä
    $this->data['subview']=$this->data['page']->template;
    $tit['meta_title'] = "Some Page!";
    $this->load->view('adminvi/components/tutheadVI', $tit);
    $this->load->view("adminvi/components/bodystartVI");

    $this->load->view("adminvi/_layout_mainVI",$this->data);


    $this->load->view("adminvi/components/bodyendVI");
        $this->load->view("adminvi/components/tuttailVI");
}

 private function _page(){

     $this->data['recent_news']=$this->article_m->get_recent();

 }
    private function _homepage(){
$this->article_m->set_published();
$this->db->limit(6);
  $this->data['articles']=$this->article_m->get();
    }
private function _news_archive()
{
    $this->data['recent_news']=$this->article_m->get_recent();
    $this->article_m->set_published();
    $count = $this->db->count_all_results('articles');


}
    public function save_exm_insert(){
        $data = array(
            'title'=>'My page',
            'slug'=>'my-page',
            'order'=>'2',
            'body'=>'This is my body',
        );
        $id = $this->page_m->save($data);
        var_dump($id);

    }
    public function save_exm_update($qwer){
        var_dump($qwer);
        $data = array(

            'order'=>'3',

        );
        $id=3;
        $id = $this->page_m->save($data,$id);
        var_dump($id);

    }

    public function delete_exm($id){

        $id = $this->page_m->delete($id);


    }}
