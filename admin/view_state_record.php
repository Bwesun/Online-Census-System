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
	<h3 align="center">Records</h3>

<?php
include('../connect.php');














?>
<div>

	<fieldset>
		<legend>View Records by State</legend>
	<form accept="" method="post" class="form-group">
		<input type="text" name="state" class="form-control" placeholder="Enter State"><br>
		<input type="submit" name="sub" value="View" class="btn btn-info">
	</form>
	</fieldset>
</div>
<?php

if(isset($_POST['sub'])){
	$state=$_POST['state'];
	?>
<div width="100%"><a href="index.php" class="btn"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>    <a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<?php
	$sql="SELECT * FROM registered_users WHERE status='1' AND state='$state' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
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
				<td><?php echo $rows['town'];  ?></td>
				<td><img src="../images/<?php echo $rows['pic']; ?>" width="80"></td>
			</tr>

			<?php
		}
		?>
		<tr></tr>
		</tbody>
	</table><h3>Total Number of Records: <?php echo $count; ?></h3><a href="" class="btn-lg btn btn-success" role="link" onclick="window.print()">Print</a>
	</div>
	<?php
}?>




</div>
<?php
include('../footer.php');
?>