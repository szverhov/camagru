<style type="text/css">

#user_login
{
	/*position: absolute;*/
	top: 10vh;
	right: 2vw;
	/*visibility: hidden;*/
	height: 0;
	width: 0;
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
	width: 80%;
}

#w0 *{
	margin: 3px;
}
</style>

<h1>Sign in</h1>

<div id='user_login'>
	<form id='w0' method="post">
		<div>
			<input class="login_input" type="text" name="Login" placeholder="Login/Email" required>
		</div>
		<div>
			<input class="login_input" type="password" name="Password" placeholder="Password" required>
		</div>
		<div>
			<button class="btn btn-success">SUBMIT</button>
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