<style type="text/css">

#user_login
{
	top: 10vh;
	right: 2vw;
	height: 30%;
	width: 30%;
	background: #474747;
	display: flex;
	flex-direction: column;
	border: 2px solid white;
	border-radius: 10px;
	justify-content: space-around;
	z-index: 100;
	align-items: center;
	min-height: 300px;
	min-width: 300px;

}
.login_input
{
	width: 100%;
	height: 40px;
}

#w0 *{
	display: flex;
	flex-direction: column;
	border-radius: 10px;
	justify-content: center;
	align-items: center;
}

.inptDiv {
	margin: 10px;
	width: 90%;
}

</style>
<link rel="stylesheet" href="/css/submitButton.css">



<div id='user_login'>
<h1>Sign in</h1>
	<form id='w0' method="post">
		<div class="inptDiv">
			<input class="login_input" type="text" name="Login" placeholder="Login/Email" required>
		</div>
		<div class="inptDiv">
			<input class="login_input" type="password" name="Password" placeholder="Password" required>
		</div>
		<div class="inptDiv">
			<button class="myButton">SUBMIT</button>
		</div>
	</form>
	<div>
		<a href="/user/sign-up" class="w3-bar-item w3-button w3-padding-small w3-hover-black">
			<i class="fa fa-id-card-o w3-xxlarge"></i>
			<p>SIGN UP</p>
		</a>
		<a href="/user/forgot-password" class="w3-bar-item w3-button w3-padding-small w3-hover-black">
			<i class="fa fa-frown-o w3-xxlarge"></i>
			<p>FORGOT PASSWORD?</p>
		</a>			
	</div>
</div> 