<?php
include('connection.php');
$album_id = $_GET['artist_id'];
$select_songs_albums = "SELECT * FROM `tbl_music` INNER JOIN `tbl_artist` ON (tbl_music.artistname = tbl_artist.id) WHERE tbl_music.album='$album_id'";
$select_songs_albums_run = mysqli_query($con,$select_songs_albums);
if($select_songs_albums_run){
    echo "<script>alert('success')</script>";
}
else{
    echo "<script>alert('failed')</script>";

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description" content="Poca - Podcast &amp; Audio Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="./img/core-img/favicon.ico">

  <link rel="stylesheet" href="style.css">
    <title>Albums</title>
    <style>
    .likebtn{
    color:#A6A6A6;
   background-color:transparent;
    border: none;
  }
  .likebtn:hover{
    color:#f55656;
   background-color:transparent;
    border: none;
  }
</style>

</head>
<body>
<div id="preloader">
<div class="preloader-thumbnail">
<img src="./img/core-img/preloader.png" alt="">
</div>
</div>

  <header class="header-area">

    <div class="main-header-area">
      <div class="classy-nav-container breakpoint-off" style="background-color:black;color:white;" >
      <nav class="classy-navbar justify-content-center" >

<a class="nav-brand" href="index.html"><img src="logo.png" width="200px" alt=""></a>

<div class="classy-navbar-toggler">
<span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<div class="classy-menu">

<div class="classycloseIcon">
<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
</div>

<div class="classynav">
<ul id="nav">
<li class="current-item"><a href="./index.php">Home</a></li>
<li><a href="./about.html">About</a></li>
<li><a href="./contact.html">Contact</a></li>
<li><a href="">Pages</a>
<ul class="dropdown">
  <li><a href="">Empty page</a></li>
  <li><a href="">Empty Page</a></li>
  <li><a href="">Empty page</a></li>
</ul>

</li>
</ul>


<div class="top-search-area">
<form action="index.html" method="post">
<input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>

<div class="top-social-area">
  <?php include('connection.php');
  

if(!isset($_SESSION['first_id'])){ ?>
<div class="welcome-btn-group">

  <a href="login.php"  class="btn poca-btn m-2 ml-0 active" data-animation="fadeInUp" data-delay="500ms" style="color:#fff !important;">LOG IN</a>
</div>
<?php
}
else{
  $id = $_SESSION['first_id'];
  $select_query = "SELECT * FROM `tbl_user` WHERE `id` = '$id'";  
  $select_query_run = mysqli_query($con , $select_query);
  $array = mysqli_fetch_array($select_query_run);
   ?>
<a href="id.php?id=<?php echo $array['id'] ?>" class="text-decoration-none" aria-hidden="true"><img class="rounded" width="50" src="<?php echo './profilepic/'.$array['p_pic'] ?>" alt=""></a>
<a href="id.php?id=<?php echo $array['id'] ?>" class="text-decoration-none fs-5" aria-hidden="true"><?php echo $array['uname']  ?></a>
<a href="logout.php?id=<?php echo $array['id']; ?>" class="btn poca-btn active" style="color:#fff !important;">LOG OUT</a>
<?php } ?>
</div>
</div>

</div>
</nav>

      </div>
    </div>
  </header>


  <section class="" style="margin-top:8rem;" >
<div class="container">
    <?php while($rel_songs = mysqli_fetch_array($select_songs_albums_run)){ ?>
        <div class="poca-featured-music-area mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="poca-music-area box-shadow d-flex align-items-center flex-wrap border" data-animation="fadeInUp" data-delay="900ms">
                            <div class="poca-music-thumbnail">
                                <img src="./admin/<?php echo $rel_songs['music_banner'] ?> " alt="">
</div>
<div class="poca-music-content">
<span class="music-published-date"><?php echo $rel_songs['date'];?></span>
<h2><?php echo $rel_songs['music_title'];?></h2>
<div class="music-meta-data">
<p>By <a href="#" class="music-author"><?php echo $rel_songs['artist_name'] ?></a> | <a href="#" class="music-catagory"><?php echo $rel_songs['artist_category']?></a> </p>
</div>

<div class="poca-music-player">
<audio preload="auto" controls>
<source src="./admin/<?php echo $rel_songs['music_file'] ?>">
</audio>
</div>

<div class="likes-share-download d-flex align-items-center justify-content-between">
    <form action="favourites.php" method="post">
        <button class="likebtn" type="submit" onclick="return confirm('This songs is added to your favourites')"><i class="fa fa-heart" aria-hidden="true"></i>Like</button>
        <input type="hidden" name="id" value="<?php echo $alldata['id'] ?>">
        <input type="hidden" name="music_file" value="<?php echo $alldata['music_file'] ?>">
        <input type="hidden" name="music_name" value="<?php echo $alldata['music_title'] ?>">

          </form>
          <div>
<a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
<a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</section>
<script src="js/jquery.min.js"></script>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/poca.bundle.js"></script>

<script src="js/default-assets/active.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7bd7b18a19804d87","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>