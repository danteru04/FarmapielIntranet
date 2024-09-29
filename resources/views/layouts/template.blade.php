<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('Descripcion','Plataforma interna de FARMAPIEL diseñada para centralizar la información y 
        facilitar la comunicación entre empleados. Accede a anuncios, mensajes por área, descuentos, contactos, y recursos clave para optimizar el flujo de 
        información en la empresa')">
    <meta name="author" content="Dante Isaac Reyes Ugalde">

    <link href="/sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Home2.css">
    <title>@yield("Title", "INTRANET FARMAPIEL")</title>
</head>
<body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <span class="fas fa-logoFarmapiel"></span>
                </div>
                <div class="sidebar-brand-text mx-3">Farmapiel Intranet</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-house-user"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Sobre Nosotros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Farmapiel</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Custom Components:</h6-->
                        <a class="collapse-item" href=>Nosotros</a>
                        <a class="collapse-item" href=>Noticias</a>
                        <a class="collapse-item" href=>Organigrama</a>
                        <a class="collapse-item" href=>Directorio</a>
                        <a class="collapse-item" href=>Contacto</a>
                    </div>
                </div>
            </li>

            @auth
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>{{auth::user()->name}}</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mis Accesos</h6>
                        <a class="collapse-item" href="utilities-color.html">Yo</a>
                        <a class="collapse-item" href="utilities-color.html">Mi área</a>
                        <a class="collapse-item" href="utilities-border.html">Descuentos</a>
                    </div>
                </div>
            </li-->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Soporte</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Soporte Técnico</h6>
                        <a class="collapse-item" href="utilities-color.html">Forumulario de Tickets</a>
                        <a class="collapse-item" href="utilities-color.html">Buzón de Sugerencias</a>
                        <a class="collapse-item" href="utilities-border.html">Descuentos</a>
                    </div>
                </div>
            </li-->

            @else
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-sign-in"></i>
                    </span>
                    <span class="text">Iniciar Sesión</span>
                </a>
            </li>

            @endauth

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar-->

<!--#######################################################################################################################
###########################################################################################################################-->


        <!--TopBar-->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">@yield("noAlertas")</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                @yield("alerts", "No hay alertas Nuevas aún")
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">@yield("noMensajes")</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                @yield("messages","No tienes Mensajes aún.")
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-pull-left fa-user"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <!--img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"-->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>


            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
            
    
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sb-admin-2/js/sb-admin-2.min.js"></script>

    
</body>
</html>