@extends("theme.$theme.layout")
@section('titulo')
    Permisos
@endsection
@section('contenido')
    <h1 class="h3 mb-4 text-gray-800">Permisos</h1>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permisos as $permiso)
            <tr>
                <th scope="row">{{$permiso->id}}</th>
                <td>{{$permiso->nombre}}</td>
                <td>{{$permiso->slug}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection