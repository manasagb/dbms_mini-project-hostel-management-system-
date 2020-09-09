 <?php
			 echo " <script> alert('Confirm Details and Payment Status')</script>";

			 ?>
<?php
session_start();
include('config.php');
include('checklogin.php');
check_login();

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Room Details</title>
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-social.css">
	<link rel="stylesheet" href="../css/bootstrap-select.css">
	<link rel="stylesheet" href="../css/fileinput.min.css">
	<link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../css/style.css">
<script language="javascript" type="text/javascript">


var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>




<body>
	<?php include('profile-header.php');?>	
 <?php include('user-sidebar.php');?>

	<style>
	
	
	

	
	.container{
		width: 80%;
		position: absolute;
	}
    
    .navbar ul{
		margin-top: 13px;
			margin-left: -1px;
			position: absolute;
	}


	.sidenav{
        margin-top: 47px;
		position: absolute;
		height: 152%;
	}

	.container{
		position: relative;
		width: 100%;
	}
.makepayment{
	float: right;
	margin-top: 20px;
	width: 200px;
	 background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  border-radius: 8px;
}
	.makepayment:hover {
  background-color: #45a049;
}
.makepayment:focus{
	border:1px solid white;
}
</style>

	
   
	<div class="ts-main-content">
			
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="container">
					<div class="col-md-12">
						<form action="user-payment.php">
						<button class="makepayment" formaction="user-payment.php">Make Payment </button>
						</form>
						<h2 class="page-title" style="text-align: left;">Room Details</h2>
						<div class="panel panel-primary">
							<div class="panel-heading">All Room Details</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>


<?php	
$aid=$_SESSION['login'];

	$ret="select * from registration where emailid=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<tr>
<td colspan="4"><h4>Room Realted Info</h4></td>
<td><a href="javascript:void(0);"  onClick="popUpWindow('full-profile.php?id=<?php echo $row->emailid;?>');" title="View Full Details">Print Data</a></td>
</tr>
<tr>
<td colspan="6"><b>Reg date :</b> <?php echo $row->postingDate;?></td>
</tr>



<tr>
<td><b>Room no :</b></td>
<td><?php echo $row->roomno;?></td>
<td><b>Seater :</b></td>
<td><?php echo $row->seater;?></td>
<td><b>Fees PM :</b></td>
<td><?php echo $fpm=$row->feespm;?></td>
</tr>

<tr>
<td><b>Food Status:</b></td>
<td>
<?php if($row->foodstatus==0)
{
echo "Without Food";
}
else
{
echo "With Food";
}
;?></td>
<td><b>Stay From :</b></td>
<td><?php echo $row->stayfrom;?></td>
<td><b>Duration:</b></td>
<td><?php echo $dr=$row->duration;?> Months</td>

</tr>

<tr>
	<td><b>Expiry :</b></td>
<td style="width: 100px;"><?php echo $row->expiry;?></td>
<td colspan="6"><b>Total Fee : 
<?php if($row->foodstatus==1)
{ 
$fd=2000; 
//echo (($dr*$fpm)+$fd);
$totalamount=(($dr*$fpm)+($fd*$dr));
//echo $totalamount;
}
else
{
	$totalamount= $dr*$fpm;
	//echo $totalamount;
//echo $dr*$fpm;
}echo $totalamount;
$_SESSION['totalamount'] = $totalamount;
?></b></td>
</tr>
<tr>
<td colspan="6"><h4>Personal Info Info</h4></td>
</tr>


<tr>
<td><b>Reg No. :</b></td>
<td><?php echo $row->regno;?></td>
<td><b>Full Name :</b></td>
<td><?php echo $row->firstName;?><?php echo " " ?><?php echo $row->middleName;?><?php echo " " ?><?php echo $row->lastName;?></td>
<td><b>Email :</b></td>
<td><?php echo $row->emailid; 
$emailid=$row->emailid;
$_SESSION['emailid'] = $emailid;
?></td>
</tr>


<tr>
	
<td><b>Contact No. :</b></td>
<td><?php echo $row->contactno;?></td>
<td><b>Gender :</b></td>
<td><?php echo $row->gender;?></td>
<td><b>Course :</b></td>
<td><?php echo $row->course;?></td>
</tr>


<tr>
		<?php	
$ai=$_SESSION['login'];
	$ret1="select * from userregistration where email=?";
$stmt1= $mysqli->prepare($ret1) ;
$stmt1->bind_param('s',$ai);
$stmt1->execute() ;
$res1=$stmt1->get_result();
$cnt1=1;
while($row1=$res1->fetch_object())
	  {
	  	?>

	  	<td><b>Age :</b></td>
<td style="width: 100px;"><?php echo $row1->age;?></td>

<?php 
$cnt1=$cnt1+1;

} ?>
<td><b>Guardian Name :</b></td>
<td><?php echo $row->guardianName;?></td>
<td style="width: 100px;"><b>Guardian Relation :</b></td>
<td><?php echo $row->guardianRelation;?></td>
</tr>

<tr>
	
<td style="width: 150px;"><b>Emergency Contact No. :</b></td>
<td><?php echo $row->egycontactno;?></td>

<td><b>Guardian Contact No. :</b></td>
<td colspan="6"><?php echo $row->guardianContactno;?></td>

</tr>




<tr>
<td colspan="6"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondense Address</b></td>
<td colspan="2">
<?php echo $row->corresAddress;?><br />
<?php echo $row->corresCIty;?>, <?php echo $row->corresPincode;?><br />
<?php echo $row->corresState;?>


</td>
<td><b>Permanent Address</b></td>
<td colspan="2">
<?php echo $row->pmntAddress;?><br />
<?php echo $row->pmntCity;?>, <?php echo $row->pmntPincode;?><br />
<?php echo $row->pmnatetState;?>	

</td>
</tr>


<?php
$cnt=$cnt+1;
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	<!-- Loading Scripts -->
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

</html>
