<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.policestation order by created desc";
        
    }

    
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Police Station</div>
        <button class='add'>
            <a href='admindashboard.php?action=addpolicestation'>
            <img src='../images/add-logo.png'>
            Add</a>
        </button>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        echo ("   
      <div class='complaint-card station-detail-card'>      
        <div>
            <span>Police Station ID </span>
            <input type='text' value='".$row['pstation_id']."' readonly>
        </div>
        <div>
            <span>State</span>
            <input type='text' value='".$row['state']."' readonly>
        </div>
        <div>
            <span>District</span>
            <input type='text' value='".$row['district']."' readonly>
        </div>
        <div>
            <span>Area</span>
            <input type='text' value='".$row['area']."' readonly>
        </div>
        <div>
            <span>Officer In Charge</span>
            <input type='text' value='".$row['ofcr_inchrg']."' readonly>
        </div>
        <div>
            <span>Number Of Personnel</span>
            <input type='text' value='".$row['no_of_prsnls']."' readonly>
        </div>
        <div>
            <span>Official Email Id</span>
            <input type='email' value='".$row['official_email']."' readonly>
        </div>
        <div>
            <span>Office Phone</span>
            <input type='text' value='".$row['office_ph']."' readonly>
        </div>
        <div class='edit-link'>
            <button class='edit-link-container'>
                
                <a href='admindashboard.php?action=editpolicestation&policestationid=".$row['pstation_id']."'>
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