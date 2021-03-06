<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	{{ $clients->information }}
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

<body>
    @include('sidebar')
    <div class="main-panel" id="main-panel" style="background-color: #ffffff">
        @include('navbar')
        <div class="content mt-5">
            <div class="">
                <a href="{{ route('dashboard.utilisateur') }}" class="btn btn-success mt-5">Retour</a>
            </div>
            <form class="pt-3" >
                <div class="form-group">
                    <label for="exampleFormControlInput1">Image : </label>
                    <input type="text" name="pass" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texte : </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>
                        {{ $fichier}}
                    </textarea>
                </div>
            </form>
        </div>
    </div>
</body>
