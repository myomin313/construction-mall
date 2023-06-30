<!DOCTYPE html>
<html>
<head>
	<title>Account Register Success</title>
	<style type="text/css">
		h1{
			display: inline;
			margin-left:10px;
			vertical-align: middle;
		}

		#header{
			text-align: center;
		}

		#header img{
			vertical-align: middle;
		}

		.body-title{
			text-align: center;
			color:#3591ed;
			border-bottom:1px dotted #ddd;
			border-top:1px dotted #ddd;
			padding:10px;
		}

		.thank-intro{
			padding:10px 20px;
		}

		.thank-intro .first{
			font-size:50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="header" style="text-align:center;" >
			<h1 style="display:inline;margin-left:10px;vertical-align:middle;" > Myanbox</h1>
		</div>
		<div id="content">
			<h2 class='body-title' style="text-align:center;color:#3591ed;border-bottom-width:1px;border-bottom-style:dotted;border-bottom-color:#ddd;border-top-width:1px;border-top-style:dotted;border-top-color:#ddd;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >Registering is completed</h2>
			<p class="thank-intro" style="padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;" >
				Welcome {{ $user->name }},<br/>
				<span class="first" style="font-size:50px;" >T</span>hank for interesting and registering account.<br/>
				You still need to verify your account's email.Please verify.<br/><br><br>
				<a href="{{ route('register.verify.email',['token' => $token]) }}" style="padding:10px;background:#ffcc32;color:#fff;text-align:center;vertical-align:middle;">Verify Your Email</a>
				<br/><br/>
				Best Regards,<br/>
				Myanbox Construction.
			</p>

		</div>
	</div>
</body>
</html>
