<?php

namespace App;

class Data {

    /**
     * Post ID
     *
     * @var int
     */
    private $postID;

    /**
     * Display comments
     *
     * @var bool
     */
    private $displayComments;

    /**
     * Parse JSON as array or object
     *
     * @var bool
     */
    private $displayArr;

    public function __construct(int $postID = null, bool $displayComments, bool $displayArr){
        $this->postID = $postID;
        $this->displayComments = $displayComments;
        $this->displayArr = $displayArr;
    }

    /**
     * Sample function to display CLI data
     *
     * @return array
     */
    public function displayData(){
        return [
            'postID'=>$this->postID,
            'displayComments'=> $this->displayComments,
            'displayArr'=>$this->displayArr
        ];
    }

    /**
     * Send data to a sample API and return a response
     *
     * @return array|object
     */
    public function getAPI(){
        $apiURL = 'https://jsonplaceholder.typicode.com/posts';
        $postID = ($this->postID != 0 ? '/'.$this->postID : '');
        $displayComments = ($this->displayComments ? '/comments' : '');
        $json = file_get_contents($apiURL.$postID.$displayComments);
        $res = ($this->displayArr === true ? json_decode($json, true) : $json);
        return $res;
    }
}