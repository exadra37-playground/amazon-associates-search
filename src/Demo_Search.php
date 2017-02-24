<?php

namespace Exadra37_Php7\Search_Amazon;

use ApaiIO\ApaiIO as Amazon_Api;
use ApaiIO\Operations\Search as Amazon_Search;
use ApaiIO\Configuration\GenericConfiguration;

class Demo_Search
{
    private $Amazon_Api;

    private $Amazon_Search;


    public function __construct(Amazon_Api $Amazon_Api, Amazon_Search $Amazon_Search)
    {
        $this->Amazon_Api    = $Amazon_Api;
        $this->Amazon_Search = $Amazon_Search;
    }

    public function search($term, $category)
    {
        $this->Amazon_Search->setCategory($category);
        $this->Amazon_Search->setKeywords($term);

        $response = $this->Amazon_Api->runOperation($this->Amazon_Search);

        return $response;
    }
}
