<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man 2 Web - View Admin</title>
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
            $id=get_safe_value($con,$_GET['id']);
            if($operation=='active'){
                $status='1';
            }else{
                $status='0';
            }
            $update_status_sql="update admin set status='$status' where id='$id'";
            mysqli_query($con,$update_status_sql);
        }

        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from admin where id='$id'";
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
      
</style>
</head>
    <div>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>View Admins</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><span class='btn btn-success'><a href="add-admin.php" style='color:white'>Add Admin</a></span></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><pre>
        
        
        </pre></div>
   
<body>
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                 
                        <div class="card" style="width:100%; padding-top:10px; padding-left:10px; padding-right:10px; padding-bottom:10px">
<table id="example" class="display" style="width:100%" >
        <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
        </thead>
        <tbody>
            <?php
            $sql="select * from admin";
            $res=mysqli_query($con,$sql); 

        $i=1;
        while($row=mysqli_fetch_assoc($res)){?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>

                <?php
                if($row['status']==1){
                    echo "<span class='btn btn-success'><a href='?type=status&operation=deactive&id=".$row['id']."' style='color:white'>Active</a></span>&nbsp;";
                }else{
                    echo "<span class='btn btn-danger'><a href='?type=status&operation=active&id=".$row['id']."' style='color:white'>Deactive</a></span>&nbsp;";
                }
                echo "<span class='btn btn-warning'><a onclick=\"javascript:return confirm('Are you sure you want to delete?');\" href='?type=delete&id=".$row['id']."' style='color:white'>Delete</a></span>";

                ?>
               </td>
                <?php $i++; } ?>
            </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
        </div>
            </div>
     </div>
</div>
</body>

    <pre>
    
    </pre>
<?php include 'footer.php'; ?>