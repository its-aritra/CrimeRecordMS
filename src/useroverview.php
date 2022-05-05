<?php
include('dbconnect.php');
//$sql = "SELECT * FROM crms.fir";

$curr_user = $_COOKIE['loggedin_user'];
$sql1 = "SELECT count(*) FROM crms.incident WHERE createdBy='".$curr_user."'";
$sql2 = "SELECT count(*) FROM crms.incident WHERE fir_status!='NOT FILED' AND createdBy='".$curr_user."'";
$sql3 = "SELECT count(*) FROM crms.incident WHERE fir_status='NOT FILED' AND createdBy='".$curr_user."'";


$result1 = mysqli_fetch_array($con->query($sql1) , MYSQLI_ASSOC);
$result2 = mysqli_fetch_array($con->query($sql2) , MYSQLI_ASSOC);
$result3 = mysqli_fetch_array($con->query($sql3) , MYSQLI_ASSOC);
echo("
<div class='content'>
  <div class='overview_header'>Overview</div>
  <div class='overview-card'>
    <div class='field'>
        <div>Complaints Registered</div>
        <div class='field-value'>".$result1['count(*)']."</div>
    </div>
    <div class='field'>
        <div> Complaints Addressed</div>
        <div class='field-value'>".$result2['count(*)']."</div>
    </div>
    <div class='field'>
        <div>Pending Action</div>
        <div class='field-value'>".$result3['count(*)']."</div>
    </div>
  </div>
  <div class='desc'>
  'Salvation and justice are not to be found in revolution,
   but in evolution through concord. Violence has ever achieved only destruction,
    not construction; the kindling of passions, not their pacification;
     the accumulation of hate and destruction, not the reconciliation of the contending parties;
      and it has reduced men and parties to the difficult task of building slowly after sad experience on the ruins of discord.'
  </div>
  </div>
</div>
");
?>