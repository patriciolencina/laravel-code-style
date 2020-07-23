<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <a class="navbar-brand" href="#"><img src="{{ asset('img/virgin-trans.png') }}" alt="Virgin logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @foreach([
                ["name" => "Map", "route" => route('root')],
                ["name" => "Shops list", "route" => route('shops-list')],
            ] as $routeObject)
                <a class="nav-item nav-link {{ Request::url() === $routeObject['route'] ? 'active' : '' }}"
                   href="{{ $routeObject['route'] }}">{{ $routeObject['name'] }}</a>
            @endforeach
        </div>
    </div>
</nav>