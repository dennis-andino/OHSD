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
                        <li class="breadcrumb-item"><a href="#">Roles</a></li>
                        <li class="breadcrumb-item active">crear</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.roles.store') }}">
    <div class="row">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">Datos de Rol</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.error-messages')
                        <div class="form-group">
                            <label>Titulo: </label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Guardian: </label>
                          <select class="form-control" name="guard_name">
                              @foreach (config('auth.guards') as $key => $guard )
                                  <option>{{$key}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">Permisos</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.permissions.checkboxes',['model' => $role])
                    </div>
                </div>
                <button class="btn btn-primary btn-block">Guardar Rol</button>
            </div>

    </div>
</form>
@endsection
