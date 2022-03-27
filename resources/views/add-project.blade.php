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
										<div class="col">@if($project && $project['ID'])Modifier le projet @else Ajouter un projet @endif</div>
										@if($project && $project['ID'])
										<div class="col text-right"><a class="btn btn-sm btn-outline-primary m-0" href="{{route('dashboard.add_project')}}">Ajouter un autre projet</a></div>
										@endif
									</div>
								</div>
							 </h5>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data">
								@if(session()->has('success'))
									<div class="alert alert-success">Le projet a été enregistré avec succès</div>
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
									<label>Titre du projet</label>
									<input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Titre du projet" value="{{ old('title') ?? @$project['title'] }}" required="required">
								</div>
								<div class="form-group">
									<label>Adresse du projet</label>
									<input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="project address" value="{{ old('address') ?? @$project['address'] }}" required="required">
								</div>
								<div class="form-group">
									<label for="project-image">Images du projet</label>
									<label for="project-image" class="form-control @error('images') is-invalid @enderror">Selectionner images</label>
									<input id="project-image" style="max-height: 30px;" type="file" class="form-control" name="images[]" multiple accept="image/*">
									@if( !empty($project['image']) )
										{{-- <input id="project-image-holder" type="hidden" name="image_urls" value="{{@$project['image']}}"> --}}
										<div class="row">
											@foreach (@$project['images'] as $img)
											<div class="col-md-4 col-sm-6 col-xs-12">
												<img width="100%" src="{{$img ? URL::asset($img) : ''}}">
                                                <label class="delete-img" style="position: absolute;cursor: pointer;font-size: 20px;right: 24px; color: #fc5e28;font-weight: bold;" onclick="removeImage(this,'{{$img}}')">X</label>
											</div>
											@endforeach
										</div>
									@else
										<img id="project-image-preview" src="{{@$project['image'] ? URL::asset(@$project['image']) : ''}}">
									@endif
									<script type="text/javascript">
										$(document).ready(function() {
											function readURL(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function(e) {
														$('#project-image-preview').attr('src', e.target.result);
													}

													reader.readAsDataURL(input.files[0]);
												}
											}

											$("#project-image").change(function() {
												if( $("#project-image-holder").length ) {
													$("#project-image-holder").val("");
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

<script>
    function removeImage(e,img){
        id = @json(isset($project['ID']) ? $project['ID'] : '');
        $.ajax({
            url: '/gts/deleteImageProject/',
            data: {
                'id':id,
                'img':img
            },
            success: function(){
                $(e).parent().remove();
            }
        })
        console.log();
    }
</script>
</body>
</html>
