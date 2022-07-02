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
$name=$_POST['name'];
$code=$_POST['code']; 
$description=$_POST['description'];
$unit_price=$_POST['unit_price'];
$quantity=$_POST['quantity']; 
$date_added=$_POST['date_added'];
$last_updated=$_POST['last_updated'];
$user_id=intval($_GET['user_id']);
$sql="update assets set name=:name,code=:code,description=:description,unit_price=:unit_price,quantity=:quantity,date_added=:date_added,last_updated=:last_updated where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$user_id,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':unit_price',$unit_price,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':date_added',$date_added,PDO::PARAM_STR);
$query->bindParam(':last_updated',$last_updated,PDO::PARAM_STR);
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
           ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
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
                                    $sql = "SELECT * from assets where id=:id";
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
                                            <label for="success" class="control-label">Name</label>
                                            <div class="">
                                                <input type="text" name="name" value="<?php echo htmlentities($result->name);?>" required="required" class="form-control">
                                                
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Code</label>
                                            <div class="">
                                                <input type="text" name="code" value="<?php echo htmlentities($result->code);?>" required="required" class="form-control">
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Description</label>
                                            <div class="">
                                                <input type="text" name="description" value="<?php echo htmlentities($result->description);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Unit price</label>
                                            <div class="">
                                                <input type="text" name="unit_price" value="<?php echo htmlentities($result->unit_price);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Quantity</label>
                                            <div class="">
                                                <input type="text" name="quantity" value="<?php echo htmlentities($result->quantity);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Date added</label>
                                            <div class="">
                                                <input type="text" name="date_added" value="<?php echo htmlentities($result->date_added);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Last updated</label>
                                            <div class="">
                                                <input type="date" name="last_updated" value="<?php echo htmlentities($result->last_updated);?>" class="form-control" required="required">
                                                
                                            </div>
                                        </div>
                                        <?php }} ?>
                                        <div class="form-group has-success">
                                            <div class="">
                                                <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                <button type="submit" class="btn btn-success"><a href="manage-assets.php">Back</a></button>
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
