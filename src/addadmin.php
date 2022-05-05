<?php

if(isset($_POST['submitAddAdmin'])){
    include("dbconnect.php");
    $username=$_POST['username'];
    $password =$_POST['password'];
    
    $sql="INSERT INTO crms.admin (username,password,created,updated) VALUES 
                    ('$username','$password',current_timestamp(),current_timestamp());" ; 
     
     
    if($con->query($sql) == true) {
        echo($insert);
            echo ("
            <script>   
                alert('Admin added Successfully!');                    
                window.location.href='admindashboard.php?action=admindetails';
            </script>
        ");
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    
}
    
      echo ("
      <div class='content'>
        <div class='edit-profile'>
        <div class='profile_header'>Add Admin</div>
        <button id='edit-profile-btn'>
        <a href='admindashboard.php?action=admindetails'>Back</a>
        </button>  
        <form method='post'>
            <div class='field'>
            <span>Admin username</span>
                <input type='text' name='username' placeholder='username' required>
            </div>
            <div class='field'>
            <span>Password</span>
                <input type='password' name='password' placeholder='Password' required>
            </div>
            <div class='field btn'>
                <div class='btn-layer'></div>
                <input type='submit' name='submitAddAdmin'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");
?>
