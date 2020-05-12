<?php 
if(empty($_SESSION))
{
	session_start();
}

$username="";
$email="";
$errors= array();
//connect to the database
$db=mysqli_connect('localhost','root','','registration');

//if registration button is clicked 
if(isset($_POST['register'])){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password_1=$_POST['password_1'];
	$password_2=$_POST['password_2'];

	$sql_u="SELECT * FROM users WHERE username='$username'";
	$sql_e="SELECT * FROM users WHERE email='$email'";
	
	if(empty($username)){
		array_push($errors, "username is required");

	}
	else{
		$res_u=mysqli_query($db,$sql_u) or die(mysqli_error($db));
		if  (mysqli_num_rows($res_u)>0) 
		{
			array_push($errors, "Sorry...Username already takken");
		}
	}	
	if(empty($email)){
		array_push($errors, "email is required");

	}
	else{
		$res_e=mysqli_query($db,$sql_e) or die(mysqli_error($db));
		if (mysqli_num_rows($res_e)>0) {
			array_push($errors, "Sorry...Email already taken");
		}
	} 
	if(empty($password_1)){
		array_push($errors, "password is required");

	}
	if($password_1 != $password_2){
		array_push($errors, "The two passwords do not match");
	} 

	//if no errors
	if(count($errors)==0){
		$password = md5($password_1); //encrypt password
		$sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
		mysqli_query($db,$sql);
		$_SESSION['username'] = $username;
		$_SESSION['success']= "you are now logged in";
		header('location:home.php'); //redirect to home page
	}

}

//login user from login page
if (isset($_POST['login'])) {
	# code...
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(empty($username)){
		array_push($errors, "username is required");

	} 
	if(empty($password)){
		array_push($errors, "Password is required");

	}
	if (count($errors)==0) {
	 	# code...
	 	$password=md5($password); //encrypt
	 	$query="SELECT * FROM users WHERE username='$username' AND password='$password' ";
	 	$result=mysqli_query($db,$query);
	 	if(mysqli_num_rows($result)>=1) {
	 		# code...
	 		//logging in the user
	 		$_SESSION['username'] = $username;
			$_SESSION['success']= "you are now logged in";
			header('location:home.php'); //redirect to home page

	 	}
	 	else{
	 		array_push($errors,"Invalid username/password");
	 		//header('location: login.php');
	 	}
	 } 

}





//logout
if (isset($_GET['logout'])) {
	# code...
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}


?>