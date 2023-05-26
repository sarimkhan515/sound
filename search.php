<?php
include('connection.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="description" content="Poca - Podcast &amp; Audio Template">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Poca - Podcast &amp; Audio Template</title>
        <link rel="icon" href="./img/core-img/favicon.ico">
        <link rel="stylesheet" href="style.css">
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7bd7b18a19804d87","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
          
            .img{
              height:100%;
              width:100%;
            }
            .back{
            background-image: url(img/bg-img/1.jpg);
            background-position: cover;
            background-repeat: no-repeat;
 
        }
        </style>
        </head>
<body class="back">
<div id="preloader">
<div class="preloader-thumbnail">
<img src="./img/core-img/preloader.png" alt="">
</div>
</div>

  <header class="header-area">

    <div class="main-header-area">
      <div class="classy-nav-container breakpoint-off">
<?php include('nav.php');?>

      </div>
    </div>
  </header>



    <?php

if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $search_query = "SELECT * FROM `tbl_music` INNER JOIN `tbl_artist` ON (tbl_music.artistname = tbl_artist.id) WHERE music_title LIKE  '%$search%' or tbl_artist.artist_name LIKE '%$search%' or tbl_artist.artist_category LIKE  '%$search%' ";
    $result = mysqli_query($con , $search_query);
    if($result){
       if(mysqli_num_rows($result) > 0){
        echo '<div class="container">';
        while($card = mysqli_fetch_assoc($result)){
      echo '    <div class="container cont-music">
      <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
          <div class="poca-music-thumbnail">
             <img src= "./admin/'.  $card['music_banner']  .'" alt="img" class="img">
          </div>
          <div class="poca-music-content">
             <span class="music-published-date">'.  $card['date'].'</span>
              <h2>'.  $card['music_title'] .'</h2>
              <div class="music-meta-data">
                  <p>By <a href="#" class="music-author">'.  $card['artist_name'] .'</a> | 
                  <a href="#" class="music-duration">00:02:56</a></p>
              </div>
          
              <div class="poca-music-player">
                <audio preload="auto" controls>
                   <source src=" ./admin/'.  $card['music_file'] .'">
                </audio>
              </div>
          
             <div class="likes-share-download d-flex align-items-center justify-content-between">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
               <div>
                       <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                        <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
               </div>
             </div>
          </div>
      </div>
     
      </div>';}
      
       }    
       else{
        echo "<script>alert('data not found')</script>";
      }

    }


}

?>


<footer class="footer-area section-padding-80-0 bg-light">
    
      <div class="row">

        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">

            <h4 class="widget-title">About Us</h4>
            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
            <div class="copywrite-content">
              <p>&copy;

                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">

            <h4 class="widget-title">Categories</h4>

            <nav>
              <ul class="catagories-nav">
                <li><a href="#">Entrepreneurship</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="#">Tech</a></li>
                <li><a href="#">Tutorials</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">

            <h4 class="widget-title">Lastest Episodes</h4>

            <div class="single-latest-episodes">
              <p class="episodes-date">December 9, 2018</p>
              <a href="#" class="episodes-title">Episode 205 - See Ya In Three!</a>
            </div>

            <div class="single-latest-episodes">
              <p class="episodes-date">December 8, 2018</p>
              <a href="#" class="episodes-title">Episode 204 - See Ya In Two!</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">

            <h4 class="widget-title">Follow Us</h4>

            <div class="footer-social-info">
              <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
            </div>

            <div class="app-download-button mt-30">
              <a href="#"><img src="./img/core-img/app-store.png" alt=""></a>
              <a href="#"><img src="./img/core-img/google-play.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>

  </footer>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/poca.bundle.js"></script>
<script src="js/default-assets/active.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>