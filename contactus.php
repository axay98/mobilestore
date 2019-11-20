<?php 
$name= $_POST['name'];
$email = $_POST['email'];
$phone=$_POST['phonenumber'];
$message =$_POST['message'];

$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'mobilestore');
	
	 $sql="insert into contactus VALUES ('$name','$email','$phone','$message')";
	 if(mysqli_query($con,$sql))
	 { ?>
<script>
    alert("Thank you for contacting us. Our support will get in touch with you soon");
    window.location="contact.html";
</script>
<?php
		 
	 }
	 
	 else{
		 $status = "failed";
	 }
 
 
  echo json_encode(array("reaction "=>$status));
  mysqli_close($con);
  
  ?>