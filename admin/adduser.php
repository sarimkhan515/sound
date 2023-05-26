<?php 
include('../connection.php');

if(isset($_POST["submitbtn"])){
    $name = $_POST['Name'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = mysqli_query($con , "SELECT * FROM `tbl_user` WHERE firstname = '$name' OR email = '$email'");
    if(mysqli_num_rows($query) > 0){
        echo "<script> alert('Username or Email has already been taken')</script>";
    }
    else{
        $queryinsert = "INSERT INTO `tbl_user`(`firstname`, `lastname`, `email`, `password`) VALUES ('$name','$lname','$email','$password')";
        mysqli_query($con , $queryinsert);
        echo "<script> alert('User Added Successfully')</script>";  
   }
}
    
    ?>

<html lang="en">
<head>
    <title>Add users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
<style>
.headings{
    font-family: 'Noto Sans', sans-serif;
}
</style>
</head>

<body>
    <?php include('navbar.html')?>
    <div class="container">
    <h2 class="text-center headings mt-5 ">ADD USERS</h2>
    <form method="post">
                                <div class=" mb-4">
                                    <label for="">First Name: </label>
                                        <input type="text" class="form-control form-control-user"
                                            name="firstname" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Last Name: </label>
                                        <input type="text" class="form-control form-control-user" name="lastname" required>

                                    </div>
                                
                                <div class=" mb-4">
                                <label for="">Email Address: </label>

                                    <input type="email" class="form-control form-control-user" required
                                    name="email" >
                                </div>
                                <div class=" mb-4">
                                    <label for="">Password: </label>
                                    <input type="password" class="form-control form-control-user"
                                    name="pass" required >
                                </div>
                                    <input type="submit" name="submitbtn" class="btn btn-dark px-5 btn-user btn-block" value="Add user">
    </form>



    </div>
</body>
</html>