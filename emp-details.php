<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMRGI - Reports</title>
    <?php include 'header.php';
    if(!isset($_SESSION['ADMIN_USERNAME']))
    {
        echo "<script>window.location.href='index.php?error=your session has been expired'</script>";
    }
    ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
  
    
    <script> 
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );
       
} );
    </script>
  <?php
     function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
    }
    
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        if($type=='status'){
            $operation=get_safe_value($con,$_GET['operation']);
            $id=get_safe_value($con,$_GET['rollno']);
            if($operation=='active'){
                $status='1';
            }else{
                $status='0';
            }
            $update_status_sql="update student_data set status='$status' where rollno='$id'";
            mysqli_query($con,$update_status_sql);
        }

        if($type=='delete'){
            $id=get_safe_value($con,$_GET['rollno']);
            $delete_sql="delete from student_data where rollno='$id'";
            mysqli_query($con,$delete_sql);
        }
    }
    ?>
    
    <style>
        .dt-button
        {
            border-radius: 10px;
            width: 75px;
            border-width: thin;
            color: gainsboro;
            background-color: black;
        }
       
  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
        table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
</head>
    <div>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>View Student Details</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active"><a href="reports.php"></a>Student-Details</li>
                                </ol>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div><pre>
        
        
        </pre></div>
   
<body>
     <div class="content" style="zoom:59.5%">
            <div class="animated fadeIn">
                <div class="row">
                 
                        <div class="card" style="width:100%; padding-top:10px; padding-left:10px; padding-right:10px; padding-bottom:10px">
<table id="example" class="display">
        <thead>
            
            <tr>
                <th>SNO</th>
                <th>Student Name</th>
                <th>Rollno</th>
                <th>Year</th>
                <th>College</th>
                <th>Degree</th>
                <th>Dept</th>
                <th>Bus Number</th>
                <th>Dropping Point</th>
                <th>Boarding Point</th>
                <th>Fee Due</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql=mysqli_query($con,"select * from student_data");
            $i=1;
            while($list=mysqli_fetch_assoc($sql))
            {
            ?>
            <tr class="data" data-string="<?php echo $list['student_name']; echo $list['rollno']; echo $list['year']; echo $list['college']; echo $list['degree']; echo $list['dept']; echo $list['bus_number']; echo $list['route_from']; echo $list['route_to']; echo $list['fee_due']; ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $list['student_name'] ?></td>
                <td><?php echo $list['rollno'] ?></td>
                <td><?php echo $list['year'] ?></td>
                <td><?php echo $list['college'] ?></td>
                <td><?php echo $list['degree'] ?></td>
                <td><?php echo $list['dept'] ?></td>
                <td><?php echo $list['bus_number'] ?></td>
                <td><?php echo $list['route_from'] ?></td>
                <td><?php echo $list['route_to'] ?></td>
                <td><?php echo $list['fee_due'] ?></td>
                 <td >

                <?php
                if($list['status']==1){
                    echo "<span class='btn btn-success'><a href='?type=status&operation=deactive&rollno=".$list['rollno']."' style='color:white'>Active</a></span>&nbsp;";
                }else{
                    echo "<span class='btn btn-danger'><a href='?type=status&operation=active&rollno=".$list['rollno']."' style='color:white'>Deactive</a></span>&nbsp;";
                }
               /* echo "<span class='btn btn-info'><a href='add-stop.php?id=".$row['bid']."'>Add Stop</a></span>&nbsp;";*/

                echo "<span class='btn btn-warning'><a href='edit-student.php?rollno=".$list['rollno']."' style='color:white'>Edit</a></span>&nbsp;";
                
                 echo "<span class='btn btn-primary'><a href='view-student.php?rollno=".$list['rollno']."' style='color:white'>View</a></span>&nbsp;";
                if($list['fee_due']!=0){
                  echo "<span class='btn btn-info'><a href='fee-due.php?rollno=".$list['rollno']."' style='color:white'>Pay Due</a></span>&nbsp;";
                }
               
                
                echo "<span class='btn btn-danger'><a href='?type=delete&rollno=".$list['rollno']."' style='color:white' onclick=\"javascript:return confirm('Are you sure you want to delete?');\">Delete</a></span>&nbsp;";
                 echo "<span class='btn' style='background-color:#000080;'><a href='view-invoice.php?rollno=".$list['rollno']."' style='color:white'>View Invoice</a></span>&nbsp;";
                echo "<span class='btn' style='background-color:orange'><a href='idcard.php?rollno=".$list['rollno']."' style='color:white'>View Bus Pass</a></span>&nbsp;";

                ?>
               </td>

            </tr>
           <?php $i++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>SNO</th>
                <th>Student Name</th>
                <th>Rollno</th>
                <th>Year</th>
                <th>Degree</th>
                <th>College</th>
                <th>Dept</th>
                <th>Bus Number</th>
                <th>Dropping Point</th>
                <th>Boarding Point</th>
                <th>Fee Due</th>
                
            </tr>
        </tfoot>
    </table>
                        </div></div></div></div>
</body>

    <pre>
    
    </pre>
    <script>
        
        $(".filter").on("keyup", function() {
  var input = $(this).val().toUpperCase();

  $(".data").each(function() {
    if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
      $(this).hide();
    } else {
      $(this).show();
    }
  })
});
    </script>
<?php include 'footer.php'; ?>