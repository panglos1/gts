<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Services
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
  <!-- CSS Just for demo purpose, don't include it in your project -->
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
										<div class="col">Services</div>
										<div class="col text-right"><a class="btn btn-sm btn-outline-primary m-0" href="{{route('dashboard.add_service')}}">Ajouter un service</a></div>
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							@if(session()->has('success'))
								<div class="alert alert-success">Le service a été supprimé avec succès</div>
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
							<div class="table-responsive">
								<table class="table">
									<thead class=" text-primary">
										<th>#</th>
										<th>Titre</th>
										<th>Description</th>
										<th class="text-right">Action</th>
									</thead>
									<tbody>
										@foreach($services as $data)
										<tr>
											<td>{{$data->ID}}</td>
											<td>{{Str::limit($data->title, 50)}}</td>
											<td>{!! Str::limit($data->description, 70) !!} </td>
											<td class="text-right">
												<a class="btn btn-outline-primary" href="{{route('dashboard.edit_service', $data->ID)}}">Modifier</a>
												<a class="btn btn-outline-danger" href="{{route('dashboard.delete_service', $data->ID)}}">Supprimer</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="d-flex justify-content-center">
								{!! $services->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
  </div>
</body>
</html>
