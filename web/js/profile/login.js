
function createChangeLoginBlock(parent)
{
	var blockForm = document.createElement('form');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	blockForm.classList.add('hiddenEl');
	// blockForm.classList.add('changeLoginBlock');
	var allBlocks = [];
	allBlocks['passw'] = createInputBlock('password', true, 'Password', 'Your password', checkPasswAjax);
	allBlocks['login'] = createInputBlock('text', true, 'New login', 'Login', checkLoginAjax);
	var sendButton = document.createElement('button');

	ajaxChangeLogin(sendButton, allBlocks);

	blockForm.appendChild(allBlocks['passw']['block']);
	blockForm.appendChild(allBlocks['login']['block']);
	blockForm.appendChild(sendButton);
	parent.appendChild(blockForm);
	allRightChilds['login'] = blockForm;
	return blockForm;
}

function createInputBlock(inputType, required, placeholder, labelText, func)
{
	var res = [];
	res['block'] = document.createElement('div');
	res['label'] = document.createElement('p');
	res['input'] = document.createElement('input');
	res['message'] = document.createElement('p');

	res['validate'] = func;


	res['block'].appendChild(res['label']);
	res['block'].appendChild(res['input']);
	res['block'].appendChild(res['message']);

	res['label'].innerHTML = labelText;
	res['input'].type = inputType;
	if (required)
		res['input'].required = 'required';
	res['input'].placeholder = placeholder;
	res['input'].addEventListener('change', ()=>{func(res, true);});

	res['input'].addEventListener('keydown', ()=>{
		res['input'].classList.remove('ok');
		res['input'].classList.remove('ko');
	});

	return res;
}

function ajaxChangeLogin(sendButton, allInptBlocks)
{
	sendButton.classList.add('myButton');
	sendButton.innerHTML = 'Save changes';

	sendButton.addEventListener('click', function(event)
	{
		if (allInptBlocks['login']['input'].getAttribute('class') && allInptBlocks['passw']['input'].getAttribute('class') &&
			allInptBlocks['login']['input'].getAttribute('class').indexOf('ok') != -1 && allInptBlocks['passw']['input'].getAttribute('class').indexOf('ok') != -1)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("newLogin", allInptBlocks['login']['input'].value);
			formData.append("currPassw", allInptBlocks['passw']['input'].value);

			request.open('POST', '/profile/change-login', true);
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					var res = JSON.parse(request.responseText);
					if (!res['success'])
					{
						if (res['message'].indexOf('Login'))
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
						allInptBlocks['login']['input'].value = '';
						allInptBlocks['passw']['input'].value = '';
						allInptBlocks['login']['input'].classList.remove('ok');
						allInptBlocks['passw']['input'].classList.remove('ok');
						alert('Login changed!');

					}
				}
			} 
			request.send(formData); 
		}
	});
}


function checkLoginAjax(loginBlock, async)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("Login", loginBlock['input'].value);
	request.open('POST', '/profile/check-login', async);
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			var res = JSON.parse(request.responseText);
			if (res['success'] == true)
			{
				loginBlock['input'].classList.add('ok');
				loginBlock['input'].classList.remove('ko');
				loginBlock['message'].innerHTML = '';
			}
			else
			{
				loginBlock['input'].classList.add('ko');
				loginBlock['input'].classList.remove('ok');
				loginBlock['message'].innerHTML = res['message'];
			}
		}
	} 
	request.send(formData);
}