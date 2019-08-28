var galleryData;

document.addEventListener('DOMContentLoaded', function() {
	var request = new XMLHttpRequest();
	request.open('POST', '/gallery/get-all-posts-data', true);
	request.onreadystatechange = function()
	{
	    if(request.readyState == 4 && request.status == 200)
	    {
	    	galleryData = JSON.parse(request.responseText);
			createGallery();
	    }
	}	
	request.send();
});