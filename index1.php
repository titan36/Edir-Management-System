<?php include('header.php'); ?>
<body>


    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">


<?php include('modal_add.php'); ?>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;Data Table</strong>
                            </div>
                            <thead>
                                <tr>
                                    <th style="text-align:center;">StudentId</th>
                                    <th style="text-align:center;">StudentName</th>
                                    <th style="text-align:center;">RollId</th>
                                    <th style="text-align:center;">Gender</th>
                                    <th style="text-align:center;">DOB</th>
									<th style="text-align:center;">ClassId</th>
									 <th style="text-align:center;">RegDate</th>
                                    <th style="text-align:center;">Status</th>
									<th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								require_once('include/config.php');
								$result = $conn->prepare("SELECT * FROM tblstudents ORDER BY StudentId ASC");
								$result->execute();
								for($i=0; 
								$row = $result->fetch(); $i++){
								$id=$row['StudentId'];
							?>


								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['StudentId']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['StudentName']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['RollId']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['Gender']; ?></td>
								<td style="text-align:center; word-break:break-all; width:450px;"> <?php echo $row ['DOB']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['ClassId']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['RegDate']; ?></td>
								<td style="text-align:center; word-break:break-all; width:450px;"> <?php echo $row ['Status']; ?></td>
								<td style="text-align:center; width:350px;">
									<a href="edit.php<?php echo '?id='.$id; ?>" class="btn btn-info">Edit</a>
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Delete </a>
								</td>
									
										<!-- Modal -->
								<div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								<h3 id="myModalLabel">Delete</h3>
								</div>
								<div class="modal-body">
								<p><div style="font-size:larger;" class="alert alert-danger">Are you Sure you want Delete <b style="color:red;"><?php echo $row['StudentName']." ".$row['RollId']." ".$row['Gender'] ; ?></b> Data?</p>
								</div>
								<hr>
								<div class="modal-footer">
								<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
								<a href="delete.php<?php echo '?StudentId='.$id; ?>" class="btn btn-danger">Yes</a>
								</div>
								</div>
								</div>
								</tr>
								<?php } ?>
                            </tbody>
                        </table>


          
        </div>
        </div>
        </div>
    </div>


</body>
</html>


