<style type="text/css">

#user_form
{
	top: 10vh;
	right: 2vw;
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
.user_form_input
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

<div id='user_form'>
<h1>User password restoration</h1>

	<form id='w0' method="post">
		<div class="inptDiv">
			<input class="user_form_input" type="email" name="Email" placeholder="Email" required>
		</div>
		<div class="inptDiv">
			<button class="myButton">Submit</button>
		</div>
	</form>
</div> 