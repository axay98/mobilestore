<?php
   include('db.php');
   session_start();
   
   $user_check = $_SESSION['email'];
   $ses_sql = mysqli_query($con,"select email from user where email = '$user_check' ") or die("Not connected.");;
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
  
?>