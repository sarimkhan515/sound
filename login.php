    
<?php
session_start();
include('connection.php');
if(isset($_POST['loginbtn'])){
    $useremail = $_POST['uname'];
    $userpassword = $_POST['upass'];
    $resultant = mysqli_query($con , "SELECT * FROM `tbl_user` WHERE uname = '$useremail' OR email = '$useremail'");
    $row = mysqli_fetch_assoc($resultant);
    if($useremail == "admin1@gmail.com" && $userpassword == "53928" ){
         header('location:./admin/admin_dashboard.php');
    }
    elseif(mysqli_num_rows($resultant) > 0){
        if($userpassword == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION['first_id'] = $row['id'];
            $_SESSION['pfp'] = $row['p_pic'];
            // print_r($_SESSION['first_id']);
            header('location:index.php');
        }
        else{
        echo "<script> alert('Incorrect Password!')</script>";
        }
    }
    else{
        echo "<script> alert('Incorrect Email!')</script>";

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/core-img/favicon.ico">

    <style>
        .form-cont{
           margin-top:20%;
           
        }
        .column{
            /* background-color:#8080802e; */
            background-color:transparent;


        }
        .input{
            border:0;
            border-bottom:2px solid #f55656;
            background:transparent;
        }
        .small:hover{
              color:#f55656;
            border-bottom:2px solid #f55656;

        }
        .back{
            background-image: url(img/bg-img/1.jpg);
            background-position: cover;
            background-repeat: no-repeat;
 
        }
    </style>

</head>
<body class="back">
    <div class="container col-lg-8">
        <div class="row justify-content-center align-items-center form-cont">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="p-5 column">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if(isset($_SESSION['email'])){
                                        $email = $_SESSION['email'];
                                        $password= $_SESSION['password']; ?>
                                        <form method="POST">
                                        <div class="form-group">
                                            <input type="text" name="uname" value="<?php echo $email;?>" class="form-control form-control-user input"
                                                placeholder="Enter Email Address" required>
                                        </div><br>
                                        <div class="form-group">
                                            <input type="password" name="upass" class="form-control form-control-user input"  value="<?php echo $password;?>"
                                                 placeholder="Password" required>
                                        </div><br>
                                        <center>
                                        <input value="Login" type="submit" name="loginbtn"  class="btn poca-btn m-2 ml-0 active text-center">
                                        </center>
                                        
                                    </form>   
                                    <?php } else{
                                        ?>
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="text" name="uname" class="form-control form-control-user input"
                                                placeholder="Enter Email Address" required>
                                        </div><br>
                                        <div class="form-group">
                                            <input type="password" name="upass" class="form-control form-control-user input"
                                                 placeholder="Password" required>
                                        </div><br>
                                        <center>
                                        <input value="Login" type="submit" name="loginbtn"  class="btn poca-btn m-2 ml-0 active text-center">
                                        </center>
                                        
                                    </form>
                                    <?php } ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small fs-6" href="forgotpass.php" style="text-decoration:none;">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small fs-6" href="signup.php" style="text-decoration:none;">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>