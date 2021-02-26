@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul style="margin-bottom: 0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif