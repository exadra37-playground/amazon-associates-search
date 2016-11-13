<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$url = "http://webservices.amazon.co.uk/onca/xml?AWSAccessKeyId=AKIAJ4DGSKLONNFEEZ4Q&AssociateTag=exadra37com-21&Keywords=python%20books&Operation=ItemSearch&ResponseGroup=Images%2CItemAttributes%2COffers&SearchIndex=All&Service=AWSECommerceService&Timestamp=2016-11-12T16%3A18%3A18.000Z&Signature=uNzjlq9Lcyguwt0%2FxitChrJS3ap7paRgfzhFFNQDeMU%3D";

echo file_get_contents($url);
