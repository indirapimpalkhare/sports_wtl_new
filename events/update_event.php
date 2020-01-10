<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="new_event.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
  <!--meta tag used for ease of viewing on any device-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--bootstrap-->
  <!--we use style tag for internal css inside head tag-->
<script>

function validate(){
  if( Date.parse(document.new_event.start_date.value)>=Date.parse(document.new_event.end_date.value))
  {
      alert("Enddate must be greater than start date");
      document.new_event.end_date.focus();
      return false;
   }
   var reg_fees = document.new_event.registration_fees.value;
   var prizes = document.new_event.prize_money.value; 
   var isnum1 = /^\d+$/.test(reg_fees);  
   var isnum2 = /^\d+$/.test(prizes);  

   if(reg_fees=="" && prizes==""){
     return true;
   }
   else if(reg_fees != "" && prizes==""){
      if(!isnum1){
        alert("Regitration fees should have only numerical value!");
        document.new_event.registration_fees.focus();
        return false;
      }
   }
  else if(prizes !="" && reg_fees==""){
   if(!isnum2){
     alert("Prize field should have only numerical value!");
     document.new_event.prize_money.focus();
     return false;
   }
  }
  else{
    if(!isnum1 || !isnum2){
      alert("Registration fees and prize field should have numerical values");
      document.new_event.registration_fees.focus();
        return false;
    }
  }
}
  
function clear_input(){
  document.new_event.reset();
}
</script>
</head>
<body onload="clear_input()">

<form id="new_event" name = "new_event" action="new_event.php" method = "post" >
  <div class="container">
    <h1>Tell Us More About Your Event!</h1>
    <hr>

    <label for="event_name" ><b>Event Name</b></label><b for="event_name" class = "star">*</b>
    <input type="text" placeholder="Enter Eventname" name="event_name" required>

    <label for="start_date" ><b>Event Start Date</b></label><b for="start_date" class = "star">*</b>
    <input type="date" placeholder="dd/mm/yyyy" name="start_date" required>

    <label for="end_date"><b>Event End Date</b></label><b for="end_date" class = "star">*</b>
    <input type="date" placeholder="dd/mm/yyyy" name="end_date" required>

    <label for="registration_fees" id="reg"><b>Registration fees</b></label>
    <input type="text" placeholder="ex- 1000" name="registration_fees"  >
    
    <label for="ldate"><b>Last Date for Registration</b></label>
    <input type="date" placeholder="dd/mm/yyyy" name="ldate"  >
    
    <label for="prize"><b>Prize Money</b></label>
    <input type="text" placeholder="ex- 50000" name="prize_money" >
    
    <label for="links"><b>Event Link</b></label>
    <input type="text" placeholder="Enter your registration link" name="links"  >
    
    <label for="sports"><b>Sports Available</b></label>
    <textarea placeholder="ex- Cricket, Football, Basketball" name="sports" ></textarea>

    <label for="address"><b>Address</b></label>
    <textarea placeholder="Enter event address" name="address" ></textarea>

    <hr>
    <button type="submit" class="registerbtn" onclick="return validate()" >Add Event</button>
  </div>
  
  <div class="container signin">
    <p>Get back <a href="/sports_event/home/homepage.html">Home Page</a></p>
  </div>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
