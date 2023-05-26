<?php
include('../connection.php');
$query = "SELECT * FROM `tbl_album` INNER JOIN `tbl_artist` ON tbl_album.artistname=tbl_artist.id ";
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

<table class="table table-dark table-bordered table-hover">
  <thead> 
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ALBUM NAME</th>
      <th scope="col">artistname</th>
      <th scope="col">DELETE ALBUM</th>


    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($query_run)) { ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['album'];?></td>
      <td><?php echo $row['artist_name'];?></td>

      <td><a href="deletealbum.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete Album</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>