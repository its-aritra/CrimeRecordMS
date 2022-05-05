<?php
    include("dbconnect.php");
    include('urlparams.php');
    $redirecr_url;
    if($_COOKIE["role"]== "admin"){
        $redirecr_url="admindashboard.php";
    }elseif($_COOKIE["role"]== "police"){
        $redirecr_url="policedashboard.php";
    }
    $sql = "SELECT * FROM crms.criminal WHERE criminal_id    = '".$params['criminalid']."';";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
if(isset($_POST['submitEditCriminal'])){
    
    $criminal_id =$_REQUEST['criminal_id'];
    $name =$_REQUEST['name'];
    $email =$_REQUEST['email'];
    $age =$_REQUEST['age'];
    $image =$_REQUEST['image'];
    $address = $_REQUEST["address"];
    $id_proof = $_REQUEST["id_proof"];
    
    $update="update crms.criminal set 
                            name='".$name."',
                            email='".$email."',
                            age='".$age."',
                            image='".$image."',
                            address='".$address."',
                            id_proof='".$id_proof."',
                            updated=current_timestamp() 
             where criminal_id='".$params['criminalid']."';";
    echo($update);
    
    if($con->query($update) == true) {
        
        echo ("
            <script>   
                alert('Criminal profile updated Successfully!');                    
                window.location.href='".$redirecr_url."?action=editcriminal&criminalid=".$params['criminalid']."';
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
      <div class='profile_header'>Edit Criminal Details</div>
      <button id='edit-profile-btn'>
      <a href='".$redirecr_url."?action=viewcriminal'>Back to Criminal Records</a>
      </button>  
      <form method='post'>
          <div class='field'>
                <span>Criminal Id</span>
              <input type='text' name='criminal_id' placeholder='Criminal Id' value='".$row['criminal_id']."' readonly required>
          </div>
          <div class='field'>
                <span>Criminal Name</span>
              <input type='text' name='name' placeholder='Criminal Name' value='".$row['name']."' required>
          </div>
          <div class='field'>
          <span>Email</span>
              <input type='email' name='email' placeholder='Email' value='".$row['email']."' required>
          </div>
          <div class='field'>
          <span>Age</span>
              <input type='text' name='age' placeholder='Age' value='".$row['age']."' required>
          </div>
          <div class='field'>
          <span>Image</span>
              <input type='file' name='image' placeholder='Image' value='".$row['image']."' >
          </div>
          <div class='field'>
          <span>Address</span>
              <input type='text' name='address' placeholder='Address' value='".$row['address']."' required>
          </div>
          <div class='field'>
          <span>ID Proof</span>
              <input type='file' name='id_proof'  value='".$row['id_proof']."'  >
          </div>
          <div class='field btn'>
              <div class='btn-layer'></div>
              <input type='submit' name='submitEditCriminal'value='Submit'>
          </div>
      </form>
    </div>
 </div>
</div>
");
?>