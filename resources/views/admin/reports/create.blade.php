@extends('admin.layout')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Informes</a></li>
                        <li class="breadcrumb-item active">crear</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.reports.store') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 class="card-title">Datos de Informe</h3>
                </div>
                <div class="card-body">
                    @include('admin.partials.error-messages')
                    <div class="form-group">
                        <label>Titulo: </label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion: </label>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Adjunto: </label>
                        <input type="file" name="attached" value="{{ old('attached') }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Agregar Informe</button>
        </div>
    </div>
</form>
@endsection
