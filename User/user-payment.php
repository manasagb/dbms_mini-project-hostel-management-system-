<?php
session_start();
include('config.php');
include('checklogin.php');
check_login();
?>


<style type="text/css">
	.navbar ul{
		margin-top: 6px;
	}
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
  margin-left: 0px;
 margin-top: 0px;
   
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.container{
	margin-top: 80px;
	margin-left: 240px;
}
	.navbar {
				
				padding-top: 12px;
			}
::-webkit-input-placeholder { 
    color: #777;
    text-transform: capitalize;

}
</style>

<body>

<?php include('profile-header.php') ?>

<div class="row">
  <div class="col-75">
    <div class="container" >
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

  <script>
    function yearValidation(year) 
    {
    
        
        if((year > 2100) || (year < 2018))
            {
            alert("Enter a valid year");
            return false;
            }
        return true;
    }
</script>

      <form action="payment-insert.php" method="post" >
      
      

          <div class="col-50">
          	<?php include('user-sidebar.php') ?>
            <?php
$uid=$_SESSION['login'];
               $stmt=$mysqli->prepare("SELECT emailid FROM payment WHERE emailid=? ");
        $stmt->bind_param('s',$uid);
        $stmt->execute();
        $stmt -> bind_result($email);
        $rs=$stmt->fetch();
        $stmt->close();
        if($rs)
        { ?>
        	
        	
           <?php 
$aid=$_SESSION['login'];
  $ret="select * from payment where emailid=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
    {
      ?>
        	<div>
      <h1 style="color:green;margin-top: 10px;" align="left">Payment Completed</h1>
      <h2>Payment details</h2>
      <b> Payee Name </b></label><input type="text" readonly="readonly" style="width: 19.9%; border:none;background-color: #ccc;margin-bottom: 5px;margin-top: -40px;margin-left:15.5px;" name="name" value="<?php echo $row->name; ?>" ><br> 
      <b> Register No.</b></label><input type="text" readonly="readonly" style="width: 19.9%; border:none;background-color: #ccc;margin-bottom: 5px;margin-top: -40px;margin-left:20px;" name="regno" value="<?php echo $row->regno; ?>" >
      <label><b>Email id </b></label><input type="text" readonly="readonly" style="width: 20%; border:none;background-color: #ccc;margin-bottom: -10px;margin-top: -40px;margin-left:120px;" name="emailid" value="<?php echo $row->emailid; ?>" >
            <label><b>Amount Paid</b></label><input type="text" readonly="readonly" style="width: 20%; border:none;background-color: #ccc;margin-bottom: 10px;margin-top: -40px;margin-left:120px;" name="totalamount" value="<?php echo $row->totalamount; ?>" >
         
    
            <label><b>Payment Date</b></label><input type="text" readonly="readonly" style="width: 20%; border:none;background-color: #ccc;margin-bottom: 10px;margin-top: -42px;margin-left:120px;" name="totalamount" value="<?php echo $row->updationDate; ?>" >
            <label><b>Card Name</b></label><input type="text" readonly="readonly" style="width: 20%; border:none;background-color: #ccc;margin-bottom: 10px;margin-top: -42px;margin-left:120px;text-transform: uppercase;" name="totalamount" value="<?php echo $row->cardname; ?>" >
            
            
            
            <?php
//$cnt=$cnt+1;
} ?>
            <hr style="margin-bottom: 40px;margin-top: 40px;"> 
       
        </div> 
        <?php }
        else{
              //echo "";
              }   
              ?>    
                   
            <h3>Personal information</h3>
            
            
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
      ?><label>Enter Registered Name</label>
            <input type="text" name="name" readonly="readonly" style="letter-spacing: 1px;width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left: 10px;margin-bottom: 20px; cursor: not-allowed;" required="" value="<?php echo $row->firstName; echo " ";echo $row->middleName;echo " ";echo $row->lastName; ?>" >
        <label>Registration No.</label>
            <input type="text" name="regno" readonly="readonly" style="letter-spacing: 1px;width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left: 10px;margin-bottom: 20px; cursor: not-allowed; " required="" value="<?php echo $row->regNo;?>">

            <label>Registered Email id</label>
            <input type="email" name="emailid" readonly="readonly" style="letter-spacing: 1px;width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left: 10px;margin-bottom: 20px; cursor: not-allowed;" required="" value="<?php echo $row->email;?>">
            <label>Total Amount</label>
             <input type="text" name="totalamount" placeholder="totalamount" readonly="readonly" value="<?php echo $_SESSION['totalamount']; ?>"  style="letter-spacing: 1px;width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left: 10px;margin-bottom: 20px; cursor: not-allowed;" required="" >
            <?php } ?>
            <h3>Payment information</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fab fa-cc-visa" style="color:navy; font-size: 50px;"></i>
              <i class="fab fa-cc-amex" style="color:blue;font-size: 50px;"></i>
              <i class="fab fa-cc-mastercard" style="color:red; font-size: 50px;"></i>
              <i class="fab fa-cc-discover" style="color:orange; font-size: 50px;"></i>
              <i class="fab fa-cc-paypal" style="color:dodgerblue; font-size: 50px;"></i>
            </div>
            <label>Name on Card</label>
            <input type="text" name="cardname" placeholder="Enter Credit card Name" style="letter-spacing: 1px;" onkeypress="return numberOnly(this, event)" required="">
            <label>Credit card number</label>
            <input type="text" name="cardnumber" placeholder="Enter Credit card number" onkeypress="return isNumberKey(event)" style="letter-spacing: 1px" minlength="16" maxlength="16"  required="">
            <label>Exp Month</label>
            <select name="expmonth" style="width: 200px;height: 40px;margin-bottom: 10px;" required="">
            	<option value="">Select Exipry Month</option>
            	<option value="1">January</option>
            	<option value="2">February</option>
            	<option value="3">March</option>
            	<option value="4">April</option>
            	<option value="5">May</option>
            	<option value="6">June</option>
            	<option value="7">July</option>
            	<option value="8">August</option>
            	<option value="9">September</option>
            	<option value="10">October</option>
            	<option value="11">November</option>
            	<option value="12">December</option>
            </select>
            <div class="row">
              <div class="col-50">
                <label >Exp Year</label>
                <input type="text"  name="expyear" placeholder="Enter Expiry Year" onkeypress=" return isNumberKey(event) " maxlength="4" required="" onchange="return yearValidation(this.value)" >
              </div>
              <div class="col-50">
                <label >CVV</label>
                <input type="password" name="cvv" placeholder="Enter CVV" onkeypress="return isNumberKey(event)" maxlength="3" required="">
              </div>
            </div>
          </div>
         
        </div>
        
        <center><input type="submit" value="Make Payment" name="submit" class="btn" style="margin-top:20px;width: 300px;margin-left: 70px;border-radius: 8px;"></center>
      </form>
    </div>
  </div>
</div>


</body>


