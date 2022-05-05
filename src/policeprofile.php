<?php
    include("dbconnect.php");
    $sql = "SELECT * FROM crms.policeprofile WHERE police_id = '".$_COOKIE["loggedin_user"]."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $con->close();

      echo ("
      <div class='content'>
      <div class='profile'>
      <div class='profile_header'>Profile Details</div>
      <button id='edit-profile-btn'>
        <a href='policedashboard.php?action=editpolicepersonnel'>Edit Profile Details</a>
      </button>");
      if($_COOKIE['role']=='police'){
          echo("
          <button id='edit-profile-btn'>
          <a href='policedashboard.php?action=editpassword'>Edit Password</a>
        </button>
          ");
      }
      echo("
        </span>
        <div>
            <span>Police Id : </span>
            <input type='text' value='".$row['police_id']."' readonly>
        </div>
        <div>
            <span>Police Name : </span>
            <input type='text' value='".$row['police_name']."' readonly>
        </div>
        <div>
            <span>Designation : </span>
            <input type='text' value='".$row['designation']."' readonly>
        </div>
        <div>
            <span>Police Station Id : </span>
            <input type='number' value='".$row['pstation_id']."' readonly>
        </div>
        <div>
            <span>Phone Number : </span>
            <input type='number' value='".$row['ph_no']."' readonly>
        </div>
        <div>
            <span>Email Id : </span>
            <input type='email' value='".$row['email']."' readonly>
        </div>
        <div>
            <span>Date Of Birth : </span>
            <input type='text' value='".$row['dob']."' readonly>
        </div>
        <div>
            <span>Address : </span>
            <input type='text' value='".$row['address']."' readonly>
        </div>
        <div>
            <span>Gender : </span>
            <input type='text' value='".$row['gender']."' readonly>
        </div>
        <div>
            <span>Date Of Joining : </span>
            <input type='text' value='".$row['doj']."' readonly>
        </div>
        
        <div>
            <span>Address : </span>
            <textarea readonly>".$row['address']."</textarea>
        </div>
      </div>
   </div>
  </div>
");
?>