<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Demandes
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
										<div class="col">Demandes</div>
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							@if(session()->has('success'))
								<div class="alert alert-success">Le demande a été supprimé avec succès</div>
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
										<th>Nom</th>
										<th>Prenom</th>
										<th>Tel</th>
										<th>Service</th>
										<th>Message</th>
										<th class="text-right">Action</th>
									</thead>
									<tbody>
										@foreach($demandes as $data)
										<tr>
											<td>{{$data->first_name}}</td>
											<td>{{$data->last_name}}</td>
											<td>{{$data->phone}}</td>
											<td>{{$data->service->title}}</td>
											<td><p style="max-width: 140px;">{{$data->message}}</p></td>
											<td class="text-right">
												<a class="btn btn-outline-danger" href="{{route('dashboard.delete_demande', $data->ID)}}">Supprimer</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="d-flex justify-content-center">
								{!! $demandes->links() !!}
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