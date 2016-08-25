<?php
    $assetsUrl = $this->module->assetsUrl;
    $cs = Yii::app()->clientScript;
    $baseUrl = Yii::app()->baseUrl;
    $cs->registerScriptFile($baseUrl.'/plugins/jquery.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/jquery-migrate.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/jquery-ui/jquery-ui.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/bootstrap/js/bootstrap.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/jquery-slimscroll/jquery.slimscroll.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/jquery.blockui.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/jquery.cokie.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/uniform/jquery.uniform.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/plugins/bootstrap-switch/js/bootstrap-switch.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($assetsUrl.'/scripts/metronic.js',CClientScript::POS_END);
    $cs->registerScriptFile($assetsUrl.'/scripts/layout.js',CClientScript::POS_END);
    $cs->registerScriptFile($assetsUrl.'/scripts/demo.js',CClientScript::POS_END);
    $js = 'jQuery(document).ready(function() {
                    Metronic.init(); // init metronic core components
                    Layout.init(); // init current layout
                    Demo.init(); // init demo features
           });';
    $cs->registerScript('PUBLIC_JS',$js,CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title><?php $this->pageTitle ?> | 后台管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <?php
        $cs->registerCssFile($baseUrl.'/plugins/font-awesome/css/font-awesome.min.css');
        $cs->registerCssFile($baseUrl.'/plugins/simple-line-icons/simple-line-icons.min.css');
        $cs->registerCssFile($baseUrl.'/plugins/bootstrap/css/bootstrap.min.css');
        $cs->registerCssFile($baseUrl.'/plugins/uniform/css/uniform.default.css');
        $cs->registerCssFile($baseUrl.'/plugins/bootstrap-switch/css/bootstrap-switch.min.css');
        $cs->registerCssFile($assetsUrl.'/css/components-md.css');
        $cs->registerCssFile($assetsUrl.'/css/plugins-md.css');
        $cs->registerCssFile($assetsUrl.'/css/layout.css');
        $cs->registerCssFile($assetsUrl.'/css/themes/light.css');
        $cs->registerCssFile($assetsUrl.'/css/custom.css');
    ?>
    <!-- END THEME STYLES -->
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo">
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <a href="index.html">
                <img src="<?php echo $assetsUrl ?>/img/logo-light.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile"> Nick </span>
                            <img alt="" class="img-circle" src="<?php echo $assetsUrl ?>/img/avatar9.jpg"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="extra_profile.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="page_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
								3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="page_todo.html">
                                    <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
								7 </span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="extra_lock.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
            <?php $this->widget('Admin_Menu'); ?>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Blank Page <small>blank page</small></h1>
                </div>
            </div>
            <div class="note note-info note-bordered">
                <h3>欢迎使用ASP.NET Zero启动项目!<span class="close" data-close="note"></span></h3>
                <p>

                    在这个演示系统，您可以使用左边的菜单功能，测试和了解以下模块的全部功能：用户管理、角色管理、系统设置。
                    主面板(Dashboard)页面只是用于演示目的，文本和数据没有什么含义(所有数据都是硬编码在浏览器客户端程序；
                    其中的MEMBER ACTIVITY图表，向服务器端请求简单随机数据用于展示，当您点击刷新按钮时，可以看到变化。)

                </p>
                <br>
                <h4>查找多页面应用版本号</h4>
            </div>
            <div class="row margin-top-10">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                    <div class="dashboard-stat2">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">168,492<small class="font-green-sharp">$</small></h3>
                                <small>TOTAL PROFIT</small>
                            </div>
                            <div class="icon">
                                <i class="icon-pie-chart"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
								<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">76% progress</span>
								</span>
                            </div>
                            <div class="status">
                                <div class="status-title">
                                    progress
                                </div>
                                <div class="status-number">
                                    76%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">12127</h3>
                                <small>TOTAL ORDERS</small>
                            </div>
                            <div class="icon">
                                <i class="icon-like"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
								<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
								<span class="sr-only">85% change</span>
								</span>
                            </div>
                            <div class="status">
                                <div class="status-title">
                                    change
                                </div>
                                <div class="status-number">
                                    85%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-blue-sharp">670.54<small class="font-blue-sharp">$</small></h3>
                                <small>AVERAGE ORDER</small>
                            </div>
                            <div class="icon">
                                <i class="icon-basket"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
								<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
								<span class="sr-only">45% grow</span>
								</span>
                            </div>
                            <div class="status">
                                <div class="status-title">
                                    grow
                                </div>
                                <div class="status-number">
                                    45%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-footer">
    <div class="page-footer-inner">
        2014 &copy; Metronic by keenthemes.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
</body>
</html>
