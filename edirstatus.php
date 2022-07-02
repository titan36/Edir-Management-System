<?php
session_start();
error_reporting(0);
include('includes/config.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
<?php include('includes/head.php'); ?>
    </head>
    <body class="">
        <div class="main-wrapper">
            <div class="login-bg-color bg-blue-50">
                <div class="row">
                        <div class="panel-primary" style="border:2px solid blue;">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4 class="text-light"><?php echo $systemname["system_name"]; ?></h4>
                                </div>
                            </div>
                        <div class="panel-body p-50">
                          <div style="background-color:rgb(128, 128, 128);color:white; border:2px solid blue;" class="col-md-4 col-md-offset-4">
                      <form  style="margin-top: 30px;" action="" method="post">
                            <div  class="form-group">
                                <label  for="phone">ስልክ ቁጥር</label>
                                <input  style="border:2px solid blue;" type="number" class="form-control" id="phone" placeholder="ስልክ ቁጥር ያስገቡ" autocomplete="off" name="rollid">
                            </div>
                             <div  class="form-group">
                                 <label  for="phone">የይለፍ ቃል</label>
                                 <input  style="border:2px solid blue;" type="number" class="form-control" id="phone" placeholder="የይለፍ ቃል ያስገቡ" autocomplete="off" name="rollid">
                             </div>
                            <div class="form-group mt-20">
                              <div class="text-center">
                                   <button type="submit" class="btn btn-success btn-labeled">ግባ<span class="btn-label btn-label-right"><i class="fa fa-sign-in"></i></span></button>
                                  <div class="clearfix"></div>
                                 </div>
                             </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
