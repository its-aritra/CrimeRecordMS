<?php
    include("dbconnect.php");
    include('urlparams.php');

    $selectsql;
    $update;
    $back_url;
    $userid;
    if($_COOKIE["role"]== "admin"){
        $userid=$params['username'];
        $selectsql = "SELECT * FROM crms.admin WHERE username = '".$params['username']."';";
        $update="update crms.admin set password='".$password."'
             where username='".$userid."';";
        
        $back_url = "admindashboard.php?action=admindetails";
    }elseif($_COOKIE["role"]== "police"){
        $userid=$_COOKIE["loggedin_user"];
        $selectsql = "SELECT * FROM crms.policelogin WHERE police_id = '".$userid."';";
        $update="update crms.policelogin set password='".$password."'
             where police_id = '".$userid."';";
        $back_url = "policedashboard.php?action=policeprofile";
    }

    $result = mysqli_query($con, $selectsql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
if(isset($_POST['submitEditPassword'])){
    
    $password =$_REQUEST['password'];
    
    if($_COOKIE["role"]== "admin"){
        $update="update crms.admin set password='".$password."'
             where username='".$userid."';";
        
        $back_url = "admindashboard.php?action=admindetails";
    }elseif($_COOKIE["role"]== "police"){
        $update="update crms.policelogin set password='".$password."'
             where police_id = '".$userid."';";
    }
    
    if($con->query($update) == true) {
        
        echo ("
            <script>   
                alert('Password updated Successfully!');                    
                window.location.href='".$back_url."';
            </script>
        ");
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    
}
$con->close();
    echo ("
    <div class='content'>
      <div class='edit-profile'>
      <div class='profile_header'>Edit Admin Password</div>
      <button id='edit-profile-btn'>
      <a href='".$back_url."'>Back to Admin Details</a>
      </button>  
      <form method='post'>
          <div class='field'>
                <span>Username</span>
              <input type='text' name='username' placeholder='Username' value='".$userid."' readonly required>
          </div>
          <div class='field'>
                <span>Password</span>
              <input type='password' name='password' placeholder='Password' onkeyup='check();' required>
          </div>
          <div class='field'>
                <span>Comfirm Password</span>
              <input type='password' name='confirm_password' placeholder='Password' onkeyup='check();' required>
          </div>
          <div class='field' >
            <span name='message'></span>
          </div>
          <div class='field btn'>
              <div class='btn-layer'></div>
              <input type='submit' name='submitEditPassword'value='Submit'>
          </div>
          
      </form>
    </div>
 </div>
</div>
");
?>