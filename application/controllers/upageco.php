<?php

class UPageCO extends Frontend_Controller
{
    //public $data = array();

    function __construct()
    {
        parent::__construct();

    }
public function index(){
    $this->load->model('user_m');
    $this->data['adminuser'] = $this->user_m->loggedin();
    $tutkittava = $this->uri->segment(1);
    if($tutkittava==null)
        $tutkittava='home';
    $this->data['page']=$this->page_m->get_by(array('slug'=>(string)$tutkittava),TRUE);
    if(isset($_POST['body']))
    $this->data['page']->body = html_entity_decode($this->data['page']->body);
    //count($this->data['page'])||show_404(current_url());
    //var_dump($this->data['page']);

    //echo '<pre>'.$this->db->last_query().'<pre>' ;
//fetch the page data
    $this->data['subview'] =null;
    if(count($this->data['page'])) {
        $method = '_' . $this->data['page']->template;
        if(method_exists($this,$method)){
            //esim: _homepage metodi:
            //hakee artikkelit ja recent newsit
            $this->$method();


            if(onavain($this->data,'articles'))
            if(count($this->data['articles'])) {
                $arrs = &$this->data['articles'];

                htmldecode_bodys($arrs);

            }

        }
        else{
            log_message('error',"voi Berkeley:".__FILE__." ".__LINE__);
            show_error("Ongelma:ei ole templaatti ok");
        }
        $this->data['subview'] =$this->data['page']->template;

    }
        $this->kasaaPerusSivu("PerusKäyttäjän Sivu");

}
//***************************

    /*
    private function _article(){
        $this->load->model('article_m');
        $this->data['recent_news']=$this->article_m->get_recent();



    }
    */

    private function _page(){
        $this->load->model('article_m');
        $this->data['recent_news']=$this->article_m->get_recent();



    }

    private function _homepage(){
        $this->load->model('article_m');
        $this->data['recent_news']=$this->article_m->get_recent();

        $this->article_m->set_published();//

        //$this->db->limit(6);
$this->data['articles']=$this->article_m->get();

    }

    private function _news_archive(){
        $this->load->model('article_m');
        // $this->load->model('article_m');
        $this->data['recent_news']=$this->article_m->get_recent();
       //laske artikkelit
        $this->article_m->set_published();//
        //$this->db->where('pubdate<=',date('Y-m-d'));
        $count = $this->db->count_all_results('articles');
        //var_dump($count);
       //pakinaatio
        $perpage=4;
        if($count){
            $this->load->library('pagination');
            $wref = base_url();

            if(INDEXROUTE)
                $wref.='index.php/';
/*
           $rt1= $this->router->fetch_class();
           */
            //$rt2 =$this->router->fetch_method();//indexistä on tultu
            $wref.=$this->uri->segment(1);
            //$wref.=$rt1.'/'. $this->uri->segment(1).'/';
            $config['base_url'] = $wref;
            $config['total_rows'] = $count;
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 2;


            $this->pagination->initialize($config);

            //echo $this->pagination->create_links();
            $this->data['pagination']=$this->pagination->create_links();
        $offset=$this->uri->segment(2);
        }
        else{
            $this->data['pagination']='';
            $offset=0;
        }
      // echo $this->data['pagination'];
        //var_dump($this->data['pagination']);
        //fetch articles
        $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit($perpage,$offset);
        $this->data['articles']=$this->article_m->get();
        //echo $this->db->last_query();
    }

}
