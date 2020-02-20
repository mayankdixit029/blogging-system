
<?php  include 'connection.php'; ?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <title>Group Creation</title>
  </head>
  <body style="margin-top:100px;">
      <h1  style="margin-left: 460px;"><b>All Groups</b></h1><br>

<a href="/group.php"><button style="margin-left: 660px;"class=" btn btn-primary mb-2 ">Add New Groups</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr. No.</th>
<th>Group Name</th>

<th>Action</th>
</tr>
<?php 
$sql = "SELECT id,name FROM groups ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
      <tr>
           <td>
                 <?php
                     echo "$row[id]";
                     ?>
              </td>
              <td>
          <?php
                   echo "$row[name]";
              ?>
         </td>
   
         <td>
    <a href="/editgroup.php?edit=<?php echo "$row[id];"?>"><button class="btn btn-warning">Edit</button></a>
        </td>
        <td>
        <form method="POST" action="/deletegroup.php?delete=<?php echo "$row[id];"?>">
  
        <button class="btn btn-danger">Delete</button>
  
         </form>
          
          <?php
    }
} 
else {
   
  echo "0 results";
  
}?>
</table>
 
</body>
</html>