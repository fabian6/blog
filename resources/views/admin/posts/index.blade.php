@extends('admin.layout')
@section('header')
    <h1>
        Todas las publicaciones
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
    </ol>
@endsection
@section('content')
    <h1>Dashboard</h1>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de publicaciones</h3>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear publicación</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="posts-table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Extracto</th>
                <th>Acciones</th>
               
            </tr>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->excerpt}}</td>
                        <td>
                            <a href="{{route('posts.show',$post)}} " target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.posts.edit',$post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
           
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#posts-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
            });
        });
    </script>
    
@endpush