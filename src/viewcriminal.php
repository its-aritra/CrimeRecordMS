<?php
    include("dbconnect.php");
    $redirecr_url;
    if($_COOKIE["role"]== "admin"){
        $redirecr_url="admindashboard.php";
    }elseif($_COOKIE["role"]== "police"){
        $redirecr_url="policedashboard.php";
    }

    $sql = "SELECT * FROM crms.criminal ORDER BY created DESC";        
    $result = mysqli_query($con, $sql); 
    echo("
    <div class='content'>
        <div class='complaint_header'>Criminal Details</div>
    
    ") ;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $imageURL = '../uploads/'.$row["image"];
        $idProofURL = '../uploads/'.$row["id_proof"];
        // $sql1 = "SELECT * FROM crms.c where user_id='".$row['user_id']."';";
        // $userdetails = mysqli_fetch_array(mysqli_query($con, $sql1), MYSQLI_ASSOC);
        echo ("
      
      <div class='complaint-card'>
        <div>
            <div class='image'>
                <img src='".$imageURL."' name='image' onerror='this.src=`../images/avatar.png`'>
            </div>
        </div>
        <div>
            <span>Criminal ID </span><input type='text' value='".$row['criminal_id']."' readonly>
        </div>
        <div>
            <span>Name </span><input type='text' value='".$row['name']."' readonly>
        </div>
        <div>
            <span>Email </span><input type='text' value='".$row['email']."' readonly>
        </div>
        <div>
            <span>Age </span><input type='text' value='".$row['age']."' readonly>
        </div>
        <div>
            <span>Address</span><input type='text' value='".$row['address']."' readonly>
        </div>
        <div>
            <button class='download-container'>
                
                <a href='download.php?path=".$idProofURL."'>
                <img src='../images/download-logo.png' >
                ID Proof</a>           
            </button>
        </div>
        <div class='edit-link'>
            <button class='edit-link-container'>
                
                <a href='".$redirecr_url."?action=editcriminal&criminalid=".$row['criminal_id']."'>
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
