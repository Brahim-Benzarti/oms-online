<?php 
	session_start();
?>
<!doctype html>
<html>
	<head>
		<?php require './_/head.php' ?>
	</head>

	<body>
        <nav>
			<li><a href="../index.html">Home</a></li>
			<li><a href="">Account</a></li>
        </nav>
		<?php
		if(empty($_SESSION['id'])){
			if(empty($_POST['sign_up'])){?>
				<div id="main">
					<form action="" method="POST" onsubmit="verify_sign_up_info();">
						<label for="name">Name:</label>
						<input type="text" id="name" name="name" required>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" required>
						<label for="email">Email:</label>
						<input type="email" id="email" name="email" required>
						<label for="pn">Phone number:</label>
						<input type="tel" id="pn" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" name="pn" required>
						<p>Sex:</p>
						<div class="sex">
							<label for="RadioGroup1_0">Male</label>
							<input type="radio" name="sex" value="male" id="RadioGroup1_0">
							<label for="RadioGroup1_1">Female</label>
							<input type="radio" name="sex" value="female" id="RadioGroup1_1">
							<label for="RadioGroup1_2">Other</label>
							<input type="radio" name="sex" value="other" id="RadioGroup1_2" selected>
						</div>
						<label for="bd">Birthday:</label>
						<input type="date" id="bd" name="bd">
						<input type="submit" value="Sign Up" name="sign_up">
					</form>
				</div>
				<?php
			}elseif(!(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['pn']) || empty($_POST['sex']) || empty($_POST['bd']))){ ?>
				<div id="main">
					<?php
						require 'connect.php';
						header("Location: account.php", TRUE, 301);
						exit();
					?>	
				</div>
			<?php }
		}else{
			header("Location: account.php", TRUE, 301);
			exit();
		}?>
	</body>
</html>
