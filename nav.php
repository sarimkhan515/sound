
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="./img/core-img/favicon.ico">
<link rel="stylesheet" href="style.css">
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




<nav class="classy-navbar justify-content-center" id="pocaNav">

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
<li><a href="./albums.php">Albums</a></li>
<li><a href="./about.html">About</a></li>
<li><a href="./contact.html">Contact</a></li>

</ul>


<div class="top-search-area">
<form action="search.php" method="post">
<input type="search" name="search" class="form-control" placeholder="Search and hit enter...">
<!-- <input type="submit" value="Search" name="submit"> -->
<button name="submit"> <i class="fa fa-search" ></i> </button>
</form>
</div>

<div class="top-social-area">
  <?php include('connection.php');
  

if(!isset($_SESSION['first_id'])){ ?>
<div class="welcome-btn-group">

  <a href="login.php" class="btn poca-btn active" data-animation="fadeInUp" data-delay="500ms" style="color:#fff !important;">LOG IN</a>
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
<a href="logout.php?id=<?php echo $array['id']; ?>" class="btn poca-btn active"  style="color:#fff !important;">LOG OUT</a>
<?php } ?>
</div>
</div>

</div>
</nav>

