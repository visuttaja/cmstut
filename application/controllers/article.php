<?php


class Article extends Frontend_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('article_m');
$this->data['recent_news']=$this->article_m->get_recent();
    }

    public function index($id,$slug)
    {
//fetch the article
        $this->load->model('user_m');
        $this->data['cur_art_id'] = $id;
        $this->data['adminuser'] = $this->user_m->loggedin();
        $this->db->where('pubdate<=',date('Y-m-d'));
        //$this->$article->set_published();//

        $this->data['article']=$this->article_m->get($id);
        //var_dump($this->data['article']);
count ($this->data['article'])||show_404(uri_string());
      //404 if not found
//redirect if slug was no good
$requested_slug =$this->uri->segment(3);
        $article = $this->data['article'];
        $set_slug = $article->slug;
if($set_slug!=$requested_slug){
    redirect('article/'.$article->id.'/'.$article->slug,'location','301');
}
//loadview

$this->data['subview']='article';

        //echo "Artikkelit! hei!";
        //$title = "Atrikkeli";

        $this->kasaaPerusSivu("Artikkeli:");

    }
}