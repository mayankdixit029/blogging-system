<?php   include 'connection.php';

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];


$sql = "INSERT INTO contacts (name, email,mobile)
VALUES ('$name', '$email',$mobile)";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>