<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a href="{{ route('tasks.index') }}" class="navbar-item">
                My tasks
            </a>

            <div class="navbar-item">
                <a href="{{ route('tasks.create') }}" class="button is-primary">Create task</a>
            </div>

            @can('reassign')
                <div class="navbar-item">
                    <a href="{{ route('tasks.reassign') }}" class="button is-primary">Reassign tasks</a>
                </div>
            @endcan
        </div>

        @auth()
        <div class="navbar-end">
            <div class="navbar-item">
                {{ auth()->user()->name }}
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ url('/logout') }}" class="button is-light">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </div>
</nav>