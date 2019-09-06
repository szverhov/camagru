function loadEditedPhoto()
{
	var img = previewCanvasId.toDataURL('image/png');
	var formData = new FormData();
	formData.append("EditedImg", img);
	formData.append("ImageCaption", imageCaption.value);
	var request = new XMLHttpRequest();
	request.open('POST', '/file/save-edited-photo', true);
	request.onreadystatechange = function()
	{
	    if(request.readyState == 4 && request.status == 200)
	    {	
	    	console.log('success');
	    	splited = window.location.href.split('/');
	   		splited[3] = 'gallery';
	   		window.location.replace(splited.join('/'));
	    }
	}	
	request.send(formData);
}
