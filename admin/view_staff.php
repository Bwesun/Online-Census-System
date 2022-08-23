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
	<h3 align="center">View Records</h3>

<?php
include('../connect.php');

$sql="SELECT * FROM users";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$i=1;



?>
<div width="100%"><a href="index.php" class="btn"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>    <a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<table width="50%" class="table">
		<caption>Approved Records</caption>
		<thead>
			<tr>
					<th>S/N</th>
					<th>Name</th>
					<th>Staff No.</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Username</th>
					<th>Password</th>
					
		</tr>
		</thead>
		<tbody>
			<?php
			while($rows=mysql_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $rows['name'];  ?></td>
				<td><?php echo $rows['staff_no'];  ?></td>
				<td><?php echo $rows['gender'];  ?></td>
				<td><?php echo $rows['gender'];  ?></td>
				<td><?php echo $rows['address'];  ?></td>
				<td><?php echo $rows['password'];  ?></td>
			</tr>

			<?php
		}
		?>
		<tr></tr>
		</tbody>
	</table><h3>Total Number of Staff Records: <?php echo $count; ?></h3>
</div>



</div>
<?php
include('../footer.php');
?>