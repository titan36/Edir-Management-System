
<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_GET['died'])){
            $id=intval($_GET['died']);
            $sql = "update members set dod = '1' where id = '$id'";
            $dbh->exec($sql);
            header('location:manage-member.php');   
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
                                                            <th>First Name</th>
                                                            <th>Middle Name</th>
                                                            <th>Last Name</th>
                                                            <th>Address</th>
                                                            <th>Phone Number</th>
                                                            <th>Number of Children</th>
                                                            <th>Emergency Contact</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <tbody>
                    <?php 
                    $sql = "SELECT * from members where dod = '1'";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    $id=$row['StudentId'];
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {   ?>

                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->first_name);?></td>
                        <td><?php echo htmlentities($result->middle_name);?></td>
                        <td><?php echo htmlentities($result->last_name);?></td>
                        <td><?php echo htmlentities($result->address);?></td>
                        <td><?php echo htmlentities($result->phone_number);?></td>
                        <td><?php echo htmlentities($result->number_of_children);?></td>
                        <td><?php echo htmlentities($result->emergency_contact);?></td>
                        <td><?php if($result->is_active==1){ echo htmlentities('Active'); }
                                  else{
                                      echo htmlentities('Inactive'); 
                                }
                                                                ?></td>
<td>
    <a href="edit-member.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-warning">Edit</a>
    <a href="delete_member.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-danger">Delete</a>
    <a href="manage-member.php?died=<?php echo htmlentities($result->id);?>" class="btn btn-primary">Died</a>
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

