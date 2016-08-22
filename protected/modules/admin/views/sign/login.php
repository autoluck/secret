<?php
$this->pageTitle = '后台登陆';
$cs = Yii::app()->clientScript;
$baseUrl = $this->module->assetsUrl;
$cs->registerScriptFile($baseUrl.'/js/form.js',CClientScript::POS_END);
$name = 'name';
$password = 'password';
$js = "$('.ui.form').form({
      fields: {
            name: {
              identifier: '".CHtml::resolveName($model,$name)."',
              rules: [
                {
                  type   : 'empty',
                  prompt : '请输入用户名'
                },
              ]
            },
            password: {
              identifier: '".CHtml::resolveName($model,$password)."',
              rules: [
                {
                  type   : 'empty',
                  prompt : '请输入密码'
                }
              ]
            }
      }
})";
$cs->registerScript(__CLASS__.'#js',$js,CClientScript::POS_READY);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <link href="<?php echo $baseUrl; ?>/dist/semantic.min.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/css/login.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/dist/components/form.css" rel="stylesheet">
    <title><?php echo $this->pageTitle?> - Secret</title>
</head>
<body>
<div class="ui top aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                <?php echo $this->pageTitle?>
            </div>
        </h2>
        <?php $form = $this->beginWidget('CActiveForm',array('htmlOptions'=>array('class'=>'ui large form'))) ?>
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <?php echo $form->textField($model,'name',['class'=>'form-control','placeholder'=>'用户名']) ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?php echo $form->passwordField($model,'password',['class'=>'form-control','placeholder'=>'密码']) ?>
                    </div>
                </div>
                <div class="ui fluid large teal submit button">Login</div>
            </div>
            <div class="ui error message"></div>
        <?php $this->endWidget(); ?>
    </div>
</div>
</body>
