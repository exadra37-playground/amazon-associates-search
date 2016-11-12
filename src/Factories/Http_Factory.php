<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use GuzzleHttp\Client;
use ApaiIO\Request\GuzzleRequest;

class Http_Factory
{
    public function build()
    {
        return new GuzzleRequest(new Client);
    }
}
