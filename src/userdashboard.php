<?php
  if(!(isset($_COOKIE['role']) && $_COOKIE['role']=='user')){
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
      <a href="userdashboard.php?action=dashboard">Dashboard</a>
      <a href="userdashboard.php?action=fileComplaint">File Complaint</a>
      <a href="userdashboard.php?action=viewComplaint">View Complaint</a>
      <a href="userdashboard.php?action=profile">Profile</a>
      <a href="signinup.php?usertype=user&login=false">Log out</a>
    </div>


    <?php
    include("urlparams.php");
    if ($params['action'] == 'dashboard') {
      include("useroverview.php");
    } 
    elseif ($params['action'] == 'fileComplaint') {
      include('fileComplaint.php');
    } 
    elseif ($params['action'] == 'viewComplaint') {
      include('viewcomplaint.php');
    } 
    elseif ($params['action'] == 'profile') {  
      include('viewuserprofile.php');
    }
    elseif ($params['action'] == 'editprofile') {  
      include('edituserprofile.php');
    }
    else{
      header("Location: error.php");
    }
    ?>
    
</body>

</html>