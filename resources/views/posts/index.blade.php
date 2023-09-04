<x-layout>
    @include('partials.search')
    <x-category-layout class="mb-4">
        @forelse ($categories as $category)
            <x-category :category="$category" />
        @empty
        @endforelse
    </x-category-layout>
    <x-card-layout>
        @forelse ($posts as $post)
            <x-card :post="$post" />
        @empty

            <x-message heading="Oooops :(" paragraph="No posts found!" hint="Try search something or come back later" />
            {{-- <x-flash-message /> --}}
        @endforelse

        {{ $posts->links() }}

    </x-card-layout>
</x-layout>
