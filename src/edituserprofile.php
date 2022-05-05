<?php
    include("dbconnect.php");
    $useremail;
    if($_COOKIE['role']=='admin'){
        include('urlparams.php');
        $sql1="SELECT email FROM crms.userprofile WHERE user_id = '".$params['userprofileid']."';";
        $result1 = mysqli_query($con, $sql1);  
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC); 
        $useremail = $row1['email'];
    }elseif($_COOKIE['role']=='user'){
        $useremail=$_COOKIE["loggedin_user"];
    }
    $sql = "SELECT * FROM crms.userprofile WHERE email = '".$useremail."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
if(isset($_POST['submitEditProfile'])){
    
    $user_id=$_REQUEST['user_id'];
    $name =$_REQUEST['name'];
    $email =$_REQUEST['email'];
    $ph_no =$_REQUEST['ph_no'];
    $dob =$_REQUEST['dob'];
    $gender =$_REQUEST['gender'];
    $address = $_REQUEST["address"];
    $update="update crms.userprofile set 
                            user_id='".$user_id."',
                            name='".$name."',
                            ph_no='".$ph_no."',
                            dob='".$dob."',
                            gender='".$gender."',
                            address='".$address."',
                            updated=current_timestamp() 
             where email='".$useremail."';";
    if($con->query($update) == true) {
        if($_COOKIE['role']=='admin'){
            echo ("
            <script>   
                alert('User profile updated Successfully!');                    
                window.location.href='admindashboard.php?action=viewusers';
            </script>
        ");
        }
        elseif($_COOKIE['role']=='user'){
            echo ("
            <script>   
                alert('User profile updated Successfully!');                    
                window.location.href='userdashboard.php?action=profile';
            </script>
        ");
        }
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    
}
$con->close();
      echo ("
      <div class='content'>
        <div class='edit-profile'>
        <div class='profile_header'>Edit Profile Details</div>
        <button id='edit-profile-btn'>"
    );
        
        if($_COOKIE['role']=='user'){
            echo("         
                <a href='userdashboard.php?action=profile'>View Profile</a>          
            ");
        }
        elseif($_COOKIE['role']=='admin'){
            echo("         
                <a href='admindashboard.php?action=viewusers'>Back to Users</a>          
            ");
        }
        echo(" 
        </button>  
        <form method='post'>
            <div>
                <span>User Id : </span><input type='text' name='user_id' value='".$row['user_id']."' readonly>
            </div>
            <div>
                <span>Name : </span><input type='text' name='name' value='".$row['name']."' >
            </div>
            <div>
                <span>Email Id : </span><input type='text' name='email' value='".$row['email']."' readonly>
            </div>
            <div>
                <span>Phone Number : </span><input type='number' name='ph_no' value='".$row['ph_no']."' >
            </div>
            <div>
                <span>Date Of Birth : </span><input type='date' name='dob' value='".$row['dob']."' >
            </div>
            <div>
                <span>Gender : </span><input type='text' name='gender' value='".$row['gender']."' >
            </div>
            <div>
                <span>Address : </span>
                <textarea name='address'>".$row['address']."</textarea>
            </div>
            <div class='field btn'>
                <div class='btn-layer'></div>
                <input type='submit' name='submitEditProfile'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");
?>
