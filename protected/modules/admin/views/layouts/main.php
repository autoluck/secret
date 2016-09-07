<?php
    $assetsUrl = $this->module->assetsUrl;
    $cs = Yii::app()->clientScript;
    $baseUrl = Yii::app()->baseUrl;
    $cs->registerScriptFile($baseUrl.'/plugins/jquery.min.js',CClientScript::POS_HEAD);
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
    <title><?php echo $this->pageTitle ?> - 后台管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
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
           <?php echo $content; ?>
        </div>
    </div>
</div>
<!--<div class="page-footer">
    <div class="page-footer-inner">
        2014 &copy; Metronic by keenthemes.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>-->
</body>
</html>
