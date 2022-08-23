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
<div id="div2" align="center"><a href="index.php" class="btn"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>    <a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>

<div>
	<fieldset>
		<legend>Add State Record</legend>
<?php
include('../connect.php');

if(isset($_POST['sub'])){
	$sname=$_POST['sname'];
	$mass=$_POST['mass'];
	$nlga=$_POST['nlga'];//Number of Local Governmant Areas

	$sql="SELECT sname FROM states WHERE sname='$sname' ";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);

	if($count=='1'){
		echo "<script>alert('State Already Exist. Please Enter another State Record!')</script>";
	}else{
		$sql2="INSERT INTO states(sname, mass, nlga)VALUES('$sname', '$mass', '$nlga') ";
		$result2=mysql_query($sql2);
		if($result2){
			echo "<font color='green'>State has been added sucessfully!</font>";
		}else{
			echo "<font color='green'>State was not added sucessfully. Please try again!</font>";
		}
	}
}

?>
	<form method="post" class="form-group" action="">
		<input type="text" name="sname" placeholder="State Name" class="form-control"><br>
		<input type="text" name="mass" placeholder="Land Mass" class="form-control"><br>
		<input type="number" name="nlga" placeholder="Number of Local Government Areas" class="form-control"><br>
		<p align="center"><input type="submit" name="sub" value="Add" class="btn btn-success"></p>
	</form>
	</fieldset>
</div>



<div>
	<table width="50%" class="table">
		<caption>State Info</caption>
		<thead>
			<tr>
					<th>State ID</th>
					<th>State Name</th>
					<th>Land Mass</th>
					<th>No. of LGA</th>
					<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php
			if(isset($_POST['del'])){
				$id=$_POST['id'];

				$sql4="DELETE FROM states WHERE id='$id' ";
				$result4=mysql_query($sql4);

				if($result4){
					echo "<script>alert('State Deleted!')</script>";
				}else{
					echo "<script>alert('Error: State Delete Unsuccessful!')</script>";
				}
			}

			$sql3="SELECT * FROM states ";
			$result3=mysql_query($sql3);
			$count=mysql_num_rows($result3);

			while($rows=mysql_fetch_assoc($result3)){
			?>
			<tr>
				<td><?php echo $rows['id'];  ?></td>
				<td><?php echo $rows['sname'];  ?></td>
				<td><?php echo $rows['mass'];  ?></td>
				<td><?php echo $rows['nlga'];  ?></td>
				<td>
					<form method="post" >
						<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
						<input type="submit" name="del" value="Delete" class="btn btn-danger">
					</form>
				</td>
			</tr>

			<?php
		}
		?>
		<tr></tr>
		</tbody>
	</table><h3>Total Number of States: <?php echo $count; ?></h3><a href="" class="btn-lg btn btn-success" role="link" onclick="window.print()">Print</a>
</div>



<?php
include('../footer.php');
?>