<?php
    include("dbconnect.php");
    include('urlparams.php');
    $sql = "SELECT * FROM crms.policestation WHERE pstation_id = '".$params['policestationid']."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
if(isset($_POST['submitEditPoliceStation'])){
    
    $pstation_id=$_REQUEST['pstation_id'];
    $state =$_REQUEST['state'];
    $district =$_REQUEST['district'];
    $area =$_REQUEST['area'];
    $ofcr_inchrg =$_REQUEST['ofcr_inchrg'];
    $no_of_prsnls =$_REQUEST['no_of_prsnls'];
    $official_email = $_REQUEST["official_email"];
    $office_ph = $_REQUEST["office_ph"];
    $update="update crms.policestation set 
                            state='".$state."',
                            district='".$district."',
                            area='".$area."',
                            ofcr_inchrg='".$ofcr_inchrg."',
                            no_of_prsnls='".$no_of_prsnls."',
                            official_email='".$official_email."',
                            office_ph='".$office_ph."',
                            updated=current_timestamp() 
             where pstation_id='".$params['policestationid']."';";
    echo($update);
    
    if($con->query($update) == true) {
        
        echo ("
            <script>   
                alert('Police station updated Successfully!');                    
                window.location.href='admindashboard.php?action=policestations';
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
        <div class='profile_header'>Edit Police Station Details</div>
        <button id='edit-profile-btn'>
            <a href='admindashboard.php?action=policestations'>Back to Police Station Records</a>
        </button>  
        <form method='post'>
            <div>
                <span>Police Station ID </span>
                <input type='text' name='pstation_id' placeholder='Police Station Id' value='".$row['pstation_id']."' readonly required>
            </div>
            <div>
                <span>State</span>
                <input type='text' name='state' placeholder='State' value='".$row['state']."' required >
            </div>
            <div>
                <span>District</span>
                <input type='text' name='district' placeholder='District' value='".$row['district']."' required>
            </div>
            <div>
                <span>Area</span>
                <input type='text' name='area' placeholder='Area' value='".$row['area']."' required>
            </div>
            <div>
                <span>Officer In Charge</span>
                <input type='text' name='ofcr_inchrg' placeholder='Officer in charge' value='".$row['ofcr_inchrg']."' required>
            </div>
            <div>
                <span>Strength</span>
                <input type='text' name='no_of_prsnls'] placeholder='Number of police personnel' value='".$row['no_of_prsnls']."' required>
            </div>
            <div>
                <span>Official Email</span>
                <input type='email' name='official_email'] placeholder='Office Email Id' value='".$row['official_email']."' required>
            </div>
            <div>
                <span>Office Phone</span>
                <input type='number' name='office_ph' placeholder='Office phone number' value='".$row['office_ph']."' required>
            </div>
            <div class='field btn'>
            <div class='btn-layer'></div>
            <input type='submit' name='submitEditPoliceStation'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");