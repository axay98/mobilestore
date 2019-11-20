<?php
$pid = $_GET['prod_id'];
$color = $_GET['color'];
$numb = $_GET['quantity'];
$cid= $_GET['cust_id'];

$sql = "select * from cart where user_id='$cid' and prod_id='$pid' and color='$color'";
$con = mysqli_connect('localhost','root','','mobilestore');
$data = mysqli_query($con, $sql);
$n =mysqli_num_rows($data); 
echo $n;




if($n==0)
{
	 echo $color;
	$sql0 = "insert into cart VALUES('$cid','$pid','$numb','$color','1')";
	if(mysqli_query($con,$sql0))
		
	 { ?>
<script>
    alert("Added to the cart sucessfully");
    window.location="cart.php";
</script>
<?php }
}
else
{
	$sql="select * from cart where  user_id='$cid' and prod_id='$pid' and color='$color'";
	$data = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($data);
	$qn= $row['quantity'];
	$qn = $qn + $numb ;
	
	$sql= "update cart SET quantity = $qn WHERE user_id='$cid' and prod_id='$pid' and color='$color'";
if(mysqli_query($con,$sql))
	 { ?>
<script>
    alert("Added to the cart sucessfully");
    window.location="cart.php";
</script>
<?php }
	
}

?>


