@if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        <h3>{{ session('message') }}</h3>
    </div>
@endif
