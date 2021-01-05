{{-- <option value="Enero" {{$val=='Jan'? 'selected="selected':''}}>Enero {{$val}}</option> --}}
{{-- <option value="Febrero">Febrero</option>
<option value="Marzo">Marzo</option>
<option value="Abril">Abril</option>
<option value="Mayo">Mayo</option>
<option value="Junio">Junio</option>
<option value="Julio">Julio</option>
<option value="Agosto">Agosto</option>
<option value="Septiembre">Septiembre</option>
<option value="Octubre">Octubre</option>
<option value="Noviembre">Noviembre</option>
<option value="Diciembre">Diciembre</option> --}}

@if ($val=='Jan')
    @php
        $cont1=1;    
    @endphp
{{-- @elseif($val=='Feb')
    @php
        $cont1+=1;    
    @endphp
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Febrero</h6> 
        </div>
    </a>
@elseif($val=='Mar')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Marzo</h6> 
        </div>
    </a>
@elseif($val=='Apr')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Abril</h6> 
        </div>
    </a>
@elseif($val=='May')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Mayo</h6> 
        </div>
    </a>
@elseif($val=='Jun')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Junio</h6> 
        </div>
    </a>
@elseif($val=='Jul')
    <input type="text" value="Julio">
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Julio</h6> 
        </div>
    </a>
@elseif($val=='Aug')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Agosto</h6> 
        </div>
    </a>
@elseif($val=='Sep')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Septiembre</h6> 
        </div>
    </a>
@elseif($val=='Oct')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Octubre</h6> 
        </div>
    </a>
@elseif($val=='Nov')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Noviembre</h6> 
        </div>
    </a>
@elseif($val=='Dec')
    <a href="">
        <div class="row title" style="margin-top:1%;">
            <h6>Diciembre</h6> 
        </div>
    </a> --}}
    
@endif