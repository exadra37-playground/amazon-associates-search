<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require __DIR__.'/../bootstrap/boot.php';

$amazon = Exadra37_Php7\Search_Amazon\Factories\Demo_Search_Factory::build();

$amazon->search('php books');
