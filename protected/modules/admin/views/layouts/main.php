<?php
    $assetsUrl = $this->module->assetsUrl;
    $cs = Yii::app()->clientScript;
    $baseUrl = Yii::app()->baseUrl;
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
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/font-awesome/css/font-awesome.min.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/simple-line-icons/simple-line-icons.min.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/bootstrap/css/bootstrap.min.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/uniform/css/uniform.default.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/bootstrap-switch/css/bootstrap-switch.min.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/fullcalendar/fullcalendar.min.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/jqvmap/jqvmap/jqvmap.css');
        Yii::app()->clientScript->registerCss($baseUrl.'/plugins/morris/morris.css');

    ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="../../assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="../../assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="../../assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
</head>
<body>
    <?php echo $content; ?>
</body>
</html>
