var userData;

document.addEventListener('DOMContentLoaded', function() {
	var request = new XMLHttpRequest();
	request.open('POST', '/profile/get-user-data', true);
	request.onreadystatechange = function()
	{
	    if(request.readyState == 4 && request.status == 200)
	    {
	    	userData = JSON.parse(request.responseText);
			fillProfileMainBlock();
			fillUserGallery(userData['posts']);
	    }
	}	
	request.send();
});