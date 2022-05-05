<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server ,$username, $password);

    if(!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $msg='';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $phone_no = $_POST['phone_no'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "INSERT INTO crms.userlogin (email,password) VALUES ('$email','$password');" ;

    if($con->query($sql) == true) {
        $sql2 = "SELECT sno FROM crms.userlogin WHERE email = '$email';";
        $result2 = $con->query($sql2);

        if ($result2->num_rows > 0) {
        // output data of each row
            while($row = $result2->fetch_assoc()) {
                $sno = $row["sno"];
                $usr = "USR".$sno;
                $sql3 = "INSERT INTO crms.userprofile (user_id,name,email,ph_no,dob,gender,address,created,updated) VALUES ('$usr','$name','$email','$phone_no','$dob','$gender','$address',current_timestamp(),current_timestamp());";
                if($con->query($sql3) == true) {
                    
                    $msg = "User created Successfully";
                    // header("Location: signinup.php?usertype=user");
                    echo ("
                    <script>   
                        alert('User created Successfully');                    
                        window.location.href='signinup.php?usertype=user';
                    </script>
                    ");
                }
                
        }
        } else {
            echo "0 results";
        }
        
    }

    else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
?>
