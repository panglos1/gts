@include('header')

<div id="app">
<div class="container pt-5">
    <div class="col-lg-12 col-sm-12">
        <div class="one float-left">
            Bonjour {{ $client->information }}
        </div>
        <div class="two float-right">
            <a href="{{ route('logOut') }}" class="btn btn-danger">Log Out</a>
        </div>
    </div>
    <div class="pt-5">
        <client-espace :projects={{$projects}}></client-espace>
    </div>
</div>
