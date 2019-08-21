
<style type="text/css">

.stickerEl {
	max-height: 50px;
}

.stickerSelector
{
	background-color: #6b6964;
	border: 2px solid #7d7a74;3
	z-index: 1000000;
	display: flex;
	flex-direction: column;
	/*flex-flow: wrap;*/
	visibility: visible;
	width: 700px;
	height: 800px;
	position: absolute;
	top: 150px;
	left: 150px;
	overflow: hidden;
	overflow-y: scroll;
	/*padding: 5px;*/
	box-shadow: inset 0px 0px 20px 10px rgba(0,0,0,0.6);
	border-radius: 10px;

}

.stickerBlock {
	margin: 5px;
	padding: 10px;
	background-color: #52514e;
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	border-radius: 10px;
	border: 2px solid #474745;
	box-shadow: inset 0px 0px 20px 10px rgba(0,0,0,0.6);

}

.item {
	height: 100px;
}
</style>

<style type="text/css">
	.deleteButton {
		position: absolute;
	}

	.deleteButton {
		box-shadow: 0 0 15px #ffffff;
	    /*background: #696464;*/
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    width: 25px;
	    height: 25px;
	    border-radius: 50px;
	    border: 1px solid white;
	}
	.deleteButton:after {
	    content: '';
	    height: 35px;
	    border-left: 1px solid white;

	    position: absolute;
	    transform: rotate(45deg);
	    left: 10px;
	    /*top: 2px;*/
	}

	.deleteButton:before {
	    content: '';
	    height: 35px;
	    border-left: 1px solid white;

	    position: absolute;
	    transform: rotate(-45deg);
	    left: 10px;
	    /*top: 2px;*/
	}
	.deleteButton:hover:before, .deleteButton:hover:after {
		transition: 2s ease-in-out;
	    height: 40px;


	}

	.deleteButton:hover{
		transform: rotate(1turn) scale(1.3);
		transition: 2s ease-in-out;
	}
</style>

<style type="text/css">

.myButton {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
	background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
	background-color:#33bdef;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #057fd0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
	outline:none;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
	background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
	background-color:#019ad2;
}
.myButton:active {
	position:relative;
	top:1px;
}

.disabledButton {
	background-color:#adadad;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border: 1px solid #b5b5b3;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
	outline:none;
}


</style>

<style type="text/css">

.previewBlock {
	padding: 5px;
	z-index: 10;
	left: 150px;
	top: 150px;
	visibility: visible;
	width: 600px;
	height: 700px;
	background-color: black;
	border: 2px solid #474745;
	border-radius: 5px;
	position: absolute;
	min-width: 700px;
}	
</style>

<style type="text/css">

#editorBlock {
	min-height: 800px;
	display: flex;
	flex-direction: row;
}

#editorBlock * {
	margin: 5px;
}

#videoBlock {
	min-height: 500px;
	min-width: 650px;
	display: flex;
	flex-direction: column;
	overflow: hidden;
}

#photoBlock {
	display: flex;
	flex-direction: column;
	width: 250px;
}



.canvas {
	border: 2px solid black;
	width: 640px;
	height: 480px;
}

.canvasCaptured {
	border: 2px solid black;
	border-radius: 5px;
	width: 160px;
	height: 120px;
}

#snap {
	/*width: 100px;*/
}

#close {
	display: block;
	width: 20px;
	height: 30px;
	color: red;
	font-size: 20px;
	margin-left: 10px;
}

#editingCanvas {
	margin: 5px;
}

.canvasPhotoBlock {
}


#video {

	width: 640px;
	height: 480px;
	z-index: 1;
}

#container {
	width: 640px;
	height: 480px;
	background-color: #333;
	display: flex;
	align-items: center;
	justify-content: center;
	overflow: hidden;
	touch-action: none;
	position: absolute;
}

.conteinerItem {
	height: 100px;
	z-index: 2;
	position: absolute;	
}

.hiddenEl {
	position: absolute;
	top: -200px;
	visibility: hidden;
	height: 0px;
	width: 0px;
	margin: 0px;
	padding: 0px;
	border: 0px;
}

.hiddenEl *
{
	position: absolute;
	top: -200px;
	visibility: hidden;
	height: 0px;
	width: 0px;
	margin: 0px;
	padding: 0px;
	border: 0px;
}

</style>
<!-- <img src="http://localhost:8282/files/5.png" onclick="asd(this)"> -->


<style type="text/css">
/* Basics */
/*body {
  background: #eee;
  padding: 5em;
}*/
label, input {
  color: #333;
  font: 14px/20px Arial;
}
h2 {
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  margin: 0 0 1em;
}
label {
  display: inline-block;
  width: 5em;
  padding: 0 1em;
  text-align: right;
}

/* Hide the file input using
opacity */
[type=file] {
    position: absolute;
    filter: alpha(opacity=0);
    opacity: 0;
}
input,
[type=file] + label {
  border: 1px solid #CCC;
  border-radius: 3px;
  text-align: left;
  padding: 10px;
  width: 150px;
  margin: 0;
  left: 0;
  position: relative;
}
[type=file] + label {
  text-align: center;
  left: 7.35em;
  top: 0.5em;
  /* Decorative */
  background: #333;
  color: #fff;
  border: none;
  cursor: pointer;
}
[type=file] + label:hover {
  background: #3399ff;
}
</style>




<div id='previewBlock' class="hiddenEl">
	<div id='previewCloser' class="deleteButton" onclick="closeEditorEl(this)"></div>
	<canvas width="640" height="480" id='editingCanvas' class="canvas"></canvas>
	<p>Image caption:</p>
	<input type="text" name="ImageСaption" max="256">
	<button class='myButton'>Save image</button>
</div>


<div id='editorBlock'>
	<div id='videoBlock'>
			<video id="video" autoplay muted></video>
		    <div id="container">
		      <!-- <img id='item' src="/files/stickers/Fluffy/20.png"> -->
			</div>
		<button id="snap" disabled class='disabledButton'>Disabled (While no stickers selected)</button>
		<button class='myButton' onclick="showHideStickers()">Select Sticker</button>
		<!-- <input type="file" name='UserPicture' class='myButton'> -->  
		<input id="f02" type="file" placeholder="Add profile picture" />
		<label for="f02">Add profile picture</label>

	</div>
	<div id='photoBlock'></div>

</div>
<div id='stickerSelector' class="stickerSelector">
	<div class="deleteButton" onclick="showHideStickers(this)"></div>
</div>

<script type="text/javascript">

function showHideStickers(el)
{
	if (stickerSelector.clientHeight > 0)
	{
		stickerSelector.classList.remove('stickerSelector');
		stickerSelector.classList.add('hiddenEl');
		if (el)
		{
			el.classList.remove('hiddenEl');
			el.classList.add('deleteButton');			
		}
	}
	else
	{
		stickerSelector.classList.remove('hiddenEl');
		stickerSelector.classList.add('stickerSelector');
		if (el)
		{
			el.classList.remove('deleteButton');
			el.classList.add('hiddenEl');			
		}
	}
}

var dragItem;
var dragItems = [];
var dragItemZindex = 3;


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
	container.appendChild(newImage);
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

document.getElementById("snap").addEventListener("click", function() {
	if (pictureCount < 5 && dragItems.length > 0)
	{
		disableTakeAPhoto();
		canvasBlock = document.createElement('div');
		canvas = document.createElement('canvas');
		closeEl = document.createElement('div');
		closeEl.href = '#';
		closeEl.style.color = 'white';
		closeEl.classList.add('deleteButton');
		closeEl.setAttribute('onclick', "deleteCanvasPhotoBlock(this)");
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;
		canvas.classList.add('canvasCaptured');
		canvasBlock.appendChild(closeEl);
		canvasBlock.classList.add('canvasPhotoBlock');
		canvasBlock.appendChild(canvas);
		photoBlock.appendChild(canvasBlock);
		context = canvas.getContext('2d');
		context.drawImage(video, 0, 0);
		var allItems = dragItems;
		console.dir(allItems);
		for (var q in allItems)
		{
			if (allItems[q].tagName == "IMG")
				context.drawImage(allItems[q], allItems[q].offsetLeft + parseInt(allItems[q].getAttribute('x_offset')), allItems[q].offsetTop + parseInt(allItems[q].getAttribute('y_offset')), allItems[q].clientWidth, allItems[q].clientHeight);			
		}
		dragItems = [];
		container.innerHTML = '';

		canvas.setAttribute('onclick', "startEdit(this)");
		pictureCount++;
	}
});	

function startEdit(el)
{
	previewBlock.classList.remove('hiddenEl');
	previewBlock.classList.add('previewBlock');
	previewCloser.classList.remove('hiddenEl');
	previewCloser.classList.add('deleteButton');

	context = editingCanvas.getContext('2d');
	context.drawImage(el, 0, 0);
}

function closeEditorEl(el)
{
	previewBlock.classList.remove('previewBlock');
	previewBlock.classList.add('hiddenEl');
	previewCloser.classList.remove('deleteButton');
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
</script>




<script type="text/javascript">
   	
    var currentX;
    var currentY;
    var initialX;
    var initialY;
    var xOffset = 0;
    var yOffset = 0;
    var dragging = false;


    container.addEventListener("mousedown", dragStart, false);
    // container.addEventListener("click", showHideStickers, false);

    container.addEventListener("mouseup", dragEnd);
    container.addEventListener("mousemove", drag);
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

</script>