<?php  include '../connections/connection.php';


$sql = "SELECT id, name, email,mobile FROM contacts";
$result = $conn->query($sql);




?>