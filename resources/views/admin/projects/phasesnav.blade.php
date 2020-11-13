<?php 


$identificacion='';
$preparacion='disabled';
$procedimiento='disabled';
$contratacion='disabled';
$ejecucion='disabled';
$finalizacion='disabled';
$navprep='';
$naviden='';
$navcontr='';
$navejec='';
$navfin='';


switch($nav){

  case 'identificacion':
   $naviden='active iden';
  break;
  case 'preparacion':
    $navprep='active iden';
  break;
  case 'contratacion':
    $navcontr='active iden';
  break;
  case 'ejecucion':
    $navejec='active iden';
  break;

  case 'finalizacion':
    $navfin='active iden';
  break;

}


if(empty($project->id)){
 $project->id=0;  
 
}else{
  
  switch($project->status){
    case 1:
    $identificacion='end';
    $preparacion='end';
      
    break;
    case 2:
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
    
    break;
    case 3:
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
      $ejecucion='end';
    break;
    case 4:
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
      $ejecucion='end';
      $finalizacion='end';
     
    break;
    case 5:
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
      $ejecucion='end';
      $finalizacion='end';
    break;
  }

}


?>

<style>

.active.iden{
  color: #fff !important;
  background-color: #2c3f4c !important;
  
}
.end{
  color: #fff !important;
  background-color: #96c03d !important;
  border-radius: .25em;
  border-color: #fff !important;

}
.nav-item{
  margin-right: 1px;
}

</style>

<ul class="nav nav-tabs">
    
   
@if($edit)
    <li class="nav-item">
    <a class="nav-link {{$identificacion}} {{$naviden}}" href="{{route('project.editidentificacion',$project->id)}}">Identificación del proyecto</a>
  </li>
    @else
    <li class="nav-item">
    <a class="nav-link {{$identificacion}} {{$naviden}}" href="{{route('project.identificacion')}}">Identificación del proyecto</a>
    </li>
    @endif
    
  
  <li class="nav-item">
    <a class="nav-link {{$preparacion}} {{$navprep}}" href="{{route('project.preparacion',$project->id)}}">Preparación del proyecto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$contratacion}} {{$navcontr}}" href="{{route('project.contratacion',$project->id )}}">Procedimiento de contratación</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$ejecucion}} {{$navejec}} " href="{{route('project.ejecucion',$project->id )}}" >Ejecución</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$finalizacion}} {{$navfin}} " href="{{route('project.finalizacion',$project->id )}}" >Finalización</a>
  </li>
</ul>
