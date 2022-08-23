<?php
session_start();

if(!isset($_SESSION['user_id'])){
	header("location:login.php");
}

include('heading.php');

include('connect.php');


$name=$_SESSION['name'];
$lga=$_SESSION['lga'];
$pic=$_SESSION['pic'];
$state=$_SESSION['state'];
$dob=$_SESSION['dob'];
$gender=$_SESSION['gender'];
$state=$_SESSION['state'];

?>

<div>
  <h2>Candidate's Registration Details:</h2>
  <table width="649" cellpadding="3" cellspacing="3" class="table">
    <tr>
      <td width="65"><img src="images/<?php echo $pic;  ?>" width="200"> </td>
      <td width="10"></td>
      <td width="">:</td>
    </tr>
    <tr>
      <td><strong>Name</strong></td>
      <td>:</td>
      <td><?php echo $name;  ?></td>
    </tr>
    <tr>
      <td><strong>Gender</strong></td>
      <td>:</td>
      <td><?php echo $gender;  ?></td>
    </tr>
    <tr>
      <td><strong>Date of Birth</strong></td>
      <td>:</td>
      <td><?php echo $dob;  ?></td>
    </tr>
    <tr>
      <td><strong>State</strong></td>
      <td>:</td>
      <td><?php echo $state;  ?></td>
    </tr>
    <tr>
      <td><strong>Local Govt. Area</strong></td>
      <td>:</td>
      <td><?php echo $lga;  ?></td>
    </tr>
    <tr>
      <td>
        <a href="" onclick="javascript: window.print()" class="btn">Print</a>  <a href="index.php" class="btn">Back</a>
      </td>
    </tr>
  </table>
</div>
