<?php include('profile-header.php') ?>
<?php
session_start();
include('config.php');
date_default_timezone_set('Asia/Kolkata');
include('checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['submit']))
{

$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$udate = date('d-m-Y h:i:s', time());
$query="update  userRegistration set regNo=?,firstName=?,middleName=?,lastName=?,gender=?,contactNo=?,updationDate=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssisi',$regno,$fname,$mname,$lname,$gender,$contactno,$udate,$aid);
$stmt->execute();
echo"<script>alert('Profile updated Succssfully');</script>";
}

$ai=$_SESSION['id'];
if(isset($_POST['submit']))
{

$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$udate = date('d-m-Y h:i:s', time());
$query="update  registration set regno=?,firstName=?,middleName=?,lastName=?,gender=?,contactno=?,updationDate=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssisi',$regno,$fname,$mname,$lname,$gender,$contactno,$udate,$ai);
$stmt->execute();

}
?>



<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Profile Updation</title>
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-social.css">
	<link rel="stylesheet" href="../css/bootstrap-select.css">
	<link rel="stylesheet" href="../css/fileinput.min.css">
	<link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../css/style.css">
<script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="../js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
<div class="main-page">
<!-- <h1 align="center" style="padding-top: 0px;">WELCOME USER</h1> -->
<div class="content-wrapper">
			<div class="container-fluid">
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	<div id="test">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-left: 240px;margin-top: 0px;margin-bottom: 15px;"><?php echo $row->firstName;?>'s&nbsp;Profile </h2>

						<div class="row" style="margin-top: 0px;">
							<div class="col-md-12">
								<div class="panel panel-primary" style="margin-left: 240px;">
									<div class="panel-heading">

Last Updation date : &nbsp; <?php echo $row->updationDate;?> 
</div>
						<?php include('user-sidebar.php') ?>		
            <style type="text/css">
            

            
    .navbar ul{
      margin-top: 11px;
      margin-left: -1px;
   
      position: absolute;
    }
    .sidenav{
      
      height: 131%;
      position: absolute;
      margin-top: -84px;
   
    }
    .main-page{
       position: relative;
     
    }

    .regbutton{

      width: 250px;
      height: 50px;
      color: white;
      background-color: #f2b134;
      border-top: 4px;
      border-right: 4px;
      border-left: 4px;
      border-bottom: 4px;
      border-radius: 4px;
      padding-top: 5px;
      padding-bottom: 5px;
      font-size: 20px;

    }

    .regbutton:hover{

      background-color: #e49b0f;
      color:white;
    }


  
  </style>
	

<div class="panel-body" >
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();"
style="margin-left: 0px;">
								
								

<div class="form-group">
<label class="col-sm-2 control-label"> Registration No : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $row->regNo;?>" onkeypress="return blockSpecialChar(event)" pattern="^\S+$">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"   required="required" onkeypress="return numberOnly(this, event)">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Middle Name : </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  onkeypress="return numberOnly(this, event)">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" required="required" onkeypress="return numberOnly(this, event)">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?></option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" maxlength="10" value="<?php echo $row->contactNo;?>" required="required"  maxlength="10" minlength="10" onkeypress="return isNumberKey(event)">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<?php } ?>

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

 <script>
            function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}   


   function numberOnly(txt, e) {
            var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
            var code;
            if (window.event)
                code = e.keyCode;
            else
                code = e.which;
            var char = keychar = String.fromCharCode(code);
            if (arr.indexOf(char) == -1)
                return false;
        }
        
  </script>

   <script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>

						



<div class="col-sm-6 col-sm-offset-4">

<input class="btn btn-warning btn-lg" name="submit"  type="submit" value="Update" style="margin-left: 5%;width: 150px; border-radius: 20px; font-size: 20px; outline: none; background-color:  #F2B124; height: 50px; padding-top: 11px;">
</div>
</form></div></div>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap-select.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/Chart.min.js"></script>
	<script src="../js/fileinput.js"></script>
	<script src="../js/chartData.js"></script>
	<script src="../js/main.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>




</div>
