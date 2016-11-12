<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use Exadra37_Php7\Search_Amazon\Factories\Http_Factory;

class Amazon_Api_Factory
{
    public static function build(): ApaiIO
    {
        $Config = new GenericConfiguration;

        $Config->setCountry('com')
               ->setAccessKey('')
               ->setSecretKey('')
               ->setAssociatetag('')
               ->setRequest(Http_Factory::build());

        return new ApaiIO($Config);
    }
}
