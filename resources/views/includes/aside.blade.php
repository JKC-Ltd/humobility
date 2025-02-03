<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('assets/images/SmartPower-logo.png')}}" alt="Logo" class="img-fluid d-flex m-auto" style="background: #fff;padding:10px;width:150px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">CONFIGURATIONS</li>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('locations.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-map-pin"></i>
                        <p>
                            Locations
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gateways" class="nav-link">
                        <i class="nav-icon fa fa-hdd"></i>
                        <p>
                            Gateways
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sensors.index')}}" class="nav-link">
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
                            <a href="{{route('sensorTypes.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sensorModels.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Model</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sensor_registers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Register</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
