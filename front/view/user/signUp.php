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
	width: 80%;
}

#user_sign_up_form *{
	margin: 3px;
}

.ok {
	box-shadow: 0 0 0 2px lime;
}
.ko {
	box-shadow: 0 0 0 2px red;
}
</style>

<h1>Sign up</h1>


<div id='user_sign_up'>
	<form id='user_sign_up_form' method="post">
		<div>
			<input class="sign_up_input" type="email" name="Email" placeholder="Email" required onchange="checkEmailExistance(this);">
		</div>
		<div>
			<input class="sign_up_input" type="text" name="Login" placeholder="Login" required minlength="3" maxlength="21" onchange="checkLoginExistance(this);">
		</div>
		<div>
			<input class="sign_up_input" type="password" name="Password" title="Ur password must atleast one uppercase letter, one lowercase letter and one number and be atleast 8 symbols" pattern placeholder="Password" required minlength="3" maxlength="21" onkeyup="passwordCompare();" onchange="regexPassword(this)">
		</div>
		<div>
			<input class="sign_up_input" type="password" name="RePassword" placeholder="Password confirm" required minlength="3" maxlength="21" onkeyup="passwordCompare();">
		</div>
		<div>
			<button onclick="return checkFormValues();">SUBMIT</button>
		</div>
	</form>
</div> 



<script type="text/javascript">
	var emailCheck = false;
	var loginCheck = false;
	var passwordCheck = false;

	function regexPassword(el)
	{
		var password = el.value;
		if (password.match(/^\w{3,21}$/) && password.match(/[a-z]/) && password.match(/[A-Z]/) && password.match(/[0-9]/))
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
		if (!emailCheck || !loginCheck || !passwordCheck)
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

	function checkEmailExistance(el)
	{
		var email = el.value;
		if (email == '')
			return ;
		var http = new XMLHttpRequest();
		var url = '/user/check-email-existence';
		var params = 'Email=' + email;
		http.open('POST', url, true);
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = function() {//Call a function when the state changes.
		    if(http.readyState == 4 && http.status == 200) {
		    	var res = JSON.parse(http.responseText);
		    	if (res)
		    	{
		    		el.classList.add('ko');
		    		emailCheck = false;
		    	}
		    	else
		    	{
		    		el.classList.add('ok');
		    		emailCheck = true;
		    	}
		    }
		}
		http.send(params);		
	}

	function checkLoginExistance(el)
	{
		var login = el.value;
		if (login == '')
			return ;
		var http = new XMLHttpRequest();
		var url = '/user/check-login-existence';
		var params = 'Login=' + login;
		http.open('POST', url, true);
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = function() {//Call a function when the state changes.
		    if(http.readyState == 4 && http.status == 200) {
		    	var res = JSON.parse(http.responseText);
		    	if (res)
		    	{
		    		el.classList.add('ko');
		    		loginCheck = false;
		    	}
		    	else
		    	{
		    		el.classList.add('ok');
		    		loginCheck = true;
		    	}
		    }
		}
		http.send(params);		
	}
</script>