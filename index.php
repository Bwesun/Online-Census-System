<?php
session_start();

if(!isset($_SESSION['user_id'])){
	header("location:login.php");
}

include('heading.php');


?>
<style type="text/css">
	#div1{
		border:1px solid green;
		padding: 10px;
		margin-left: 7%;
		margin-right: 7%;
	}
	fieldset{
		padding: 5px 15px 0px 15px;
	}
</style>

<div id="div1"><a href="index.php" class="btn"><a href="logout.php" class="btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<h3 align="center">Cartography Area</h3>
<?php
include('connect.php');

if(isset($_POST['sub'])){

$name=$_POST['name'];
$gender=$_POST['gender'];
$country=$_POST['country'];
$state=$_POST['state'];
$lga=$_POST['lga'];
$dob=$_POST['dob'];
$town=$_POST['town'];
$pic=$_POST['pic'];
$status=1;



$filename=$_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);
if($name=='' || $country=='' || $filename==''){
	echo "<font color='blue'>Please fill in all fields!</font>";
}
else
{
$sql="INSERT INTO registered_users (name, gender, country, state, lga, dob, town, pic, status)VALUES('$name', '$gender', '$country', '$state', '$lga', '$dob', '$town', '$filename', '$status') ";
$result=mysql_query($sql);
$_SESSION['name']=$name;
$_SESSION['lga']=$lga;
$_SESSION['pic']=$filename;
$_SESSION['state']=$state;
$_SESSION['gender']=$gender;
$_SESSION['lga']=$lga;
$_SESSION['dob']=$dob;
//STopped at declaring session for the movement stuff for success.php

	if($result){
		echo "<font color='red'>Operation Successful!</font>".mysql_error();
		echo "<br>";
		echo "<a href='success.php' class='btn btn-default'>Print </a>";
		//echo $sql;
	}else{
		echo "<font color='red'>Error: Operation Unsuccessful!</font>";
		//echo $sql;
	}
}



}
?>
		<form class="form-group" autocomplete="off" method="post" action="" enctype="multipart/form-data">
			<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="4">
				<tr>
					<td><input type="text" name="name" class="form-control" placeholder="Enter Fullname" required>
</td>				
			<td rowspan="5"><img class="view img-thumbnail" src="" width="150"  alt="Image preview..."></td>
<script type="text/javascript">
function previewFile() {
  var preview = document.querySelector('.view');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  // when user select an image, `reader.readAsDataURL(file)` will be triggered
  // reader instance will hold the result (base64) data
  // next, event listener will be triggered and we call `reader.result` to get
  // the base64 data and replace it with the image tag src attribute
  reader.addEventListener("load", function() {
    console.log('before preview');
    preview.src = reader.result;
    console.log('after preview');
  }, false);

  if (file) {
    console.log('inside if');
    reader.readAsDataURL(file);
  } else {
    console.log('inside else');
  }

  /*
  FLOW OF THE RESULT:
  
  inside if
  before preview
  after preview
  */
}
</script>
				</tr>

				<tr>
					<td><select name="gender" class="form-control" required>
				<option value="">----- Select Gender -----</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select><br>Date of Birth:<input type="date" name="dob" placeholder="Date of Birth" class="form-control"></td>

				</tr>

				<tr>
					<td><div><input type="text" name="country" id="myInput" class="form-control" placeholder="Enter Country"  required></div>
					<?php
			include('countries.html');
			?></td>
				</tr>

				<tr>
					<td><div><input type="text" name="state" id="myState" class="form-control" placeholder="Enter State"  required></div>
			<?php
			include('states.html');
			?></td>
				</tr>
				<tr>
					<td><input type="text" name="lga" class="form-control" placeholder="Enter Local Govt Area"  required></td>
				</tr>
				<tr>
					<td><input type="text" name="town" class="form-control" placeholder="Enter Town"  required></td>
					<td>Select Picture:<input type="file" onchange="previewFile()" name="pic" class="form-control"  required></td>
				</tr>
				<tr>
					<td colspan="2">
			
			<input type="submit" name="sub" class="form-control btn btn-info btn-bg btn-lg" value="Submit"></td>

				</tr>

			</table>
		</form>
</div>





<?php
include('footer.php');
?>