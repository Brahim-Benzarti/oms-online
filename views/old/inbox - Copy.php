<?php
require '../dbcon.php';
$email=$_POST['email'];
$password=$_POST['password'];

if($_POST['new']==1){
	$name=$_POST['name'];
	$pn=$_POST['pn'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	$req="	INSERT INTO users(User_name,User_password,User_email,User_phone_number,User_sex,User_age,User_description)
			VALUES ('$name','$password','$email','$pn','$sex','$age','$desc');";
	$res=mysqli_query($conn, $req)or die(mysqli_error($conn));
};

$req="select * from users where User_email='$email';";
$res=mysqli_query($conn, $req)or die(mysqli_error($conn));
if(mysqli_num_rows($res)==0){
    ?>
        <p>Sorry!!<br>No account with this email, <a href="sign_up.php">Sign Up</a>!.</p>
    <?php
}else{
	$t=mysqli_fetch_array($res);
	if($password!=$t[2]){
	?>
        <p>Sorry!!<br>Wrong password.</p>
    <?php
	}else{
		?>
			<script src="jquery.js"></script>
			<script>
				$(document).ready(function(){
				  $("#send").click(function(){
					  var m=document.getElementById("new_message").value;
					  var t=document.getElementById("to").value;
					  var me=<?php echo($t[0]);?>;
					$("#ref").load('ref.php',{m:m,t:t,me:me})
				  });
				});
			</script>
			<div id=ref>
			   <p>Start a conversation.</p>
			</div>
			<?php
			?>
			<hr>
			<p>Message: </p>
			<input type="text" id="new_message">
			<p>To:</p>
			<select id="to">
				<?php
				$rrr="select user_name, u.user_id from contact as c, users as u where c.contact_id=u.user_id and c.user_id=$t[0] and u.user_id<>$t[0];";
				$ress=mysqli_query($conn,$rrr)or die(mysqli_error($conn));
				while($q=mysqli_fetch_array($ress)){
					?>
						<option value="<?php echo($q[1]); ?>"><?php echo($q[0]); ?></option>
					<?php
				}
				?>
			</select>
			<input type="button" value="send" id="send">
		<?php
		}
};
?>
