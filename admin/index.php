<?php
session_start();

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
<div id="div2" align="center"><p align="right"><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></p>
	<p><a href="view_record.php" class="img-circle btn btn-success btn-lg btn-bg">View Records</a>    <a href="print.php" class="img-circle btn btn-success btn-lg btn-bg">Print Records</a>     <a href="add_staff.php" class="img-circle btn btn-success btn-lg btn-bg">Add Staff</a>   <a href="view_staff.php" class="img-circle btn btn-success btn-lg btn-bg">View Registered Staff</a> <br><br>  <a href="upass.php" class="img-circle btn btn-success btn-lg btn-bg">Change Admin Password</a>   <a href="view_state_record.php" class="img-circle btn btn-success btn-lg btn-bg">View Sorted Record</a>   <a href="state_details.php" class="img-circle btn btn-success btn-lg btn-bg">Enter State Details</a>   </p>
</div>





<?php
include('../footer.php');
?>