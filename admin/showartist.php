<?php
include('../connection.php');
$query = "SELECT * FROM `tbl_artist`";
$query_run = mysqli_query($con , $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <?php include('navbar.html')?>
  <div class="container-fluid mt-3">

<table class="table table-dark text-center table-bordered table-hover">
  <thead> 
    <tr>
      <th scope="col">ID</th>
      <th scope="col">artistname</th>
      <th scope="col">ARTIST TYPE</th>
      <th scope="col">DELETE ARTIST</th>

    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($query_run)) { ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['artistname'];?></td>
      <td><?php echo $row['artist category'];?></td>

    
      <td><a href="deleteartist.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete Artist</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>