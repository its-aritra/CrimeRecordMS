<?php
  if(!(isset($_COOKIE['role']) && $_COOKIE['role']=='admin')){
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
      <a href="admindashboard.php?action=dashboard">Dashboard</a>
      <a href="admindashboard.php?action=admindetails">Admin Details</a>
      <a href="admindashboard.php?action=policestations">Police Stations</a>
      <a href="admindashboard.php?action=policepersonnel">Police Personnel</a>
      <a href="admindashboard.php?action=viewcriminal">View Criminals</a>
      <a href="admindashboard.php?action=viewcomplaints">View Complaints</a>
      <a href="admindashboard.php?action=viewfir">View FIR</a>
      <a href="admindashboard.php?action=viewusers">View Users</a>
      <a href="signinup.php?usertype=admin&login=false">Log out</a>
    </div>


    <?php
    include("urlparams.php");
    if ($params['action'] == 'dashboard') {
      include("adminoverview.php");
    } 
    elseif ($params['action'] == 'admindetails') {
      include('admindetails.php');
    } 
    elseif ($params['action'] == 'addadmin') {
      include('addadmin.php');
    } 
    elseif ($params['action'] == 'editpassword') {
      include('editpassword.php');
    } 
    elseif ($params['action'] == 'policestations') {
      include('viewpolicestations.php');
    } 
    elseif ($params['action'] == 'addpolicestation') {
      include('addpolicestation.php');
    } 
    elseif ($params['action'] == 'editpolicestation') {
      include('editpolicestation.php');
    } 
    elseif ($params['action'] == 'policepersonnel') {  
      include('viewpolicepersonnel.php');
    }
    elseif ($params['action'] == 'addpolicepersonnel') {  
      include('addpolicepersonnel.php');
    }
    elseif ($params['action'] == 'editpolicepersonnel') {  
      include('editpolicepersonnel.php');
    }
    elseif ($params['action'] == 'viewcriminal') {  
      include('viewcriminal.php');
    }
    elseif ($params['action'] == 'editcriminal') {  
      include('editcriminal.php');
    }
    elseif ($params['action'] == 'viewcomplaints') {  
      include('viewcomplaint.php');
    }
    elseif ($params['action'] == 'viewfir') {  
      include('viewfir.php');
    }
    elseif ($params['action'] == 'viewusers') {  
      include('viewusers.php');
    }
    elseif ($params['action'] == 'edituserprofile') {  
      include('edituserprofile.php');
    }
    else{
      header("Location: error.php");
    }
    
    ?>
    
</body>
<script src="../js/login.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
</html>
