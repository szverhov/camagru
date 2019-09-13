	var emailCheck = false;
	var loginCheck = false;
	var passwordCheck = false;
	var passwordRegexped = false;

	function regexPassword(el)
	{
		var password = el.value;
		if (password.match(/((?=.*\d)(?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*[\W]).{8,64})/))
		{
			el.removeAttribute("pattern");
			passwordRegexped = true;
			el.classList.add('ok');
			el.classList.remove('ko');
		}
		else
		{
			el.title = "Ur password must have atleast one uppercase letter, one lowercase letter and one number and be atleast 8 symbols";
			el.setAttribute("pattern", null);
			el.classList.add('ko');
			el.classList.remove('ok');
		}
	}

	function regexEmail(el)
	{
		email = el.value;
		if (email.match(/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/))
		{
			el.removeAttribute("pattern");
			el.classList.add('ok');
			el.classList.remove('ko');
			return true;
		}
		else
		{
			alert('Not valid email!');
			el.title = "Invalid email";
			el.setAttribute("pattern", null);
			el.classList.add('ko');
			el.classList.remove('ok');
			emailCheck = false;
			return false;
		}	
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
		if (!regexEmail(el))
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
		    		console.log('asd');
		    		alert('This email allready exists');
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

	function regexLogin(el)
	{
		login = el.value;
		if (login.match(/^[a-z-A-Z-0-9]{3,23}$/))
		{
			el.removeAttribute("pattern");
			el.classList.add('ok');
			el.classList.remove('ko');
			return true;
		}
		else
		{
			alert('Invalid login!');
			el.title = "Invalid email";
			el.setAttribute("pattern", null);
			el.classList.add('ko');
			el.classList.remove('ok');
			loginCheck = false;
			return false;
		}	

	}

	function checkLoginExistance(el)
	{
		var login = el.value;
		if (login == '')
			return ;
		if (!regexLogin(el))
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
		    		alert("Login allready exists");
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