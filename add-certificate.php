<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man 2 Web - Add Employee</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px ; background:white; }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <?php include 'header.php'; 
    
    if(!isset($_SESSION['ADMIN_USERNAME']))
    {
        echo "<script>window.location.href='index.php?error=your session has been expired'</script>";
    }
    
     function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
    }
    
    if(isset($_POST['submit']))
    {
        $empid=get_safe_value($con,$_POST['empid']);
        $certid=get_safe_value($con,$_POST['certid']);
		$name=get_safe_value($con,$_POST['name']);
        $issue_date=get_safe_value($con,$_POST['issue_date']);
		$validity=get_safe_value($con,$_POST['validity']);
		$comments=get_safe_value($con,$_POST['comments']);
		
		
		$query=mysqli_query($con,"insert into emp_cert (emp_id,cert_id,name_on,issue_date,valid_till,comments) values ('$empid','$certid','$name','$issue_date','$validity','$comments')");
		if($query)
        { ?>
           <center><div class="col-lg-6"> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin-top: 10px;top: 10px;margin-bottom: 10px;">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Certificate Added sucessfylly!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
               </div></div></center>
        <?php }
        else
        {?> 
		<center><div class="col-lg-6"> 
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="margin-top: 10px;top: 10px;margin-bottom: 10px;">
                                        <span class="badge badge-pill badge-danger">Error</span>
                                        Error Try Again!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div></div></center>
       <?php }}
		
		
		
        
    ?>
    
    <div class="col-lg-12">
<br>

        <div class="card">
<div class="card-header">
                                <strong>Man 2 Web - Add Certificate</strong>
                            </div>
                            
                            <?php
      if(isset($_GET['emp_id']))
      {
          $emp_id=$_GET['emp_id'];
    $query=mysqli_query($con,"select * from emp_data where emp_id='$emp_id'");
    while($list=mysqli_fetch_assoc($query))
    {
        ?>    
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Employee ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="empid" name="empid" value="<?php echo $list['emp_id'] ?>" readonly class="form-control demoInputBox" >
                                            
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Certificate ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="certid" name="certid" value="<?php echo 'MADIN'.date("his").$list['emp_id'] ?>" readonly class="form-control demoInputBox" >
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name on Certificate</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="name" name="name" value="<?php echo $list['name'] ?>" readonly class="form-control">
                                        </div>
                                    </div>
									
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Certificate Issue Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="issue_date" name="issue_date" value="<?php echo $list['issue_date'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Certficate Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="validity" id="validity" class="form-control" required>
                                                <option value="">select Certificate Type</option>
                                                <option value="Letter Of Recomandation">Letter Of Recomandation</option>
                                                <option value="Certificate of Internship">Certificate of Internship</option>
                                                <option value="Employee Appreciation Letter">Employee Appreciation Letter</option>
                                                <option value="Certificate of Man 2 Web">Certificate of Man 2 Web</option>
                                                <option value="Job Offer Letter">Job Offer Letter</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Comments</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="comments" id="comments" rows="3" placeholder="Add comments" class="form-control" ></textarea>
                                        </div>
                                    </div>
									
									<?php }}  ?>
                                       <center> 
                                        <div class="col col-md-3">
                                    <input id="submit" type="submit" class="btn btn-lg btn-info btn-block" placeholder="Submit" name="submit" value="submit"/>
                                        </div> </center>
                                </form>
                            </div>
                        </div>
                    </div>

<?php include 'footer.php'; ?>