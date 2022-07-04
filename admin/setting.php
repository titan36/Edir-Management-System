
<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_GET['delete'])){
        $id=intval($_GET['delete']);
        $sql = "delete from assets where id = '$id'";
        $dbh->exec($sql);
        header('location:manage-assets.php');   
    }     

    if(isset($_POST['update']))
{
$system_name=$_POST['system_name'];
$mail_protocol=$_POST['mail_protocol']; 
$mail_encryption=$_POST['mail_encryption'];
$mail_host=$_POST['mail_host'];
$mail_port=$_POST['mail_port'];
$mail_username=$_POST['mail_username'];
$mail_password=$_POST['mail_password']; 
$mail_title=$_POST['mail_title'];
$mail_host=$_POST['mail_host'];
$mail_reply_to=$_POST['mail_reply_to'];
$vote=$_POST['vote'];

$sql="update system_setting set system_name=:system_name,mail_protocol=:mail_protocol,mail_encryption=:mail_encryption,
mail_host=:mail_host,mail_port=:mail_port,mail_username=:mail_username,mail_password=:mail_password,
mail_title=:mail_title,mail_host=:mail_host,mail_reply_to=:mail_reply_to,vote=:vote";
$query = $dbh->prepare($sql);
$query->bindParam(':system_name',$system_name,PDO::PARAM_STR);
$query->bindParam(':mail_protocol',$mail_protocol,PDO::PARAM_STR);
$query->bindParam(':mail_encryption',$mail_encryption,PDO::PARAM_STR);
$query->bindParam(':mail_host',$mail_host,PDO::PARAM_STR);
$query->bindParam(':mail_port',$mail_port,PDO::PARAM_STR);
$query->bindParam(':mail_username',$mail_username,PDO::PARAM_STR);
$query->bindParam(':mail_password',$mail_password,PDO::PARAM_STR);
$query->bindParam(':mail_title',$mail_title,PDO::PARAM_STR);
$query->bindParam(':mail_host',$mail_host,PDO::PARAM_STR);
$query->bindParam(':mail_reply_to',$mail_reply_to,PDO::PARAM_STR);
$query->bindParam(':vote',$vote,PDO::PARAM_STR);

$query->execute();
$msg="Data has been updated successfully";
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
                                    <h2 class="title">Manage Setting</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Setting</li>
            							<li class="active">Manage Setting</li>
                                     
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
                                                    <h5>View Setting Info</h5>
                                                    <?php echo $vote; ?>
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
                                    $sql = "SELECT * from system_setting";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {   ?>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">System_name</label>
                                            <div class="">
                                                <input type="text" name="system_name" value="<?php echo htmlentities($result->system_name);?>"  class="form-control">
                                                
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_protocol</label>
                                            <div class="">
                                                <input type="text" name="mail_protocol" value="<?php echo htmlentities($result->mail_protocol);?>" class="form-control">
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_encryption</label>
                                            <div class="">
                                                <input type="text" name="mail_encryption" value="<?php echo htmlentities($result->mail_encryption);?>" class="form-control">
                                            </div>
                                                
                                            </div>
                                     
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_host</label>
                                            <div class="">
                                                <input type="text" name="mail_host" value="<?php echo htmlentities($result->mail_host);?>" class="form-control">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_port</label>
                                            <div class="">
                                                <input type="number" name="mail_port" value="<?php echo htmlentities($result->mail_port);?>" class="form-control">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_username</label>
                                            <div class="">
                                                <input type="text" name="mail_username" value="<?php echo htmlentities($result->mail_username);?>" class="form-control" >
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_password</label>
                                            <div class="">
                                                <input type="text" name="mail_password" value="<?php echo htmlentities($result->mail_password);?>" class="form-control">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_title</label>
                                            <div class="">
                                                <input type="text" name="mail_title" value="<?php echo htmlentities($result->mail_title);?>" class="form-control" >
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Mail_reply_to</label>
                                            <div class="">
                                                <input type="text" name="mail_reply_to" value="<?php echo htmlentities($result->mail_reply_to);?>" class="form-control">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Vote?</label>
                                            <div class="">
                                            <label class="switch">
                                                <input type="checkbox" <?php echo $result->vote == '1' ? 'checked' : ''; ?> data-width="100" name="vote" class="btn btn-success btn-labeled" data-toggle="toggle" data-onstyle="primary" value="1">
                                            </label>
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
                      </tbody>
                    </table>         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->
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

