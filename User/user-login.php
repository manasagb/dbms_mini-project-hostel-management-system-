<?php include('user-login-header.php'); ?>
<?php
session_start();
include('config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['login']=$email;
				
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['id'];
             $uemail=$_SESSION['login'];



$log="insert into userLog(userId,userEmail) values('$uid','$uemail')";
$mysqli->query($log);
if($log)
{
header("location:user-profile.php");
				}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>
				<!Doctype html>
<html>
	
	<style type="text/css">
		body{

	font-family: arial;
background:url("download.jpg");
background-size: cover;
	
}
.box{
	position: absolute;
	top: 58%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 400px;
      padding: 70px 30px;
	background:rgb(213, 223, 207);
	box-sizing: border-box;
	box-shadow: 0 10px 18px 0px rgba(0,0,0,.8);
	border-radius: 20px;

}

.user{
	width: 90px;
	height: auto;
	border-radius: 50%;
	position: absolute;
	top: -50px;
	left: calc(50% - 50px);
	margin-top: 10px;
}

.user:hover{
  transform: scale(1.3);
  transition: 300ms;
}


.box h2{
	margin:0 0 30px;
	padding: 0;
	color: #000;
	text-align: center;

}
.box .inputbox{
		position: relative;
		margin-bottom: 5px;
}
.box .inputbox input{
		width: 100%;
		padding: 10px 0px;
		font-size: 16px;
		color: black;
		letter-spacing: 1px;
		border:none;
		outline: none;
		background-color: transparent;
		border-bottom: 2px solid black;
		margin-bottom: 30px;
       
}

.box .inputbox label{

	  position: absolute;
		top: 0;
		left: 0;
		padding: 10px 0px;
		
		font-size: 16px;
		text-align: left;
		color: black;
		pointer-events: none;
		transition: .3s;

}

.box .inputbox input:focus ~ label,
.box .inputbox input:valid ~ label
{
	top: -15px;
	color: #000;
	left: -10px;
	font-size: 12px;
}
.box input[type="submit"]
{
  width: 100%;
	border: none;
	outline: none;
  height: 40px;
	background: rgb(234, 138, 34);
	color: #000;
	font-size: 18px;
  border-radius: 20px;
	margin-bottom: 20px;
	margin-top: 30px;
}

.box input[type="submit"]:hover
{

  cursor: pointer;
	background: #000;
	color: #FFFFFF;

	}

.box a{


	text-decoration: none;
	font-size: 12px;
	line-height: 20px;
	margin-top: 400px;
	color: black;
}

.box a:hover{
	color:orange;

}

	</style>
</head>

<body>
<div class="box">
	<img src="user.png" class="user">
	<h2>User Login</h2>
	<form action="" method="post">
		<div class="inputbox">

			<input type="text" name="email" required="">
			<label>Email</label>
		</div>

		<div class="inputbox">

			<input type="Password" name="password" required="">
				<label>Password</label>
		</div>

		<input type="submit" name="login" value="Submit">
		
		<a style="float: left;margin-top: 10px; margin-bottom: -30px; font-size: 15px;" href="../registration.php">New User?</a>
	</form>
</div>
</body>
</html>
