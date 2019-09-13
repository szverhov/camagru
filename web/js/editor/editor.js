var dragItem;
var dragItems = [];
var dragItemZindex = 3;
var pictureCount = 0;

function isItMobile() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

// console.log(window.mobilecheck);
// navigator.getWebcam = (navigator.getUserMedia || navigator.webKitGetUserMedia || navigator.moxGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
// if (navigator.mediaDevices.getUserMedia) {
//     navigator.mediaDevices.getUserMedia({  audio: true, video: true })
//     .then(function (stream) {
//                   //Display the video stream in the video object
//      })
//      .catch(function (e) { logError(e.name + ": " + e.message); });
// }
// else {
// navigator.getWebcam({ audio: true, video: true }, 
//      function (stream) {
//              //Display the video stream in the video object
//      }, 
//      function () { logError("Web cam is not accessible."); });
// }

navigator.getWebcam = (navigator.getUserMedia || navigator.webKitGetUserMedia || navigator.moxGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
if (navigator.mediaDevices.getUserMedia)
{
	console.log('hello');
    navigator.mediaDevices.getUserMedia({  audio: false, video: true })
	    .then(function (stream) {
	    	console.log('getUserMedia');
		    video.srcObject = stream;
		    video.play();
	     },function(res){console.log(res)})
	     .catch(function (e) { logError(e.name + ": " + e.message); });
}
else
{
	navigator.getWebcam({ audio: false, video: true }, 
	     function (stream) {
	    	console.log('stream');
		    video.srcObject = stream;
		    video.play();
	     }, 
	     function () { logError("Web cam is not accessible."); });
}

// navigator.mediaDevices.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || 
//                         navigator.mozGetUserMedia || navigator.msGetUserMedia || 
//                         navigator.oGetUserMedia;

// if (navigator.mediaDevices.getUserMedia) {
//     navigator.mediaDevices.getUserMedia({video: true}).then(function(stream) {
//     console.log(video);

//     video.srcObject = stream;
//     video.play();

//     }).catch(function (error) {
//     	// console.log(error.message);
//     	alert("Somthing wrong with camera connection! Try next:\n 1) Check that your browser have camera usage permision. \n 2) Check that system gives camera usage permision for your browser. \n 3) Check that camera is connected to your computer :) .")
//     });
// }

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


		// var height = isItMobile() ? 240 : 480;
		// var width = isItMobile() ? 320 : 640;
		var height = 480;
		var width = 640;


		canvas.width = width;
		canvas.height = height;

		// if (video.clientHeight > 0)
		// {
		// 	canvas.width = video.videoWidth;
		// 	canvas.height = video.videoHeight;
		// }
		// else
		// {
		// 	canvas.width = width;
		// 	canvas.height = height;
		// }

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
			// console.log(userLoadedPhoto.naturalWidth, width + (width / 100) * percentResize,
			// 	userLoadedPhoto.naturalHeight, height + (height / 100) * percentResize);

			context.drawImage(
				userLoadedPhoto,
				userLoadedPhotoBlock.scrollLeft + (userLoadedPhotoBlock.scrollLeft / 100) * percentResize,
				userLoadedPhotoBlock.scrollTop + (userLoadedPhotoBlock.scrollTop / 100) * percentResize,
				width + (width / 100) * percentResize,
				height + (height / 100) * percentResize,
				0, 0, canvas.width, canvas.height);
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