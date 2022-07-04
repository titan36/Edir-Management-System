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
 $phone = $_POST['name'];
 $role = $_POST['role'];
$sql="INSERT INTO candidate(role,phone_number) VALUES('$role', '$phone')";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Role added successfully";
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
            <h2 class="title">Update admin</h2>
        </div>
        
    </div>
<!-- /.row -->
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Member Admission</li>
</ul>
</div>
</div>
<!-- /.row -->
</div>
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
<form class="" action="#" method="post">
    <div class="form-group has-success">
        <label for="success" class="control-label">Name of Candidate</label>
        <div class="">
        <select name="name" class="form-control">
        <?php $sql = "SELECT * from members";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                $id=$row['id'];
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {   ?>
                <option value="<?php echo $result->phone_number ?>"><?php echo $result->first_name.' '.$result->last_name ?></option>
                    <?php }}?>
            </select>
        </div>
    </div>
    <div class="form-group has-success">
        <label for="success" class="control-label">Role</label>
        <div class="">
        <select name="role" class="form-control">
        <?php $sql = "SELECT * from role";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                $id=$row['id'];
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {   ?>
                <option value="<?php echo $result->id ?>"><?php echo $result->name_of_role ?></option>
                    <?php }}?>
            </select>
           
        </div>
    </div>

<div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <button class="btn btn-primary"><a href="manage-candidate.php">Back</a></button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
<!-- /.col-md-12 -->
</div>
</div>
</section>
</div>
</div>
</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>
