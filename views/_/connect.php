<?php
require '../dbcon.php';
$email=$_POST['email'];
$password=$_POST['password'];

if(!(empty($_POST['name']) && empty($_POST['pn']) && empty($_POST['bd']) && empty($_POST['sex']))){
	$name=$_POST['name'];
	$pn=$_POST['pn'];
	$sex=$_POST['sex'];
	$bd=$_POST['bd'];
	$req="	INSERT INTO users(User_name,User_password,User_email,User_phone_number,User_sex,User_birthday,User_picture)
			VALUES ('$name','$password','$email','$pn','$sex','$bd','');";
	$res=mysqli_query($conn, $req)or die(mysqli_error($conn));
};

$req="select * from users where User_email='$email';";
$res=mysqli_query($conn, $req)or die(mysqli_error($conn));
if(mysqli_num_rows($res)==0){
	$_SESSION['err']="No account with this email.";
	// die("<script>alert('No account with this email.');</script>");
}else{
	$t=mysqli_fetch_array($res);
	if($password!=$t[2]){
		$_SESSION['err']="Wrong password";
		// die("<script>alert('Wrong password.');</script>");
	}else{
		$_SESSION["name"]=$t[1];
		$_SESSION['id']=$t[0];
		$req="UPDATE users SET User_status=1 WHERE User_id=$t[0];";
		mysqli_query($conn,$req)or die(mysqli_error($conn));
	}
};
?>
