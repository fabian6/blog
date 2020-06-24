@extends('admin.layout')
@section('header')
    <h1>
        POSTS
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <form method="POST"action="{{route('admin.posts.store')}}">
            {{ csrf_field() }}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}" >
                            <label for="">Titulo de la publicación</label>
                            <input name="title"
                                   placeholder="Ingresa el titulo de la publicación"
                                   value="{{old('title')}}"
                                   autocomplete="off"
                                   type="text" 
                                   class="form-control">
                            {!!$errors->first('title','<span class="help-block">:message</span>')!!}
                            
                        </div>
                        <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                            <label for="">Contenido publicación</label>
                            <textarea name="body" 
                                    id="editor" 
                                    rows =10 
                                    placeholder="Ingresa el contenido completo de la publicación" 
                                    class="form-control"
                            >{{old('body')}}</textarea>
                            {!!$errors->first('body','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">   
                    <div class="box-body">
                        <div class="form-group">
                            <label>Fecha de publicación:</label>
            
                            <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input name="published_at" 
                                    type="text" 
                                    autocomplete="off"
                                    value="{{old('published_at')}}"
                                    class="form-control pull-right" 
                                    id="datepicker">
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('category') ? 'has-error' : ''}}">
                            <label for="">Categorías</label>
                            <select name="category" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value={{$category->id}} 
                                        {{old('category') == $category->id ? 'selected' : ''}}
                                    > {{$category->name}}</option>
                                @endforeach
                            </select>
                            {!!$errors->first('category','<span class="help-block">:message</span>')!!}
                        </div>

                        <div class="div form-group {{$errors->has('tags') ? 'has-error' : ''}}">
                            <select  class="form-control select2"
                                    multiple="multiple" 
                                    name="tags[]"
                                    data-placeholder="Selecciona una o más etiquetas " 
                                    style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option {{collect(old('tags'))->contains($tag->id) ? 'selected' : ''}} value={{$tag->id}}>{{$tag->name}}</option>                                    
                                @endforeach
                            </select>
                            {!!$errors->first('tags','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="">Extracto de la publicación</label>
                            <textarea 
                                name="excerpt" 
                                placeholder="Ingresa un extracto de la publicación" 
                                class="form-control"
                            >{{old('excerpt')}}</textarea>
                            {!!$errors->first('excerpt','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <button type = "submit"class="btn btn-primary btn-block">Guardar publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script>
        //Date picker
        $('#datepicker').datepicker({
        autoclose: true
        }); 
        $(function () {
            
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor');
            //bootstrap WYSIHTML5 - text editor
            // $(".textarea").wysihtml5();
        });
        //select2
        $('.select2').select2();
            //endselect2
    </script>
@endpush


