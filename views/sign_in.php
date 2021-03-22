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
			if(empty($_POST['sign_in'])){?>
				<div id="main">
					<p class="error_message"><?php if(!empty($_SESSION['err'])){echo($_SESSION['err']);session_unset();}?></p>
					<form action="" method="POST" onsubmit="verify_sign_in_info();">
						<label for="email">Email:</label>
						<input type="email" id="email" name="email" required>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" required>
						<input type="submit" value="Sign In" name="sign_in">
						<p>or <a href="sign_up.php">Sign Up</a></p>
					</form>
				</div>
				<?php
			}elseif(!(empty($_POST['email']) || empty($_POST['password']))){ ?>
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
