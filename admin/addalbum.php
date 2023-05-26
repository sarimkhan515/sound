<?php
include('../connection.php');
$select_artist = "SELECT * FROM `tbl_artist`";
$select_artist_run = mysqli_query($con,$select_artist);
if(isset($_POST['submitbtn'])){
    $album_name = $_POST['album'];
    $artist_name = $_POST['artist'];
    $insert_query = "INSERT INTO `tbl_album`(`album`, `artistname`) VALUES ('$album_name','$artist_name')";
    $insert_query_run = mysqli_query($con,$insert_query);
    echo "<script>alert('Album Inserted')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php include('navbar.html')?>
    <div class='container'>
    <h2 class='text-center mt-5 '>ADD ALBUM</h2>

<form method="post" >
    <label for="">ALBUM: </label>
        <input class="form-control" type="text" name="album"><br>
        <label for="">ARTIST: </label>
        <select name="artist" class="form-control">
            <?php while($artist = mysqli_fetch_array($select_artist_run)){ ?>
            <option value="<?php echo $artist['id'] ?>"><?php echo $artist['artist_name'] ?></option>
           <?php } ?>
        </select><br>
      
        
<input type="submit" class="btn btn-dark px-5" name="submitbtn" value="submit">
    </form>
    </div>
</body>
</html>