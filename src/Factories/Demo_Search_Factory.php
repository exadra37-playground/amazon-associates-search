<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use GuzzleHttp\Client;
use ApaiIO\Request\GuzzleRequest;

class Demo_Search_Factory
{
    public static function build()
    {
        $Http_Factory = new \Exadra37_Php7\Search_Amazon\Factories\Http_Factory;
        $Http = $Http_Factory->build();

        $Config = new \ApaiIO\Configuration\GenericConfiguration;

        $Amazon_Api_Factory = new \Exadra37_Php7\Search_Amazon\Factories\Amazon_Api_Factory($Config, $Http);

        $Amazon_Api = $Amazon_Api_Factory->build();

        return new \Exadra37_Php7\Search_Amazon\Demo_Search($Amazon_Api);
    }
}
