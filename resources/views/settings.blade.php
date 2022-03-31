<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Parametres
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
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

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
							<h5 class="title">Parametres</h5>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data">
								@if(session()->has('success'))
									<div class="alert alert-success">Les parametres a été enregistré avec succès</div>
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
									<label>Site Address</label>
									<input name="site_address" type="text" class="form-control @error('site_address') is-invalid @enderror" placeholder="Site Address" value="{{ old('site_address') ?? @$options['site_address'] }}">
								</div>
								<div class="form-group">
									<label>Site Email</label>
									<input name="site_email" type="text" class="form-control @error('site_email') is-invalid @enderror" placeholder="Site Email" value="{{ old('site_email') ?? @$options['site_email'] }}">
								</div>
								<div class="form-group">
									<label>Site Email 2</label>
									<input name="site_email_2" type="text" class="form-control @error('site_email_2') is-invalid @enderror" placeholder="Site Email 2" value="{{ old('site_email_2') ?? @$options['site_email_2'] }}">
								</div>
								<div class="form-group">
									<label>Site Telephone</label>
									<input name="site_phone" type="text" class="form-control @error('site_phone') is-invalid @enderror" placeholder="Site Telephone" value="{{ old('site_phone') ?? @$options['site_phone'] }}">
								</div>
								<div class="form-group">
									<label>Site Telephone 2</label>
									<input name="site_phone_2" type="text" class="form-control @error('site_phone_2') is-invalid @enderror" placeholder="Site Telephone 2" value="{{ old('site_phone_2') ?? @$options['site_phone_2'] }}">
								</div>
								<div class="form-group">
									<label>Site About</label>
									<textarea name="site_about" type="text" class="form-control @error('option_value') is-invalid @enderror" placeholder="Site About">{{ old('site_about') ?? @$options['site_about'] }}</textarea>
								</div>
								<div class="form-group">
									<label>Site Facebook</label>
									<input name="site_facebook" type="text" class="form-control @error('site_facebook') is-invalid @enderror" placeholder="Site Facebook" value="{{ old('site_facebook') ?? @$options['site_facebook'] }}">
								</div>
								<div class="form-group">
									<label>Site Twitter</label>
									<input name="site_twitter" type="text" class="form-control @error('site_twitter') is-invalid @enderror" placeholder="Site Twitter" value="{{ old('site_twitter') ?? @$options['site_twitter'] }}">
								</div>
								<div class="form-group">
									<label>Site Instagram</label>
									<input name="site_instagam" type="text" class="form-control @error('site_instagam') is-invalid @enderror" placeholder="Site Instagram" value="{{ old('site_instagam') ?? @$options['site_instagam'] }}">
								</div>
								<h5 class="title my-3">Parametres de en-tete du site</h5>

								<div class="form-group">
									<label>Titre de section 1</label>
									<input name="site_section_head_1" type="text" class="form-control @error('site_section_head_1') is-invalid @enderror" placeholder="Titre de section 1" value="{{ old('site_section_head_1') ?? @$options['site_section_head_1'] }}">
								</div>
								<div class="form-group">
									<label>Description de section 1</label>
									<textarea id="desc1" name="site_section_description_1" type="text" class="ckeditor form-control @error('site_section_description_1') is-invalid @enderror" placeholder="Description de section 1">{{ old('site_section_description_1') ?? @$options['site_section_description_1'] }}</textarea>
								</div>
								<div class="form-group">
									<label>Titre de section 2</label>
									<input name="site_section_head_2" type="text" class="form-control @error('site_section_head_2') is-invalid @enderror" placeholder="Titre de section 2" value="{{ old('site_section_head_2') ?? @$options['site_section_head_2'] }}">
								</div>
								<div class="form-group">
									<label>Description de section 2</label>
									<textarea id="desc2" name="site_section_description_2" type="text" class="ckeditor form-control @error('site_section_description_2') is-invalid @enderror" placeholder="Description de section 2">{{ old('site_section_description_2') ?? @$options['site_section_description_2'] }}</textarea>
								</div>
								<div class="form-group">
									<label>Titre de section 3</label>
									<input name="site_section_head_3" type="text" class="form-control @error('site_section_head_3') is-invalid @enderror" placeholder="Titre de section 3" value="{{ old('site_section_head_3') ?? @$options['site_section_head_3'] }}">
								</div>
								<div class="form-group">
									<label>Description de section 3</label>
									<textarea id="desc3" name="site_section_description_3" type="text" class="ckeditor form-control @error('site_section_description_3') is-invalid @enderror" placeholder="Description de section 3">{{ old('site_section_description_3') ?? @$options['site_section_description_3'] }}</textarea>
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
    ClassicEditor.create( document.querySelector( '#desc1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor.create( document.querySelector( '#desc2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor.create( document.querySelector( '#desc3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>

</html>

