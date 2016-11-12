<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Request\GuzzleRequest as Http;

/**
*
*/
class Amazon_Api_Factory
{
    public function __construct(GenericConfiguration $config, Http $http)
    {
        $this->Config = $config;

        $this->Http = $http;
    }

    public function build()
    {
        $this->Config
             ->setCountry('com')
             ->setAccessKey('')
             ->setSecretKey('')
             ->setAssociatetag('')
             ->setRequest($this->Http);

        return new ApaiIO($this->Config);
    }
}
