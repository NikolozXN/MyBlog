<!-- Example split danger button -->
<div {{ $attributes->merge(['class' => 'btn-group']) }} name="category">
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Categories</span>
    </button>
    <div class="dropdown-menu" style="max-height: 200px; overflow-y: auto;">
        {{ $slot }}
    </div>
</div>
