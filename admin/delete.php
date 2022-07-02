<?php
include('includes/config.php');

$id=$_GET['StudentId'];

// sql to delete a record
$sql = "Delete from tblstudents where StudentId = '$id'";

// use exec() because no results are returned
$dbh->exec($sql);
header('location:manage-students.php');
?>
