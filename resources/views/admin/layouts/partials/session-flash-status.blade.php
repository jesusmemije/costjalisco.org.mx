@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif