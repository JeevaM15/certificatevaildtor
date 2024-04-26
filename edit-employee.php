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
        $emp_name=get_safe_value($con,$_POST['emp_name']);
		$dob=get_safe_value($con,$_POST['dob']);
        $gender=get_safe_value($con,$_POST['gender']);
        $edudata=get_safe_value($con,$_POST['edudata']);
        $exp=get_safe_value($con,$_POST['exp']);
        $duration=get_safe_value($con,$_POST['duration']);
		$emptype=get_safe_value($con,$_POST['emptype']);
        $salary=get_safe_value($con,$_POST['salary']);
        $emailid=get_safe_value($con,$_POST['emailid']);
        $mobile_number=get_safe_value($con,$_POST['mobile_number']);
		$mobile_number=get_safe_value($con,$_POST['mobile_number']);
		$address=get_safe_value($con,$_POST['address']);
		$feedback=get_safe_value($con,$_POST['feedback']);
		$validity=get_safe_value($con,$_POST['validity']);
		
		
		$query=mysqli_query($con,"update emp_data set name='$emp_name',dob='$dob',gender='$gender',edudetails='$edudata',experience='$exp',duration='$duration',emptype='$emptype',salary='$salary',email='$emailid',phno='$mobile_number',address='$address',feedback='$feedback',valid_till='$validity' where emp_id='$empid'");
		if($query)
        { ?>
           <center><div class="col-lg-6"> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin-top: 10px;top: 10px;margin-bottom: 10px;">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Employee Modified sucessfylly!
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
                                <strong>Man 2 Web - View Employee</strong>
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
                                            <input type="text" id="empid" name="empid" value="<?php echo $list['emp_id'] ?>" readonly class="form-control demoInputBox" required onBlur="checkAvailability()">
                                            <p><img src="https://media3.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif" id="loaderIcon" style="display:none" /></p>
                                            <span id="user-availability-status"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="emp_name" name="emp_name" value="<?php echo $list['name'] ?>"  class="form-control">
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Date Of Birth</label>
                                        </div>
                                        <div class="col-12 col-md-9">
											<input type="date" id="dob" name="dob" value="<?php echo $list['dob'] ?>" class="form-control" >
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
											<label class=" form-control-label">Gender</label>
										</div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                    <?php if($list['gender']== 'male')
                                                    {
                                                    echo "<input type='radio' id='gender' name='gender' value='male' class='form-check-input'  checked>Male";
													echo "<br>";
													echo "<input type='radio' id='gender' name='gender' value='female' class='form-check-input'>Female";
                                                     }
                                                     else
                                                     {
												     echo "<input type='radio' id='gender' name='gender' value='male' class='form-check-input'  >Male";
                                                     echo "<input type='radio' id='gender' name='gender' value='female' class='form-check-input' checked>Female";
                                                      } ?>
                                                
                                            </div>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Educational Details</label></div>
                                        <div class="col-12 col-md-9"><textarea name="edudata" id="edudata" rows="2"  class="form-control" ><?php echo $list['edudetails'] ?></textarea></div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Experience</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="exp" name="exp" value="<?php echo $list['experience'] ?>" class="form-control">
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Duration</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="duration" id="duration" type="text" class="form-control" value="<?php echo $list['duration'] ?>">
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Employee Type</label></div>
                                        <div class="col-12 col-md-9">
                                            
											<select name="emptype" id="emptype" class="form-control" value="<?php echo $list['emptype'] ?>" required>select employee Type
                                                <option value="" >select employee Type</option>
                                                <option value="Intern" <?php if($list['emptype']=="Intern") echo 'selected="selected"'; ?>>Intern</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Stipend / Salary</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="salary" id="salary" type="text" class="form-control" value="<?php echo $list['salary'] ?>">
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email Id</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="emailid" name="emailid" value="<?php echo $list['email'] ?>" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mobile Number</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="mobile_number" id="mobile_number" type="text" class="form-control" maxlength = "10" value="<?php echo $list['phno'] ?>" >
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                                        <div class="col-12 col-md-9"><textarea name="address" id="address" rows="2" placeholder="Address..." class="form-control" ><?php echo $list['address'] ?></textarea></div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Feedback or suggestions</label></div>
                                        <div class="col-12 col-md-9"><textarea name="feedback" id="feedback" rows="2" placeholder="Feedback or suggestions" class="form-control" ><?php echo $list['feedback'] ?></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Issue Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="issue_date" name="issue_date" value="<?php echo $list['issue_date'] ?>" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Valid Till</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="validity" name="validity" value="<?php echo $list['valid_till'] ?>" class="form-control"//>
                                        </div>
                                    </div>
									<center> 
                                       <div class="col-md-6">
                                      <img src="upload/<?php echo $list['img'] ?>" width="150px" Height="width="150px"" value="<?php echo $list['img']; ?>" name="<?php echo $list['img']; ?>" />
                                       
                                       </div></center><br>
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