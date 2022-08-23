<?php
session_start();

if(isset($_SESSION['user_id'])){
	header("location:index.php");
}
elseif(isset($_SESSION['admin_id'])){
	header("location:admin/index.php");
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
include('connect.php');

                    if(isset($_POST['sub'])){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $post=$_POST['post'];
                        

                        // To protect MySQL injection (more detail about MySQL injection)
                        $username=stripslashes($username);
                        $password=stripcslashes($password);
                        $username = mysql_real_escape_string($username);
                        $password = mysql_real_escape_string($password);

                        if($post=='admin'){
                        		$sql="SELECT * FROM admin where username='$username' AND password='$password' ";
                            	$result=mysql_query($sql);

	                                if($result){
	                                $rows=mysql_fetch_assoc($result);

	                                $admin_user_id=$rows['id'];
	                                $username=$rows['username'];
	                                $password=$rows['password']; 

	                                $_SESSION['admin_id']=$admin_user_id;
	                                $_SESSION['username']=$username;
	                                $_SESSION['password']=$password;
	                                
	                                    echo "<div align='center'><img src='img/loader.gif' width='30'><P>Loading</p></div>";
	                                    echo "<meta http-equiv='refresh' content='3; url=admin/index.php'>" ;
	                                    //echo $sql;

	                                }else{
	                                    echo "<font color='red'>Error: Incorrect Username or Password! Please try again!</font>";
	                                }
                        	}
                        	else{
                        		$sql="SELECT * FROM users where username='$username' AND password='$password' ";
                            	$result=mysql_query($sql);
	                                if($result){
	                                $rows=mysql_fetch_assoc($result);

	                                $user_id=$rows['id'];
	                                $username=$rows['username'];
	                                $password=$rows['password']; 

	                                $_SESSION['user_id']=$user_id;
	                                $_SESSION['username']=$username;
	                                $_SESSION['password']=$password;
	                                
	                                    echo "<div align='center'><img src='img/loader.gif' width='30'><P>Loading</p></div>";
	                                    echo "<meta http-equiv='refresh' content='3; url=index.php'>" ;

	                                }else{
	                                    echo "<font color='red'>Error: Incorrect Username or Password! Please try again!</font>";
	                                }
                        	}
                            
                        }


                    ?>
	<h3 align="center">Login</h3>
	<div>
	<form method="post" class="form-group">
		<select name="post" class="form-control" required>
			<option value="">---- Select Post ----</option>
			<option value="admin">Admin</option>
			<option value="staff">Staff</option>
		</select><br>
		<input type="test" name="username" class="form-control" required placeholder="Enter Username"><br>
		<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
	
	</div>
	<div align="center">
		<button type="submit" name="sub" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>   Login</button>
	</div>
	</form>
</div>





<?php
include('footer.php');
?>