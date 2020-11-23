@if (session('status'))
    <div class="alert alert-success alert-dismissible col-sm-12">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif