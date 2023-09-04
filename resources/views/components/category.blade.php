@props(['category'])
<a class="dropdown-item" href="?category={{ $category->slug }}">{{ $category->name }}</a>
