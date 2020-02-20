<?php include 'connection.php';

$id=$_GET['delete'];

$sql="DELETE FROM contacts WHERE id='$id'";
if($conn->query($sql))
{
    echo "Record successfully Deleted";
        header('location:index.php');
}
else
{
    echo "Error deleting record".$conn->error;
}


?>
