<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// Your AWS Access Key ID, as taken from the AWS Your Account page
$aws_access_key_id = "AKIAJ4DGSKLONNFEEZ4Q";

// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
$aws_secret_key = "eLzU+1L1fdXrxGHPihsKEMejmE+nir2D0dY8y6PR";

// The region you are interested in
$endpoint = "webservices.amazon.co.uk";

$uri = "/onca/xml";

$params = array(
    "Service" => "AWSECommerceService",
    "Operation" => "ItemSearch",
    "AWSAccessKeyId" => "AKIAJ4DGSKLONNFEEZ4Q",
    "AssociateTag" => "exadra37com-21",
    "SearchIndex" => "All",
    "Keywords" => "python books",
    "ResponseGroup" => "Images,ItemAttributes,Offers"
);

// Set current timestamp if not set
if (!isset($params["Timestamp"])) {
    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
}

// Sort the parameters by key
ksort($params);

$pairs = array();

foreach ($params as $key => $value) {
    array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
}

// Generate the canonical query
$canonical_query_string = join("&", $pairs);

// Generate the string to be signed
$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

// Generate the signature required by the Product Advertising API
$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

// Generate the signed URL
$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

//echo "Signed URL: \"".$request_url."\"";

echo file_get_contents($request_url);

