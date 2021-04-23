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
			if(empty($_POST['sign_in'])){?>
				<div class="main">
					<div class="logo_image_signing">
						<input class="logo_image" type="image" src="../public/images/logo.png" alt="logo">
					</div>
					<div class="signing_container">
					<form action="" method="POST" onsubmit="verify_sign_in_info();">
					<div class="info sign_in">
						<div class="labels">
							<label for="email">Email:</label>
							<label for="password">Password:</label>
						</div>
						<div class="inputs">
							<input type="email" id="email" name="email" required>
							<input type="password" id="password" name="password" required>
						</div>
					</div>
					<div class="clear_only"></div>
					<p class="error_message"><?php if(!empty($_SESSION['err'])){echo($_SESSION['err']);session_unset();}?></p>
					<div class="choice">
						<div>
							<input id="button" type="submit" value="Sign In" name="sign_in">
						</div>
						<div>
							<a id="button" href="sign_up.php">Sign Up</a>
						</div>
					</div>
					<div class="clear_only"></div>
					</form>
					</div>
				</div>
				<?php
			}elseif(!(empty($_POST['email']) || empty($_POST['password']))){ ?>
					<?php
						require './_/connect.php';
						header("Location: account.php", TRUE, 301);
						exit();
					?>	
			<?php }
		}else{
			header("Location: account.php", TRUE, 301);
			exit();
		}?>
	</body>
</html>
