<?php
session_start();

include('../connect.php');

if(!isset($_SESSION['admin_id'])){
	header("location:../login.php");
}



include('heading.php');


?>
<style type="text/css">
	
	#div2{
		margin: 5% 0% 10% 0%;
	}
</style>
<div>
	
	<fieldset>
		<legend>Change Password</legend>
		<?php
	if(isset($_POST['sub'])){
	$opass=$_POST['opass'];
	$npass=$_POST['npass'];

	$sql2="SELECT * FROM admin";
	$result=mysql_query($sql2);
	$raw=mysql_fetch_assoc($result);
	$pass=$raw['password'];

	if($opass==$pass){
		$sql="UPDATE admin SET password='$npass' WHERE id='1' ";
		$result=mysql_query($sql);
		//echo $sql;
		if($result){
			echo "<script>alert('Password changed Successful! ')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			}
			else{
			echo "<script>alert('Error: Password was not changed! ')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			}
	}
	else{
		echo "<font color='red'>Password was not changed! Please try again!</font>";
	}
}?>
	<form method="post" class="form-group" action="">
		<input type="password" name="opass" placeholder="Enter Old Password" required class="form-control"><br>
		<input type="text" name="npass" placeholder="Enter New Password" required class="form-control"><br>
		<input type="submit" name="sub" value="Submit" class="btn btn-info">
	</form>
	</fieldset>
</div>


<?php
include('../footer.php');
?>