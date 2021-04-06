@extends('admin.layout')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nueva Publicación</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Publicación</a></li>
                        <li class="breadcrumb-item active">Nueva</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@section('content')
<form action="{{ route('admin.posts.update', $post) }}" method="POST">
    {{ csrf_field() }} {{ method_field('PUT')}}
        <div class="row">
            <div class="col-md-8">
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Titulo de la publicación: </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title',$post->title)  }}" placeholder="Ingrese el titulo de la publicacion (minimo 10 palabras)"/>
                            @error('title')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido de la publicación: </label>
                            <textarea name="body" rows="10" id="summernote"
                                class="form-control @error('body') is-invalid @enderror"
                                placeholder="Ingrese el cuerpo de la publicación">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> <!-- /.card-body -->
                </div><!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <!-- /.card-body -->
                        <div class="form-group">
                            <label>Fecha de publicación: </label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="published_at"
                                    class="form-control datetimepicker-input @error('published_at') is-invalid @enderror"
                                    value="{{ old('published_at', optional($post->published_at)->format('m/d/Y')) }}" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('published_at')
                                <div class="alert-danger">{{ 'El campo fecha es obligatorio' }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Resumen de publicacion: </label>
                            <textarea name="excerpt" rows="5" id="summernote"
                                class="form-control @error('excerpt') is-invalid @enderror"
                                placeholder="Ingrese un resumen de la noticia (minimo 15 palabras)">{{ old('excerpt',$post->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="alert-danger">{{ 'El campo resumen es obligatorio' }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categoria: </label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Seleccione una categoria : </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? ' selected ' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert-danger">{{ 'El campo categoria es obligatorio' }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Etiquetas:</label>
                            <select name="tags[]" class="select2 @error('tags') is-invalid @enderror" multiple="multiple"
                                data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="alert-danger">{{ 'El campo etiqueta es obligatorio' }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="dropzone"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col -->
    </div> <!-- /.row -->
</form>
@if($post->photos->count())
    <div class="row">
        @foreach ($post->photos as $photo )
        <div class="col-md-2">
            <form method="POST" action="{{ route('admin.photos.destroy',$photo)}}">
                {{ method_field('DELETE')}}{{ csrf_field() }}
                    <button class="btn btn-xs btn-danger" style="position: absolute"><i class="far fa-trash-alt"></i></button>
                    <img class="img-thumbnail"  src="/storage/{{$photo->url?$photo->url:''}}"/>
            </form>
        </div>
        @endforeach
    </div>
@endif
@stop

@push('styles')
    <!-- Drop Zone para subir imagenes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- Drop Zone para subir imagenes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>
    <!-- moments Bootstrap 4 -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

    </script>

    <script>
        $('#summernote').summernote({
            height: 400,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

<script>

var myDropzone=new Dropzone('.dropzone',{
    url: '/admin/posts/{{ $post->id }}/photos',
    paramName: 'photo',
    acceptedFiles: 'image/*',
    maxFilesize: 2,
    maxFiles:1,
    headers:{
        'X-CSRF-TOKEN': '{{ csrf_token()}}'
    },
    dictDefaultMessage: 'Click para agregar imagen'
});
    myDropzone.on('error',function(file,res){
    var msg = res.photo[0];
    $('.dz-error-message:last > span').text(msg);
});
Dropzone.autoDiscover=false;

</script>


@endpush

