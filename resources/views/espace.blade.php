@include('header')

<div class="container" style="max-width: 35%">
    <form style="margin-top: 100px" method="POST" action="{{ route('check') }}">
        @if (session()->has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('fail') }}
            </div>
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
    @method('POST')
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse Email </label>
            <input style="font-size: 13px" type="email" class="form-control" name="email" placeholder="email@gmail.com" value="{{old("email")}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de Pass</label>
            <input style="font-size: 13px" type="password" class="form-control" name="pass" placeholder="Entrer Votre Mot de pass">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Connecter</button>
        </div>
    </form>
</div>
