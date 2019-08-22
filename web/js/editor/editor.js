var dragItem;
var dragItems = [];
var dragItemZindex = 3;
var pictureCount = 0;

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || 
                        navigator.mozGetUserMedia || navigator.msGetUserMedia || 
                        navigator.oGetUserMedia;

if (navigator.getUserMedia) {
    navigator.mediaDevices.getUserMedia({video: true}).then(function(stream) {
    video.srcObject = stream;
    video.play();
    }).catch(function (error) {
    	// console.log(error.message);
    	// alert("Somthing wrong with camera connection! Try next:\n 1) Check that your browser have camera usage permision. \n 2) Check that system gives camera usage permision for your browser. \n 3) Check that camera is connected to your computer :) .")
    });
}

document.addEventListener('DOMContentLoaded', function() {
	showHideStickers();
	// return ;
	var http = new XMLHttpRequest();
	var url = '/editor/get-stickers';
	// var params = 'Email=' + email;
	http.open('POST', url, true);
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200)
	    {
	    	var res = JSON.parse(http.responseText);
	    	// console.log(res);
	    	for (var q in res)
	    	{
	    		var stickerBlock = document.createElement('div');
	    		stickerBlock.classList.add('stickerBlock');

	    		var stickerName = document.createElement('p');
	    		stickerName.innerHTML = q;
	    		stickerBlock.appendChild(stickerName);

	    		var stickerInnerBlock = document.createElement('div');

	    		for (var k in res[q])
	    		{
		    		var imgEl = document.createElement('img');
		    		imgEl.setAttribute('onclick', 'appendToContainerBlock(this)');
		    		imgEl.src = res[q][k];
		    		imgEl.classList.add('stickerEl');
		    		stickerInnerBlock.appendChild(imgEl);	    			
	    		}
	    		stickerBlock.appendChild(stickerInnerBlock);
	    		stickerSelector.appendChild(stickerBlock);
	    	}
	    	// console.log(res);
	    }
	}
	http.send();
});

document.getElementById("snap").addEventListener("click", function() {
	if (pictureCount < 5 && dragItems.length > 0)
	{
		disableTakeAPhoto();
		canvasBlock = document.createElement('div');
		canvas = document.createElement('canvas');
		closeEl = document.createElement('div');
		closeEl.href = '#';
		closeEl.style.color = 'white';
		closeEl.classList.add('closeDelButton');
		closeEl.setAttribute('onclick', "deleteCanvasPhotoBlock(this)");

		if (video.clientHeight > 0)
		{
			canvas.width = video.videoWidth;
			canvas.height = video.videoHeight;
		}
		else
		{
			canvas.width = 640;
			canvas.height = 480;
		}

		canvas.classList.add('canvasCaptured');
		canvasBlock.appendChild(closeEl);
		canvasBlock.classList.add('canvasPhotoBlock');
		canvasBlock.appendChild(canvas);
		capturedCanvasBlock.appendChild(canvasBlock);
		context = canvas.getContext('2d');

		if (video.clientHeight > 0)
			context.drawImage(video, 0, 0);
		else
		{
			var widthPxDiff = (userLoadedPhoto.naturalWidth - userLoadedPhoto.clientWidth);
			var priceOfOnePercent = userLoadedPhoto.clientWidth / 100;
			var percentResize = widthPxDiff / priceOfOnePercent;
			context.drawImage(userLoadedPhoto, 0, userLoadedPhotoBlock.scrollTop + (userLoadedPhotoBlock.scrollTop / 100) * percentResize , userLoadedPhoto.naturalWidth, 480 + (480 / 100) * percentResize, 0, 0, canvas.width, canvas.height);
		}

		var allItems = dragItems;
		for (var q in allItems)
		{
			if (allItems[q].tagName == "IMG")
				context.drawImage(allItems[q], allItems[q].offsetLeft + parseInt(allItems[q].getAttribute('x_offset')), allItems[q].offsetTop + parseInt(allItems[q].getAttribute('y_offset')), allItems[q].clientWidth, allItems[q].clientHeight);			
		}
		dragItems = [];
		dragContainer.innerHTML = '';

		canvas.setAttribute('onclick', "startEdit(this)");
		pictureCount++;
	}
});	

function showHideStickers(el)
{
	if (stickerSelector.clientHeight > 0)
	{
		stickerSelector.classList.remove('stickerSelector');
		stickerSelector.classList.add('hiddenEl');
		if (el)
		{
			el.classList.remove('hiddenEl');
			el.classList.add('closeDelButton');			
		}
	}
	else
	{
		stickerSelector.classList.remove('hiddenEl');
		stickerSelector.classList.add('stickerSelector');
		if (el)
		{
			el.classList.remove('closeDelButton');
			el.classList.add('hiddenEl');			
		}
	}
}

function appendToContainerBlock(el)
{
	showHideStickers();
	anableTakeAPhoto();
	var newImage = document.createElement('img');
	newImage.classList.add('conteinerItem');
	newImage.setAttribute('onmousedown', "setAssDragItem(this)");
	newImage.setAttribute('onwheel', "resizeImg(event, this)");
	newImage.src = el.src;
	newImage.setAttribute('x_offset', '0');
	newImage.setAttribute('y_offset', '0');
	newImage.style.zIndex = dragItemZindex++;
	dragContainer.appendChild(newImage);
	dragItems.push(newImage);
}

function resizeImg(e, el)
{
	e.stopPropagation();
	e.preventDefault();
	if (e.deltaY > 0 && el.height < 300)
		el.style.height = el.height + 5 + 'px';
	else if (e.deltaY < 0 && el.height > 100)
		el.style.height = el.height - 5 + 'px';
}

function setAssDragItem(el)
{
	dragItem = el;
}

function startEdit(el)
{
	previewBlock.classList.remove('hiddenEl');
	previewBlock.classList.add('previewBlock');
	previewCloser.classList.remove('hiddenEl');
	previewCloser.classList.add('closeDelButton');

	// previewCanvasId.height = el.height;
	// previewCanvasId.width = el.width;

	context = previewCanvasId.getContext('2d');
	context.drawImage(el, 0, 0);
}

function closeEditorEl(el)
{
	previewBlock.classList.remove('previewBlock');
	previewBlock.classList.add('hiddenEl');
	previewCloser.classList.remove('closeDelButton');
	previewCloser.classList.add('hiddenEl');
}

function deleteCanvasPhotoBlock(el)
{
	el.parentNode.parentNode.removeChild(el.parentNode);
	if (pictureCount > 0)
		pictureCount--;
}

function anableTakeAPhoto()
{
	snap.disabled = false;
	snap.classList.remove('disabledButton');
	snap.classList.add('myButton');
	snap.innerHTML = 'Take a photo';
}

function disableTakeAPhoto()
{
	snap.disabled = true;
	snap.classList.remove('myButton');
	snap.classList.add('disabledButton');
	snap.innerHTML = 'Disabled (While no stickers selected)';
}



var currentX;
var currentY;
var initialX;
var initialY;
var xOffset = 0;
var yOffset = 0;
var dragging = false;

dragContainer.addEventListener("mousedown", dragStart, false);
dragContainer.addEventListener("mouseup", dragEnd);
dragContainer.addEventListener("mousemove", drag);
document.body.addEventListener("mouseup", deleteDragItem);
video.style.pointerEvents = 'none';

function deleteDragItem(e)
{
	if (!dragging && dragItem)
	{
		dragItem.parentNode.removeChild(dragItem);
		for (var q in dragItems)
		{
			if (dragItems[q].src == dragItem.src)
			{
				dragItems.splice(q, 1);
			}
		}
		dragItem = null;
		if (dragItems.length == 0)
			disableTakeAPhoto();
		dragEnd(e);
	}
}

function dragStart(e) {
	e.preventDefault();
	e.stopPropagation();

	dragging = false;

	if (dragItem)
	{
		for (var q in dragItems)
		{
			if (dragItems[q].src == dragItem.src)
			{
				dragItems.splice(q, 1);
			}
		}
		dragItem.style.zIndex = dragItemZindex;
		dragItemZindex++;
		if (!dragItem.getAttribute('x_offset'))
		{
			xOffset = 0;
			yOffset = 0;
		}
		else
		{
			xOffset = dragItem.getAttribute('x_offset');
			yOffset = dragItem.getAttribute('y_offset');      	
		}
		initialX = e.clientX - xOffset;
		initialY = e.clientY - yOffset;
	}
}

function dragEnd(e) {
	if (dragItem)
		dragItems.push(dragItem);
	dragging = true;
	initialX = currentX;
	initialY = currentY;
	dragItem = null;
}

function drag(e) {
  	if (dragItem)
  	{
		currentX = e.clientX - initialX;
		currentY = e.clientY - initialY;
		xOffset = currentX;
		yOffset = currentY;
    	setTranslate(currentX, currentY, dragItem);
	}
}

function setTranslate(xPos, yPos, el) {
	el.setAttribute('x_offset', xPos);
	el.setAttribute('y_offset', yPos);
	el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
}


function showVideo()
{
	if (video.clientHeight == 0)
	{
		video.classList.remove('hiddenEl');
		userLoadedPhoto.classList.remove('userPhoto');
		userLoadedPhoto.classList.add('hiddenEl');
		userLoadedPhotoBlock.classList.remove('userLoadedPhotoBlock');
		userLoadedPhotoBlock.classList.add('hiddenEl');
		showVideoButton.innerHTML = 'Show ur photo';		
	}
	else
	{
		video.classList.add('hiddenEl');
		userLoadedPhoto.classList.remove('hiddenEl');
		userLoadedPhoto.classList.add('userPhoto');
		userLoadedPhotoBlock.classList.remove('hiddenEl');
		userLoadedPhotoBlock.classList.add('userLoadedPhotoBlock');
		showVideoButton.innerHTML = 'Anable camera';		
	}

}