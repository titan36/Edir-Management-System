
<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_GET['present'])){
            $member_id = intval($_GET['present']);
            $attendance_type = "meeting";
            $adate = date("Y/m/d/H");
            $status = "1";
            $_SESSION['attend'] = $member_id;
            $sql = "INSERT INTO attendance(member_id,attendance_type,date,status) VALUE('$member_id','$attendance_type','$adate','$status')";           
            $query = $dbh->prepare($sql);
            $dbh->exec($sql);
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Assets added successfully";
            }
            else 
            {
            $error="Something went wrong. Please try again";
            }
        }

        if(isset($_GET['absent'])){
            $member_id = intval($_GET['absent']);
            $attendance_type = "meeting";
            $adate = date("Y/m/d/H");
            $status = "0";
            $_SESSION['attend'] = $member_id;
            $sql = "INSERT INTO attendance(member_id,attendance_type,date,status) VALUE('$member_id','$attendance_type','$adate','$status')";           
            $query = $dbh->prepare($sql);
            $dbh->exec($sql);
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Atendance added successfully";
            }
            else 
            {
            $error="Something went wrong. Please try again";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('includes/head.php'); ?>
         <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
                <?php include('includes/leftbar.php');?>  
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Member</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Students</li>
                                      
            							<li class="active">Manage Member</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Students Info</h5>
                                                </div>
                                            </div>
                            <?php if($msg){?>
                            <div class="alert alert-success left-icon-alert" role="alert">
                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                            </div><?php } 
                            else if($error){?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Full Name</th>
                                                            <th>Phone number</th>
                                                            <th>Action</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <tbody>
                    <?php
                    $sql = "SELECT * from members";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    $id=$row['id'];
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {
                           ?>

                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->first_name).' '.htmlentities($result->middle_name);?></td>
                        <td><?php echo htmlentities($result->phone_number);?></td>
<td>
    <a href="add-attendance.php?present=<?php echo htmlentities($result->phone_number);?>" class="btn btn-warning">Present</a>
    <a href="add-attendance.php?absent=<?php echo htmlentities($result->phone_number);?>" class="btn btn-danger">Absent</a>
</td>
<td>
    <?php 
    if(isset($_SESSION['attend'])){
        if($_SESSION['attend'] == $result->phone_number){
           echo '<a class="btn btn-warning">Taken</a>';    
        }
      }
        ?>
    

 
</td>

</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
    
        <!-- /.main-wrapper -->

        <?php include('includes/footer.php'); ?>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } ?>

