<div class="fullscreen">
	<div class="loginWrapper">
		<h2 class="loginHeader">Login</h2>
		<form class="login" id="login" action="utils/login.php">
			<div class="formDivider top">
				<input type="text" placeholder="E-Mail" id="email" />
				<input type="password" placeholder="Passwort" id="password" />
			</div>
			<div class="formDivider bottom">
				<button type="submit" class="loginButton">Login</button>
				<a href="#" class="registerLink">Register here</a>
			</div>
		</form>
	</div>
	<div class="registerWrapper">
		<form class="register" id="register" action="utils/register.php">
			<input type="text" placeholder="E-Mail" id="reg_email" />
			<input type="password" placeholder="Passwort" id="reg_password" />
			<input type="submit" class="registerButton" value="Register" />
			<a href="#" class="backLink">Back</a>
		</form>
		<div class="loginBack"></div>
	</div>
</div>