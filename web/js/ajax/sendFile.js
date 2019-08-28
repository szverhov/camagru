function sendFile(el, url, reqType)
{
	if (el.files[0].type != 'image/jpeg' && el.files[0].type != 'image/png')
	{
		console.log('wrong file extension');
		return ;
	}
	else if (el.files[0].size > 5242880)
	{
		console.log('file is to big!');
		return ;
	}
	var formData = new FormData();
	formData.append("AjaxFile", el.files[0]);
	el.value = '';
	var request = new XMLHttpRequest();
	request.open(reqType, url, true);
	request.onreadystatechange = function()
	{
	    if(request.readyState == 4 && request.status == 200)
	    {
	    	var res = JSON.parse(request.responseText);
	    	video.classList.add('hiddenEl');
	    	userLoadedPhoto.classList.remove('hiddenEl');
	    	userLoadedPhoto.classList.add('userPhoto');
	    	userLoadedPhoto.src = res;
	    	setTimeout(function(){
		    	if (userLoadedPhoto.naturalHeight < userLoadedPhoto.naturalWidth)
		    	{
		    		userLoadedPhoto.style.height = '640px';
		    		userLoadedPhoto.style.width = 'auto';
		    	}
		    	else
		    	{
		    		userLoadedPhoto.style.height = 'auto';
		    		userLoadedPhoto.style.width = '640px';	    		
		    	}
	    	}, 100);

	    	console.dir(userLoadedPhoto);
	    	userLoadedPhotoBlock.classList.remove('hiddenEl');
	    	userLoadedPhotoBlock.classList.add('userLoadedPhotoBlock');

	    	showVideoButton.classList.remove('hiddenEl');
	    	showVideoButton.classList.add('myButton');
			showVideoButton.innerHTML = 'Anable camera';		


	    }
	}	
	request.send(formData);
}
