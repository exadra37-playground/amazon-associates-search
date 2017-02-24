<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use Exadra37_Php7\Search_Amazon\Demo_Search;
use ApaiIO\Operations\Search as Amazon_Search;
use Exadra37_Php7\Search_Amazon\Factories\Amazon_Api_Factory;

class Demo_Search_Factory
{
    public static function build(): Demo_Search
    {
        $Amazon_Api    = Amazon_Api_Factory::build();

        $Amazon_Search = new Amazon_Search;

        return new Demo_Search($Amazon_Api, $Amazon_Search);
    }
}
