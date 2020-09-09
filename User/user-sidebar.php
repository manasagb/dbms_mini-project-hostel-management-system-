
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<style>
body {
    font-family: arial, sans-serif;
    background-color: white;
}

/* Fixed sidenav, full height */
.sidenav {
    margin-top: 45px;
    height: 100%;
    width: 230px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #112F41;
    overflow-x: hidden;
    padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: inline-block;
    border: none;
    background:none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
      transition: background-color .3s;
}

/* On mouse-over */
.sidenav a:hover{ 
    color: white;
    background-color: #068587;
    text-decoration: none;
    

}
.sidenav a:focus{
  text-decoration: none;
  color: white;
  background-color: none;
}
.dropdown-btn:hover {
  background-color: #068587;
 color: #f1f1f1;
}

/* Main content */

/* Add an active class to the active dropdown button */
.active {
    background-color: #058587;
    color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    background-color: #045556;
    margin-left: -40px;
}
/* Optional: Style the caret down icon */
.fa-caret-down {
    float: right;
    padding-right: 8px;
}
.dropdown-container ul a:hover{
background-color: #056d6f;
}
.menu{
  background-color: #F2B124;
  margin-top: -20px;
  padding-left: 80px;
  color: white;
  margin-bottom: 15px;
}
</style>
<div class="sidenav">
  <ul class="menu"> <i class="fa fa-bars" style="margin-left: -70px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menu</ul>
 
  <a href="user-profile.php">My Profile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-user" style="margin-left: 2px;"></i></a>
  <a href="book-hostel.php">Book Hostel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-plus"></i></a>
  <a href="room-details.php">Room Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-info-circle"></i></a>
  
  <a href="room-details.php">Make Payment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-credit-card" style="margin-left: 3px;"></i></a>
   <a href="change-password.php">Change Password &nbsp;&nbsp;<i class="fas fa-key" style="margin-left: 3px;"></i></a>
</div>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>