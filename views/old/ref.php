<?php
require 'dbcon.php';
$new_message=$_POST['m'];
$to=$_POST['t'];
$me=$_POST['me'];
$ddd=date("Y-m-d h:i:s");
$req="INSERT INTO message(Date,text,sender_id,receiver_id)
		VALUES ('$ddd','$new_message',$me,$to);";
mysqli_query($conn, $req)or die(mysqli_error($conn));
$req="select user_name,text,date
		from message, users
		where receiver_id=$me and sender_id=$to and user_id=sender_id
		union 
		select user_name,text,date
		from message, users
		where receiver_id=$to and sender_id=$me and user_id=sender_id
		ORDER BY date;";
$res=mysqli_query($conn, $req)or die(mysqli_error($conn));
while($old_convs=mysqli_fetch_array($res)){
	?>
		<p><?php echo($old_convs[0].":  ".$old_convs[1]); ?></p>
	<?php
}
?>