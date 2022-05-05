<?php
  if(!(isset($_COOKIE['role']) && $_COOKIE['role']=='police')){
    header("Location: error.php");
  }
?> 
 <!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/home.css">
</head>

<body>
  <div class="header">
    <div class="header_banner">CRIME RECORDS MANAGEMENT SYSTEM</div>
  </div>
  <div class='content_container'>
    <div class="sidenav">
      <a href="policedashboard.php?action=dashboard">Dashboard</a>
      <a href="policedashboard.php?action=fileComplaint">File Complaint</a>
      <a href="policedashboard.php?action=viewcomplaint">View Complaint</a>
      <a href="policedashboard.php?action=filefir">File FIR</a>
      <a href="policedashboard.php?action=viewfir">View FIR</a>
      <a href="policedashboard.php?action=addcriminal">Add Criminal</a>
      <a href="policedashboard.php?action=viewcriminal">View Criminal Record</a>
      <a href="policedashboard.php?action=policeprofile">Profile</a>
      <a href="signinup.php?usertype=police&login=false">Log out</a>
    </div>


    <?php
    include("urlparams.php");
    if ($params['action'] == 'dashboard') {
      include("policeoverview.php");
    } 
    elseif ($params['action'] == 'fileComplaint') {
      include('fileComplaint.php');
    } 
    elseif ($params['action'] == 'viewcomplaint') {
      include('viewcomplaint.php');
    } 
    elseif ($params['action'] == 'filefir') {
      include('filefir.php');
    } 
    elseif ($params['action'] == 'viewfir') {
      include('viewfir.php');
    } 
    elseif ($params['action'] == 'addcriminal') {
      include('addcriminal.php');
    } 
    elseif ($params['action'] == 'editcriminal') {
      include('editcriminal.php');
    } 
    elseif ($params['action'] == 'viewcriminal') {
      include('viewcriminal.php');
    } 
    elseif ($params['action'] == 'policeprofile') {  
      include('policeprofile.php');
    }
    elseif ($params['action'] == 'editpolicepersonnel') {  
      include('editpolicepersonnel.php');
    }
    elseif ($params['action'] == 'editpassword') {  
      include('editpassword.php');
    }
    else{
      header("Location: error.php");
    }
    
    
    ?>
    
</body>
<script src="../js/login.js"></script>
</html>