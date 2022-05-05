<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.policeprofile order by created desc";
        
    }

    
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Police Personnel Details</div>
        <button class='add'>
            <a href='admindashboard.php?action=addpolicepersonnel'>
            <img src='../images/add-logo.png'>
            Add</a>
        </button>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        echo ("   
      <div class='complaint-card police-detail-card'>      
        <div>
            <span>Police ID </span><input type='text' value='".$row['police_id']."' readonly>
        </div>
        <div>
            <span>Police Name</span><input type='text' value='".$row['police_name']."' readonly>
        </div>
        <div>
            <span>Designation</span><input type='text' value='".$row['designation']."' readonly>
        </div>
        <div>
            <span>Police Station Id</span><input type='text' value='".$row['pstation_id']."' readonly>
        </div>
        <div>
            <span>Phone Number</span><input type='text' value='".$row['ph_no']."' readonly>
        </div>
        <div>
            <span>Email</span><input type='text' value='".$row['email']."' readonly>
        </div>
        <div>
            <span>Date Of Birth</span><input type='text' value='".$row['dob']."' readonly>
        </div>
        <div>
            <span>Address</span><input type='text' value='".$row['address']."' readonly>
        </div>
        <div>
            <span>Gender</span><input type='text' value='".$row['gender']."' readonly>
        </div>
        <div>
            <span>Date Of Joining</span><input type='text' value='".$row['doj']."' readonly>
        </div>
        <div class='edit-link'>
            <button class='edit-link-container'>
                
                <a href='admindashboard.php?action=editpolicepersonnel&policeprofileid=".$row['police_id']."'>
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