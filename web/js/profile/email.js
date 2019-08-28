var emailPasswordValid = false;

function createChangeEmailBlock(parent)
{
	var blockForm = document.createElement('form');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	// blockForm.classList.add('hiddenEl');
	blockForm.classList.add('changeEmailBlock');

	var currPassw = document.createElement('input');
	var newEmail = document.createElement('input');

	var sendButton = document.createElement('button');

	addInptsData(currPassw, newEmail);
	editSendButton(sendButton, newEmail);

	blockForm.appendChild(currPassw);
	blockForm.appendChild(newEmail);
	blockForm.appendChild(sendButton);
	parent.appendChild(blockForm);
	return blockForm;
}

function createChangePasswordButton(parent, passwdBlock, blockClass)
{
	var bttn = document.createElement('bttn');
	bttn.classList.add('myButton');
	bttn.innerHTML = 'Change password';
	bttn.addEventListener('click', function(){
		if (passwdBlock.clientHeight > 0)
		{
			passwdBlock.classList.remove(blockClass);
			passwdBlock.classList.add('hiddenEl');
		}
		else
		{
			passwdBlock.classList.remove('hiddenEl');
			passwdBlock.classList.add(blockClass);			
		}
	});
	parent.appendChild(bttn);
}

function addInptsData(currPassw, newEmail)
{
	currPassw.type = 'password';
	newEmail.type = 'email';
	currPassw.required = 'required';
	newEmail.required = 'required';
	currPassw.placeholder = 'Current password';
	newEmail.placeholder = 'New email';
	newEmail.name = 'Email';

	currPassw.addEventListener('change', ()=>{chekPassowrd(currPassw);});
	newEmail.addEventListener('keyup', ()=>{checkEmail(newEmail)});

	currPassw.addEventListener('invalid', function(){
		if (currPassw.value == '')
			currPassw.setCustomValidity('Cant be empty!');
		else
			currPassw.setCustomValidity('');
	});
	newEmail.addEventListener('invalid', function(){
		if (newPassw.value == '')
			newPassw.setCustomValidity('Not valid email!');
		else
			newPassw.setCustomValidity('');
	});
}

function editSendButton(sendButton, newEmail)
{
	sendButton.classList.add('myButton');
	sendButton.innerHTML = 'Save changes';

	sendButton.addEventListener('click', function(event) {
		if (emailPasswordVaild)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("newEmail", newEmail.value);
			request.open('POST', '/profile/change-password', true);
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					var res = JSON.parse(request.responseText);
					console.log(res);
				}
			} 
			request.send(formData); 
		}
	});
}

function passwordComparation(password, rePassword)
{	if (passwordRegexped)
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

function chekPassowrd(currPassw)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("Password", currPassw.value);
	// formData.append("newPassord", newPassw.value);
	request.open('POST', '/profile/check-password', true);
	request.onreadystatechange = ()=>
	{
		if(request.readyState == 4 && request.status == 200)
		{
			var res = JSON.parse(request.responseText);
			if (res == true)
			{
				emailPasswordValid = true;
				currPassw.classList.add('ok');
				currPassw.classList.remove('ko');
			}
			else
			{
				currPassw.classList.add('ko');
				currPassw.classList.remove('ok');
				emailPasswordValid = false;
			}

		}
	} 
	request.send(formData); 	
}