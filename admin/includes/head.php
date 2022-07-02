<?php
     $id = 1;
     $systemsql = "SELECT system_name FROM system_setting";
     $query= $dbh -> prepare($systemsql);
     //$query-> bindParam(':id', $id, PDO::PARAM_STR);
     $query-> execute();
     $systemname = $query->fetch();
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $systemname['system_name']; ?> | Dashboard</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
<link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
<link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
<link rel="stylesheet" href="css/icheck/skins/line/red.css" >
<link rel="stylesheet" href="css/icheck/skins/line/green.css" >
<link rel="stylesheet" href="css/main.css" media="screen" >
<script src="js/modernizr/modernizr.min.js"></script>