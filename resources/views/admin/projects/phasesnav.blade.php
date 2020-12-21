<?php 

$generaldata='';
$identificacion='disabled';
$preparacion='disabled';
$procedimiento='disabled';
$contratacion='disabled';
$ejecucion='disabled';
$finalizacion='disabled';
$navgeneraldata='';
$navprep='';
$naviden='';
$navcontr='';
$navejec='';
$navfin='';



switch($nav){
  case 'generaldata';
  $navgeneraldata='active iden';
break;
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

    case 7:
      $generaldata='end'; 
      $identificacion='end';
      break;

    case 1:
    $generaldata='end'; 
    $identificacion='end';
    $preparacion='end';
      
    break;
    case 2:
      $generaldata='end'; 
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
    
    break;
    case 3:
      $generaldata='end'; 
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
      $ejecucion='end';
    break;
    case 4:
      $generaldata='end'; 
      $identificacion='end';
      $preparacion='end';
      $contratacion='end';
      $ejecucion='end';
      $finalizacion='end';
     
    break;
    case 5:
      $generaldata='end'; 
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
  border-bottom: 0px;
  
}
.end{
  color: #fff !important;
  background-color: #96c03d !important;
  border-radius: .25em;
  border-color: #fff !important;
  border-bottom: 0px;
}
.nav-item{
  margin-right: 1px;
  border-bottom: 0px;
}

</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-fw fa-home"></i> Inicio </a></li>
    <li class="breadcrumb-item"><a href="{{route('project.index')}}">Proyectos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro de proyecto</li>
  </ol>
</nav>

<ul class="nav nav-tabs">


<li class="nav-item">
    <a class="nav-link {{$generaldata}} {{$navgeneraldata}}" href="{{route('project.generaldata2',$project->id)}}">Datos Generales</a>
  </li>
   

    <li class="nav-item">
    <a class="nav-link {{$identificacion}} {{$naviden}}" href="{{route('project.identificacion',$project->id)}}">Identificación del proyecto</a>
    </li>
  
    
  
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
