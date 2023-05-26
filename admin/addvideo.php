<?php
include('../connection.php');
$select_artist = "SELECT * FROM `tbl_artist`";
$select_artist_run = mysqli_query($con,$select_artist);
$select_album = "SELECT * FROM `tbl_album`";
$select_album_run = mysqli_query($con,$select_album);

if(isset($_POST['submit_video'])){
    $music_name = $_POST['music_name'];
    $video_file = $_FILES['video_file']['name'];
    $video_file_tmp = $_FILES['video_file']['tmp_name'];
    $date = $_POST['input_date'];
    $video_path = './musicvideo/' .  $video_file;
    move_uploaded_file($video_file_tmp,$video_path);
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $insert_video = "INSERT INTO `tbl_video`(`date`,`music_name`, `video_file`, `artist`, `album`) VALUES ('$date','$music_name','$video_path','$artist','$album')";
    $insert_video_run = mysqli_query($con , $insert_video);
    if($insert_video_run){
        echo "<script>alert('video inserted')</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Video</title>
    <style>
        .heading{
                    font-family: 'Noto Sans', sans-serif;
                    /* font-weight:bold; */
        }
    </style>
</head>
<body>
<?php include('navbar.html')?>
<h2 class="text-center heading mt-5">ADD VIDEO</h2>

<div class="container">
    <form method="post" enctype="multipart/form-data">
    <label for="">MUSIC NAME:   </label>
        <input class="form-control" type="text" name="music_name"><br>
        <label for="">MUSIC VIDEO: </label>
        <input class="form-control" type="file" name="video_file"><br>
        <label for="">DATE: </label>
        <input type="date" name='input_date' class='form-control'><br>
        <label for="">ARTISTS: </label>
        <select name="artist" class="form-control">
            <?php while($artist = mysqli_fetch_array($select_artist_run)){ ?>
            <option value="<?php echo $artist['id'] ?>"><?php echo $artist['artistname'] ?></option>
           <?php } ?>
        </select><br>
        <label for="">ALBUM: </label>
        <select name="album" class='form-control'>
            <?php while($album = mysqli_fetch_array($select_album_run)) {?>
            <option value="<?php echo $album['id'];?>"><?php echo $album['album']?></option>
            <?php }?>
        </select>
                <br>

              <input type="submit" class="btn btn-dark px-5 " name="submit_video" value="submit">
    </form>
    </div>

</body>
</html>