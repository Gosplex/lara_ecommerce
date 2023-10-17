<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('/admin/orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/orders') }}">
                <i class="mdi mdi-cash menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic"
                aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'false' }}" aria-controls="ui-basic">
                <i class="mdi mdi-reorder-horizontal menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a
                            class="nav-link {{ Request::is('/admin/category/create') ? 'active' : '' }}"
                            href="{{ url('admin/category/create') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('/admin/category') ? 'active' : '' }}"
                            href="{{ url('admin/category') }}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/products*') ? 'show' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basics"
                aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}" aria-controls="ui-basics">
                <i class="mdi mdi-store menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basics">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a
                            class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}"
                            href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}"
                            href="{{ url('admin/products') }}">View Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-circle-double menu-icon"></i>
                <span class="menu-title">Brand</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-palette menu-icon" aria-hidden="true"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-play-box-outline menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users*') ? 'show' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth"
                aria-expanded="{{ Request::is('admin/users*') ? 'true' : 'false' }}" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}"
                            href="{{ url('admin/users/create') }}"> Add User</a></li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}"
                            href="{{ url('admin/users') }}"> View Users </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/site-settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/site-settings') }}">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
