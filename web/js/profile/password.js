
var passwordVaild = false;

function createChangePasswordBlock(parent)
{
	var block = document.createElement('div');
	var blockForm = document.createElement('form');
	block.classList.add('changePasswBlock');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	blockForm.classList.add('hiddenEl');

	var currPassw = document.createElement('input');
	var newPassw = document.createElement('input');
	var reNewPassw = document.createElement('input');

	var sendButton = document.createElement('button');

	addInptsData(currPassw, newPassw, reNewPassw);
	editSendButton(sendButton, currPassw, newPassw);

	block.appendChild(currPassw);
	block.appendChild(newPassw);
	block.appendChild(reNewPassw);
	block.appendChild(sendButton);
	blockForm.appendChild(block);
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

function addInptsData(currPassw, newPassw, reNewPassw)
{
	currPassw.type = 'password';
	newPassw.type = 'password';
	reNewPassw.type = 'password';
	currPassw.required = 'required';
	newPassw.required = 'required';
	reNewPassw.required = 'required';
	currPassw.placeholder = 'Current password';
	newPassw.placeholder = 'New password';
	reNewPassw.placeholder = 'Confirm new password';
	newPassw.name = 'Password';
	reNewPassw.name = 'RePassword';

	currPassw.addEventListener('change', ()=>{chekPassowrd(currPassw);});
	newPassw.addEventListener('change', ()=>{regexPassword(newPassw);});
	reNewPassw.addEventListener('keyup', ()=>{passwordComparation(newPassw, reNewPassw)});

	currPassw.addEventListener('invalid', function(){
		if (currPassw.value == '')
			currPassw.setCustomValidity('Cant be empty!');
		else
			currPassw.setCustomValidity('');
	});
	newPassw.addEventListener('invalid', function(){
		if (newPassw.value == '')
			newPassw.setCustomValidity('Cant be empty!');
		else
			newPassw.setCustomValidity('');
	});
	reNewPassw.addEventListener('invalid', function(){
		if (reNewPassw.value == '')
			reNewPassw.setCustomValidity('Cant be empty!');
		else
			reNewPassw.setCustomValidity('');
	});
}

function editSendButton(sendButton, currPassw, newPassw)
{
	sendButton.classList.add('myButton');
	sendButton.innerHTML = 'Save changes';

	sendButton.addEventListener('click', function(event) {
		if (passwordCheck && passwordRegexped && passwordVaild)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("oldPassword", currPassw.value);
			formData.append("newPassword", newPassw.value);
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
				passwordVaild = true;
				currPassw.classList.add('ok');
				currPassw.classList.remove('ko');
			}
			else
			{
				currPassw.classList.add('ko');
				currPassw.classList.remove('ok');
				passwordVaild = false;
			}

		}
	} 
	request.send(formData); 	
}