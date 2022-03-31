<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://kit.fontawesome.com/56b4fdaa29.js" crossorigin="anonymous"></script>
    <title>Authentification</title>
</head>
<body>
<div id="page-login">	
		<div class="loginbox">
			<img src="{{asset('images/profile.jpg')}}" class="avatar">
			<form action="" method="POST">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<label><span class="fas fa-user"></span> Nom de compte</label>
				<input type="text" name="username" placeholder="Enter Username" value="{{old('username')}}">
				<label><span class="fas fa-key"></span> Mot de passe</label>
				<input type="Password" name="password" placeholder="Enter Password">
				{!! csrf_field() !!}
				<input type="submit" value="se connecter">
			</form>
		</div>
	</div>
</body>
</html>