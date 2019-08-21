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
	<input type="text" name="ImageСaption" max="256">
	<button class='myButton'>Save image</button>
</div>

<div id='editorBlock'>
	<div id='videoBlock'>
			<video id="video" autoplay muted></video>
		    <div id="dragContainer">
			</div>
		<button id="snap" disabled class='disabledButton'>Disabled (While no stickers selected)</button>
		<button class='myButton' onclick="showHideStickers()">Select Sticker</button>
		<input id="f02"  type="file" placeholder="Add profile picture" />
		<label for="f02">Add profile picture</label>

	</div>
	<div id='capturedCanvasBlock'></div>

</div>
<div id='stickerSelector' class="stickerSelector">
	<div class="closeDelButton" onclick="showHideStickers(this)"></div>
</div>

<script type="text/javascript" src="/js/editor.js"></script>