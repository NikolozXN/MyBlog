@props(['post'])
<tr>
    <td>
        <div class="d-flex align-items-center">
            <img src="/storage/{{ $post->author->avatar }}" alt="" style="width: 45px; height: 45px"
                class="rounded-circle" />
            <div class="ms-3">
                <p class="fw-bold mb-1">{{ $post->author->name }}</p>
            </div>
        </div>
    </td>
    <td>
        <p class="fw-normal mb-1">{{ $post->title }}</p>
        <p class="text-muted mb-0">Last updated {{ $post->updated_at->diffForHumans() }}</p>
    </td>
    <td>
        <a href="{{ route('posts.delete') }}" class="btn btn-link btn-sm btn-rounded">
            Delete
        </a>
        <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-link btn-sm btn-rounded">
            Edit
        </a>
    </td>
</tr>
