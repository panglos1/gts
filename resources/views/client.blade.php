@include('header')


<div class="container pt-5">
    <div class="col-lg-12 col-sm-12">
        <div class="one float-left">
            Bonjour {{ $client->information }}
        </div>
        <div class="two float-right">
            <a href="{{ route('logOut') }}" class="btn btn-danger">Log Out</a>
        </div>
    </div>
    <div class="body pt-5 mt-5 d-flex justify-content-lg-around" style="width: 60%;
    margin:0 auto;">
        <i class="fa fa-text-width" aria-hidden="true" style="font-size: 150px; cursor: pointer;"></i>
        <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 150px; cursor: pointer;"></i>
    </div>
</div>
