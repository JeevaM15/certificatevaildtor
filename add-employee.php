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
		$date=date('d-m-Y',strtotime($dob));
		$gender=get_safe_value($con,$_POST['gender']);
        $edudata=get_safe_value($con,$_POST['edudata']);
        $exp=get_safe_value($con,$_POST['exp']);
        $duration=get_safe_value($con,$_POST['duration']);
		$emptype=get_safe_value($con,$_POST['emptype']);
		$role=get_safe_value($con,$_POST['role']);
        $salary=get_safe_value($con,$_POST['salary']);
        $emailid=get_safe_value($con,$_POST['emailid']);
        $mobile_number=get_safe_value($con,$_POST['mobile_number']);
		$mobile_number=get_safe_value($con,$_POST['mobile_number']);
		$address=get_safe_value($con,$_POST['address']);
		$feedback=get_safe_value($con,$_POST['feedback']);
		$issue_date=get_safe_value($con,$_POST['issue_date']);
		$validity=get_safe_value($con,$_POST['validity']);
		$added_by=$_SESSION['ADMIN_USERNAME'];
		$imgfile=$_FILES["image"]["name"];
		$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
		$allowed_extensions = array(".jpg",".jpeg",".png",".gif");
		if(!in_array($extension,$allowed_extensions))
		{
		echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
		}
		else
		{
		$imgnewfile=md5($imgfile).$extension;  
		move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$imgnewfile);
		$query=mysqli_query($con,"insert into emp_data (emp_id,name,dob,gender,edudetails,experience,duration,emptype,role,salary,email,phno,address,feedback,issue_date,valid_till,added_by,img) values ('$empid','$emp_name','$date','$gender','$edudata','$exp','$duration','$emptype','$role','$salary','$emailid','$mobile_number','$address','$feedback','$issue_date','$validity','$added_by','$imgnewfile')");
		if($query)
        { ?>
           <center><div class="col-lg-6"> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin-top: 10px;top: 10px;margin-bottom: 10px;">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Employee Added sucessfylly!
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
		
		
		
        }
    ?>
    
    <div class="col-lg-12">
<br>

        <div class="card">
<div class="card-header">
                                <strong>Man 2 Web - Add Employee</strong>
                            </div>
                            <?php
                            $sql=mysqli_query($con,"SELECT emp_id FROM emp_data ORDER BY id DESC LIMIT 1");
							
							while($list=mysqli_fetch_assoc($sql))
							{
								$oldid = $list['emp_id'];
								$n = 5;
								$start = strlen($oldid) - $n;
								$str1 = substr($oldid, $start);
							}
		?>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Employee ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="empid" name="empid" placeholder="Employee ID" value="MSEMP<?php echo sprintf('%05d', $str1+1); ?>" class="form-control demoInputBox" required readonly/>
                                            
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Upload Image<br>(Only jpg / jpeg/ png format allowed)</label></div>
                                        <div class="col-12 col-md-9"><input type="file" name="image"  required /></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="emp_name" name="emp_name" placeholder="Name" class="form-control">
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Date Of Birth</label>
                                        </div>
                                        <div class="col-12 col-md-9">
											<input type="date" id="dob" name="dob" class="form-control" placeholder="Select dob">
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
											<label class=" form-control-label">Gender</label>
										</div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                    <input type="radio" id="gender" name="gender" value="male" class="form-check-input">Male<pre> </pre>
                                                    <input type="radio" id="gender" name="gender" value="female" class="form-check-input">Female
                                                
                                            </div>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Educational Details</label></div>
                                        <div class="col-12 col-md-9"><textarea name="edudata" id="edudata" rows="2" placeholder="Educational Details" class="form-control" ></textarea></div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Experience</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="exp" name="exp" placeholder="Experience" class="form-control">
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Duration</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="duration" id="duration" type="text" class="form-control" placeholder="Duration">
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Employee Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="emptype" id="emptype" class="form-control" >
                                                <option value="">select employee Type</option>
                                                <option value="Intern">Intern</option>
                                                <option value="employee">Employee</option>
                                                <option value="offer-letter">Offer Letter</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Role</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="role" name="role" placeholder="Role in the organization" class="form-control">
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Stipend / Salary</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="salary" id="salary" type="text" class="form-control" placeholder="Stipend / Salary">
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email Id</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="emailid" name="emailid" placeholder="Enter Email Id" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mobile Number</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="mobile_number" id="mobile_number" type="text" class="form-control" maxlength = "10" placeholder="Mobile Number" >
                                         </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                                        <div class="col-12 col-md-9"><textarea name="address" id="address" rows="2" placeholder="Address..." class="form-control" ></textarea></div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Feedback or suggestions</label></div>
                                        <div class="col-12 col-md-9"><textarea name="feedback" id="feedback" rows="2" placeholder="Feedback or suggestions" class="form-control" ></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Issue Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="issue_date" name="issue_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Valid Till</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="validity" name="validity" placeholder="Enter The validity" class="form-control"//>
                                        </div>
                                    </div>
									
                                        <center>
                                        <div class="col col-md-3">
                                    <input id="submit" type="submit" class="btn btn-lg btn-dark btn-block" placeholder="Submit" name="submit" value="submit"/>
                                        </div> </center>
                                </form>
                            </div>
                        </div>
                    </div>
<?php include 'footer.php'; ?>