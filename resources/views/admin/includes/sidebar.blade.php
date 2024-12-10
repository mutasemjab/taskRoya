<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Roya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @if (
                    $user->can('customer-table') ||
                        $user->can('customer-add') ||
                        $user->can('customer-edit') ||
                        $user->can('customer-delete'))
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ __('messages.Customers') }} </p>
                        </a>
                    </li>
                @endif


                @if ($user->can('type-table') || $user->can('type-add') || $user->can('type-edit') || $user->can('type-delete'))
                    <li class="nav-item">
                        <a href="{{ route('types.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ __('messages.types') }} </p>
                        </a>
                    </li>
                @endif

                @if (
                    $user->can('category-table') ||
                        $user->can('category-add') ||
                        $user->can('category-edit') ||
                        $user->can('category-delete'))
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ __('messages.categories') }} </p>
                        </a>
                    </li>
                @endif





                @if (
                    $user->can('product-table') ||
                        $user->can('product-add') ||
                        $user->can('product-edit') ||
                        $user->can('product-delete'))
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ __('messages.products') }} </p>
                        </a>
                    </li>
                @endif

                @if (
                    $user->can('episode-table') ||
                        $user->can('episode-add') ||
                        $user->can('episode-edit') ||
                        $user->can('episode-delete'))
                    <li class="nav-item">
                        <a href="{{ route('episodes.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ __('messages.episodes') }} </p>
                        </a>
                    </li>
                @endif



                @if ($user->can('page-table') || $user->can('page-add') || $user->can('page-edit') || $user->can('page-delete'))
                    <li class="nav-item">
                        <a href="{{ route('pages.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.Pages') }} </p>
                        </a>
                    </li>
                @endif


                @if ($user->can('banner-table') || $user->can('banner-add') || $user->can('banner-edit') || $user->can('banner-delete'))
                    <li class="nav-item">
                        <a href="{{ route('banners.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.banners') }} </p>
                        </a>
                    </li>
                @endif






                <li class="nav-item">
                    <a href="{{ route('admin.login.edit', authId()) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('messages.Admin_account') }} </p>
                    </a>
                </li>

                @if ($user->can('role-table') || $user->can('role-add') || $user->can('role-edit') || $user->can('role-delete'))
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <span>{{ __('messages.Roles') }} </span>
                        </a>
                    </li>
                @endif

                @if (
                    $user->can('employee-table') ||
                        $user->can('employee-add') ||
                        $user->can('employee-edit') ||
                        $user->can('employee-delete'))
                    <li class="nav-item">
                        <a href="{{ route('admin.employee.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <span> {{ __('messages.Employee') }} </span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
