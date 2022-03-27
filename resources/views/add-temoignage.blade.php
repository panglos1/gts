<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Ajouter un article
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
  <!-- CSS Just for demo purpose, don't include it in your post -->
  <link href="{{asset('public/demo/demo.css')}}" rel="stylesheet" />
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
										<div class="col">@if($temoignage && $temoignage['ID'])Modifier le temoignage @else Ajouter un temoignage @endif</div>
										@if($temoignage && $temoignage['ID'])
										<div class="col text-right"><a class="btn btn-sm btn-outline-primary m-0" href="{{route('dashboard.add_temoignage')}}">Ajouter un temoignage</a></div>
										@endif
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data">
								@if(session()->has('success'))
									<div class="alert alert-success">L'article a été enregistré avec succès</div>
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
									<input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom" value="{{ old('nom') ?? @$temoignage['nom'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Fonction</label>
									<input name="fonction" type="text" class="form-control @error('fonction') is-invalid @enderror" placeholder="Fonction" value="{{ old('fonction') ?? @$temoignage['fonction'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Contenu </label>
									<textarea name="content" rows="5" cols="80" class="form-control @error('content') is-invalid @enderror" placeholder=" content" required="required">{{ old('content') ?? @$temoignage['content'] }}</textarea>
								</div>
								<div class="form-group">
									<label for="post-image">Image </label>
									<label for="post-image" class="form-control @error('image') is-invalid @enderror">Selectionner image</label>
									<input id="post-image" type="file" class="form-control" name="image">
									@if( !empty($temoignage['image']) )
										<input id="post-image-holder" type="hidden" name="image_url" value="{{@$temoignage['image']}}">
									@endif
									<img id="post-image-preview" src="{{@$temoignage['image'] ? URL::asset(@$temoignage['image']) : ''}}">
									<script type="text/javascript">
										$(document).ready(function() {
											function readURL(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function(e) {
														$('#post-image-preview').attr('src', e.target.result);
													}

													reader.readAsDataURL(input.files[0]);
												}
											}

											$("#post-image").change(function() {
												if( $("#post-image-holder").length ) {
													$("#post-image-holder").val("");
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
</body>
</html>