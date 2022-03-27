<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Home
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
  <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('public/demo/demo.css')}}" rel="stylesheet" />

  {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}

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
										<div class="col">@if($service && $service['ID'])Modifier le service @else Ajouter un service @endif</div>
										@if($service && $service['ID'])
										<div class="col text-right"><a class="btn btn-sm btn-outline-primary m-0" href="{{route('dashboard.add_service')}}">Ajouter un service</a></div>
										@endif
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data">
								@if(session()->has('success'))
									<div class="alert alert-success">Le service a été enregistré avec succès</div>
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
									<label>Titre du service</label>
									<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Titre du service" value="{{ old('title') ?? @$service['title'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Description du service</label>
									<textarea id="servDesc" name="description" rows="5" cols="80" class="ckeditor form-control @error('description') is-invalid @enderror" placeholder="Description du service" required="required">{{ old('description') ?? @$service['description'] }}</textarea>
								</div>
								<div class="form-group">
									<label for="service-image">Service image</label>
									<label for="service-image" class="form-control @error('image') is-invalid @enderror">Selectionner image</label>
									<input id="service-image" type="file" class="form-control" name="image">
									@if( !empty($service['image']) )
										<input id="service-image-holder" type="hidden" name="image_url" value="{{@$service['image']}}">
									@endif
									<img id="service-image-preview" src="{{@$service['image'] ? URL::asset(@$service['image']) : ''}}">
									<script type="text/javascript">
										$(document).ready(function() {
											function readURL(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function(e) {
														$('#service-image-preview').attr('src', e.target.result);
													}

													reader.readAsDataURL(input.files[0]);
												}
											}

											$("#service-image").change(function() {
												if( $("#service-image-holder").length ) {
													$("#service-image-holder").val("");
												}
												readURL(this);
											});
										});
									</script>
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
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
</body>
</html>
