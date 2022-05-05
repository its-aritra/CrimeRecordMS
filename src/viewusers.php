<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.userprofile";
        
    }   
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>User Details</div>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
     echo ("
      
      <div class='complaint-card'>

        <div>
            <span>User ID </span><input type='text' value='".$row['user_id']."' readonly>
        </div>
        <div>
            <span>Name</span><input type='text' value='".$row['name']."' readonly>
        </div>
        <div>
            <span>Email</span><input type='text' value='".$row['email']."' readonly>
        </div>
        <div>
            <span>Phone Number </span><input type='text' value='".$row['ph_no']."' readonly>
        </div>
        <div>
            <span>Date of Birth</span><input type='text' value='".$row['dob']."' readonly>
        </div>
        <div>
            <span>Gender</span><input type='text' value='".$row['gender']."' readonly>
        </div>
        <div>
            <span>Address</span><input type='text' value='".$row['address']."' readonly>
        </div>
        <div class='edit-link'>
            <button class='edit-link-container'>
                <a href='admindashboard.php?action=edituserprofile&userprofileid=".$row['user_id']."'>
                <img src='../images/edit-icon.png'>
                Edit</a>
            </button>
        </div>
        
        
      </div>
   
");
}
echo("
</div>
</div>");
    
$con->close();
      
?>