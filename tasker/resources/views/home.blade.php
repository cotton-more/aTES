<x-app-layout>
    <section class="hero">
        <div class="hero-body">
            <p class="title">
                Welcome
            </p>
            @guest()
            <p class="subtitle">
                <a href="{{ route('login') }}" class="button is-primary is-large">Login</a>
            </p>
            @endguest
        </div>
    </section>
</x-app-layout>