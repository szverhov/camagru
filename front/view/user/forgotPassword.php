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
	width: 80%;
}
#w0 *{
	margin: 3px;
}
</style>

<h1>User password restoration</h1>

<div id='user_form'>
	<form id='w0' method="post">
		<div>
			<input class="user_form_input" type="email" name="Email" placeholder="Email" required>
		</div>
		<div>
			<button class="btn btn-success">SUBMIT RESTORATION</button>
		</div>
	</form>
</div> 