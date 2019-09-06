var galleryData;

var g_user_logged_in = false;

document.addEventListener('DOMContentLoaded', function() {
	var request = new XMLHttpRequest();
	request.open('POST', '/gallery/get-all-posts-data', true);
	request.onreadystatechange = function()
	{
	    if(request.readyState == 4 && request.status == 200)
	    {
	    	galleryData = JSON.parse(request.responseText);
	    	if (galleryData[0] && galleryData[0]['allreadyLiked'])
	    		g_user_logged_in = true;
			createGallery();
	    }
	}	
	request.send();
});