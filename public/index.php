<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require __DIR__.'/../bootstrap/boot.php';

try {

    $amazon = Exadra37_Php7\Search_Amazon\Factories\Demo_Search_Factory::build();

    $search_term = 'Php Books';
    $category = 'Books';

    $response = $amazon->search($search_term, $category);

} catch (Exception $exception) {

    echo "Exception: ". $exception->getResponse()->getBody()->getContents();
}
