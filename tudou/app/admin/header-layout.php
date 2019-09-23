<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tudou-Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/tudou/public/admin/base/images/logo.png">
    <link rel="stylesheet" href="/tudou/public/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/tudou/public/admin/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="/tudou/public/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/tudou/public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/tudou/public/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="/tudou/public/admin/plugins/datepicker/datepicker3.css">
    <script src="/tudou/public/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <style>
        *{
            font-family:"Microsoft YaHei";
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            vertical-align:middle;
            text-align:center;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin-top: -25px">
<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">
            <span class="logo-mini">Admin</span>
            <span class="logo-lg">Tudou Admin</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">pull</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/tudou/<?php echo $_SESSION['admin']['avatar'] ?>"
                                 class="user-image" alt="User Image">
                            <?php if(isset($_SESSION['admin'])) ?>
                            <span class="hidden-xs"><?php echo $_SESSION['admin']['name']  ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/tudou<?php echo $_SESSION['admin']['avatar'] ?>"
                                     class="img-circle" alt="User Image">
                                <p>
                                    admin
                                    <small><?php echo date('Y-m-d',time()) ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    <a href="javascript:void(0)" class="btn btn-default btn-flat" onclick="logout()">logout</a>
                                </div>
                            </li>
                             <script>
                               
                                function logout(){
                                     
                                     $.get("/tudou/app/admin/handler/logout.handler.php",{}, function(data){
                                        if( data.result == 1 ){
                                            alert('logout success！');
                                            window.location.href="/tudou/app/home/login.php"; 
                                        }
                                        if( data.result == 0 ){
                                            alert('logout error！');
                                        }
                                    },'json');
                                }   
                            </script>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/tudou<?php echo $_SESSION['admin']['avatar'] ?>" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                     <?php if(isset($_SESSION['admin'])) ?>
                    <p><?php echo $_SESSION['admin']['name']  ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
       
            <ul class="sidebar-menu">
                <li class="header">menu</li>
                <li class="treeview">
                    <a href="/tudou/app/admin/movies.php">
                        <i class="fa fa-film" aria-hidden="true"></i>
                        <span>Films</span>
                    </a>
                <li class="treeview">
                    <a href="/tudou/app/admin/comments.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>Comments</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/tudou/app/admin/user.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Users</span>
                    </a>
                </li>
                   <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span>Admin</span>
                      
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/tudou/app/admin/edit_password.php">
                                <i class="fa fa-circle-o"></i> reset password
                            </a>
                        </li>
                        <li>
                            <a href="/tudou/app/admin/admin.php">
                                <i class="fa fa-circle-o"></i> info
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>