
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
        $sql = "delete from transactions where id = '$id'";
        $dbh->exec($sql);
        header('location:manage-transactions.php');   
    }  
    
    $table = 'transactions'; 
    include('export.php');

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
                                    <h2 class="title">Manage Assets</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Students</li>
            							<li class="active">Manage Assets</li>
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
                                            <div class="panel-heading bg-primary">
                                                <div class="panel-title">
                                                    <h5>View Assets Info</h5>
                                                    <div class="well-sm col-sm-12">
                                                        <div class="btn-group pull-right">	
                                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
                                                                <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
                                                            </form>
                                                        </div>
                                                    </div>	
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
                                                            
                                                            <th>Admin</th>
                                                            <th>Customr Name</th>
                                                            <th>Type</th>
                                                            <th>Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Description</th>
                                                            <th>Total Price</th>
                                                            <th>Data Added</th>
                                                            <th>Last Update</th>
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <tbody>
                            <?php $sql = "SELECT * from transactions";
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
                     
                        <td><?php echo htmlentities($result->admin_id);?></td>
                        <td><?php echo htmlentities($result->customer_full_name);?></td>
                        <td><?php echo htmlentities($result->item_name);?></td>
                        <td><?php echo htmlentities($result->type);?></td>
                        <td><?php echo htmlentities($result->quantity);?></td>
                        <td><?php echo htmlentities($result->unit_price);?></td>
                        <td><?php echo htmlentities($result->description);?></td>
                        <td><?php echo htmlentities($result->total_price);?></td>
                        <td><?php echo htmlentities($result->trans_date);?></td>
                        <td><?php echo htmlentities($result->last_updated);?></td>
                        <td> 
                        <a href="edit-transactions.php?user_id=<?php echo htmlentities($result->id);?>" class="btn btn-warning">Edit </a>
                         <a href="manage-transactions.php?delete=<?php echo htmlentities($result->id);?>" data-toggle="modal"  class="btn btn-danger">Delete</a>
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

