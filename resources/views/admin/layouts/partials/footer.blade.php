<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
            @php
                $fechaActual = date('d-m-Y');
                setlocale(LC_TIME, "spanish");
                $fecha_c = $fechaActual;
                $fecha_c = str_replace("/", "-", $fecha_c);			
                $Nueva_Fecha_c = date("d-M-Y", strtotime($fecha_c));	
                $fecha_created = strftime("%Y", strtotime($Nueva_Fecha_c));

            @endphp
        <span>Copyright &copy; CoST-Jalisco {{$fecha_created}}</span>
      </div>
    </div>
</footer>