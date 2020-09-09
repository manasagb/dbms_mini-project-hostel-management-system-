<?php
session_start();
include('config.php');
include('checklogin.php');
check_login();
?>

<?php include('profile-header.php') ?>
<?php include('user-sidebar.php') ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.sidenav{
    margin-top: 43px;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], input[type=email], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
	margin-left:300px;
	width: 70%;
    border-radius: 5px;
    background-color: #ccc;
    padding: 20px;
    margin-top: 10%;
}

</style>
</head>
<body>

<h3 style="padding-top:70px;margin-bottom: -70px;margin-left: 50%;">Feedback Form</h3>

<div class="container">
	<script type="text/javascript">
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
  <form action="user-feedback-insert.php" method="post">
     <label>Name</label>
    <input type="text"  name="user" placeholder="Your name" required="" value="<?php echo $_SESSION['user'];?>" onkeypress="return numberOnly(this, event)" style="outline: none;" >
 
    <label>Email</label>
    <input type="email" name="email" placeholder="Your Email" required="" value="<?php echo $_SESSION['emailid'];?>" style="outline: none;"> 

    <label>Message</label>
    <textarea name="message" placeholder="Your feedback" style="height:200px;outline: none;" required="" maxlength="75"></textarea>

    <input type="submit" value="Submit Feedback" name="submit" style="margin-left: 36%;">
  </form>
</div>



	<?php include('footer.php') ?>