<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use Exadra37_Php7\Search_Amazon\Demo_Search;
use Exadra37_Php7\Search_Amazon\Factories\Amazon_Api_Factory;

class Demo_Search_Factory
{
    public static function build(): Demo_Search
    {
        return new Demo_Search(Amazon_Api_Factory::build());
    }
}
