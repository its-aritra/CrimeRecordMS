<?php
include("dbconnect.php");

if(isset($_POST['submitAddPolicePersonnel'])){
    $police_id=$_POST['police_id'];
    $police_name =$_POST['police_name'];
    $designation =$_POST['designation'];
    $pstation_id =$_POST['pstation_id'];
    $ph_no =$_POST['ph_no'];
    $email =$_POST['email'];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $doj = $_POST["doj"];
    $sql="INSERT INTO crms.policeprofile (police_id,police_name,designation,pstation_id,ph_no,email,dob,address,gender,doj,created,updated) VALUES 
                    ('$police_id','$police_name','$designation','$pstation_id','$ph_no','$email','$dob','$address','$gender','$doj',current_timestamp(),current_timestamp());" ; 
     
     $sql2 = "INSERT INTO crms.policelogin(police_id) VALUES ('$police_id');";
    if($con->query($sql) == true){
        if($con->query($sql2) == true){
        echo ("
            <script>   
                alert('Police profile added Successfully!');                    
                window.location.href='admindashboard.php?action=policepersonnel';
            </script>
        ");
    } 
            
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    
}
$sql1 = 'SELECT pstation_id FROM crms.policestation;';
$result1 = mysqli_query($con, $sql1);
    
      echo ("
      <div class='content'>
        <div class='edit-profile'>
        <div class='profile_header'>Add Police Personnel Details</div>
        <button id='edit-profile-btn'>
        <a href='admindashboard.php?action=policepersonnel'>Back to Police Personnel Records</a>
        </button>  
        <form method='post'>
            <div class='field'>
            <span>Police Id</span>
                <input type='text' name='police_id' placeholder='Police Id' required>
            </div>
            <div class='field'>
            <span>Police Name</span>
                <input type='text' name='police_name' placeholder='Police Name' required>
            </div>
            <div class='field'>
            <span>Designation</span>
                <input type='text' name='designation' placeholder='Designation' required>
            </div>
            <div class='field'>
            <span>Police Station Id</span>
            <select name='pstation_id'>
                <option>Choose Police Station ID</option>");
                while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                echo "<option value='". $row1['pstation_id'] ."'>PS-" .$row1['pstation_id'] ."</option>" ;
                }
                echo("</select>
                ");
                echo("
            </div>
            <div class='field'>
            <span>Phone Number</span>
                <input type='number' name='ph_no' placeholder='Phone Number' required>
            </div>
            <div class='field'>
            <span>Email</span>
                <input type='email' name='email' placeholder='Email Id' required>
            </div>
            <div class='field'>
            <span>Date Of Birth</span>
                <input type='text' name='dob' placeholder='Date of Birth' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' required >
            </div>
            <div class='field'>
            <span>Address</span>
                <textarea name='address' placeholder='Address' required ></textarea>
            </div>
            <div class='field'>
            <span>Gender</span>
                <select  name='gender' placeholder='Gender'>
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                    <option value='other'>Other</option>
                </select>
            </div>
            <div class='field'>
            <span>Date Of Joining</span>
                <input type='text' name='doj' placeholder='Date of Joining' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' required >
            </div>
            <div class='field btn'>
                <div class='btn-layer'></div>
                <input type='submit' name='submitAddPolicePersonnel'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");
?>
