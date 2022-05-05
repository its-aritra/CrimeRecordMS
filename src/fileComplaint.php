<?php
    include('dbconnect.php');
    $successmsg='';
    if(isset($params['success'])){
    if($params['success']== true){
        $successmsg = "Complaint registered successfully";
      }
    }
    if(isset($_POST['submitFileComplaint'])){
        $inci_type = $_POST['inci_type'];
        $inci_date = $_POST['inci_date'];
        $inci_time = $_POST['inci_time'];  
        $location = $_POST['location'];
        $description = $_POST['description'];
        $createdBy = $_COOKIE['loggedin_user'];
        
        $sql = "INSERT INTO crms.incident (inci_type,inci_date,inci_time,location,description,createdBy,created,updated) VALUES ('$inci_type','$inci_date','$inci_time','$location','$description','$createdBy',current_timestamp(),current_timestamp());" ;

        if($con->query($sql) == true) {
            header("Location: userdashboard.php?action=fileComplaint&success=true");
        }

        else {
            header("Location: userdashboard.php?action=fileComplaint&success=false");
            echo "ERROR: $sql <br> $con->error";
        }
    }
    $con->close();
    echo("
      <div class='content'>
      <div class='complaint_container'>
        <div class='complaint_header'>File Complaint</div>
        <form method='post'>
        <div class='field'>
        <span>Incident Type</span>
        <select  name='inci_type' id='inci_type' placeholder='Incident Type' required>
           <option value='Assault'>Assault</option>
           <option value='Burglary'>Burglary</option>
           <option value='Cybercrime'>Cybercrime</option>
           <option value='Forgery'>Forgery</option>
           <option value='Shoplifting'>Shoplifting</option>
           <option value='Trespassing'>Trespassing</option>
        </select>
        </div>
          <div class='field'>
            <span>Incident Date : </span>
            <input type='text' name='inci_date' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' required>
          </div>
          <div class='field'>
            <span>Incident Time : </span>
            <input type='text' name='inci_time' onfocus='(this.type=`time`)' onblur='(this.type=`text`)' required>
          </div>
          <div class='field'>
            <span>Location : </span>
            <input type='text' name='location' required >
          </div>
          <div class='field'>
            <span>Description : </span>
            <textarea type='text' name='description' required></textarea >
          </div>
          <div class='field btn'>
              <div class='btn-layer'></div>
              <input type='submit' name='submitFileComplaint' value='Submit'>
          </div>
          <div class='successmsg'>".$successmsg."</div>
        </form>

      </div>
    </div>
  </div>
      ");

?>
