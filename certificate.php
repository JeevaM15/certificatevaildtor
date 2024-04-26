<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man 2 Web - Verify Certificate</title>
    <meta name="description" content="This is a official portal of Man 2 Web for certificate validations">
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

<div class="col-lg-6" style="position: relative;margin: 0;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
					<div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt=""  style="border-radius:5px;" height="60px">
						<br>
						<br>
                    </a>
					</div>
                        <div class="card">	
                            <div class="card-header">
                                <strong class="card-title"><center>Certificate Validator</center></strong>
                            </div>
							<?php      include 'connection.php';
							if(isset($_GET['cert_id'] ))
							{
								  $cert_id = $_GET['cert_id'];
							}
							$sql=mysqli_query($con,"select * from emp_cert where cert_id='$cert_id'");
							
							while($list=mysqli_fetch_assoc($sql))
							{
							?>
                            <div class="card-body">
                                <table class="table">
                                    
                                  <tbody>
                                    <tr>
                                        <th scope="row">Employee ID</th>
                                        <td><?php echo $list['emp_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Certificate Id</th>
                                        <td><?php echo $list['cert_id']."   " ?><img src="images/verified.gif" style="margin-left: 10px;" width="25px"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td><?php echo $list['name_on'] ?></td>
                                    </tr>
									<tr>
                                        <th scope="row">Certificate Type</th>
                                        <td><?php echo $list['valid_till'] ?></td>
                                    </tr>
									<tr>
                                        <th scope="row">Issue Date</th>
                                        <td><?php echo $list['issue_date'] ?></td>
                                    </tr>
									<tr>
                                        <th scope="row">Comments</th>
                                        <td><?php echo $list['comments'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
							<?php } ?>
							
                    </div>
					<center><p>This is a official portal of Man 2 Web for certificate validations</p></center>
                </div>
				