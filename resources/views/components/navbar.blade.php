<nav class="navbar navbar-expand-lg bg-primary-orange mb-0 text-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-seedling text-green"></i> <strong>B</strong>urana<strong>A</strong>rsa</a>
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
                <li class="nav-item">
                    <a href="{{Route('rank')}}" class="nav-link"><i class="fas fa-medal"></i> Rank</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="/register" class="nav-link"><i class="far fa-edit"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link"><i class="fas fa-key"></i> Login</a>
                    </li>
                @endguest

                @auth
                        <li class="nav-item">
                            <a href="{{Route('index.raport')}}" class="nav-link">Welcome, <i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                            <a href="{{route('admin')}}" class="nav-link"><i class="fas fa-tools"></i> Admin Panel</a>
                        </li>
                        @endif
                        <form action="/logout" method="POST">
                            @csrf
                            <li class="nav-item">
                                <button type="submit" class="btn btn-danger my-2 my-sm-0"><i class="far fa-times-circle"></i> Logout</button>
                            </li>
                        </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
