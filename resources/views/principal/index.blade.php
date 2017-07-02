    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>
    <link href="<?=URL::to('bootstrap/css/bootstrap.min.css'); ?> " rel="stylesheet">
    <link rel="stylesheet" href="<?=URL::to('css/custom.min.css'); ?>">
    <link rel="stylesheet" href="<?=URL::to('css/sweetalert.css'); ?>">
    <link rel="stylesheet" href="<?=URL::to('font-awesome/css/font-awesome.min.css'); ?>">
    @yield('estilo')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{URL::to('/')}}" class="site_title"><i class="fa fa-bitbucket"></i> <span>BI</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                     <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?=URL::to('images/img.jpg'); ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div> 
                      <br />
                    <!-- /menu profile quick info -->            
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                      <div class="menu_section">
                        <br>
                        <ul class="nav side-menu">
                            @if(Auth::user()->tipo>1)
                             <li><a href="{{URL::to('prestamo')}}"><i class="fa fa-home"></i> PRESTAMOS <span class="fa fa-chevron-right"></span></a>
                                
                            </li>
                             <li><a href="{{URL::to('gestionar')}}"><i class="fa fa-home"></i> GESTIONAR <span class="fa fa-chevron-right"></span></a>                           
                             <li><a href="{{URL::to('reporte')}}"><i class="fa fa-home"></i> REPORTES <span class="fa fa-chevron-right"></span></a>
                            <li><a href="{{URL::to('sancion')}}"><i class="fa fa-home"></i> SANCIONES <span class="fa fa-chevron-right"></span></a>                               
                            </li>
                            
                            @elseif(Auth::user()->tipo==1)
                             <li><a href="{{URL::to('prestamo_busqueda')}}"><i class="fa fa-home"></i> LIBROS<span class="fa fa-chevron-right"></span></a>
                                </li>
                             <li><a href="{{URL::to('prestamo_usuario')}}"><i class="fa fa-home"></i> PRESTAMOS<span class="fa fa-chevron-right"></span></a>
                                </li>
                            @endif
                         
                        </ul>
                      </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                      <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                      </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        {{-- <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div> --}}
                        {{-- <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""> {{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> perfil</a></li>
                                    <li><a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>                                        
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                              Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                              Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>                        
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
            
           @yield('content') 
            
            </div>
            <footer>
                <div class="pull-right">
        
                </div>
                <div class="clearfix"></div>
            </footer>
        <!-- /footer content -->
        </div>
    </div>
</body>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
    <script src="<?=URL::to('js/custom.min.js'); ?>"></script>
    
    <script src="<?=URL::to('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?=URL::to('js/sweetalert-dev.js'); ?>"></script>
    @yield('script')
    