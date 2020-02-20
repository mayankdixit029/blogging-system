<?php   include 'connection.php';

$groupname=$_POST['groupname'];

$sql="INSERT INTO groups (name)
VALUES ('$groupname')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('location:groupindex.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>