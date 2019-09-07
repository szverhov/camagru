function createChangeNotificationBlock(parent)
{
	var blockForm = document.createElement('form');
	blockForm.addEventListener('submit', function(event){event.preventDefault()});
	blockForm.classList.add('hiddenEl');
	var allBlocks = [];
	var sendButton = document.createElement('button');
	sendButton.classList.add('myButton');
	if (userData['user']['notifications'] != 0)
		sendButton.innerHTML = 'Click to disable notifications';
	else
		sendButton.innerHTML = 'Click to enable notifications';

	sendButton.setAttribute('sr_id', userData['user']['id']);

	sendButton.addEventListener('click', function(event){changeNotifications(sendButton)});
	blockForm.appendChild(sendButton);
	parent.appendChild(blockForm);
	allRightChilds['notification'] = blockForm;
	return blockForm;
}

function changeNotifications(bttn)
{
	var request = new XMLHttpRequest();
	var formData = new FormData();
	formData.append("UserID", bttn.getAttribute('sr_id'));
	request.open('POST', '/profile/change-notif', true);
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			if (bttn.innerHTML == 'Click to disable notifications')
				bttn.innerHTML = 'Click to enable notifications';
			else
				bttn.innerHTML = 'Click to disable notifications';
		}
	}
	request.send(formData);
}