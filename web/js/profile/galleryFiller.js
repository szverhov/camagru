function fillUserGallery(data)
{
	console.log(data);
	for (var q in data)
	{
		var imgBlock = document.createElement('div');
		imgBlock.setAttribute('img-id', data[q]['id']);
		var img = document.createElement('img');
		var dellButton = createDellButton();
		dellButton.setAttribute('onclick', "deleteThisImg(this)");
		// dellButton.addEventListener('click', function(){deleteThisImg(dellButton)});

		img.src = data[q]['imagePath'] + data[q]['imageName'];
		imgBlock.appendChild(img);
		imgBlock.appendChild(dellButton);
		userGallery.appendChild(imgBlock);
	}
}

function createDellButton()
{
	closeEl = document.createElement('div');
	closeEl.href = '#';
	closeEl.style.color = 'white';
	closeEl.classList.add('closeDelButton');
	return closeEl;
}

function deleteThisImg(el)
{
	if (confirm('Are u sure want to delete this img?'))
	{
		el.parentNode.parentNode.removeChild(el.parentNode);

		var request = new XMLHttpRequest();
		var formData = new FormData();
		formData.append("PostID", el.parentNode.getAttribute('img-id'));
		request.open('POST', '/profile/delete-post', true);
		request.onreadystatechange = function()
		{
			if(request.readyState == 4 && request.status == 200)
			{
			}
		} 
		request.send(formData);
	}
	else
	{
	    // Do nothing!
	}


}