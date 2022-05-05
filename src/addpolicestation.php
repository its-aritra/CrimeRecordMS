<?php
include("dbconnect.php");
if(isset($_POST['submitAddPoliceStation'])){
    
    $pstation_id=$_POST['pstation_id'];
    $state =$_POST['state'];
    $district =$_POST['district'];
    $area =$_POST['area'];
    $ofcr_inchrg =$_POST['ofcr_inchrg'];
    $no_of_prsnls =$_POST['no_of_prsnls'];
    $official_email = $_POST["official_email"];
    $office_ph = $_POST["office_ph"];
    
    $sql="INSERT INTO crms.policestation (pstation_id,state,district,area,ofcr_inchrg,no_of_prsnls,official_email,office_ph,created,updated) VALUES 
                    ('$pstation_id','$state','$district','$area','$ofcr_inchrg','$no_of_prsnls','$official_email','$office_ph',current_timestamp(),current_timestamp());" ; 
    // echo($sql);
     
    if($con->query($sql) == true) {
        echo($insert);
            echo ("
            <script>   
                alert('Police station added Successfully!');                    
                window.location.href='admindashboard.php?action=policestations';
            </script>
        ");
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    
}
$sql1 = 'SELECT police_name FROM crms.policeprofile;';
$result1 = mysqli_query($con, $sql1);
    
      echo ("
      <div class='content'>
        <div class='edit-profile'>
        <div class='profile_header'>Add Police Station Details</div>
        <button id='edit-profile-btn'>
            <a href='admindashboard.php?action=policestations'>Back to Police Station Records</a>
        </button>  
        <form method='post'>
            <div>
                <span>Police Station ID </span>
                <input type='text' name='pstation_id' placeholder='Police Station Id' >
            </div>
            <div>
                <span>State</span>
                <input type='text' name='state' placeholder='State' >
            </div>
            <div>
                <span>District</span>
                <input type='text' name='district' placeholder='District'>
            </div>
            <div>
                <span>Area</span>
                <input type='text' name='area' placeholder='Area'>
            </div>
            <div>
                <span>Officer In Charge</span>
                <select name='ofcr_inchrg'>
                <option>Choose Officer in Charge</option>");
                while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                echo "<option value='". $row1['police_name'] ."'>" .$row1['police_name'] ."</option>" ;
                }
                echo("</select>
                ");
                echo("
                
            </div>
            <div>
                <span>Strength</span>
                <input type='text' name='no_of_prsnls'] placeholder='Number of police personnel' >
            </div>
            <div>
                <span>Official Email</span>
                <input type='email' name='official_email'] placeholder='Office Email Id' >
            </div>
            <div>
                <span>Office Phone</span>
                <input type='number' name='office_ph' placeholder='Office phone number' >
            </div>
            <div class='field btn'>
            <div class='btn-layer'></div>
            <input type='submit' name='submitAddPoliceStation'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");
?>
