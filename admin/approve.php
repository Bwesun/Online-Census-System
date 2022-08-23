<?php
session_start();

if(!isset($_SESSION['admin_id'])){
	header("location:login.php");
}
?>
<head>
	<link rel="stylesheet" type="text/css" href="../include/css/all.css">
	<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.theme.css">
	<script type="text/javascript" language="javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="../include/jquery/jquery.js"></script>

	<style type="text/css">
		body{
			margin: 1% 10% 0% 10%;
		}

	</style>
</head>
<body>
<div class="container">
	


<style type="text/css">
	#div1{
		border:1px solid green;
		padding: 10px;
		margin-left: 5%;
		margin-right: 5%;
	}
	
</style>

<div id="div1">
	<h2 align="center">NATIONAL POPULATION COMMISSION</h2>
	<h3 align="center">Approve Records</h3>

<?php
include('../connect.php');

if(isset($_POST['app_sub'])){
	$id=$_POST['id'];
	$num=1;
	$sql2="UPDATE registered_users SET status='$num' WHERE id='$id'  ";
	$result2=mysql_query($sql2);
	if($result2){
		echo "<font color='green'>Approval Successful!</font>";
	}else{
		echo "<font color='red'>Approval Unsuccessful!</font>";
	}
//echo $sql2;
}

$sql="SELECT * FROM registered_users WHERE status='0' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);




?>
<div width="100%"><a href="index.php" class="btn"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>    <a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<table width="50%" class="table">
		<caption>Approved Records</caption>
		<thead>
			<tr>
					<th>Cart. ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Country</th>
					<th>State</th>
					<th>LGA</th>
					<th>Date of Birth</th>
					<th>Town</th>
					<th>Picture</th>
					<th></th>
		</tr>
		</thead>
		<tbody>
			<?php
			while($rows=mysql_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $rows['id'];  ?></td>
				<td><?php echo $rows['name'];  ?></td>
				<td><?php echo $rows['gender'];  ?></td>
				<td><?php echo $rows['country'];  ?></td>
				<td><?php echo $rows['state'];  ?></td>
				<td><?php echo $rows['lga'];  ?></td>
				<td><?php echo $rows['dob'];  ?></td>
				<td><?php echo $rows['town'];  ?></td>
				<td><img src="../images/<?php echo $rows['pic']; ?>" width="80"></td>
				<td>
					<form action="approve.php" method="post">
					<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
					<input type="submit" name="app_sub" class="btn btn-success" value="Approve">
					</form>
				</td>
			</tr>

			<?php
		}
		?>
		<tr></tr>
		</tbody>
	</table><h3>Total Number of Records: <?php echo $count; ?></h3>
</div>



</div>
<?php
include('../footer.php');
?>