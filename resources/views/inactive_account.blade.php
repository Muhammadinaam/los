@extends('layouts.layout')

@section('content')


<br><br>

<div class="container">
    
    <h4>Your account is not active</h4>
    @if( isset( session('data')->reason ) )
    	<h5>Reason: {{ session('data')->reason }}</h5>
    @endif
</div>

<br><br><br>

@endsection