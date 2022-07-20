<?php
// $Message = '';
// require_once ('../models/connection.php');
// require_once('../controllers/login.controller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/styles/styling.css">
    <title>Login Page</title>
</head>
<body>
	<img class="logo" src="/public/assets/new_logo-bl.png" alt="">
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
		<form action="http://localhost:3000/organisateur/register" method="post">
			<div class="form-holder">
				<input type="text" id="name" class="input" name="username" placeholder="Name" autocomplete="off" />
				<input type="email" id="email" class="input" name="email" placeholder="Email" autocomplete="off" />
				<input type="password" id="pwd" name="mdp" class="input" placeholder="Password" autocomplete="off" />
			</div>
			<button class="submit-btn" name="sign" >Sign up</button>
		</form>
	</div>
    <form method="post" id="frml" class="login slide-up" action="http://localhost:3000/organisateur/login">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
			<div class="form-holder">
				<input type="email" id="email" name="email" class="input" placeholder="Email" autocomplete="off" />
				<input type="password" id="pwd" name="mdp" class="input" placeholder="Password" />
			</div>
		
			<input type="submit" name="submit" class="submit-btn" value="Login">
	</form> 
		</div>
	</div>
</div>


<script src="/public/scripts/scriptlogin.js"></script>
<script src="/public/scripts/regex.js"></script>
</body>
</html>