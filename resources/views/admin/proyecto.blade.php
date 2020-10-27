@extends("admin/layouts/layout")

@section('contenido')




<div>
<form method="POST" action="{{route('project.save')}}">

@csrf
<div class="col-12 col-xl-11">
@if(Session::has('message'))



<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong> {{ Session::get('message') }}
                    <button type="button" class="close" style="padding:15px;" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



@endif

<diV class="jumbotron offset-xl-1 ">

<label>
Título del proyecto
</label>
<input type="text" class="form-control" name="tituloProyecto">

<label>
Descripción
</label>
<textarea  class="form-control" cols="30" rows="10" name="descripcionProyecto"></textarea>
<label>
Estus
</label>
<select  class="form-control" name="estatusProyecto">
@foreach ($status as $statu)
<option value="{{$statu->id}}">{{$statu->titulo}}</option>
@endforeach
</select>



<label>
Sector
</label>
<select  class="form-control" name="sectorProyecto">
<option value="educacion">Educación</option>
<option value="salud">Salud</option>
<option value="energia">Energia</option>
<option value="comunicaciones">Comunicaciones</option>
<option value="gobernancia">Gobernancia</option>
<option value="economia">Economía</option>
</select>


<label>
Próposito
</label>
<input type="text"  class="form-control" name="propositoProyecto">

<label>
Tipo de proyecto
</label>
<select  class="form-control" name="sectorProyecto">
<option value="construcción">Construcción</option>
<option value="rehabilitación">Rehabilitación</option>
<option value="reemplazo">Reemplazo</option>
<option value="expansion">Expansión</option>

</select>

</diV>


<diV class="jumbotron offset-xl-1 ">

<label>
Fecha de Inicio
</label>
<input type="date" class="form-control" name="fechaInicioProyecto">

<label>
Fecha de Finalización
</label>
<input type="date" class="form-control" name="fechaFinProyecto"> 

<label>
Fecha máxima de Finalización
</label>
<input type="date" class="form-control" name="fechaMaxProyecto">

<label>
Duración (en días)
</label>
<input type="int" class="form-control" name="duracionProyecto">

<input type="submit" value="Guardar">
</diV>

</div>
</form>

</div>


@endsection