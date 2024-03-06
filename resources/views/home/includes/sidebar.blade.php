<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- HOME --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        {{-- jika user adalah admin  --}}
        {{-- maka akan menampilkan menu category dan news --}}
        @if (Auth::user()->role == 'admin')
            {{-- CATEGORY & NEWS --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('category.index') }}" class="@if (request()->routeIs('category.index')) active @endif">
                            <i class="bi bi-circle"></i><span>Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}" class="@if (request()->routeIs('news.index')) active @endif">
                            <i class="bi bi-circle"></i><span>News</span>
                        </a>
                    </li>
                </ul>
            </li>
        @else
        @endif



    </ul>

</aside>
