<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   	Client
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
    <div class="main-panel">
        @include('navbar')
        <div class="content mt-5">
            <div class="mt-5" style="padding-top: 15px">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <a href="{{ route('dashboard.add-utilisateur') }}" class="btn btn-success mt-5">Ajouter un client</a>
            <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Nom ET Prenom</th>
                            <th scope="col">Mot de Pass</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $c)
                            <tr>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->information }}</td>
                                <td>{{ $c->pass }}</td>
                                <td class="d-flex justify-content-arround">
                                    <a style="margin-right:10px;font-size:17px" href="{{ route('dashboard.add-fichier-utilisateur',$c->id) }}"><i class="far fa-plus-square"></i></a>
                                    <a style="margin-right:10px;font-size:17px" href="{{ route('dashboard.show-utilisateur',$c->id) }}"><i class="fas fa-eye"></i></a>
                                    <a style="margin-right:10px;font-size:17px" href="{{ route('dashboard.edit-utilisateur',$c->id) }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('dashboard.delete-utilisateur', $c->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirm('Voulez-vous supprimer ce client')" type="submit" style="color: #fd7e14;
                                        border:none;font-weight:bold">
                                            X
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $clients->links() }}
        </div>
    </div>
</body>
