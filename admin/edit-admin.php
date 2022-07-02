<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['update']))
{
$fname=$_POST['first_name'];
$lname=$_POST['last_name']; 
$phone=$_POST['phone_number'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$user_id=intval($_GET['user_id']);
$sql="update admin set first_name=:fname,last_name=:lname,phone_number=:phone,email=:email,password=:password where id=:user_id ";
$query = $dbh->prepare($sql);
$query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$msg="Data has been updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/head.php') ?>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Update admin</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">admin</a></li>
            							<li class="active">Update admin</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update admin info</h5>
                                                </div>
                                            </div>
                                             <div class="panel-body">
                                <?php if($msg){?>
                                <div class="alert alert-success left-icon-alert" role="alert">
                                <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                </div><?php } 
                                else if($error){?>
                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>

                                <form action="#" method="post">
                                    <?php 
                                    $id=intval($_GET['user_id']);
                                    $sql = "SELECT * from admin where id=:id";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':id',$id,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {   ?>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">First Name</label>
                                            <div class="">
                                                <input type="text" name="first_name" value="<?php echo htmlentities($result->first_name);?>" required="required" class="form-control">
                                                
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Last Name</label>
                                            <div class="">
                                                <input type="text" name="last_name" value="<?php echo htmlentities($result->last_name);?>" required="required" class="form-control">
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Phone Number</label>
                                            <div class="">
                                                <input type="text" name="phone_number" value="<?php echo htmlentities($result->phone_number);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Email</label>
                                            <div class="">
                                                <input type="text" name="email" value="<?php echo htmlentities($result->email);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Password</label>
                                            <div class="">
                                                <input type="password" name="password" value="<?php echo htmlentities($result->password);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <?php }} ?>
                                        <div class="form-group has-success">
                                            <div class="">
                                                <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            </div>    
                                                </form>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
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
    </body>
</html>
<?php  } ?>
