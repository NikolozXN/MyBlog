<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Myblog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.manage') }}">Manage</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('users.logout') }}" method="POST">
                                @csrf
                                <button class="nav-link btn btn-default">Log Out</button>
                            </form>

                        </li>
                        <li class="nav-item">
                            <p class="nav-link ">Hello {{ auth()->user()->name }}!</p>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('users.create') }}">Sign up</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
<main>

    <section>
        <div class="container">
