@extends('admin.layouts.app')
@section('title')
Editar noticia
@endsection
@section('content')

<div class="row">
    <div class="col-lg-6">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Juan" id="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Pérez"
                            value="{{ old('last_name', $user->last_name) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Dirección (opcional)</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="1234 Principal St"
                        value="{{ old('address', $user->address) }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Teléfono (opcional)</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            placeholder="Número a 10 dígitos" maxlength="10" onkeyup="limpiarNumero(this)"
                            onchange="limpiarNumero(this)" value="{{ old('phone', $user->phone) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rol">Rol de usuario</label>
                        <select id="rol" name="rol" class="form-control">
                            <!--<option selected disabled>Selecciona un rol...</option>-->
                            @foreach ($roles as $role)
                            @if ( old('rol', $user->role_id) == $role->id )
                            <option value="{{ $role->id }}" selected>{{ $role->title }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row" style="{{ $clt_create ? 'display:flex' : 'display:none' }}">
                    <div class="form-group col-md-6">
                        <label for="email">E-mail (usuario)</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="juanperez@example.com" value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control" id="password"
                            placeholder="Contraseña de la cuenta" value="{{ old('password') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas {{ $clt_create ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                    {{ $clt_create ? 'Registrar' : 'Actualizar' }}
                </button>
                <a href="{{ route("users.index") }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                    Regresar
                </a>
            </div>
        </div>

    </div>
    <div class="col-lg-6">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contenido de la noticia</h6>
            </div>
            <div class="card-body">
                <textarea name="description" id="description">{{ $news->description }}</textarea>
            </div>
        </div>

    </div>
</div>



@endsection

@section('scripts')
<!-- Call script ckeditor -->
<script src="{{asset("admin_assets/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
    ClassicEditor.create( document.querySelector( '#description' )).then( editor => {
        const data = editor.getData();
        console.log( data );
    }).catch( error => {
        console.error( error );
    });
    
</script>
@endsection