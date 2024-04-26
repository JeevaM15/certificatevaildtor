<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man 2 Web - Add Admin</title>
    <?php include 'header.php';
    if(!isset($_SESSION['ADMIN_USERNAME']))
    {
        echo "<script>window.location.href='index.php?error=your session has been expired'</script>";
    }
    ?>
    <pre>
    
    </pre>
    <?php
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql="insert into admin (name,username,password,status) values ('$name','$username','$password','1')";
        $sql_run=mysqli_query($con,$sql);
        if($sql_run)
        { ?>
           <center><div class="col-lg-6"> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Admin Added sucessfylly!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
               </div></div></center>
        <?php }
        else
        {?> 
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Error</span>
                                        Error Try Again!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
       <?php }
    }
    ?>
    
    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Admin</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">User Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="username" name="username" placeholder="User Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" >
                                        </div>
                                    </div><center>
                                    <button id="payment-button" type="submit" name="submit" class="btn btn-info">
                                    Submit
                                    </button></center>
                                </form>
                            </div>
                        </div>
                    </div>
    <pre>
    
    </pre>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>