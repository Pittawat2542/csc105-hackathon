<nav class="navbar navbar-expand-lg bg-primary-orange mb-0 text-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-seedling"></i> BuranaArsa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mr-auto"></div>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                @endguest

                @auth
                        <li class="nav-item">
                            <a href="/user" class="nav-link">Welcome, {{ Auth::user()->name }}</a>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                            <a href="{{route('admin')}}" class="nav-link">Admin Panel</a>
                        </li>
                        @endif
                        <form action="/logout" method="POST">
                            @csrf
                            <li class="nav-item">
                                <button type="submit" class="btn btn-default my-2 my-sm-0">Logout</button>
                            </li>
                        </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
