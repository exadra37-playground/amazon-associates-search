<?php

namespace Exadra37_Php7\Search_Amazon;

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Search;
use ApaiIO\ApaiIO as Amazon_Api;

class Demo_Search
{
    public function __construct(Amazon_Api $Amazon_Api)
    {
        $this->Amazon_Api = $Amazon_Api;
    }

    public function search($term)
    {

        echo $term;
    }
}