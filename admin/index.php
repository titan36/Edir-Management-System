<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$phone=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT phone_number,password FROM admin WHERE phone_number=:phone and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../includes/head.php'); ?>
    </head>
    <body style="background-color:green">
        <div class="main-wrapper">
            <div class="panel-primary">
                <div class="row">
                  
                        <div class="panel-title text-center">
                          <div class="col-sm-12">
                            <h1 align="center"  style="background-color:green;color:white"><?php echo $systemname["system_name"]; ?></h1>
                        </div>
                      <div class="col-lg-2">
                         </div>
                          
                           <div class="col-lg-9">
                        <section class="section">
                            <div class="row mt-10">
                                <div class="col-md-10 col-md-offset-1 pt-50">
                                    <div class="row mt-10 ">
                                        <div class="col-md-11">
                                           <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>የአስተዳዳሪ መግቢያ</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-50">

                                                <!--    <div class="section-title">
                                                        <p class="sub-title">Student Result Management System</p>
                                                    </div>    -->

                                                    <form class="form-horizontal" method="post">
                                                    	<div class="form-group">
                                               <label for="inputEmail3" class="col-sm-2 control-label">ስልክ ቁጥር</label>
                                             		<div class="col-sm-10">
                                         	<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="ስልክ ቁጥር ያስገቡ" required>
                                                    		</div>
                                                    	</div>
                                                    	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">የይለፍ ቃል</label>
                                                    		<div class="col-sm-10">
                                	<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="የይለፍ ቃል ያስገቡ" required>
                                                    		</div>
                                                    	</div>
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                           
                                                    			<button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                                                    	</div>
                                                    </form>

                                           

                                                 
                                                </div>
                                            </div>
                                                                         </div>
                                            </div>
                                            <!-- /.panel -->
                                      
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                                            <!-- /.panel -->
                                           
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->
         
                                       
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
