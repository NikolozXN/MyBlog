<x-layout>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-users-form />

    </form>
</x-layout>
