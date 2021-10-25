<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
date_default_timezone_set("Asia/Bangkok");
$timestamp = time();

$date_time = date("l-d-m-Y H:i:s", $timestamp);

$date_day =  date("l", $timestamp);
$date_date =  date("d", $timestamp);
$date_month =  date("m", $timestamp);
$date_year =  date("Y", $timestamp);
$date_hour =  date("H", $timestamp);
$date_minute =  date("i", $timestamp);
$date_second =  date("s", $timestamp);

$Date_database = $date_year."-".$date_month."-".$date_date;

if(isset($_SESSION["Userlevel"]) != 'A'){

    Header("Location: ../");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logomub.png">
  <title>ระบบลงเวลาเข้าเวร</title>
  
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!--  styles for popup -->
  <link href="css/popup.css" rel="stylesheet">
  


<!-- จัดการรายชื่อครู -->
  <style type="text/css">
    table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    .content-wrapper {
      background-image: url('img/Page6.jpg');
    }
    body {
      background-color: #fff;
    }

    .wrapper {	
	margin-top: 80px;
    margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
}

/* จัดการตารางเข้าเวรครู */
.form-signin-to {
    max-width: 650px;
    padding: 15px 35px 45px;
    margin: 0 auto;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.1);
}

.form-control-name {
    width: 49%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}


  </style>



</head>
<body class="sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <a class="navbar-brand" href="index.php">ระบบลงเวลาเข้าเวร (Admin)</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-cogs"></i>
            <span class="nav-link-text">แผงควบคุม</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="add_teacher_new.php">
            <i class="fa fa-fw fa-user-plus"></i>
            <span class="nav-link-text">เพิ่มรายชื่อครู</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="add_holiday_new.php">
            <i class="fa fa-fw fa-calendar-times-o"></i>
            <span class="nav-link-text">เพิ่มวันหยุดนักขัตฤกษ์</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fa fa-user-circle"></i><?php echo ' '.$_SESSION["nameUser"]; ?></a>
        </li>

        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
