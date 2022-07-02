<?php
include('../includes/config.php');

$id=intval($_GET['id']);
// sql to delete a record
$sql = "delete from members where id = '$id'";

// use exec() because no results are returned
$dbh->exec($sql);
header('location:manage-member.php');
?>
