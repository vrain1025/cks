<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:72:"E:\UPUPW_NP5.6\htdocs\cks2\public/../apps/index\view\user_list\list.html";i:1543220269;s:59:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\head.html";i:1542949776;s:58:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\top.html";i:1543222006;s:59:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\left.html";i:1543202993;s:59:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\menu.html";i:1543220275;s:59:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\foot.html";i:1543220057;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<title>:: 中橡狼牌轮胎 :: </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="中橡狼牌轮胎 仓库管理系统">
<meta name="author" content="系统制作, design by: 谷川">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="/static/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="/static/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="/static/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="/static/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="/static/vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="/static/vendor/nouislider/nouislider.min.css" />
<!-- MAIN CSS -->
<link rel="stylesheet" href="/static/css/main.css">
<link rel="stylesheet" href="/static/css/color_skins.css"></head>





<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="/static/images/thumbnail.png" width="48" height="48" alt="中橡狼牌轮胎"></div>
                <p>载入中，请...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay" style="display: none;"></div>
        <div id="wrapper">
            <!-- 引入头部文件 -->
            <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="index.html">
                    <img src="/static/images/logo-icon.svg" alt="中橡狼牌轮胎 Logo" class="img-responsive logo">
                    <span class="name">中橡狼牌轮胎</span>
                </a>
            </div>
            
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu icon-reorder"></i></button>
                        </div>                        
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="icon-reorder"></i></a>
                    </li>
                    <li>
                        <form id="navbar-search" class="navbar-form search-form">
                            <input value="" class="form-control" placeholder="搜索" type="text">
                            <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                        </form>
                    </li>
                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                              
                          
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="/static/images/user-small.png" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="/static/images/user-small.png" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4><?php echo \think\Request::instance()->session('username'); ?></h4>
                                                <p class="user-name"></p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="<?php echo url('index/login/logout'); ?>"><i class="icon-user"></i>用户信息</a></li>
                                                <li><a href="<?php echo url('index/login/logout'); ?>"><i class="icon-user-following"></i>操作员</a></li>
                                                <li><a href="<?php echo url('index/login/logout'); ?>"><i class="icon-settings"></i>修改密码</a></li>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo url('index/login/logout'); ?>"><i class="icon-power"></i>退出登陆</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                         
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            <!-- 引入左侧导航 -->
                <div id="leftsidebar" class="sidebar">
        <div class="sidebar-scroll">
           <nav id="leftsidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="heading">导航菜单</li>
                    <li class="active"><a href="<?php echo url('index/index/index'); ?>"><i class="icon-home"></i><span>数据展示板</span></a></li>
                    <li class="heading">常用查询</li>
                    <li><a href="<?php echo url('index/mtk/index'); ?>"><i class="icon-diamond"></i><span>母胎存库查询</span></a></li>
                    <li><a href="<?php echo url('index/cpk/index'); ?>"><i class="icon-pencil"></i><span>成品库存查询</span></a></li>
                    <li><a href="<?php echo url('index/cpck/outBound'); ?>"><i class="icon-tag"></i><span>出库查询</span></a></li>                 
                    <li class="heading">仓库系统</li>
                    <li class="middle">
                        <a href="#uiElements" class="has-arrow"><i class="icon-cog"></i><span>母胎库</span></a>
                        <ul>
                            <li><a href="<?php echo url('index/mtk/index'); ?>">母胎库存统计</a></li>
                            <li><a href="<?php echo url('index/mtk/query'); ?>">母胎信息检索</a></li>                         
                            <li><a href="<?php echo url('index/mtk/batchQuery'); ?>">母胎条码批量查询</a></li>
                            <li><a href="<?php echo url('index/mtk/wareHousing'); ?>">母胎扫码入库</a></li>                     
                        </ul>
                    </li>
                           <li>
                        <a href="#forms" class="has-arrow"><i class="icon-legal"></i><span>半成品库</span></a>
                        <ul>
                            <li><a href="<?php echo url('index/bcpk/index'); ?>">半成品库存统计</a></li>
                            <li><a href="<?php echo url('index/bcpk/query'); ?>">半成品信息检索</a></li>
                            <li><a href="<?php echo url('index/bcpk/batchQuery'); ?>">半成品条码批量查询</a></li>
                            <li><a href="<?php echo url('index/bcpk/wareHousing'); ?>">半成品扫码入库</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#forms" class="has-arrow"><i class=" icon-cogs"></i><span>成品库</span></a>
                        <ul>
                            <li><a href="<?php echo url('index/cpk/index'); ?>">成品库存统计</a></li>
                            <li><a href="<?php echo url('index/cpk/query'); ?>">成品信息检索</a></li>
                            <li><a href="<?php echo url('index/cpk/batchQuery'); ?>">成品条码批量查询</a></li>
                            <li><a href="<?php echo url('index/cpk/wareHousing'); ?>">成品扫码入库</a></li>
                            <li><a href="<?php echo url('index/cpk/daliySheet'); ?>">成品日报表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#Tables" class="has-arrow"><i class="icon-truck"></i><span>成品出库</span></a>
                        <ul>
                            <li><a href="<?php echo url('index/cpck/index'); ?>">出库统计</a></li>
                            <li><a href="<?php echo url('index/cpck/query'); ?>">出库信息检索</a></li>
                            <li><a href="<?php echo url('index/cpck/batchQuery'); ?>">出库条码批量查询</a></li>
                            <li><a href="<?php echo url('index/cpck/wareHousing'); ?>">成品扫码出库</a></li>
                            <li><a href="<?php echo url('index/cpck/outBound'); ?>">成品出库查询</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#FileManager" class="has-arrow"><i class="icon-warning-sign"></i><span>不良品库</span></a>
                        <ul>                                    
                            <li><a href="<?php echo url('index/blpk/index'); ?>">不良品统计</a></li>
                            <li><a href="<?php echo url('index/blpk/query'); ?>">不良品信息检索</a></li>
                            <li><a href="<?php echo url('index/blpk/batchQuery'); ?>">不良品条码批量查询</a></li>
                            <li><a href="<?php echo url('index/blpk/wareHousing'); ?>">不良品扫码入库</a></li>
                            <li><a href="<?php echo url('index/blpk/outBound'); ?>">不良品扫码出库</a></li>
                        </ul>
                    </li>  

                    <li>
                        <a href="#Widgets" class="has-arrow"><i class=" icon-signin"></i><span>退货库</span></a>
                        <ul>                                    
                            <li><a href="<?php echo url('index/thk/index'); ?>">退货统计</a></li>
                            <li><a href="<?php echo url('index/thk/query'); ?>">退货信息检索</a></li>
                            <li><a href="<?php echo url('index/thk/batchQuery'); ?>">退货条码批量查询</a></li>
                            <li><a href="<?php echo url('index/thk/wareHousing'); ?>">退货扫码入库</a></li>
                            <li><a href="<?php echo url('index/thk/outBound'); ?>">退货扫码出库</a></li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="#FileManager" class="has-arrow"><i class="icon-trash"></i><span>废品库</span></a>
                        <ul>                                    
                            <li><a href="<?php echo url('index/fpk/index'); ?>">废品统计</a></li>
                            <li><a href="<?php echo url('index/fpk/query'); ?>">废品信息检索</a></li>
                            <li><a href="<?php echo url('index/fpk/batchQuery'); ?>">废品条码批量查询</a></li>
                            <li><a href="<?php echo url('index/fpk/wareHousing'); ?>">废品扫码入库</a></li>
                            <li><a href="<?php echo url('index/fpk/outBound'); ?>">废品扫码出库</a></li>
                        </ul>
                    </li> 
                     <li>
                        <a href="#FileManager" class="has-arrow"><i class="icon-user"></i><span>用户管理</span></a>
                        <ul>                                    
                            <li><a href="<?php echo url('index/AuthGroup/userlist'); ?>">用户列表</a></li>
                            <li><a href="<?php echo url('index/AuthGroup/authList'); ?>">权限管理</a></li>                          
                        </ul>
                    </li>                                         
                </ul>
            </nav>
        </div>
    </div>
                 <div id="mega_menubar" class="mega_menubar">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Subscribe</h2>
                        </div>
                        <div class="body">
                            <form>
                                <div class="form-group">
                                    <input type="text" value="" placeholder="Enter Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="" placeholder="Enter Email" class="form-control">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Accordion</h2>
                        </div>
                        <div class="body">
                            <ul class="accordion2">
                                <li class="accordion-item is-active">
                                    <h3 class="accordion-thumb"><span>Lorem ipsum</span></h3>
                                    <p class="accordion-panel">
                                        Lorem ipsum dolor sit amet, elit. Placeat, quibusdam! Voluptate nobis
                                    </p>
                                </li>
                                
                                <li class="accordion-item">
                                    <h3 class="accordion-thumb"><span>Dolor sit amet</span></h3>
                                    <p class="accordion-panel">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing  Voluptate nobis
                                    </p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Company</h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled links">
                                <li><a href="javascript:void(0);" title="" >Our Facts</a></li>
                                <li><a href="javascript:void(0);" title="" >Confidentiality</a></li>                                
                                <li><a href="javascript:void(0);" title="" >About Us</a></li>
                                <li><a href="javascript:void(0);" title="" >Testimonials</a></li>
                                <li><a href="javascript:void(0);" title="" >Contact Us</a></li>                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Image Gallery</h2>
                        </div>
                        <div class="body">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="/static/images/image-gallery/1.jpg" class="img-fluid" alt="img" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/static/images/image-gallery/2.jpg" class="img-fluid" alt="img" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/static/images/image-gallery/3.jpg" class="img-fluid" alt="img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins" aria-expanded="true">中橡狼牌轮胎</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact" aria-expanded="false">Contact</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Timeline" aria-expanded="false">Timeline </a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane animated fadeIn in active" id="skins" aria-expanded="true">
                <div class="sidebar-scroll">
                    <div class="card">
                        <div class="header">
                            <h2>General Setting</h2>
                        </div>
                        <div class="body">
                            <ul class="setting-list list-unstyled">
                                <li>
                                    <label for="checkbox1" class="fancy-checkbox">
                                        <input id="checkbox1" type="checkbox">
                                        <span>Report Panel Usage</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="checkbox2" class="fancy-checkbox">
                                        <input id="checkbox2" type="checkbox" checked>
                                        <span>Email Redirect</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="checkbox3" class="fancy-checkbox">
                                        <input id="checkbox3" type="checkbox" checked>
                                        <span>Notifications</span>
                                    </label>         
                                </li>
                                <li>
                                    <label for="checkbox4" class="fancy-checkbox">
                                        <input id="checkbox4" type="checkbox">
                                        <span>Auto Updates</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="checkbox5" class="fancy-checkbox">
                                        <input id="checkbox5" type="checkbox">
                                        <span>Offline</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="checkbox6" class="fancy-checkbox">
                                        <input id="checkbox6" type="checkbox">
                                        <span>Location Permission</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Color Skins</h2>
                        </div>
                        <div class="body">
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                    <span>Purple</span>
                                </li>                   
                                <li data-theme="blue" class="active">
                                    <div class="blue"></div>
                                    <span>Blue</span>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                    <span>Cyan</span>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                    <span>Green</span>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                    <span>Orange</span>
                                </li>
                                <li data-theme="blush">
                                    <div class="blush"></div>
                                    <span>Blush</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Storage</h2>
                        </div>
                        <div class="body">
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                                </div>
                            </div>
                            <small>50MB of 10GB Used</small>
                            <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="contact" aria-expanded="false">
                <div class="sidebar-scroll">
                    <div class="card">
                        <div class="header">
                            <h2>Recent Chat</h2>
                        </div>
                        <div class="body">
                            <ul class="right_chat list-unstyled">
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="/static/images/xs/avatar4.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Chris Fox</span>
                                                <span class="message">Angular Champ</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="/static/images/xs/avatar5.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Joge Lucky</span>
                                                <span class="message">Sales Lead</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="/static/images/xs/avatar2.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Isabella</span>
                                                <span class="message">CEO, Thememakker</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="/static/images/xs/avatar1.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Folisise Chosielie</span>
                                                <span class="message">PHP Expert</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="/static/images/xs/avatar3.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Alexander</span>
                                                <span class="message">eCommerce Master</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>                        
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Contact List</h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled contact-list">
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar1.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar2.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar3.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Aiden Chavaz</h4>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar4.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar5.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="contact-img">
                                        <img src="/static/images/xs/avatar6.jpg" class="rounded" alt="">
                                    </span>
                                    <h4 class="contact-name">Aiden Chavaz</h4>
                                </li>                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="Timeline" aria-expanded="false">
                <div class="sidebar-scroll">
                    <div class="card">
                        <div class="header">
                            <h2>My Stats</h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled basic-list">
                                <li><i class="icon-book-open m-r-5"></i> Active Projects <span class="badge badge-primary">21</span></li>
                                <li><i class="icon-list m-r-5"></i> Task Pending <span class="badge-purple badge">50</span></li>
                                <li><i class="fa fa-ticket m-r-5"></i> Support Tickets<span class="badge-success badge">9</span></li>
                                <li><i class="icon-tag m-r-5"></i> New Projects<span class="badge-info badge">7</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="new_timeline mt-3">
                                <div class="header">
                                    <div class="color-overlay">
                                        <div class="day-number">8</div>
                                        <div class="date-right">
                                        <div class="day-name">Monday</div>
                                        <div class="month">July 2018</div>
                                        </div>
                                    </div>                                
                                </div>
                                <ul>
                                    <li>
                                        <div class="bullet pink"></div>
                                        <div class="time">11am</div>
                                        <div class="desc">
                                            <h3>Attendance</h3>
                                            <h4>Computer Class</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet green"></div>
                                        <div class="time">12pm</div>
                                        <div class="desc">
                                            <h3>Developer Team</h3>
                                            <h4>Hangouts</h4>
                                            <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                                                <li><img src="/static/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="/static/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="/static/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="/static/images/xs/avatar4.jpg" alt="Avatar"></li>                                            
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet orange"></div>
                                        <div class="time">1:30pm</div>
                                        <div class="desc">
                                            <h3>Lunch Break</h3>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet green"></div>
                                        <div class="time">2pm</div>
                                        <div class="desc">
                                            <h3>Finish</h3>
                                            <h4>Go to Home</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>用户列表</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">用户管理</li>
                            <li class="breadcrumb-item active">用户列表</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body project_report">
                            <div class="table-responsive">
                                <table class="table m-b-0 table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>用户状态</th>
                                            <th>用户名</th>
                                            <th>用户级别</th>                                       
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="badge badge-success">Active</span>
                                            </td>
                                            <td class="project-title">
                                                <h6><a href="javascript:void(0);">InfiniO 4.1</a></h6>
                                                <small>Created 14.Mar.2018</small>
                                            </td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;"></div>                                                
                                                </div>
                                                <small>Completion with: 48%</small>
                                            </td>                                 
                                            <td class="project-actions">
                                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="icon-eye"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="icon-pencil"></i></a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


                        <!-- Javascript -->
<script src="/static/bundles/libscripts.bundle.js"></script>    
<script src="/static/bundles/vendorscripts.bundle.js"></script>
<!-- 
<script src="/static/bundles/chartist.bundle.js"></script>
<script src="/static/bundles/knob.bundle.js"></script> 
<script src="/static/bundles/flotscripts.bundle.js"></script>
<script src="/static/js/dialog.js"></script> 
<script src="/static/vendor/flot-charts/jquery.flot.selection.js"></script> -->
<script src="/static/bundles/mainscripts.bundle.js"></script>
<script src="/static/assets/js/index.js"></script>
<script src="/static/js/num.js"></script>
<script src="/static/vendor/layer/layer.js"></script>

<script src="/static/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
<script src="/static/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script>     
<script src="/static/assets/bundles/morrisscripts.bundle.js"></script>
<script src="/static/assets/js/pages/forms/advanced-form-elements.js"></script>
</body>

</html>