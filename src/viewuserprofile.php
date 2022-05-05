<?php
    include("dbconnect.php");
    $sql = "SELECT * FROM crms.userprofile WHERE email = '".$_COOKIE["loggedin_user"]."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $con->close();
      echo ("
      <div class='content'>
      <div class='profile'>
      <div class='profile_header'>Profile Details</div>
      <button id='edit-profile-btn'>
        <a href='userdashboard.php?action=editprofile'>Edit</a>
      </button>
        </span>
        <div>
            <span>User Id : </span><input type='text' value='".$row['user_id']."' readonly>
        </div>
        <div>
            <span>Name : </span><input type='text' value='".$row['name']."' readonly>
        </div>
        <div>
            <span>Email Id : </span><input type='text' value='".$row['email']."' readonly>
        </div>
        <div>
            <span>Phone Number : </span><input type='number' value='".$row['ph_no']."' readonly>
        </div>
        <div>
            <span>Date Of Birth : </span><input type='date' value='".$row['dob']."' readonly>
        </div>
        <div>
            <span>Gender : </span><input type='text' value='".$row['gender']."' readonly>
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