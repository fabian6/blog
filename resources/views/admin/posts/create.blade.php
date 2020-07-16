<!-- Modal -->
<form method="POST"action="{{route('admin.posts.store')}}">
    {{ csrf_field() }}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Titulo de la publicaci</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}" >
                    {{-- <label for="">Titulo de la publicación</label> --}}
                    <input name="title"
                            placeholder="Ingresa el titulo de la publicación"
                            value="{{old('title')}}"
                            autocomplete="off"
                            type="text" 
                            class="form-control" required>
                    {!!$errors->first('title','<span class="help-block">:message</span>')!!}
                    
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  class="btn btn-primary">Crear publicación</button>
            </div>
        </div>
        </div>
    </div>
</form>