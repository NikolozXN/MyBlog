<x-layout>
    <x-users-layout>
        <form action="{{ route('users.authenticate') }}" method="POST">
            @csrf
            <h3 class="mb-5">Log In</h3>
            <div class="form-outline mb-4">
                <input type="email" name="email" value="{{ old('email') }}" id="email"
                    class="form-control form-control-lg" required />
                <label class="form-label left-0" for="email">Email</label>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="password" name="password" value="{{ old('password') }}" id="password"
                    class="form-control form-control-lg" required />
                <label class="form-label" for="password">Password</label>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary btn-md mb-3" type="submit">Log In</button>
            <p class="mb-0">Don't have an account?</p><a href="{{ route('users.create') }}">Sign Up</a>
        </form>
    </x-users-layout>
</x-layout>
