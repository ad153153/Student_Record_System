<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: ../index.php");
}

?>
<html>

<head>
    <style>
        nav {
            background-color: #333;
            height: 70px;
            line-height: 70px;
        }

        nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../dashboard.php">Home</a>
        <a href="../student/">Students</a>
        <a href="../majors/">Majors</a>
        <a href="../Buildings/">project</a>
        <a href="../logout.php">logout</a>
    </nav>

