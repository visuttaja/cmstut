<?php

class Article_M extends MY_Model
{

    protected $_table_name = 'articles';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'pubdate desc, id desc';

    protected $_timestamps = TRUE;
    protected $_title = '';
    protected $_body = '';
    protected $_order = '';
    //protected $_modified = '';
    //protected $_created = '';

    public $rules = array(
        'pubdate' => array(
            'field' => 'pubdate',
            'label' => 'Pubdate',
            'rules' => 'trim|callback_date_valid'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'
        ),

        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|url_title|max_length[100]'
        ),


        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'
        ),

    );


    function get_new()
    {
        $article = new stdClass();
        $article->title = '';
        $article->slug = '';
        $article->order = '';
        $article->body = '';
        $article->created = '';
        $article->pubdate = date('Y-m-d');
        $article->modified = date('Y-m-d');


        return $article;
    }

    public function set_published()
    {
        //TODO replace all instances of pubdate
        $this->db->where('pubdate<=', date('Y-m-d'));

    }

    public function get_recent($limit = 3)
    {
        $limit = (int)$limit;
        $this->set_published();
        $this->db->limit($limit);
        return parent::get();
    }
}