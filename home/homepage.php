<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="sign_up.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
  <!--meta tag used for ease of viewing on any device-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--bootstrap-->
  <!--we use style tag for internal css inside head tag-->

</head>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo '<div class="alert alert-warning">You need to log in first! Redirecting to log in page.</div>';
	header("Refresh: 1; URL=/sports_event/login/log_in.php");
    exit;
}
?>
<body>

<?php
echo file_get_contents("../navbar.html");
//echo "I tried";
?>

<div class = "container">


<div class = "container" style="margin-top:50px">

<?php
require_once("../dbconn.php");
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<div class='card' style='width: 100%;'>";
		echo "<div class='card-body'>";
		echo "<h5 class='card-title'>" .$row["event_name"] . "</h5>";
		echo "<p class='card-text'>" . $row["sport_details"] . "</p>";
		echo "</div>";
		echo "<ul class='list-group list-group-flush'>";
		echo "<li class='list-group-item'> <b> Start Date : </b>" . $row["sdate"] . "</li>";
		echo "<li class='list-group-item'><b> End Date : </b>" . $row["end_date"] . "</li>" ;
		echo "<li class='list-group-item'><b> Registration Fees : </b>" . $row["reg_fees"] . "</li>" ;
		echo "</ul>";
		echo "<div class='card-body'> <a href='http://" . $row["link"] . "' class='card-link' style = 'color: lightcoral;'><b> Register Now! </b> </a>";
		echo "</div>";
		echo "</div>";
		echo "<hr>";
	}
} 
else {
	echo "0 results";
}
$conn ->close();
?>
  <!--img class="card-img-top" src="..." alt="Card image cap"-->
</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
