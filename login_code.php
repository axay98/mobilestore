
<?php

require_once('db.php');
$email = $password = $pwd = '';

$email = $_POST['email'];
$password = $_POST['pass'];

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($con,$sql) or die("Not connected.");;
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["name"];
		$email = $row["email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
	}
	header("Location: index.php");
}
else
{
	echo "Invalid email or password";
}
?>