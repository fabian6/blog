@extends('admin.layout')
@section('content')
    <ol class="breadcrumb">
        <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
    </ol>
    <h1>Dashboard</h1>
    <p>Usuario autenticado : {{auth()->user()->name}}</p>
    
@endsection