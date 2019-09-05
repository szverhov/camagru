
var passwordVaild = false;

function createChangePasswordBlock(parent)
{

	var blockForm = document.createElement('form');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	blockForm.classList.add('hiddenEl');
	var allBlocks = [];
	allBlocks['passw'] = createInputBlock('password', true, 'Password', 'Your password', checkPasswAjax);
	allBlocks['newPassw'] = createInputBlock('password', true, 'New password', 'New password', regexxPassword);
	allBlocks['confirmPassw'] = createInputBlock('password', true, 'Confirm password', 'Confirm password', function(){});
	allBlocks['confirmPassw']['input'].addEventListener('keyup', function(){passwordComparation(allBlocks['newPassw']['input'], allBlocks['confirmPassw']['input'])});
	var sendButton = document.createElement('button');

	ajaxChangePassword(sendButton, allBlocks);

	blockForm.appendChild(allBlocks['passw']['block']);
	blockForm.appendChild(allBlocks['newPassw']['block']);
	blockForm.appendChild(allBlocks['confirmPassw']['block']);

	blockForm.appendChild(sendButton);
	parent.appendChild(blockForm);
	allRightChilds['passw'] = blockForm;
	return blockForm;
}

function regexxPassword(el)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("Password", el['input'].value);
	request.open('POST', '/profile/regex-password', true);
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			var res = JSON.parse(request.responseText);
			if (res['success'] == true)
			{
				el['input'].classList.add('ok');
				el['input'].classList.remove('ko');
				el['message'].innerHTML = '';
			}
			else
			{
				el['input'].classList.add('ko');
				el['input'].classList.remove('ok');
				el['message'].innerHTML = res['message'];
			}
		}
	} 
	request.send(formData);
}

function ajaxChangePassword(sendButton, allBlocks)
{
	sendButton.classList.add('myButton');
	sendButton.innerHTML = 'Save changes';

	sendButton.addEventListener('click', function(event) {
		var send = true;
		for (var q in allBlocks)
		{
			if (allBlocks[q]['input'].getAttribute('class') && allBlocks[q]['input'].getAttribute('class').indexOf('ok') == -1)
				send = false;
		}

		if (send)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("oldPassword", allBlocks['passw']['input'].value);
			formData.append("newPassword", allBlocks['confirmPassw']['input'].value);
			request.open('POST', '/profile/change-password', true);
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					for (var q in allBlocks)
					{
						allBlocks[q]['input'].classList.remove('ok');
						allBlocks[q]['input'].classList.remove('ko');
						allBlocks[q]['input'].value = '';
					}
					var res = JSON.parse(request.responseText);
					if (res)
						alert('Change password successfully!');
					else
						alert('Some error detected, try again!!');


				}
			} 
			request.send(formData); 			
		}
	});
}


function passwordComparation(password, rePassword)
{
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

function checkPasswAjax(passwordBlockEl, async)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("Password", passwordBlockEl['input'].value);
	request.open('POST', '/profile/check-password', async);
	request.onreadystatechange = ()=>
	{
		if(request.readyState == 4 && request.status == 200)
		{
			var res = JSON.parse(request.responseText);
			if (res['success'] == true)
			{
				passwordBlockEl['input'].classList.add('ok');
				passwordBlockEl['input'].classList.remove('ko');
				passwordBlockEl['message'].innerHTML = '';
			}
			else
			{
				passwordBlockEl['input'].classList.add('ko');
				passwordBlockEl['input'].classList.remove('ok');
				passwordBlockEl['message'].innerHTML = res['message'];
			}
		}
	} 
	request.send(formData);
}