@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-evenly">
    @if(isset($characters))
        @foreach($characters as $character)
            <div class="col-md-6 p-5 bg-info">
                <p>Character : {{$character['char_name']}}</p>
                <p>Phone: {{$character['PhoneNumbr']}}</p>
                <p>Level {{$character['Level']}}, Exp: {{$character['Exp']}}</p>
                <p>Money: {{$character['Cash']}}</p>
                <p>Bank: {{$character['BankAccount']}}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
