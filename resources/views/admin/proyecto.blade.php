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
@foreach ($sectores as $sector)
<option value="{{$sector->id}}">{{$sector->titulo}}</option>

@endforeach
</select>


<label>
Próposito
</label>
<input type="text"  class="form-control" name="propositoProyecto">

<label>
Tipo de proyecto
</label>
<select  class="form-control" name="tipoProyecto">
@foreach($types as $type)

<option value="{{$type->id}}">{{$type->titulo}}</option>


@endforeach

</select>

</diV>

<h4>Período del proyecto</h4>
<div class="jumbotron offset-xl-1 ">


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
</div>

<h4>Tiempo de vida del proyecto</h4>
<div class="jumbotron offset-xl-1 ">


<label>
Fecha de Inicio
</label>
<input type="date" class="form-control" name="assetstart">

<label>
Fecha de Finalización
</label>
<input type="date" class="form-control" name="assetend"> 

<label>
Fecha máxima de Finalización
</label>
<input type="date" class="form-control" name="assetmax">

<label>
Duración (en días)
</label>
<input type="int" class="form-control" name="assetduration">







</diV>

<h3>Autoridad Pública</h3>
<div class="jumbotron offset-xl-1 ">

<select name="autoridadP">

@foreach($autoridadP as $autoridad)

<option value="{{$autoridad->id}}">{{$autoridad->name}}</option>

@endforeach

</select>

</div>



<h3>Datos de finalización</h3>
<div class="jumbotron offset-xl-1 ">

<label>Fecha final</label>
<input type="date" class="form-control" name="endDate">

<label>Detalles de la fecha de finalización</label>
<textarea name="endDateDetails" id="" cols="30" rows="10" class="form-control" ></textarea>

<label>Monto del valor final</label>
<input type="number" name="finalValue_amount" id="" class="form-control">

<label for="">Detalles del valor final</label>
<textarea name="finalValueDetails" id="" cols="30" rows="10" class="form-control"></textarea>

<label>Alcance final</label>
<input type="text" class="form-control" name="finalScope">

<label>Detalles finales del alcance</label>
<textarea name="finalScopeDetails" id="" cols="30" rows="10" class="form-control"></textarea>

</div>


<div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                  </div>
                </div>
</div>

        



</div>
<input type="submit" value="Guardar">
</form>

</div>


@endsection