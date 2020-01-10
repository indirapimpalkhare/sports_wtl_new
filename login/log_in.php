<html>
<link rel="stylesheet" type="text/css" href="log_in.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  echo '<div class="alert alert-success">Already logged in! Redirecting to home.</div>';
  header("Refresh: 1; URL=/sports_event/home/homepage.php");
  //header('Location: /sports_event/home/homepage.html');
  exit;
}
 
// Include config file
require_once("../dbconn.php");
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
//echo "Test" . "<br>" ;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 /*    ---Not required as client side required field present in html---
   // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
	//	echo "username accepted" . "<br>" ;
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } 
	else{
       // $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $password = $_POST["password"];
	}
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        */
        $password=trim($_POST["pswd"]);
        $username=trim($_POST["uname"]);
        $sql = "SELECT username, pwd FROM users WHERE username = ?";
        //echo "sql prepared" . "<br>" ;
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            $param_username = $username;
			mysqli_stmt_bind_param($stmt, "s", $param_username);            
                if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
				//echo mysqli_stmt_num_rows($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){   
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
					//	echo "stmt fetched done" . "<br>" ;
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            //$_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
							header("refresh: 0 ; url = /sports_event/home/homepage.php");                        
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
							echo "<script type='text/javascript'>alert('$password_err'); </script>";
							header("refresh: 0 ; url = /sports_event/login/log_in.php");
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username. Try again.";
					echo "<script type='text/javascript'>alert('$username_err'); </script>";
					header("refresh: 0 ; url = /sports_event/login/log_in.php");
                }
            } 
			else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>

<head>
  <!--meta tag used for ease of viewing on any device-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--bootstrap-->
  <!--we use style tag for internal css inside head tag-->

</head>
<body>

<form name = "log_in" action="log_in.php" method = "post">
  <div class="container" style=" margin-top:50px; margin-bottom:50px;" >
    <h1>Log In Here!</h1>
    <hr>

    <label for="uname" ><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="pswd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswd" required>

    <button type="submit" class="registerbtn">Log In</button>
  </div>
  
  <div class="container signin">
    <p>New user? <a href="/sports_event/signup/sign_up.html">Sign Up Here</a></p>
  </div>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
