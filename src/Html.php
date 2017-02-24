<?php

namespace Exadra37_Php7\Search_Amazon;

use ApaiIO\ResponseTransformer\ResponseTransformerInterface;

class Html implements ResponseTransformerInterface
{
    public function transform($response)
    {
        $xml =  simplexml_load_string($response);

        $xml->registerXPathNamespace("amazon", "http://webservices.amazon.com/AWSECommerceService/2013-08-01");

        $elements = $xml->xpath('//amazon:ItemSearchResponse/amazon:Items/amazon:Item');

        return $elements;
    }
}
