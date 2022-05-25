
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


require_once "magnusBilling.php";



$magnusBilling             = new MagnusBilling('386c71c92b1c021402efd293fd4b3fd0', '5a4ae0c1178f001b001e29c9b7a15a1f');
$magnusBilling->public_url = "http://102.67.155.213/mbilling"; // Your MagnusBilling URL

//read data from user module
$result =$magnusBilling->read('call');
 $serialized_data = serialize($result);
 $sql = "INSERT INTO voip (id, id_plan, id_trunk, id_prefix) value ('{$serialized_data}', NOW())";
mysqli_query($conn, $sql);
?>