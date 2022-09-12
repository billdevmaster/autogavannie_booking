@extends('layouts.frontend.app')

@section('content')

<div>
    <div class="container">
        <h1 style="text-align: center; margin-top: 150px;">Täname!</h1>
        <h3 style="text-align: center; margin-top: 100px">Sinu broneering on kinnitatud</h3>

        <hr />
        <p style="text-align: center;; margin-top: 20px">Broneeringu kinnituse saadame sisestatud e-maili aadressile</p>
        <div class="text-center" style="margin-top: 30px;">
            <a href={{ env('APP_URL') }} class="btn btn-primary">Return to home</a>
        </div>
    </div>
</div>

@endsection