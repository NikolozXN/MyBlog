@props(['heading'])
@props(['paragraph'])
@props(['hint'])

<div {{ $attributes->merge(['class' => 'alert alert-danger mt-4 flex-grow-1']) }}>
    <h4 class="alert-heading">{{ $heading }}</h4>
    <p>{{ $paragraph }}</p>
    <hr>
    <p class="mb-0">{{ $hint }}</p>
</div>
