<!doctype html>
<html>
	<head>
		<?php require 'head.php' ?>
	</head>

	<body>
		<?php require 'nav.php' ?>
		<div id="main">
			<form action="sign_up" method="POST" onsubmit="verify_sign_up_info();">
				<label for="name">Name:</label>
				<input type="text" id="name" required>
				<label for="password">Password:</label>
				<input type="password" id="password" required>
				<label for="email">Email:</label>
				<input type="email" id="email" required>
				<label for="pn">Phone number:</label>
				<input type="tel" id="pn" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}">
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
				<input type="date" id="bd">
				<input type="submit" value="Sign Up">
			</form>
		</div>
	</body>
</html>
