<?php
    include("dbconnect.php");
    if($_COOKIE['role']='admin'){
        $sql = "SELECT * FROM crms.fir ORDER BY created DESC";        
    }

    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Registered FIR</div>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $reporterUserId = "";
        $reporterUsername = "";
        $reporterUserEmail = "";
        // if($row['reportedBy']!= NULL){
            $sql1 = "SELECT * FROM crms.userprofile WHERE email=(SELECT createdBy FROM crms.incident WHERE inci_id=".$row['inci_id'].")";
            $userdetails = mysqli_fetch_array(mysqli_query($con, $sql1), MYSQLI_ASSOC);
            if(isset($userdetails['user_id']) && isset($userdetails['name']) && isset($userdetails['email'])){
                $reporterUserId = $userdetails['user_id'];
                $reporterUsername = $userdetails['name'];
                $reporterUserEmail = $userdetails['email'];
            }
        // $reporterUserId = $row['reportedBy'];
        // $sql2="SELECT * FROM crms.userprofile WHERE email=(SELECT createdBy FROM crms.incident WHERE inci_id=".$row['inci_id'].")";
        // }
        echo ("
      
      <div class='complaint-card fir-detail-card'>

        <div>
            <span>FIR ID </span><input type='text' value='".$row['fir_id']."' readonly>
        </div>
        <div>
            <span>FIR Date </span><input type='date' value='".$row['fir_date']."' readonly>
        </div>
        <div>
            <span>Incident ID </span><input type='text' value='".$row['inci_id']."' readonly>
        </div>
        <div>
            <span>Criminal ID </span><input type='text' value='".$row['criminal_id']."' readonly>
        </div>
        <div>
            <span>Reported user id </span><input type='text' value='".$reporterUserId."' readonly> 
        </div>
        <div>
            <span>Reported user name </span><input type='text' value='".$reporterUsername."' readonly>
        </div>
        <div>
            <span>Reported user email</span><input type='text' value='".$reporterUserEmail."' readonly>
        </div>
        
      </div>
   
");
}
echo("
</div>
</div>");
    
$con->close();
