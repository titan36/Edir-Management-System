<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }


if(isset($_POST['submit']))
{   
    $id=intval($_GET['id']);
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $spouse_first_name=$_POST['spouse_first_name'];
    $spouse_middle_name=$_POST['spouse_middle_name'];
    $spouse_last_name=$_POST['spouse_last_name'];
    $spouse_dob=$_POST['spouse_dob']; 
    $address=$_POST['address']; 
    $phone_number=$_POST['phone_number']; 
    $number_of_children=$_POST['number_of_children']; 
    $emergency_contact=$_POST['emergency_contact']; 
$sql="update members set first_name=:first_name,middle_name=:middle_name,last_name=:last_name,dob=:dob,spouse_first_name=:spouse_first_name,spouse_middle_name=:spouse_middle_name,spouse_last_name=:spouse_last_name,spouse_dob=:spouse_dob,address=:address,phone_number=:phone_number,number_of_children=:number_of_children,emergency_contact=:emergency_contact where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
$query->bindParam(':middle_name',$middle_name,PDO::PARAM_STR);
$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':spouse_first_name',$spouse_first_name,PDO::PARAM_STR);
$query->bindParam(':spouse_middle_name',$spouse_middle_name,PDO::PARAM_STR);
$query->bindParam(':spouse_last_name',$spouse_last_name,PDO::PARAM_STR);
$query->bindParam(':spouse_dob',$spouse_dob,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':phone_number',$phone_number,PDO::PARAM_STR);
$query->bindParam(':number_of_children',$number_of_children,PDO::PARAM_STR);
$query->bindParam(':emergency_contact',$emergency_contact,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$msg="Member Info Updated Successfully";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<?php include('includes/head.php'); ?>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
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
                                    <h2 class="title">Update Member</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Member Edit</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- /.row -->
                        </div>
                            <div class="container-fluid"> 
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>update member info</h5>
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
    <form class="form-horizontal" action="#" method="post">
    <?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM members WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {  ?>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">first_name</label>
<div class="col-sm-10">
<input type="text" name="first_name" class="form-control" id="first_name" required="required" autocomplete="off" value="<?php echo htmlentities($result->first_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">middle_name</label>
<div class="col-sm-10">
<input type="text" name="middle_name" class="form-control" id="middle_name" required="required" autocomplete="off" value="<?php echo htmlentities($result->middle_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">last_name</label>
<div class="col-sm-10">
<input type="text" name="last_name" class="form-control" id="last_name" required="required" autocomplete="off" value="<?php echo htmlentities($result->last_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">dob</label>
<div class="col-sm-10">
<input type="date" name="dob" class="form-control" id="dob" required="required" autocomplete="off" value="<?php echo htmlentities($result->dob); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">spouse_first_name</label>
<div class="col-sm-10">
<input type="text" name="spouse_first_name" class="form-control" id="spouse_first_name" required="required" autocomplete="off" value="<?php echo htmlentities($result->spouse_first_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">spouse_middle_name</label>
<div class="col-sm-10">
<input type="text" name="spouse_middle_name" class="form-control" id="spouse_middle_name"  required="required" autocomplete="off" value="<?php echo htmlentities($result->spouse_middle_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">spouse_last_name</label>
<div class="col-sm-10">
<input type="text" name="spouse_last_name" class="form-control" id="spouse_last_name" required="required" autocomplete="off" value="<?php echo htmlentities($result->spouse_last_name); ?>">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">spouse_dob</label>
<div class="col-sm-10">
<input type="date" name="spouse_dob" class="form-control" id="spouse_dob" required="required" autocomplete="off" value="<?php echo htmlentities($result->spouse_dob); ?>">
</div>
</div>

<div class="form-group">
        <label for="address" class="col-sm-2 control-label">address</label>
        <div class="col-sm-10">
            <input type="text"  name="address" class="form-control" id="date" value="<?php echo htmlentities($result->address); ?>">
        </div>
    </div>

    <div class="form-group">
<label for="phone_number" class="col-sm-2 control-label">phone_number</label>
<div class="col-sm-10">
<input type="number" name="phone_number" class="form-control" id="phone_number" required="required" autocomplete="off" value="<?php echo htmlentities($result->phone_number); ?>">
</div>
</div>

<div class="form-group">
<label for="number_of_children" class="col-sm-2 control-label">number_of_children</label>
<div class="col-sm-10">
<input type="number" name="number_of_children" class="form-control" id="number_of_children" required="required" autocomplete="off" value="<?php echo htmlentities($result->number_of_children); ?>">
</div>
</div>

<div class="form-group">
    <label for="emergency_contact" class="col-sm-2 control-label">emergency_contact</label>
    <div class="col-sm-10">
        <input type="text" name="emergency_contact" class="form-control" id="emergency_contact" required="required" autocomplete="off" value="<?php echo htmlentities($result->emergency_contact); ?>">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <button type="submit" name="submit" class="btn btn-primary"><a href="manage-member.php">Back</a></button>
    </div>
</div>

</div>
</div>   

<?php } ?> 
</form>
<?php } ?> 
</div>
</div>
</div>
<!-- /.col-md-12 -->
</div>
</div>
</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
</div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>

