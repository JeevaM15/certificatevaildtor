<?php
require_once("connection.php");



if(!empty($_POST["empid"])) {
    $query=mysqli_query($con,"SELECT * FROM emp_data WHERE emp_id='" . $_POST["empid"] . "'"); 
        $admin=mysqli_num_rows($query);
  if($admin>0) {
      echo "<span class='status-not-available' style='color:red'> Employee Id Already Registred!</span>";
  }else{
      echo "<span class='status-available' style='color:green'> Employee Id available to register!</span>";
  }
}
?>