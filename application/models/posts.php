<?php

class Posts extends MY_Model {
    
    const DB_TABLE = 'posts';
    const DB_TABLE_PK = 'postID';
    /*
    * post unique identifier
      @var int
    */
    public $postID;
    /*
    * post title
      @var string
    */
    public $title;
    /*
    * post text
      @var string
    */
    public $post;
    /*
    * post date
      @var timestamp
    */
    public $date_added;
    /*
    * post user id
      @var int
    */
    public $userID;
    /*
    * post active
      @var int
    */
    public $active;
}