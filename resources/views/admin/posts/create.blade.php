<!-- Modal -->
<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Titulo de la publicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.posts.store') }}" method="POST">
        <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Ingrese el titulo de la publicacion (minimo 10 palabras)" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- End Modal -->
