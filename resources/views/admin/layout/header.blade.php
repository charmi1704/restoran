
<?php
if (session()->has('ses_adminid')) {
 
}
else
{
    echo "<script>window.location='/admin_login';</script>";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Two Page</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ url('admin/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ url('admin/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ url('admin/assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
</head>
<body>
@include('sweetalert::alert');
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
               

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="{{ url('admin/assets/img/find_user.png')}}" class="img-responsive" />
                <a href="admin_logout" class="btn btn-danger" title="Logout">Logout</a>

                        <div class="inner-text">
                                <?php //echo $_SESSION['aname']?>
                            <br />
                                <h1>Hi .. {{session()->get('ses_adminname')}} </h1>
                            </div>
                           
            
                    </li>


                    <li>
                        <a href="amain"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>

                    
                    


                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Menu<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_menu">add</a>
                            </li>
                            <li>
                                <a href="manage_menu">Manage</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Sevice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_service">add</a>
                            </li>
                            <li>
                                <a href="manage_service">Manage</a>
                            </li>
                            
                        </ul>
                    </li>

                    

                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>team<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_team">add</a>
                            </li>
                            <li>
                                <a href="manage_team">Manage</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="manage_booking"><i class="fa fa-edit "></i>Booking </a>
                    </li>

                    <li>
                        <a href="manage_contact"><i class="fa fa-edit "></i>Contact </a>
                    </li>

                    <li>
                        <a href="manage_user"><i class="fa fa-edit "></i>User </a>
                    </li>
                    <li>
                        <a href="blank"><i class="fa fa-table "></i>Blank Page</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->