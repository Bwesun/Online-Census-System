<?php
session_start();

if(!isset($_SESSION['admin_id'])){
	header("location:index.php");
}

include('heading.php');


?>
<style type="text/css">
	#div1{
		border:1px solid green;
		padding: 10px;
		margin-left: 20%;
		margin-right: 20%;
		border-radius: 5px;
	}
</style>

<div id="div1">
	
<?php
include('../connect.php');

if(isset($_POST['sub'])){
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$address=$_POST['address'];
$staff_no=$_POST['staff_no'];
$gender=$_POST['gender'];

$sql="INSERT INTO users(username, password, name, address, staff_no, gender)VALUES('$username', '$password', '$name', '$address', '$staff_no', '$gender')";
$result=mysql_query($sql);

if($result){	    
	echo "<font color='red'>Staff has been Added Successfully!</font>";                            
	echo "<div align='center'><img src='../img/load.gif' width='300'><P>Loading</p></div>";
	echo "<meta http-equiv='refresh' content='3; url=add_staff.php'>" ;
	}else{
	echo "<font color='red'>Error: Incorrect Username or Password! Please try again!</font>";
	}  

}


?><a href="index.php" class="btn"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>    <a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<h3 align="center">Add Staff</h3>
	<div>
	<form method="post" class="form-group">
		
		<input type="text" name="name" class="form-control" required placeholder="Enter Staff Name"><br>
		<input type="text" name="staff_no" class="form-control" required placeholder="Enter Staff Number"><br>
		<select name="gender" class="form-control">
			<option value="">-----Select Gender-----</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select><br>
		<textarea name="address" class="form-control" required></textarea>
		<input type="text" name="username" class="form-control" required placeholder="Enter Username"><br>
		<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
	
	</div>
	<div align="center">
		<button type="submit" name="sub" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>   Add</button>
	</div>
	</form>
</div>





<?php
include('../footer.php');
?>