<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('admin_dashboard') }}">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>


            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('admin_search_users') }}" method="GET">
                <div class="input-group">
                    <input class="form-control" type="text" name="searchTerm" placeholder="Search By Name Or Email" aria-label="Search By Name Or Email" aria-describedby="btnNavbarSearch" required />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>



            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('admin_dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Results For "{{ $searchTerm }}"</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">users with name or email like "{{ $searchTerm }}"</li>
                        </ol>


                        @if ($errors->any())
                            <div class="alert alert-danger  fade show" >
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="alert alert-success  fade show" >
                                <ul>
                                  <li>{{ session('message') }}</li>
                                </ul>
                            </div>
                        @endif
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Account Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center"> 
                                                @if($user->role_id == 1)
                                                    <p>Admin</p>
                                                @elseif($user->role_id == 2)
                                                    <p>User</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if($user->status == true)
                                                            <p style="color: darkgreen;">Active</p>
                                                        @elseif($user->status == false)
                                                            <p style="color: darkred;">Deactivated</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if($user->status == true)
                                                            <a class="btn btn-sm btn-warning" href="#" onclick="event.preventDefault(); document.getElementById('deactivate_user_{{ $user->id }}_form').submit();">Deactivate Account</a>
                                                            <form id="deactivate_user_{{ $user->id }}_form" action="{{ route('admin_deactivate_user', [$user->id]) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @elseif($user->status == false)
                                                            <a class="btn btn-sm btn-success" href="#" onclick="event.preventDefault(); document.getElementById('activate_user_{{ $user->id }}_form').submit();">Activate Account</a>
                                                            <form id="activate_user_{{ $user->id }}_form" action="{{ route('admin_activate_user', [$user->id]) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary" href="{{ route('admin_edit_user', [$user->id]) }}">Edit User</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete_user_{{ $user->id }}_form').submit();">Delete User</a>
                                                        <form id="delete_user_{{ $user->id }}_form" action="{{ route('admin_delete_user', [$user->id]) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/assets/demo/chart-area-demo.js"></script>
        <script src="/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="/js/datatables-simple-demo.js"></script>
    </body>
</html>
