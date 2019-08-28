

<link rel="stylesheet" href="/css/stickers.css">
<link rel="stylesheet" href="/css/closeDelButton.css">
<link rel="stylesheet" href="/css/submitButton.css">
<link rel="stylesheet" href="/css/editorBlock.css">
<link rel="stylesheet" href="/css/previewBlock.css">
<link rel="stylesheet" href="/css/hidden.css">
<link rel="stylesheet" href="/css/styleFileInput.css">
<link rel="stylesheet" href="/css/styleFileInput.css">

<div id='previewBlock' class="hiddenEl">
	<div id='previewCloser' class="closeDelButton" onclick="closeEditorEl(this)"></div>
	<canvas width="640" height="480" id='previewCanvasId' class="previewCanvas"></canvas>
	<p>Image caption:</p>
	<input id='imageCaption'type="text" name="ImageСaption" max="256">
	<button class='myButton' onclick="loadEditedPhoto()">Save image</button>
</div>

<div id='editorBlock'>
	<div id='videoBlock'>
		<video id="video" class='photoMaker' autoplay muted></video>
		<div id='userLoadedPhotoBlock' class='hiddenEl'><img src='#' id='userLoadedPhoto' class="hiddenEl"></div>
	    <div id="dragContainer"></div>
		<button id="snap" disabled class='disabledButton'>Disabled (While no stickers selected)</button>
		<button class='myButton' onclick="showHideStickers()">Select Sticker</button>
		<input id="f02" onchange="sendFile(this, '/file/save-ajax-file/', 'POST');" type="file" placeholder="Add profile picture" />
		<label id="f02Label" class="myButton" for="f02">Load your own picture</label>
		<button id='showVideoButton' class='hiddenEl' onclick="showVideo()">Anable camera</button>
	</div>
	<div id='capturedCanvasBlock'></div>

</div>
<div id='stickerSelector' class="stickerSelector">
	<div class="closeDelButton" onclick="showHideStickers(this)"></div>
</div>

<script type="text/javascript" src="/js/editor/editor.js"></script>
<script type="text/javascript" src="/js/editor/loadEditedPhoto.js"></script>
<script type="text/javascript" src="/js/ajax/sendFile.js"></script>

