<nav id="sidebar" class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-mortarboard-fill"></i>
        <span>SYSDAE</span>
    </div>

    <div class="sidebar-scroll">
        <ul class="sidebar-nav">
            @foreach(config('menu') as $grupo)
                @php
                    $grupoId = 'menu-'.\Illuminate\Support\Str::slug($grupo['title']);
                    $grupoAtivo = collect($grupo['items'])->contains(fn($item) => request()->routeIs($item['active']));
                @endphp
                <li class="sidebar-group">
                    <a class="sidebar-group-toggle {{ $grupoAtivo ? '' : 'collapsed' }}" href="#{{ $grupoId }}"
                       data-toggle="collapse" role="button" aria-expanded="{{ $grupoAtivo ? 'true' : 'false' }}" aria-controls="{{ $grupoId }}">
                        <i class="bi {{ $grupo['icon'] }}"></i>
                        <span>{{ $grupo['title'] }}</span>
                        <i class="bi bi-chevron-down sidebar-caret"></i>
                    </a>
                    <ul id="{{ $grupoId }}" class="collapse sidebar-submenu {{ $grupoAtivo ? 'show' : '' }}">
                        @foreach($grupo['items'] as $item)
                            <li>
                                <a href="{{ route($item['route']) }}" class="sidebar-link {{ request()->routeIs($item['active']) ? 'active' : '' }}">
                                    <i class="bi {{ $item['icon'] }}"></i>
                                    <span>{{ $item['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
