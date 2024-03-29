<!DOCTYPE html>
<html>
<title>Camagru</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="/css/w3.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<style>
	#main_message{
		position: absolute;
		top:3vh;
		left: 12vw;
	}
	body, h1,h2,h3,h4,h5,h6,div,p,textarea {font-family: "Montserrat", sans-serif}
	.w3-row-padding img {margin-bottom: 12px}
	/* Set the width of the sidebar to 120px */
	.w3-sidebar {width: 120px;background: #222;}
	/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
	#main {
		/*border: 2px solid red;*/
		margin-top: 40px !important;
		margin-left: 120px;
		width: 100vw;
		/*height: 100%;*/
		display: flex;
		align-items: center;
		justify-content: space-around;
		flex-direction: column;
	}
	@media (pointer:none), (pointer:coarse) {
		#main {
			/*border: 2px solid red;*/
			margin-top: 40px !important;
		}
	}


	/* Remove margins from "page content" on small screens */
	@media only screen and (max-width: 600px) {#main {margin-left: 0}}

</style>
<body class="w3-black">
	<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
		<?php if (!isset($_SESSION['logedUser'])): ?>
			<!-- <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="showHideLoginForm();"> -->
			<a href="/user/sign-in" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
				<i class="fa fa-sign-in w3-xxlarge"></i>
				<p>SIGN IN</p>
			</a>
		<?php else:?>
			<a href="/user/sign-out" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
				<i class="fa fa-sign-out w3-xxlarge"></i>
				<p>SIGN OUT</p>
			</a>
		<a href="/profile" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
			<i class="fa fa-user w3-xxlarge"></i>
			<p>PROFILE</p>
		</a>
		<a href="/editor" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
			<i class="fa fa-camera-retro w3-xxlarge"></i>
			<p>EDITOR</p>
		</a>
		<?php endif;?>
		<a href="/gallery" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
			<i class="fa fa-eye w3-xxlarge"></i>
			<p>GALLERY</p>
		</a>
	</nav>

	<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
		<div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
			<?php if (!isset($_SESSION['logedUser'])): ?>
				<a href="/user/sign-in" class="w3-bar-item w3-button" style="width:25% !important">SIGN IN</a>
			<?php else:?>
				<a href="/user/sign-out" class="w3-bar-item w3-button" style="width:25% !important">SIGN OUT</a>
				<a href="/profile" class="w3-bar-item w3-button" style="width:25% !important">PROFILE</a>
				<a href="/editor" class="w3-bar-item w3-button" style="width:25% !important">EDITOR</a>
			<?php endif;?>
			<a href="/gallery" class="w3-bar-item w3-button" style="width:25% !important">GALLERY</a>
		</div>
	</div>

	<?php
		if (isset($mainMessage))
			echo'<div id="main_message">' . ($mainMessage) . '</div>';
	?>

	<div class="w3-padding-large" id="main">
<!-- 		<header class="w3-container w3-padding-32 w3-center w3-black" id="home">
			<h1 class="w3-jumbo"><span class="w3-hide-small">Camagru</span></h1>
		</header> -->
	<?php

		include $body;
	?>
	<!--     <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
	<p class="w3-medium">Powered by szverhov</a></p>
	</footer> -->
	</div>
</body>
</html>

<script>
	function showHideLoginForm()
	{
		if (user_login.style.visibility == 'visible')
		{
			user_login.style.visibility = 'hidden';
			user_login.style.height = "0px";
			user_login.style.width = "0px";	
		}
		else
		{
			user_login.style.visibility = 'visible';
			user_login.style.height = "50vh";
			user_login.style.width = "30vw";		
		}
	}

</script>