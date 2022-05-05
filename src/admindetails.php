<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.admin order by created desc";
        
    }

    
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Admin Details</div>
        <button class='add'>
            <a href='admindashboard.php?action=addadmin'>
            <img src='../images/add-logo.png'>
            Add</a>
        </button>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        echo ("   
      <div class='complaint-card admin-detail-card'>      
        <div>
            <span>User ID </span><input type='text' value='".$row['username']."' readonly>
        </div>
        <div>
            <span>Password</span><input type='password' value='".$row['password']."' readonly>
        </div>
        <div class='edit-link'>
            <button class='edit-link-container'>
                <a href='admindashboard.php?action=editpassword&username=".$row['username']."'>
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