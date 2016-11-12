<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use GuzzleHttp\Client;
use ApaiIO\Request\GuzzleRequest;

class Http_Factory
{
    public static function build(): GuzzleRequest
    {
        return new GuzzleRequest(new Client);
    }
}
