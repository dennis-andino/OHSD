@extends('admin.layout')
@section('content')
<div class="container">
    <h1 class="text-capitalize">Accion no autorizada</h1>
    <span style="color: red">{{$exception->getMessage()}}</span>
    <p><a href="{{url()->previous()}}">Volver</a></p>
</div>
@endsection
