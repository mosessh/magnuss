<?php
require_once "magnusBilling.php";



$magnusBilling             = new MagnusBilling('386c71c92b1c021402efd293fd4b3fd0', '5a4ae0c1178f001b001e29c9b7a15a1f');

$magnusBilling->public_url = "http://102.67.155.213/mbilling"; // Your MagnusBilling URL

//set filter to find data that have credit > 10, type numeric.
$magnusBilling->setFilter('sessionbill', '1', 'gt', 'numeric');
//you can set multiple filter: ex
$magnusBilling->setFilter('sessionbill', '5', 'lt', 'numeric');

//above filter will find per credit > 10 and < 50

//execute the read method on user medule
$result = $magnusBilling->read('call');

print($result);