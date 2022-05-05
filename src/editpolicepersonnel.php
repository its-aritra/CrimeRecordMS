<?php
    include("dbconnect.php");
    include('urlparams.php');
    $redirecr_url;
    $policeid;
    $back_param;
    if($_COOKIE["role"]== "admin"){
        $redirecr_url="admindashboard.php";
        $policeid = $params['policeprofileid'];
        $back_param = "policepersonnel";
    }elseif($_COOKIE["role"]== "police"){
        $redirecr_url="policedashboard.php";
        $policeid=$_COOKIE["loggedin_user"];
        $back_param = "policeprofile";
    }
    $sql = "SELECT * FROM crms.policeprofile WHERE police_id = '".$policeid."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
if(isset($_POST['submitEditPolicePersonnel'])){
    
    $police_name =$_REQUEST['police_name'];
    $designation =$_REQUEST['designation'];
    $pstation_id =$_REQUEST['pstation_id'];
    $ph_no =$_REQUEST['ph_no'];
    $email =$_REQUEST['email'];
    $dob = $_REQUEST["dob"];
    $address = $_REQUEST["address"];
    $gender = $_REQUEST["gender"];
    $doj = $_REQUEST["doj"];
    $update="update crms.policeprofile set 
                            police_name='".$police_name."',
                            designation='".$designation."',
                            pstation_id='".$pstation_id."',
                            ph_no='".$ph_no."',
                            email='".$email."',
                            email='".$email."',
                            address='".$address."',
                            gender='".$gender."',
                            doj='".$doj."',
                            updated=current_timestamp() 
             where police_id='".$policeid."';";
    echo($update);
    
    if($con->query($update) == true) {
        
        echo ("
            <script>   
                alert('Police profile updated Successfully!');                    
                window.location.href='".$redirecr_url."?action=policepersonnel';
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
      <div class='profile_header'>Edit Police Personnel Details</div>
          <button id='edit-profile-btn'>
            <a href='".$redirecr_url."?action=".$back_param."'>Back</a>
          </button> 
          
      <form method='post'>
          <div class='field'>
                <span>Police Id</span>
              <input type='text' name='police_id' placeholder='Police Id' value='".$row['police_id']."' readonly required>
          </div>
          <div class='field'>
                <span>Police Name</span>
              <input type='text' name='police_name' placeholder='Police Name' value='".$row['police_name']."' required>
          </div>
          <div class='field'>
          <span>Designation</span>
              <input type='text' name='designation' placeholder='Designation' value='".$row['designation']."' required>
          </div>
          <div class='field'>
          <span>Police Station Id</span>
              <input type='text' name='pstation_id' placeholder='Police Station Id' value='".$row['pstation_id']."' required>
          </div>
          <div class='field'>
          <span>Phone Number</span>
              <input type='number' name='ph_no' placeholder='Phone Number' value='".$row['ph_no']."' required>
          </div>
          <div class='field'>
          <span>Email Id</span>
              <input type='text' name='email' placeholder='Email Id' value='".$row['email']."' required>
          </div>
          <div class='field'>
          <span>Date Of Birth</span>
              <input type='text' name='dob' placeholder='Date of Birth' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' value='".$row['dob']."' required >
          </div>
          <div class='field'>
          <span>Address</span>
              <textarea name='address' placeholder='Address' required >".$row['address']."</textarea>
          </div>
          <div class='field'>
          <span>Gender</span>
              <input  name='gender' placeholder='Gender' value='".$row['gender']."' required>
          </div>
          <div class='field'>
          <span>Date Of Joining</span>
              <input type='text' name='doj' placeholder='Date of Joining' onfocus='(this.type=`date`)' onblur='(this.type=`text`)'  value='".$row['doj']."' required >
          </div>
          <div class='field btn'>
              <div class='btn-layer'></div>
              <input type='submit' name='submitEditPolicePersonnel'value='Submit'>
          </div>
      </form>
    </div>
 </div>
</div>
");
?>