<?php
include('../connection.php');
if(isset($_POST['submitbtn'])){
    $artist_name  = $_POST['artist_name'];
    $artist_cat = $_POST['artist_cat'];
    $insert_artist = "INSERT INTO `tbl_artist`( `artistname`, `artist_category`) VALUES ('$artist_name','$artist_cat')";
    $insert_run = mysqli_query($con,$insert_artist);
    if($insert_run){
        echo "<script>alert('artist inserted')</script>";
    }
}


?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
    <title>Add Artist</title>
    <style>
        .heading{
            font-family: 'Noto Sans', sans-serif;

        }
    </style>
</head>
<body>
    <?php include('navbar.html')?>  
    <h2 class='text-center mt-5 heading'>ADD ARTIST</h2>
    <div class="container">
    <form method="post">
        <label for="">artistname: </label>
        <input class="form-control" type="text" name="artist_name"><br>
        <label for="">ARTIST CATEGORY: </label>
        <input class="form-control" type="text" name="artist_cat"><br>
        <input type="submit"  class='btn btn-dark px-5' name='submitbtn'>
    </form>
    </div>
</body>
</html>