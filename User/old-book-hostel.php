<?php include('profile-header.php');?>
<?php include('user-sidebar.php');?>
  <?php
session_start();
include('config.php');
include('checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];
$seater=$_POST['seater'];
$feespm=$_POST['fpm'];
$foodstatus=$_POST['foodstatus'];
$stayfrom=$_POST['stayf'];
$duration=$_POST['duration'];
$course=$_POST['course'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
//$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
//$emcntno=$_POST['econtact'];
$gurname=$_POST['pname'];
//$gurrelation=$_POST['grelation'];
$gurcntno=$_POST['pcono'];
$caddress=$_POST['address'];
$ccity=$_POST['city'];
$cstate=$_POST['state'];
$cpincode=$_POST['pincode'];
//$paddress=$_POST['paddress'];
//$pcity=$_POST['pcity'];
//$pstate=$_POST['pstate'];
//$ppincode=$_POST['ppincode'];
$query="insert into  registration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,guardianName,guardianContactno,corresAddress,corresCIty,corresState,corresPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('iiiisisisssississsi',$roomno,$seater,$feespm,$foodstatus,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$gurname,$gurcntno,$caddress,$ccity,$cstate,$cpincode);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";
}
?>

<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

 <style type="text/css">
  h4{
    color: #555;
  }

  .navbar ul{
    margin-top: -6px;
  }
  .container{
    margin-top: 20px;
    

  }
  .subcontainer{
    
background-color: white;
border: 10px inset cyan;
margin-right: 10px;
margin-left: 240px;
border-radius: 6px;
box-shadow: 5px 5px 10px rgba(0,0,0,0.5);

  }

  .subcontainer form input{
    border: 2px solid darkcyan;
    border-radius: 15px;

  }

  .subcontainer form textarea,select,button{
    border: 2px solid darkcyan;
    border-radius: 15px;
  }
 </style>
 <center>
  <?php
$uid=$_SESSION['login'];
               $stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
        $stmt->bind_param('s',$uid);
        $stmt->execute();
        $stmt -> bind_result($email);
        $rs=$stmt->fetch();
        $stmt->close();
        if($rs)
        { ?>
      <h3 style="color: red" align="left">Hostel already booked by you</h3>
        <?php }
        else{
              echo "";
              }     
              ?>
<div  class="container"><br><br>
  <h1 align="center"></h1>
  <div class="subcontainer">
  <h1 align="center" id="title" style="padding-top: 50px;color:#333">Hostel Form </h1>

  <h4 align="center">Room related info</h4>
  <form align="center" action="" method="post" >
  <label>Room No:</label>
    <select name="room" id="room"  onChange="getSeater(this.value);" onBlur="checkAvailability();" required> 
<option value="">Select Room</option>
<?php $query ="SELECT * FROM rooms";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
<?php } ?>
</select> 
<span id="room-availability-status" style="font-size:12px;"></span><br><br>
    
  </label>

  <label>Seater:</label>
  <select>
    <option value="">Select Seater</option>
    <option>1 sharing</option>
    <option>2 sharing</option>
    <option>3 sharing</option>
    <option>4 sharing</option>
  </select><br><br>

  <label>Fees per Month:</label>
  <input type="text" name="fpm"><br><br>

  <label>Food Status:</label>
    <input type="radio" value="0" name="foodstatus" checked="checked"> Without Food
    <input type="radio" value="1" name="foodstatus"> With Food(Rs 2000.00 Per Month Extra)
    <br><br>

    <label>Stay From:</label>
    <input type="date" name="stayf"><br><br>

    <label>Duration:</label>
    <select name="duration">
    <option value="">Select Duration in Month</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
    <br><br>

    <label>Total Amount:</label>
    <input type="text" name="total"><br><br>

    <h4 align="center">Personal Information</h4><br>

   <label>Course:</label>
   <select name="course" id="course" class="form-control" required> 
<option value="">Select Course</option>
<?php $query ="SELECT * FROM courses";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->course_fn;?>"><?php echo $row->course_fn;?>&nbsp;&nbsp;(<?php echo $row->course_sn;?>)</option>
<?php } ?>
</select>
   <br><br>
   <label>Registration No:</label>
   <input type="text" name="regno"><br><br>

   <label>First Name:</label>
   <input type="text" name="fname">
   

   <label>Middle Name:</label>
   <input type="text" name="mname">
   <label>Last Name:</label>
   <input type="text" name="lname"><br><br>

   

   <label>Contact:</label>
   <input type="emailid" name="email"><br><br>

   <label>Parents Name:</label>
   <input type="text" name="pname"><br><br>

   <label>Parents Contact No:</label>
   <input type="text" name="pcno"><br><br>

   <label>Address:</label>
   <textarea name="address"></textarea>
   <br><br>

   <label>City:</label>
   <input type="text" name="city"><br><br>

   <label>State:</label>
   <input type="text" name="state"><br><br>

   <label>Pincode:</label>
   <input type="text" name="pincode"><br><br>

   <button name="submit">
     Submit
   </button><br><br>
  
</form></div></div>
</center>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
