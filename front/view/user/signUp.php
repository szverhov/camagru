<link rel="stylesheet" href="/css/user/signUp.css">
<link rel="stylesheet" href="/css/submitButton.css">



<div id='user_sign_up'>
<h1>Sign up</h1>

	<form id='user_sign_up_form' method="post">
		<div class="inptDiv">
			<input class="sign_up_input" type="email" name="Email" placeholder="Email" required onchange="checkEmailExistance(this);">
		</div>
		<div class="inptDiv">
			<input class="sign_up_input" type="text" name="Login" placeholder="Login" required minlength="3" maxlength="21" onchange="checkLoginExistance(this);">
		</div>
		<div class="inptDiv">
			<input class="sign_up_input" type="password" name="Password" title="Ur password must atleast one uppercase letter, one lowercase letter and one number and be atleast 8 symbols" pattern placeholder="Password" required minlength="3" maxlength="21" onkeyup="passwordCompare();" onchange="regexPassword(this)">
		</div>
		<div class="inptDiv">
			<input class="sign_up_input" type="password" name="RePassword" placeholder="Password confirm" required minlength="3" maxlength="21" onkeyup="passwordCompare();">
		</div>
		<div class="inptDiv">
			<button class="myButton" onclick="return checkFormValues();">SUBMIT</button>
		</div>
	</form>
</div> 

<script type="text/javascript" src="/js/user/signUp.js"></script>
