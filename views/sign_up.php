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
			<p class="logo">OMS</p>
			<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="">Account</a></li>
			</ul>
        </nav>
		<div class="clear"></div>
		<?php
		if(empty($_SESSION['id'])){
			if(empty($_POST['sign_up'])){?>
				<div class="main">
					<div class="logo_image_signing">
						<input class="logo_image" type="image" src="../public/images/logo.png" alt="logo">
					</div>
					<div class="signing_container">
					<form action="" method="POST" onsubmit="verify_sign_up_info();">
						<div class="info sign_up">
							<div class="labels">
								<label for="name">Name:</label>
								<label for="password">Password:</label>
								<label for="email">Email:</label>
								<label for="pn">Phone number:</label>
								<label for="sex">Sex:</label>
								<label for="bd">Birthday:</label>
							</div>
							<div class="inputs">
								<input type="text" id="name" name="name" required>
								<input type="password" id="password" name="password" required>
								<input type="email" id="email" name="email" required>
								<input type="tel" id="pn" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" name="pn" required>
								<div id="sex" class="sex">
									<label for="RadioGroup1_0">Male</label>
									<input type="radio" name="sex" value="male" id="RadioGroup1_0">
									<label for="RadioGroup1_1">Female</label>
									<input type="radio" name="sex" value="female" id="RadioGroup1_1">
									<label for="RadioGroup1_2">Other</label>
									<input type="radio" name="sex" value="other" id="RadioGroup1_2" selected>
								</div>
								<div class="clear_only"></div>
								<input type="date" id="bd" name="bd">
							</div>
						</div>
						<div class="clear_only"></div>
						<div class="choice">
							<div>
								<input id="button" type="submit" value="Sign Up" name="sign_up">
							</div>
						</div>
					</form>
					</div>
				</div>
				<?php
			}elseif(!(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['pn']) || empty($_POST['sex']) || empty($_POST['bd']))){ ?>
				<div id="main">
					<?php
						require './_/connect.php';
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
