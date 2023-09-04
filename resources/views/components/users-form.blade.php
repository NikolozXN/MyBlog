<x-users-layout>
    <h3 class="mb-5">Sign Up</h3>
    <div class="form-outline mb-4">
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control form-control-lg"
            required />
        <label class="form-label" for="name">Name</label>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
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
    <div class="form-outline mb-4">
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
            id="password_confirmation" class="form-control form-control-lg" required />
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-outline mt-3">
            <input type="file" class="form-control" name="avatar" id="file" placeholder="Enter your Post" />
            <label for="file" class="form-label">Upload profile</label>
            @error('avatar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <button class="btn btn-primary btn-md mb-3" type="submit">Sign Up</button>
    <p class="mb-0">Already have an account?</p><a href="{{ route('login') }}">Log In</a>
</x-users-layout>
