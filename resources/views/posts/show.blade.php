<x-layout>
    @include('partials.search')


    <div class="mt-5 d-flex gap-3 flex-column justify-content-center align-items-center">
        <img class="w-25" src="{{ asset('storage/images/acme.png') }}" alt="" />
        <h2 class="text-secondary">{{ $post->title }}</h2>
        <p>
            {{ $post->body }}
        </p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Go back &leftarrow;</a>
    </div>


</x-layout>
