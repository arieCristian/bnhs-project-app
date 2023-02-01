        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
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
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::is('admin/ticket/*')? 'active' : '' }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-ticket" aria-expanded="true"
                    aria-controls="sidebar-ticket">
                    <i class="fas fa-fw fa-cog"></i>
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
            <li class="nav-item {{ Request::is('ticket/transaction-details')? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ticket/transaction-details') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
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