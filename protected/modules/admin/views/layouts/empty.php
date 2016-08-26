<?php
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$baseUrl = Yii::app()->baseUrl;
$cs->registerScriptFile($baseUrl.'/plugins/jquery.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/jquery-migrate.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/bootstrap/js/bootstrap.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/jquery.blockui.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/uniform/jquery.uniform.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/jquery.cokie.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/plugins/jquery-validation/js/jquery.validate.min.js',CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl.'/scripts/metronic.js',CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl.'/scripts/demo.js',CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl.'/scripts/login.js',CClientScript::POS_END);

$js = 'jQuery(document).ready(function() {
                    Metronic.init(); // init metronic core components
                    Demo.init();
           });';
$cs->registerScript('PUBLIC_JS',$js,CClientScript::POS_END);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?php echo $this->pageTitle ?> - 后台管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <?php
    $cs->registerCssFile($baseUrl.'/plugins/font-awesome/css/font-awesome.min.css');
    $cs->registerCssFile($baseUrl.'/plugins/simple-line-icons/simple-line-icons.min.css');
    $cs->registerCssFile($baseUrl.'/plugins/bootstrap/css/bootstrap.min.css');
    $cs->registerCssFile($baseUrl.'/plugins/uniform/css/uniform.default.css');
    $cs->registerCssFile($assetsUrl.'/css/login.css');
    $cs->registerCssFile($assetsUrl.'/css/components-md.css');
    $cs->registerCssFile($assetsUrl.'/css/plugins-md.css');
    $cs->registerCssFile($assetsUrl.'/css/layout.css');
    $cs->registerCssFile($assetsUrl.'/css/themes/default.css');
    $cs->registerCssFile($assetsUrl.'/css/custom.css');
    ?>
</head>
<body class="page-md login">
<div class="logo">
    <a href="index.html">
        <img src="<?php echo $assetsUrl ?>/img/logo-big.png" alt=""/>
    </a>
</div>
<div class="menu-toggler sidebar-toggler"></div>
<div class="content"><?php echo $content; ?></div>
<div class="copyright">
    2014 &copy; Metronic. Admin Dashboard Template.
</div>
</body>
</html>