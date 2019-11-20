<?php
 
$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'mobilestore');
     
        $em= $_POST['email'];
		$fn= $_POST['fname'];
        $pass= $_POST['pass'];
        $phone= $_POST['ph'];
       
 
 
 $sql="select * from user where email='$em'";
 $result=mysqli_query($con,$sql);
 if((mysqli_num_rows($result))>0)
 {
		?>
	
	<script>
	alert("This user name is already exist");
	window.location("register.html");
	</script>
	
	<?php
	
	
 }
 else{
	 $sql="insert into user VALUES ('$em','$fn','$pass','$phone','')";
	 if(mysqli_query($con,$sql))
	 { ?>
<script>
    alert("Registered Successfully, Please Login");
    window.location="login.php";
</script>
<?php
		 
	 }
	 
	 else{
		 $status = "failed";
	 }
 }
 
  echo json_encode(array("reaction "=>$status));
  mysqli_close($con);
  
  ?>