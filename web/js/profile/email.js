
function createChangeEmailBlock(parent)
{
	var blockForm = document.createElement('form');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	blockForm.classList.add('hiddenEl');
	var allBlocks = [];
	allBlocks['passw'] = createInputBlock('password', true, 'Password', 'Your password', checkPasswAjax);
	allBlocks['email'] = createInputBlock('email', true, 'New email', 'Email', checkEmailAjax);
	var sendButton = document.createElement('button');

	ajaxChangeEmail(sendButton, allBlocks);

	blockForm.appendChild(allBlocks['passw']['block']);
	blockForm.appendChild(allBlocks['email']['block']);
	blockForm.appendChild(sendButton);
	parent.appendChild(blockForm);
	allRightChilds['email'] = blockForm;
	return blockForm;
}


function ajaxChangeEmail(sendButton, allInptBlocks)
{
	sendButton.classList.add('myButton');
	sendButton.innerHTML = 'Save changes';

	sendButton.addEventListener('click', function(event) {
	// console.log(passwordVaild, emailChecked, currPassw.value);

		if (allInptBlocks['email']['input'].getAttribute('class') && allInptBlocks['passw']['input'].getAttribute('class') &&
			allInptBlocks['email']['input'].getAttribute('class').indexOf('ok') != -1 && allInptBlocks['passw']['input'].getAttribute('class').indexOf('ok') != -1)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("newEmail", allInptBlocks['email']['input'].value);
			formData.append("currPassw", allInptBlocks['passw']['input'].value);
			request.open('POST', '/profile/change-email', true);
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					var res = JSON.parse(request.responseText);
					if (!res['success'])
					{
						if (res['message'].indexOf('Email'))
						{
							allInptBlocks['login']['input'].classList.add('ko');
							allInptBlocks['login']['input'].classList.remove('ok');
							allInptBlocks['login']['message'].innerHTML = res['message'];
						}
						else if (res['message'].indexOf('asswor'))
						{
							allInptBlocks['passw']['input'].classList.add('ko');
							allInptBlocks['passw']['input'].classList.remove('ok');
							allInptBlocks['passw']['message'].innerHTML = res['message'];
						}
					}
					else
					{
						allInptBlocks['email']['input'].value = '';
						allInptBlocks['passw']['input'].value = '';
						allInptBlocks['email']['input'].classList.remove('ok');
						allInptBlocks['passw']['input'].classList.remove('ok');
						alert('Email changed!');

					}
				}
			} 
			request.send(formData); 
		}
	});
}

function checkEmailAjax(emailEL)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("Email", emailEL['input'].value);
	request.open('POST', '/profile/check-email', true);
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			var res = JSON.parse(request.responseText);
			if (res['success'] == true)
			{
				emailEL['input'].classList.add('ok');
				emailEL['input'].classList.remove('ko');
				emailEL['message'].innerHTML = '';
			}
			else
			{
				emailEL['input'].classList.add('ko');
				emailEL['input'].classList.remove('ok');
				emailEL['message'].innerHTML = res['message'];
			}
		}
	} 
	request.send(formData);
}