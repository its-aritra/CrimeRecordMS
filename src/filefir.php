<?php
    include('dbconnect.php');
    $successmsg='';
    $user = $_COOKIE["loggedin_user"];
    if(isset($params['success'])){
    if($params['success']== true){
        $successmsg = "FIR registered successfully";
      }
    }
    if(isset($_POST['submitFIR'])){
        $fir_id = $_POST['fir_id'];
        $fir_date = $_POST['fir_date'];
        $inci_id = $_POST['inci_id'];
        $criminal_id = $_POST['criminal_id'];
        $user_id = $user;
        
        $sql = "INSERT INTO crms.fir (fir_id,fir_date,inci_id,user_id,criminal_id,created,updated) VALUES 
            ('$fir_id','$fir_date','$inci_id','$user_id','$criminal_id',current_timestamp(),current_timestamp());" ;

        // echo($sql);
        if($con->query($sql) == true) {
            $sql1 = "UPDATE crms.incident SET fir_status='FILED' WHERE inci_id='$inci_id';";
              if($con->query($sql1) == true) {
                header("Location: policedashboard.php?action=filefir&success=true"); 
              }
              else {
                header("Location: policedashboard.php?action=filefir&success=false");
                echo "ERROR: $sql1 <br> $con->error";    
              }
            // header("Location: policedashboard.php?action=filefir&success=true");
        }

        else {
            header("Location: policedashboard.php?action=filefir&success=false");
            echo "ERROR: $sql <br> $con->error";
        }
    }
    $sql1 = 'SELECT inci_id from crms.incident;';
        $result1 = mysqli_query($con, $sql1);
    $con->close();
    echo("
      <div class='content'>
      <div class='complaint_container'>
        <div class='complaint_header'>File FIR</div>
        <form method='post'>
          <div class='field'>
            <span>FIR Id </span>
            <input type='text' name='fir_id' required>
          </div>
          <div class='field'>
            <span>FIR Date </span>
            <input type='text' name='fir_date' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' required>
          </div>
          <div class='field'>

            <span>Incident Id </span>
            <select name='inci_id'>
            <option></option>");
            while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
              echo "<option value='". $row1['inci_id'] ."'>INCI/" .$row1['inci_id'] ."</option>" ;
            }
            echo("</select>
          ");
          echo("
            
            
          </div>
          <div class='field'>
            <span>Criminal ID </span>
            <input type='text' name='criminal_id' required >
          </div>
          <div class='field'>
            <span>Filing officer: </span>
            <input type='text' name='user_id' value='".$user."' required readonly>
          </div>
          <div class='field btn'>
              <div class='btn-layer'></div>
              <input type='submit' name='submitFIR' value='Submit'>
          </div>
          <div class='successmsg'>".$successmsg."</div>
        </form>

      </div>
    </div>
  </div>
      ");

?>
