<?php
    include('dbconnect.php');
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];
    $sql;
    $username;
    if($usertype=='admin') {
        $sql = "SELECT * FROM crms.admin WHERE username = '$email' AND password = '$password';";
        $username = "username";
    }

    elseif ($usertype=='police') {
        $sql = "SELECT * FROM crms.policelogin WHERE police_id = '$email' AND password = '$password';";
        $username = "police_id";
    }

    elseif ($usertype=='user') {
        $sql = "SELECT * FROM crms.userlogin WHERE email = '$email' AND password = '$password';";
        $username = "email";
    }
    
    $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            setcookie('loggedin_user',$row[$username]);
            setcookie('role',$usertype);
            $msg = "Login Successfull";
            if($usertype=='admin') {
                header("Location: admindashboard.php?action=dashboard"); 
            }
            elseif ($usertype=='user') {
                header("Location: userdashboard.php?action=dashboard"); 
            }
            elseif ($usertype=='police') {
                header("Location: policedashboard.php?action=dashboard"); 
            }
            exit; 
        }  
        else{  
            $msg = "Login Failed. Invalid username or password!";
            header("Location: signinup.php?usertype=".$usertype."&loginfailed=true");
            exit;
        }     
    

    $con->close();
?>