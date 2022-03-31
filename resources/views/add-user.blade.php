<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Ajouter un admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your user -->
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
  	@include('sidebar')
    <div class="main-panel" id="main-panel">
  		@include('navbar')
		<div class="panel-header panel-header-sm">
      	</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="title">
								<div class="container-fluid">
									<div class="row">
										<div class="col">@if($user && $user['id'])Modifier le user @else Ajouter un user @endif</div>
										@if($user && $user['id'])
										<div class="col text-right"><a class="btn btn-sm btn-outline-primary m-0" href="{{route('dashboard.add_admin')}}">Ajouter un user</a></div>
										@endif
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data">
								@if(session()->has('success'))
									<div class="alert alert-success">L'admin a été enregistré avec succès</div>
								@endif
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@csrf
								<div class="form-group">
									<label>Nom</label>
									<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nom" value="{{ old('name') ?? @$user['name'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Nom d'utilisateur</label>
									<input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Nom d'utilisateur" value="{{ old('username') ?? @$user['username'] }}" required="required" {{$ID ? 'readonly' : ''}}>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') ?? @$user['email'] }}" required="required" {{$ID ? 'readonly' : ''}}>
								</div>
								<div class="form-group">
									<label>Mot de pass</label>
									<input name="password" type="text" class="form-control" placeholder="Mot de pass">
								</div>
								<div class="cleafix">
									<button class="btn btn-primary" type="submit">Sauvegarder</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
  </div>
</body>
</html>