<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
}

?>

<style>@charset "utf-8";
/* CSS Document */

.menubar{
	background-color:#000;
	}
	
.menubar ul li{
	display:inline-block;
	margin-right:25px;
	list-style:none;
	padding:10px;
	letter-spacing:2px;
	}
	
.menubar ul li a{
	text-decoration:none;
	color:#FFF;
	padding:10px;
	letter-spacing:2px;
	}
.menubar ul li a:hover{
	background-color:#F60;
	color:#FFF;
	padding:10px;
	letter-spacing:2px;
	}
.menubar ul li a.active{
	background-color:#F60;
	color:#fff;
	padding:10px;
	letter-spacing:2px;
	}
	</style>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>simple horizontal menu bar</title>
<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>

<body>
<div class="menubar">
<ul>
<li><a href="../dashboard.php" class="active"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
<li><a href="../student/"><i class="fa fa-users" aria-hidden="true"></i>student</a></li>
<li><a href="../majors/"><i class="fa fa-envelope" aria-hidden="true"></i>Majors</a></li>
<li><a href="../Buildings/"><i class="fa fa-question-circle" aria-hidden="true"></i>Buildings</a></li>
<li><a href="../logout.php"><i class="fa fa-question-circle" aria-hidden="true"></i>Logout</a></li>
</ul>
</div>
</body>
</html>