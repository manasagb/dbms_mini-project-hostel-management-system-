
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "demo");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$regno = $mysqli->real_escape_string($_REQUEST['regno']);
$emailid = $mysqli->real_escape_string($_REQUEST['emailid']);
$totalamount = $mysqli->real_escape_string($_REQUEST['totalamount']);
$cardname = $mysqli->real_escape_string($_REQUEST['cardname']);
$cardnumber = $mysqli->real_escape_string($_REQUEST['cardnumber']);
$expmonth = $mysqli->real_escape_string($_REQUEST['expmonth']);
$expyear = $mysqli->real_escape_string($_REQUEST['expyear']);
$cvv = $mysqli->real_escape_string($_REQUEST['cvv']);	
 
// Attempt insert query execution
$sql = "INSERT INTO payment (name,regno,emailid,totalamount,cardname,cardnumber, expmonth, expyear, cvv) VALUES ('$name' ,'$regno','$emailid','$totalamount','$cardname', '$cardnumber','$expmonth','$expyear', '$cvv')";
/*if($mysqli->query($sql) === true){
  
echo "Registration successful";

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

 */
if($mysqli->query($sql) === true){
	//echo "<script>alert('Registration successful');</script>";
 header("Location:payment-successful.php");

}
else{
	echo "error";
}
// Close connection
$mysqli->close();
?>