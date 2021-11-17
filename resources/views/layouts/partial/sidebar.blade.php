<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{ action([App\Http\Controllers\HomeController::class, 'index']) }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('UserController@index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Manajemen Pengguna
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('under-contruction') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Bank Soal
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('under-contruction') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Ujian CAT
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ action('ProgramAkademikController@index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Program Akademik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('under-contruction') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('under-contruction') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mata Pelajaran</p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Active Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inactive Page</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li> --}}
    </ul>
</nav>
