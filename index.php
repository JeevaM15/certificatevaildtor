<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man 2 Web - Certificate Validator</title>
    <meta name="description" content="MAD Scientist Certificate Validator">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/tabicon.png">
    <link rel="shortcut icon" href="images/tabicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
    
<?php
    include 'connection.php';
    function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,md5($_POST['password']));
	$sql="select * from admin where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
            $_SESSION['ADMIN_LOGIN']='yes';
            $_SESSION['ADMIN_USERNAME']=$username;
            header('location:dashboard.php?success=welcome Admin!');
            
	}else{
		$msg="Please enter correct details";	
	}
	
}
?>
<body class="">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="" style="border-radius:5px">
                    </a>
                </div>
                <div class="login-form">
                <h3><label><b>ADMIN LOGIN</b></label></h3>
                <br>
                    <form method="POST">
                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input type="text" name="username" title="Please enter you username" id="username" required="" value="" class="form-control" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="password" id="password" title="Please enter you passowrd" required="" value="" class="form-control" placeholder="***********">
                        </div>
                        <div id="msg" style="color:red; margin-top:15px;"><?php echo $msg?></div>
						<br>
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Sign in</button>
						<br>
						<br>
						<br>
                        <center><p>Copyright © 2023. All rights reserved. Designed and developed by <a href="#">Man 2 Web Technologies</a></p></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
