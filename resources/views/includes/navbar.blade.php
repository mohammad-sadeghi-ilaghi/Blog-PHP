
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="../index.html">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                {{-- <php //if(isset($_SESSION['username'])): ?> --}}
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                {{-- @auth --}}
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/post/create">create</a></li>
                <li class="nav-item dropdown mt-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <php echo $_SESSION['username']; ?> --}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/categories/list') }}">categories</a></li>
                        <li><a class="dropdown-item" href="{{ url('/post/posts') }}">list of posts</a></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">logout</a></li>
                    </ul>
                </li>
               {{-- @endauth --}}
               
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/contact">Contact</a></li>
                {{-- @if(! Auth::user()) --}}
                    {{-- <php else : ?> --}}
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/login">login</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/register">register</a></li>
                    {{-- <php endif; ?> --}}
                {{-- @endif --}}
            </ul>
        </div>
    </div>
</nav>