@extends('layouts.app', ['title' => 'Pagos: '.$user->names])

@section('content')

    @foreach($payments as $payment)
        {{$payment->amount}}
    @endforeach

@endsection