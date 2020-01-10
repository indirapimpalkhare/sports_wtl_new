<link rel="stylesheet" type="text/css" href="sign_up.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



<?php
session_start();

require_once("../dbconn.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $sdate= $_POST["start_date"];
    $edate=$_POST["end_date"];
    $last_date=$_POST["ldate"];
    strval( date('Y/m/d', strtotime($sdate)));
    strval(date('Y/m/d',strtotime($edate)));
    strval( date('Y/m/d', strtotime($last_date)));
    // Prepare an insert statement
    $sql ="INSERT INTO events (username, event_name,sdate,end_date,reg_fees,reg_last_date,prize_money,link,sport_details,addr ) values (?,?,?,?,?,?,?,?,?,?);";
	
    if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_event_name,$param_sdate,$param_edate,$rfees,$lastDate,$cashPrize,$plink,$sportsDetails,$location);
        
        // Set parameters
       $param_username = $_SESSION["username"];
      // $param_username="kshitija";
        $param_event_name = trim($_POST["event_name"]);
        $param_sdate=$sdate;
        $param_edate=$edate;
        $rfees=$_POST["registration_fees"];
        $lastDate=$last_date;
        $cashPrize=$_POST["prize_money"];
        $plink=$_POST["links"];
        $sportsDetails=$_POST["sports"];
        $location=$_POST["address"];

    // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect to home page
            echo "<script type='text/javascript'>alert('Event Added Successfully'); </script>";
            header('Location: /sports_event/home/homepage.php');
        } else{
            echo "Something went wrong. Please try again later.";
        }
		
    }
     // Close statement
    mysqli_stmt_close($stmt);
    


// Close connection
mysqli_close($conn);
}
?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>