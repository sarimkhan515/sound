<?php 
session_start();
include('connection.php');
if(isset($_POST['ratings'])){
$rating_value = $_POST['ratings']; 
$_SESSION['rating'] = $rating_value;
}
if(isset($_POST['click'])){
    $hidden_id = $_POST['id'];
    $message = $_POST['user_message'];
    $name = $_SESSION["username"];
    $profile_picture = $_SESSION["profilepicture"];
    $rating = $_SESSION['rating']; 
    $date = date('Y-m-d');
    $insertquery ="INSERT INTO `tbl_reviews`( `date`, `name`, `message`, `video_id`, `rating`, `pfp`) VALUES ('$date','$name','$message','$hidden_id','$rating','$profile_picture')";   
    $insertquery_run = mysqli_query($con,$insertquery);

}

if(isset($_POST['hidden_id'])){
    $id = $_POST['hidden_id'];
    $_SESSION['id'] = $id;  
}
$ids = isset($_SESSION['id']);
$selectquery = "SELECT * FROM `tbl_reviews` WHERE `video_id` = '$ids' LIMIT 5";
$selectquery_run = mysqli_query($con,$selectquery);
?>
<html lang="en">
<head>
    <title>Reviews</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <style>
        .checked{
            color: orange ;
        }
    </style>

</head>
<body>
    
    <?php if (mysqli_num_rows($selectquery_run) > 0) {?>
<div id="review_rating" class="comment_area mb-50 clearfix">
<h5 class="title"> <?php echo mysqli_num_rows($selectquery_run)?> Comment</h5>


<ol>
<?php while($reviews = mysqli_fetch_array($selectquery_run)) {?>
    <?php if (isset($_SESSION['login'])) {?>
        <input type="hidden" id="id_hidden" value="<?php echo $reviews['id']?>"> 
        <?php }?>
        <li class="single_comment_area">
            
            <div class="comment-content d-flex">
                
                
                <div class="comment-author">
                    <img src="<?php echo './profilepic/'.$reviews['pfp'];?>" alt="author">
                </div>
                
                

                <div class="comment-meta">  
                <?php if (isset($_SESSION['login'])) {?>

    <button type="button" id="ID_edit" style="border:none;background:none; outline:none; color:black; "> <i class="fa fa-pencil"></i> </button>
<?php }?>    

<p href="#" class="post-date"><?php echo $reviews['date']?></p>
<h5><?php echo $reviews['name']?></h5>
<p><?php echo $reviews['message']?></p>
<div>
    <?php if($reviews['rating'] == '5') {?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<?php }?>

<?php if($reviews['rating'] == '4') {?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<?php }?>

<?php if($reviews['rating'] == '3') {?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<?php }?>

<?php if($reviews['rating'] == '2') {?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<?php }?>

<?php if($reviews['rating'] == '1') {?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<?php }?>

<?php if($reviews['rating'] == 0) {?>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<?php }?>

</div>
</div>
</div>
</li>
<?php }}?>
<li id="list">

</li>

</ol>


</div>
<!-- <div class="contact-form mt-5" style="display:none;"  id ="review_form">
<h5 class="mb-30">Edit Your Review</h5>

<form action="#" method="post">
  <div class="row">
    <div class="col-12">
      <textarea name="message" id='ID_message_input' class="form-control mb-20" placeholder="Comment"></textarea>
    </div>
    <div class="col-12 mt-5 ">
  <h5 class="mb-30">Edit Your Rating</h5>
  
        <div class="rating ">
            <input type="radio" name="star" onclick="starFunction('5')" value="5" id="star5"><label for="star5"></label>
            <input type="radio" name="star" onclick="starFunction('4')" value="4" id="star4"><label for="star4"></label>
            <input type="radio" name="star" onclick="starFunction('3')" value="3" id="star3"><label for="star3"></label>
            <input type="radio" name="star" onclick="starFunction('2')" value="2" id="star2"><label for="star2"></label>
            <input type="radio" name="star" onclick="starFunction('1')" value="1" id="star1"><label for="star1"></label>
		</div>
		
</div>
<div class="col-12">
<button type="button" id='submitbtn' class="btn poca-btn mt-40">Post Comment</button>
</div>


</div>
</form>
</div> -->

    


<script src="js/jquery.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7bd7b19b6ffc4d87","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        //  document.getElementById("ID_edit").onclick(function(){
        //     document.getElementById('review_rating').style.display = "none"
        //     document.getElementById('review_form').style.display = "block"

        //  })
$(document).ready(function(){

    dataEdited();
    function dataEdited(){
        $.ajax({
            url:'edit_reviews.php',
            type:'post',
            success:function(data){
                $('#list').html(data)
            }
        })
    }

    $('#ID_edit').click(function(){
    
       var hidden = $('#id_hidden').val();
       alert(hidden)
        $.ajax({
            url:'edit_reviews.php',
            type:'post',
            data:{
                update: 1;
                hidden_id: hidden
            },
            success:function(){
                dataEdited()
            }
        })
    })
})
</script>
</body>
</html>