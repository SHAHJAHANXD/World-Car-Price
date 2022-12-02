<aside class="main-sidebar sidebar-dark-primary elevation-4">



    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->profile_image == true)
                <img src="{{Auth::user()->profile_image }}" class="img-circle elevation-2" alt="User Image" style="height: 50px; width: 50px;">
                @else
                <img src="{{ asset('images/guest.png') }}" class="img-circle elevation-2" alt="User Image" style="height: 50px; width: 50px;">
                @endif

            </div>
            <div class="info">
                <a type="button" data-toggle="modal" data-target="#modal-image" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager')
                <li class="nav-item">
                    <a href="{{ route('admin.categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.countries') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Countries
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.Brands') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products_requests') }}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Product Requests
                        </p>
                    </a>
                </li>

                @endif
                @if (Auth::user()->role == 'Admin')
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            False Ceiling
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.false_ceiling') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.FalseCeiling') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Items</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blogs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blog.category_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Blogs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('admin.products1') }}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
<section class="content">
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Profile Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 style="text-align: center;margin-top: 20px; ">Change Account Info</h2>
                        <label for="">Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
                        <label for="">Email</label>
                        <input type="text" value="{{ Auth::user()->email }}" readonly class="form-control">
                        <label for="">Profile Image</label>
                        <input type="file" value="{{ Auth::user()->profile_image }}" name="profile_image" class="form-control">
                        <h2 style="text-align: center;margin-top: 20px; ">Change Password</h2>
                        <label for="">Old Password</label>
                        <input type="password" class="form-control" name="old_password" placeholder="Enter New Password">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</section>
