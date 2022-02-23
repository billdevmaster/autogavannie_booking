@extends('layouts.frontend.app')
@section('content')
<style>
    .btn, .btn:hover {
        padding: 10px 20px;
        background: #333;
        color: white;
    }
</style>
<div>
    <div class="container">
        @if ($errors->has('message'))
            <div class="alert alert-danger" role="alert" style="margin-top: 100px">
                <div class="alert-body">
                    {{ $errors->first('message') }}
                </div>
            </div>
        @endif
        <h3 style="text-align: center; margin-top: 150px">
            Are you sure <br/>
            you want to cancel your reservation?
        </h3>
        <form action="{{ route('cancelBooking') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $book_id }}">
            <div style="text-align: center; margin-top: 20px">
                <label class="cancel_label">
                    <input type="checkbox" name="agree"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    I agree</font></font>
                </label>
            </div>
            <div style="text-align: center; margin-top: 20px">
                <button class="btn">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection