
<?php

class Page_M extends MY_Model
{
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'parent_id,order';

    protected $_timestamps = FALSE;
    protected $_title = '';
    protected $_body= '';
    protected $_order= '';
    public $rules = array(
        'parent_id' => array(
            'field' => 'paren_id',
            'label' => 'Parent',
            'rules' => 'trim|intval'
        ),
        'template' => array(
            'field' => 'template',
            'label' => 'Template',
            'rules' => 'trim|required'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'
        ),

        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|url_title|max_length[100]|callback_unique_slug'
        ),



        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'
        ),

    );

    public function get_archive_link(){
       $page=parent::get_by(array('template'=>'news_archive'),TRUE);//TRUE=hae vain yksi
        return isset($page->slug)?$page->slug:'' ;
    }
    public function delete($id){
        //Delete a page
        parent::delete($id);
        //Reset parent id for children
        $this->db->set(array('parent_id'=>0))->where('parent_id',$id)
            ->update($this->_table_name);



    }
    //************************
    public function save_order($pages){
if(count($pages)){
    foreach($pages as $order=>$page){
       if($page['item_id'] != '')
       {
            $data=array('parent_id'=>(int)$page['parent_id'],'order'=>$order);
$this->db->set($data)->where($this->_primary_key,$page['item_id'])->update($this->_table_name);
//echo $this->db->last_query();



       }


    }
}

    }
    //***************************
    function get_new(){
        $page = new stdClass();
        $page ->title = '';
        $page -> slug= '';
        $page -> order= '';
        $page -> body= '';
        $page -> template= 'page';
        $page -> parent_id= 0;
        return $page;
    }
public function get_no_parents(){
    //palauta sivut jotka on ilman parenttia
    //palauta key=>value pair array
$this->db->select('id,title');
    $this->db->where('parent_id',0);
    $pages=parent::get();
$array = array(0=>'No parent');
    if(count($pages))
    {
        foreach($pages as $page)
        {
            $array[$page->id]=$page->title;
        }
    }
return $array;
}
public function get_with_parent($id=null,$single=false){
    $this->db->select('pages.*,p.slug as parent_slug,p.title as parent_title');
    $this->db->join('pages as p','pages.parent_id=p.id','left');
    return parent::get($id,$single);
}
function get_nested(){
    $this->db->order_by($this->_order_by);
    $pages=$this->db->get('pages')->result_array();

    $array = array();
    foreach($pages as $page){
        if(!$page['parent_id']){

            $array[$page['id']]=$page;

        }
        else{
            $array[$page['parent_id']]['children'][]=$page;

        }

    }
return $array;
}
//********end class
}