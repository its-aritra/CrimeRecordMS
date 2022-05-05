<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.incident ORDER BY created DESC";
    }
    else{
        $sql = "SELECT * FROM crms.incident WHERE createdBy = '".$_COOKIE["loggedin_user"]."';";
    }
    
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Registered Complaints</div>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo ("
      
      <div class='complaint-card complaint-detail-card'>
        <div>
            <span>Incident ID</span><input type='text' value='".$row['inci_id']."' readonly>
        </div>
        <div>
            <span>Incident Type </span><input type='text' value='".$row['inci_type']."' readonly>
        </div>
        <div>
            <span>Incident Date </span><input type='date' value='".$row['inci_date']."' readonly>
        </div>
        <div>
            <span>Incident Time </span><input type='time' value='".$row['inci_time']."' readonly>
        </div>
        <div>
            <span>Location </span><input type='text' value='".$row['location']."' readonly>
        </div>
        <div>
            <span>FIR Status </span><input type='text' value='".$row['fir_status']."' readonly>
        </div>
        <div>
            <span>Description </span><textarea readonly>".$row['description']."</textarea> 
        </div>
      </div>
   
");
}
echo("
</div>
</div>");
    
$con->close();
      
?>