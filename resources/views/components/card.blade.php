@props(['post'])

<div>
    <div class="card border overflow-hidden rounded text-start mb-3" style="width: 25rem; height: 28rem">
        <img class=""
            src="{{ $post->image ? asset('/storage/' . $post->image) : asset('storage/images/no-image-icon-6.png') }}"
            style="width: 25rem; height: 13rem" alt="Title">
        <div class="card-body">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="card-title text-primary fs-5 text-decoration-none">{{ $post->title }}
                &rarr;</a>
            <p class="card-text">{{ $post->excerpt }}</p>
            <div class="d-flex">
                <div class="d-flex flex-grow-1 gap-2">
                    <p>By <a href="?author={{ $post->author->name }}">{{ $post->author->name }}</a>
                    </p>
                    <img src="{{ asset('/storage/' . $post->author->avatar) }}" class="rounded-circle" alt=""
                        style="width: 2rem; height: 2rem">
                </div>
                <a href="?category={{ $post->category->slug }}"
                    class="btn btn-primary p-2 flex-grow-1">{{ $post->category->name }}</a>
            </div>
            <p>Last updated {{ $post->updated_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
