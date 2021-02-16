
<div class="row">
  <div class="col-lg-12">
    <!-- Collapsable Card Data -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardUser" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardUser">
        <h6 class="m-0 font-weight-bold text-primary">{{ $clt_create ? 'Nuevo usuario del sistema' : 'Editar usuario: ' . $user->name . $user->last_name }}</h6>
      </a>
      <!-- Card Data - Collapse -->
      <div class="collapse show" id="collapseCardUser">
        <div class="card-body">

          @csrf
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
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="username">Nombre de usuario (login)</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="username"
                value="{{ old('username', $user->username) }}">
            </div>
            <div class="form-group col-md-6">
              <label for="address">Dirección (opcional)</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Principal St"
                value="{{ old('address', $user->address) }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="phone">Teléfono (opcional)</label>
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Número a 10 dígitos"
                maxlength="10" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
                value="{{ old('phone', $user->phone) }}">
            </div>
            <div class="form-group col-md-6">
              <label for="rol">Rol de usuario</label>
              <select id="rol" name="rol" class="form-control"  onchange="getval(this);">
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
          <div class="form-row divorg" id="divorg" style="display:none">
          <div class="form-group col-md-12">
          <input type="hidden" id="auxrol" name="auxrol">
          <label for="organization">Organización</label>
          <select  name="organization" id="organization" class="form-control">
          <option value="">Selecciona una organización</option>
          @foreach($organizations as $organization)
          @if ( old('organization', $user->id_organization) == $organization->id )
          <option value="{{$organization->id}}" selected>{{$organization->name}}</option>
          @else
          <option value="{{$organization->id}}">{{$organization->name}}</option>
          @endif
          @endforeach
          </select>
          </div>
          </div>
          
          <div class="form-row" style="{{ $clt_create ? 'display:flex' : 'display:none' }}">
            <div class="form-group col-md-6">
              <label for="email">E-mail (usuario)</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="juanperez@example.com"
                value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group col-md-6">
              <label for="password">Contraseña</label>
              <input type="text" name="password" class="form-control" id="password"
                placeholder="Contraseña de la cuenta" value="{{ old('password') }}">
            </div>
          </div>
          <a href="{{ route("users.index") }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Regresar
          </a>
          <button type="submit" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas {{ $clt_create ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
            {{ $clt_create ? 'Registrar' : 'Actualizar' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
/**Script que permite mostrar/ocultar (según el caso) el select para seleccionar alguna organización
 * en el caso de que el tipo de usuario seleccionado sea de tipo 'Agente sectorial'
 */
  var sf=document.getElementById('rol').selectedOptions[0].text;
  if(sf=='Agente sectorial'){
    document.getElementById('divorg').style.display = 'block'
    document.getElementById("organization").required = true;
    document.getElementById('auxrol').value='Agente sectorial';
  }else{
    document.getElementById('divorg').style.display = 'none'
    document.getElementById("organization").required = false;
    document.getElementById('auxrol').value='';
  }

  function getval(sel){
   var dato=(sel.options[sel.selectedIndex].text);

   if(dato=="Agente sectorial"){
    document.getElementById('divorg').style.display = 'block'
    document.getElementById("organization").required = true;
    document.getElementById('auxrol').value='Agente sectorial';
   }else{
    document.getElementById('divorg').style.display = 'none'
    document.getElementById("organization").required = false;
    document.getElementById('auxrol').value='';
   }
  }

  function limpiarNumero(obj) {
      /* El evento "change" sólo saltará si son diferentes */
      obj.value = obj.value.replace(/\D/g, '');
    }
</script>