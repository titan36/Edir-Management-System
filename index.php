
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
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
    <?php include('includes/head.php'); ?>
    </head>
    <body class="">
             <div class="main-wrapper">
                <div class="">
                    <section class="section">
                        <div class="col-md-12">
                        <div class="text-center">
                                <p><h1> <a  style=" width:fill-available; text-align: center;
                                color:blue; font-size: 30px; font-family;text-shadow:
                                 10px 9px 10px silver,0px -8px 7px red,0px -5px 10px blue,0px -10px 15px red;"
                                href="edirstatus.php"><?php echo $systemname['system_name']; ?></a> </h1></p> </div>
                                    <div class="panel-primary">
                                        <div class="panel-body p-20">
                                              <div class="panel-title text-center">
                                              <img src="images/people1.png" width="80%" height="" ></img>
                                                  
                                                 <div class="m-3" style=" margin-top: 25px;">
                                                     <a style="margin-top: 10px;" href="edirstatus.php"><button type="submit" class="btn btn-primary">ወደ እድሩ ግቡ</button></a>                                                            
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
                        
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>Copyright © <?php echo $systemname['system_name']; ?> 2022</small></p>
                                        </div>
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
