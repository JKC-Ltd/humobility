<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('assets/images/SmartPower-logo.png')}}" alt="Logo" class="img-fluid d-flex m-auto" style="background: #fff;padding:10px;width:150px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Energy Consumption
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activePower.index') }}" class="nav-link {{ request()->routeIs('activePower.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Active Power
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('voltageCurrent.index') }}" class="nav-link {{ request()->routeIs('voltageCurrent.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Voltage & Current
                        </p>
                    </a>
                </li>
                <li class="nav-header">CONFIGURATIONS</li>
                <li class="nav-item">
                    <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('locations.index') }}" class="nav-link {{ request()->routeIs('locations.index') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-map-pin"></i>
                        <p>
                            Locations
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gateways" class="nav-link {{ request()->is('gateways') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-hdd"></i>
                        <p>
                            Gateways
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sensors.index') }}" class="nav-link {{ request()->routeIs('sensors.index') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tablet"></i>
                        <p>
                            Sensors
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Sensor Configurations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sensorTypes.index') }}" class="nav-link {{ request()->routeIs('sensorTypes.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sensorModels.index') }}" class="nav-link {{ request()->routeIs('sensorModels.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Model</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/sensorRegisters" class="nav-link {{ request()->is('sensorRegisters') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Register</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item align-items-end">      
                <form method="POST" action="{{ route('logout') }}">
                    @csrf    
                    <a class="nav-link" href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        <i class="far fa-share-square nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </form>
    
            </li>
            </ul>
        </nav>
    </div>
</aside>
