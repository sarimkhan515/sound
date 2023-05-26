<?php
include('../connection.php');
$select_artist = "SELECT * FROM `tbl_artist`";
$select_artist_run = mysqli_query($con,$select_artist);
$select_artist_category = "SELECT * FROM `tbl_artist`";
$select_artist_category_run = mysqli_query($con,$select_artist_category);
$select_album = "SELECT * FROM `tbl_album`";
$select_album_run = mysqli_query($con,$select_album);
if(isset($_POST['submit'])){
    $artist_name = $_POST['artist'];
    $title = $_POST['title'];
    $music_banner = $_FILES['music_banner']['name'];
    $music_banner_tmp = $_FILES['music_banner']['tmp_name'];
    $banner_path = './musicbanner/' .  $music_banner;
    move_uploaded_file($music_banner_tmp,$banner_path);
    $music_file = $_FILES['music_file']['name'];
    $music_file_tmp = $_FILES['music_file']['tmp_name'];
    $file_path = './musicfiles/' .  $music_file;
    move_uploaded_file($music_file_tmp,$file_path);
    $video_file = $_FILES['video_file']['name'];
    $video_file_tmp = $_FILES['video_file']['tmp_name'];
    $video_path = './musicvideo/' .  $video_file;
    move_uploaded_file($video_file_tmp,$video_path);
    $date = $_POST['date'];
    $album = $_POST['album'];
    $artist_category = $_POST['artist_category'];
    $insert_query = "INSERT INTO `tbl_music`( `music_title`, `artistname`, `music_banner`, `music_file`, `date`, `album`, `artist_category`) VALUES ('$title','$artist_name','$banner_path','$file_path','$date','$album','$artist_category');
    INSERT INTO `tbl_video`(`date`,`music_name`, `video_file`, `artistname`, `album`) VALUES ('$date','$title','$video_path','$artist_name','$album')";
    $insert_query_run = mysqli_multi_query($con , $insert_query);
    // $insert_video = "INSERT INTO `tbl_video`(`date`,`music_name`, `video_file`, `artist`, `album`) VALUES ('$date','$title','$video_path','$artist_name','$album')";
    // $insert_video_run = mysqli_query($con , $insert_video);
    if($insert_query_run){
        echo "<script>alert('Music inserted')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
    <title>Add Music</title> 
    <style>
        .heading{
                    font-family: 'Noto Sans', sans-serif;
                    /* font-weight:bold; */
        }
    </style>
</head>
<body>
        <?php include('navbar.html')?>
    <h2 class="text-center heading mt-5">ADD MUSIC</h2>
    <div class="container mt-3">
    <form method="post" enctype="multipart/form-data">
 
        <label for="">MUSIC TITLE: </label>
        <input class="form-control" type="text" name="title"><br>
        <label for="">MUSIC BANNER: </label>
        <input class="form-control" type="file" name="music_banner"><br>
        <label for="">MUSIC FILE: </label>
        <input class="form-control" type="file" name="music_file"><br>
        <label for="">VIDEO FILE: </label>
        <input class="form-control" type="file" name="video_file"><br>
        <label for="">DATE: </label>
        <input class="form-control" name="date" type="date"/><br>
        <label for="">ARTISTS: </label>
        <select name="artist" class="form-control">
            <?php while($artist = mysqli_fetch_array($select_artist_run)){ ?>
            <option value="<?php echo $artist['id'] ?>"><?php echo $artist['artistname'] ?></option>
           <?php } ?>
        </select><br>
        <label for="">ARTISTS CATEGORY: </label>
        <select name="artist_category" class='form-control'>
            <?php while($artist_cat = mysqli_fetch_array($select_artist_category_run)) {?>
            <option value="<?php echo $artist_cat['id'];?>"><?php echo $artist_cat['artist_category']?></option>
            <?php }?>
        </select><br>
        <label for="">ALBUM: </label>
        <select name="album" class='form-control'>
            <?php while($album = mysqli_fetch_array($select_album_run)) {?>
            <option value="<?php echo $album['id'];?>"><?php echo $album['album']?></option>
            <?php }?>
        </select><br>
      
       <input type="submit" class="btn btn-dark px-5 mb-2" name="submit" value="submit">
    </form>
    </div>



</body>
</html>