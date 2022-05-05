<?php
include('dbconnect.php');
//$sql = "SELECT * FROM crms.fir";
$sql1 = "SELECT count(*) FROM crms.policeprofile";
$sql2 = "SELECT count(*) FROM crms.fir";
$sql3 = "SELECT count(*) FROM crms.incident";
$sql4 = "SELECT count(*) FROM crms.criminal";
$sql5 = "SELECT count(*) FROM crms.userprofile";

$policeprofile = mysqli_fetch_array($con->query($sql1) , MYSQLI_ASSOC);
$fir = mysqli_fetch_array($con->query($sql2) , MYSQLI_ASSOC);
$complaints = mysqli_fetch_array($con->query($sql3) , MYSQLI_ASSOC);
$criminal = mysqli_fetch_array($con->query($sql4) , MYSQLI_ASSOC);
$user = mysqli_fetch_array($con->query($sql5) , MYSQLI_ASSOC);

echo("
<div class='content'>
  <div class='overview_header'>Overview</div>
  <div class='overview-card'>
    <div class='field'>
        <div class='field-title'>Complaints Registered</div>
        <div class='field-value'>".$complaints['count(*)']."</div>
    </div>
    <div class='field'>
        <div class='field-title'> Police Force Strength</div>
        <div class='field-value'>".$policeprofile['count(*)']."</div>
    </div>
    <div class='field'>
        <div class='field-title'>FIRs</div>
        <div class='field-value'>".$fir['count(*)']."</div>
    </div>
    <div class='field'>
        <div class='field-title'>Criminal</div>
        <div class='field-value'>".$criminal['count(*)']."</div>
    </div>
    <div class='field'>
        <div class='field-title'>Users</div>
        <div class='field-value'>".$user['count(*)']."</div>
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