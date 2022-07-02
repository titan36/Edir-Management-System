<?php
session_start();
error_reporting(0);

?>
<form action="attendance.php" method="post">

	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="text" name="id" class="form-control" id="inputPassword3" placeholder="Password">
                                                    		</div>
                                                    	</div>
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                           
                                                    			<button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

</form>
                                       <th scope="row" colspan="2">Date of absent</th>   
                                               
								<?php
								include('includes/config.php');
								
								
								 $sql1 = "SELECT * from tblattendance WHERE id='$id'";
								$result->execute();
								for($i=0; 
								$row = $result->fetch(); $i++){
					$id=$row['id'];
								
		?>
						       
                                                            <td><b><?php echo $row['absent'];?></b></td>
                                                             </tr>
                                                                      <?php } ?>
