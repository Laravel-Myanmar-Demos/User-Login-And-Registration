<!DOCTYPE html>
<html>
<head>
	<title>Laravel Myanmar</title>
	<style type="text/css">
		body {
			background: #fa503a;
			font-family: Arial;
			font-size: 14px;
			color: #fff;
		}
		.container {
			width: 960px;
			margin: 0 auto;
		}
		.form-box {
			width: 320px;
			margin: 0 auto;
			margin-top: 200px;
		}
		input {
			border: none;
			border-radius: 3px;
			padding: 10px;
			width: 300px;
		}
		a {
			color: #fff;
			text-decoration: underline;
		}
		.btn {
			background: #3F3F3F;
			color: #fff;
			width: 100px;
			display: block;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
			text-align: center;
		}
		.forgot-password {
			display: inline-block;
			margin-top: 10px;
		}
		.error, .success {
			background: #B61818;
			padding: 5px;
			display: block;
			margin-top: -2px;
			border-radius: 5px;
		}
		form .error {
			border-radius: 0 0 5px 5px;
		}
		.success {
			background: #DDDD5E;
		}
	</style>
</head>
<body>

	<div class="container">
		
		@yield('content')

	</div>

</body>
</html>