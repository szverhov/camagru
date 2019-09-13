<style type="text/css">

#user_sign_up
{
	/*position: absolute;*/
	top: 10vh;
	right: 2vw;
	/*visibility: hidden;*/
	height: 0;
	width: 0;
	background: #474747;
	display: flex;
	flex-direction: column;
	border: 2px solid white;
	border-radius: 10px;
	justify-content: space-around;
	z-index: 100;
	align-items: center;
	min-height: 300px;
	min-width: 300px;

}
.sign_up_input
{
	width: 100%;
	height: 40px;
}

#user_sign_up_form *{
	display: flex;
	flex-direction: column;
	border-radius: 10px;
	justify-content: center;
	align-items: center;
}

.inptDiv {
	margin: 10px;
	width: 90%;
}

.ok {
	box-shadow: 0 0 0 2px lime;
}
.ko {
	box-shadow: 0 0 0 2px red;
}
</style>
<link rel="stylesheet" href="/css/submitButton.css">



<div id='user_sign_up'>
	<h1>User password restoration</h1>
	<form id='user_sign_up_form' method="post" action="/user/restore-password?token=<?=$token?>">
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

<script type="text/javascript">
	var passwordCheck = false;

	function regexPassword(el)
	{
		var password = el.value;
		if (password.match(/((?=.*\d)(?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*[\W]).{8,64})/))
			el.removeAttribute("pattern");
		else
			el.setAttribute("pattern", null);
	}

	function checkFormValues()
	{

		var inpts = document.getElementsByClassName('sign_up_input');
		for (var i = 0; i < inpts.length; i++) {
			if (inpts[i].value == '')
				return true;
		}
		if (!passwordCheck)
			return false;
		return true;
	}

	function passwordCompare()
	{	
		var rePassword = document.getElementsByName('RePassword')[0];
		var password = document.getElementsByName('Password')[0];
		password.removeAttribute('pattern');
		if (rePassword.value == '')
		{
			rePassword.classList.remove('ko');
			rePassword.classList.remove('ok');
			passwordCheck = false;
			return ;
		}
		if (password.value != rePassword.value)
		{
			rePassword.classList.add('ko');
			rePassword.classList.remove('ok');
			passwordCheck = false;
		}
		else 
		{
			rePassword.classList.add('ok');
			rePassword.classList.remove('ko');
			passwordCheck = true;
		}
	}
</script>