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
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your post -->
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
							<h5 class="title">@if($post && $post['ID'])Modifier l'article @else Ajouter un article @endif</h5>
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
									<label>Titre de l'article</label>
									<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="article title" value="{{ old('title') ?? @$post['title'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Contenu de l'article</label>
									<textarea name="content" rows="5" cols="80" class="form-control @error('content') is-invalid @enderror" placeholder="Service content" required="required">{{ old('content') ?? @$post['content'] }}</textarea>
								</div>
								<div class="form-group">
									<label for="post-image">Image de l'article</label>
									<label for="post-image" class="form-control @error('image') is-invalid @enderror">Selectionner image</label>
									<input id="post-image" type="file" class="form-control" name="image">
									@if( !empty($post['image']) )
										<input id="post-image-holder" type="hidden" name="image_url" value="{{@$post['image']}}">
									@endif
									<img id="post-image-preview" src="{{@$post['image'] ? URL::asset(@$post['image']) : ''}}">
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