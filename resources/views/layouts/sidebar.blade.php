        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-stream"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BNHS<sup>app</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard')? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            @can('admin')
                <!-- Nav Item - Pages Collapse Menu Ticket -->
                <li class="nav-item {{ Request::is('admin/ticket/*')? 'active' : '' }}">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-ticket" aria-expanded="true"
                        aria-controls="sidebar-ticket">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Ticket</span>
                    </a>
                    <div id="sidebar-ticket" class="collapse {{ Request::is('admin/ticket/*')? 'show' : '' }}" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tiket</h6>
                            <a class="collapse-item {{ Request::is('admin/ticket/data')? 'active' : '' }}" href="{{ url('admin/ticket/data') }}">Data Tiket</a>
                            <a class="collapse-item {{ Request::is('admin/ticket/transactions-history')? 'active' : '' }}" href="{{ url('admin/ticket/transactions-history') }}">Riwayat Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/ticket/cencelled-transactions')? 'active' : '' }}" href="{{ url('admin/ticket/cencelled-transactions') }}">Pembatalan Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/ticket/transactions-details')? 'active' : '' }}" href="{{ url('admin/ticket/transactions-details') }}">Detail Transaksi</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu Locker -->
                <li class="nav-item {{ Request::is('admin/locker/*')? 'active' : '' }}">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-locker" aria-expanded="true"
                        aria-controls="sidebar-locker">
                        <i class="fas fa-door-closed"></i>
                        <span>Locker</span>
                    </a>
                    <div id="sidebar-locker" class="collapse {{ Request::is('admin/locker/*')? 'show' : '' }}" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Loker</h6>
                            <a class="collapse-item {{ Request::is('admin/locker/data')? 'active' : '' }}" href="{{ url('admin/locker/data') }}">Data Loker</a>
                            <a class="collapse-item {{ Request::is('admin/locker/transactions-history')? 'active' : '' }}" href="{{ url('admin/locker/transactions-history') }}">Riwayat Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/locker/cencelled-transactions')? 'active' : '' }}" href="{{ url('admin/locker/cencelled-transactions') }}">Pembatalan Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/locker/transactions-details')? 'active' : '' }}" href="{{ url('admin/locker/transactions-details') }}">Detail Transaksi</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu Bar -->
                <li class="nav-item {{ Request::is('admin/bar/*')? 'active' : '' }}">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-bar" aria-expanded="true"
                        aria-controls="sidebar-bar">
                        <i class="fas fa-door-closed"></i>
                        <span>Bar</span>
                    </a>
                    <div id="sidebar-bar" class="collapse {{ Request::is('admin/bar/*')? 'show' : '' }}" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Bar</h6>
                            <a class="collapse-item {{ Request::is('admin/bar/data')? 'active' : '' }}" href="{{ url('admin/bar/data') }}">Data Bar</a>
                            <a class="collapse-item {{ Request::is('admin/bar/transactions-history')? 'active' : '' }}" href="{{ url('admin/bar/transactions-history') }}">Riwayat Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/bar/cencelled-transactions')? 'active' : '' }}" href="{{ url('admin/bar/cencelled-transactions') }}">Pembatalan Transaksi</a>
                            <a class="collapse-item {{ Request::is('admin/bar/transactions-details')? 'active' : '' }}" href="{{ url('admin/bar/transactions-details') }}">Detail Transaksi</a>
                        </div>
                    </div>
                </li>
            @endcan
            @can('ticket')
                <!-- Heading -->
                <div class="sidebar-heading">
                    TIKET
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('ticket/transaction/create')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('ticket/transaction/create') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Transaksi Tiket</span></a>
                </li>
                <li class="nav-item {{ Request::is('ticket/transaction')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('ticket/transaction') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Riwayat Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::is('ticket/transactions-details')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('ticket/transactions-details') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Transaksi Details</span></a>
                </li>
            @endcan
            @can('locker')
                <!-- Heading -->
                <div class="sidebar-heading">
                    LOKER
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('locker/transaction/create')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('locker/transaction/create') }}">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Transaksi Loker</span></a>
                </li>
                <li class="nav-item {{ Request::is('locker/transaction')? 'active' : '' }} {{ Request::is('locker/transaction/*/edit')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('locker/transaction') }}">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Transaksi Berlangsung</span></a>
                </li>
                <li class="nav-item {{ Request::is('locker/transactions-history')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('locker/transactions-history') }}">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Riwayat Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::is('locker/transactions-details')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('locker/transactions-details') }}">
                        <i class="fas fa-book-open"></i>
                        <span>Transaksi Details</span></a>
                </li>
            @endcan

            @can('bar')
                <!-- Heading -->
                <div class="sidebar-heading">
                    BAR & RESTAURANT
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('bar/transaction/create')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('bar/transaction/create') }}">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Transaksi Bar</span></a>
                </li>
                <li class="nav-item {{ Request::is('bar/transaction')? 'active' : '' }} {{ Request::is('bar/transaction/*/edit')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('bar/transaction') }}">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Transaksi Berlangsung</span></a>
                </li>
                <li class="nav-item {{ Request::is('bar/transactions-history')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('bar/transactions-history') }}">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Riwayat Transaksi</span></a>
                </li>
                <li class="nav-item {{ Request::is('bar/transactions-details')? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('bar/transactions-details') }}">
                        <i class="fas fa-book-open"></i>
                        <span>Transaksi Details</span></a>
                </li>
            @endcan

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->