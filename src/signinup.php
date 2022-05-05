<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <title>Login</title>
   <link rel="stylesheet" href="../css/home.css">
   <link rel="icon" href="../images/logo1.1.png">
</head>

<body>
   
         <?php
         // $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         // $parameters = parse_url($actual_link);
         // parse_str($parameters['query'], $params);
         include("urlparams.php");
         $email_placeholder;
         $signupLink_show = 'none';
         $adminLinkClass ='';
         $policeLinkClass ='';
         $userLinkClass ='';
         if(isset($params['login'])){
         if($params['login'] == 'false'){             
            if (isset($_COOKIE["loggedin_user"])) {
            setcookie("loggedin_user", "", time()-3600);
            setcookie("role", "", time()-3600);
          }
         }
         }  

         //parse_str($parameters['query'], $params);
         if ($params['usertype'] == 'admin') {
            $email_placeholder = 'Admin Id';
            $adminLinkClass = 'active';
         } elseif ($params['usertype'] == 'police') {
            $email_placeholder = 'Police Id';
            $policeLinkClass = 'active';
         } elseif ($params['usertype'] == 'user') {
            $email_placeholder = 'Email Id';
            $userLinkClass = 'active';
            $signupLink_show = 'block';
         }
         else{
            header("Location: error.php");
          }
         echo("
         <div class='header'>
            <div class='header_banner'>CRIME RECORDS MANAGEMENT SYSTEM</div>
            <div class='topnav'>
               <a id='home_link' href='index.html' >Home</a>
               <a id='admin_link' class='".$adminLinkClass."' href='signinup.php?usertype=admin'>Admin</a>
               <a id='police_link' class='".$policeLinkClass."' href='signinup.php?usertype=police'>Police</a>
               <a id='user_link' class='".$userLinkClass."' href='signinup.php?usertype=user'>User</a>
            </div>
         </div>
         <div class='wrapper'>
         ");
         echo ("<div class='title-text'>
                                    <div class='title login'>" . ucwords($params['usertype']) . " Login</div>
                                    <div class='title signup'>" . ucwords($params['usertype']) . " Signup</div>
                                 </div>");
         if (isset($_GET['loginfailed'])) {
            if ($params['loginfailed'] == true) {
               echo ("
               <div class='msg'>Login Failed! Username or Password is incorrect.</div>");
            }
         }

         echo ("<div class='form-container'>");
         if ($params['usertype'] == 'user') {
            echo ("<div class='slide-controls'>
               <input type='radio' name='slide' id='login' checked>
               <input type='radio' name='slide' id='signup'>
               <label for='login' class='slide login'>Login</label>
               <label for='signup' class='slide signup'>Signup</label>
               <div class='slider-tab'></div>
               </div>");
         }
         echo ("
            <div class='form-inner'>");


         echo ("
                        <form action='login.php' method = 'post' class='login'>
                           <div class='field'>
                              <input type='text' name='email' placeholder='" . $email_placeholder . "' required>
                           </div>
                           <div class='field'>
                              <input type='password' name ='password' placeholder='Password' required>
                           </div>
                           <div class='field btn'>
                              <div class='btn-layer'></div>
                              <input type='submit' value='Login'>
                           </div>
                           <div class='signup-link' style='display:".$signupLink_show.";'>
                              Not a member? <a href=''>Signup now</a>
                           </div>
                           <input type= 'hidden' name='usertype' value=" . $params['usertype'] . ">
                        </form>"
         );
         
         if ($params['usertype'] == 'user') {
            echo ("
                           <form action='signUp.php' method='post' class='signup'>
                           <div class='field'>
                           <input type='text' name='name' placeholder='Name' required>
                        </div>
                        <div class='field'>
                           <input type='text' name='email' placeholder='Email Address' required>
                        </div>
                        <div class='field'>
                           <input type='password' name = 'password' placeholder='Password' required>
                        </div>
                        <div class='field'>
                           <select  name='gender' id='gender' placeholder='Gender'>
                              <option value='male'>Male</option>
                              <option value='female'>Female</option>
                              <option value='other'>Other</option>
                           </select>
                        </div>
                        <div class='field'>
                           <input type='number' name='phone_no' placeholder='Phone Number' required>
                        </div>
                        <div class='field'>
                           <input type='text' name='dob' placeholder='Date of Birth' onfocus='(this.type=`date`)' onblur='(this.type=`text`)' required>
                        </div>
                        <div class='field'>
                           <textarea name='address' placeholder='Address' id='address' required></textarea>
                        </div>
                        <div class='field btn'>
                           <div class='btn-layer'></div>
                           <input type='submit' value='Signup'>
                        </div>
                     </form>
                  ");
            }
         ?>
      </div>
   </div>
</div>
   <script src="../js/login.js"></script>
</body>

</html>