<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard.index') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ request()->is('dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('user*') ? 'menu-open' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('product-stock*') ? 'menu-open' : '' }}">
                    <a href="{{ route('product-stock.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Product Stock
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.changeVariable') }}" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Variable A = 3 dan B = 5
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('angka.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Angka Terbilang
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>