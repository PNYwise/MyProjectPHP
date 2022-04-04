<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo-junkbee.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Junk Bee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            {{-- <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
                <a href="{{ route('setting') }}" class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-header">User</li>
                <li class="nav-item">
                    <a href="{{ route('userdata') }}"
                        class="nav-link {{ Request::is('dashboard/userdata*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('verify') }}"
                        class="nav-link {{ Request::is('dashboard/verify*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>Request Verify</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wasteCollectorlist') }}"
                        class="nav-link {{ Request::is('dashboard/wasteCollectorlist*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Manage Collector</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('managerlist') }}"
                        class="nav-link {{ Request::is('dashboard/managerlist*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Manager List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customerrepList') }}"
                        class="nav-link {{ Request::is('dashboard/customerrepList*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Manage CR</p>
                    </a>
                </li>

                <li class="nav-header">Collection</li>
                <li class="nav-item">
                    <a href="{{ route('walletTransactrion') }}"
                        class="nav-link {{ Request::is('dashboard/walletTransactrion*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Wallet Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('allCollection') }}"
                        class="nav-link {{ Request::is('dashboard/allCollection*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>All Collection</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wasteList') }}"
                        class="nav-link {{ Request::is('dashboard/waste*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>Manage Waste</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('disputeCollection') }}"
                        class="nav-link {{ Request::is('dashboard/disputeCollection*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-window-close"></i>
                        <p>Dispute Collection</p>
                    </a>
                </li>

                <li class="nav-header">Other</li>
                <li class="nav-item">
                    <a href="{{ route('allNews') }}"
                        class="nav-link {{ Request::is('dashboard/allNews*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Manage News</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('dashboard/complainsList*') ? 'active' : '' }}">
                        <i class="nav-icon"></i>
                        <p>View Complains List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('feedback') }}"
                        class="nav-link {{ Request::is('dashboard/feedback*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Feedback</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notificarion.index') }}"
                        class="nav-link {{ Request::is('dashboard/push-notification*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Push Notification</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('list') }}"
                        class="nav-link {{ Request::is('dashboard/list*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-eraser"></i>
                        <p>Manage Badword</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
