<?php

class Paging {
    public $limit, $offset;
    public $next, $previous;

    /**
     * Constructor
     * 
     * @param integer $page Page number
     * @param integer $article_per_page number article per page
     */
    public function __construct($page, $article_per_page, $total_pages) {
        $this->limit = $article_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            "option" => [
                "default" => 1,
                "min_range" => 1
            ]
        ]);

        $this->offset = $article_per_page * ($page - 1);
    
        $this->next = $page + 1;
        $this->previous = $page - 1;
    }
}