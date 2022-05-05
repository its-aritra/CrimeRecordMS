<?php
if(isset($_POST["submitAddCriminal"]) && !empty($_FILES["image"]["name"])){
    include("dbconnect.php");

    $statusMsg = '';

// File upload path
    $targetDir = "../uploads/";
    $fileName1 = basename($_FILES["image"]["name"]);
    $fileName2 = basename($_FILES["id_proof"]["name"]);
    $targetFilePath1 = $targetDir . $fileName1;
    $targetFilePath2 = $targetDir . $fileName2;
    $fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
    $fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

    $criminal_id=$_POST['criminal_id'];
    $name =$_POST['name'];
    $email =$_POST['email'];
    $age =$_POST['age'];
    $address =$_POST['address'];

     // Allow certain file formats
     $allowTypes = array('jpg','png','jpeg','gif','pdf');
     if((in_array($fileType1, $allowTypes)) && (in_array($fileType2, $allowTypes))) {
         $tempname1 = $_FILES["image"]["tmp_name"];
         $tempname2 = $_FILES["id_proof"]["tmp_name"];
         // Upload file to server
         if(move_uploaded_file($tempname1, $targetFilePath1)&&move_uploaded_file($tempname2, $targetFilePath2)){
            echo("test2 ");
             // Insert image file name into database
             $sql="INSERT INTO crms.criminal (criminal_id,name,email,age,image,id_proof,address,created,updated) VALUES 
                    ('$criminal_id','$name','$email','$age','$fileName1','$fileName2','$address',current_timestamp(),current_timestamp());"; 
             if($con->query($sql)){
                 $statusMsg = "The file ".$fileName1. " has been uploaded successfully.";
                 echo ("
                 <script>   
                     alert('Criminal added Successfully!');                    
                     window.location.href='policedashboard.php?action=viewcriminal';
                 </script>
                ");
             }else{
                 $statusMsg = "File upload failed, please try again.";
             } 
         }else{
             $statusMsg = "Sorry, there was an error uploading your file.";
         }
     }else{
         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
     }
 }

    
      echo ("
      <div class='content'>
        <div class='edit-profile'>
        <div class='profile_header'>Add Criminal Details</div>
        <button id='edit-profile-btn'>
            <a href='policedashboard.php?action=viewcriminal'>Go to Criminal Details</a>
        </button>  
        <form method='post' enctype='multipart/form-data'>
            <div class='field'>
                <span>Criminal ID </span>
                <input type='text' name='criminal_id' placeholder='Criminal Id' required>
            </div>
            <div>
                <span>Name</span>
                <input type='text' name='name' placeholder='Name' required>
            </div>
            <div>
                <span>Email Id</span>
                <input type='email' name='email' placeholder='Email' required>
            </div>
            <div>
                <span>Age</span>
                <input type='text' name='age' placeholder='Age' required >
            </div>
            <div>
                <span>Image</span>
                <input type='file' name='image' placeholder='image' required>
            </div>
            <div>
                <span>Address</span>
                <input type='text' name='address'] placeholder='Address' required>
            </div>
            <div>
                <span>Upload Id</span>
                <input type='file' name='id_proof' placeholder='Id proof' required>
            </div>
            <div class='field btn'>
            <div class='btn-layer'></div>
            <input type='submit' name='submitAddCriminal'value='Submit'>
            </div>
        </form>
      </div>
   </div>
  </div>
");
?>
