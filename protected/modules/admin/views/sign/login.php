<?php
    $this->pageTitle = '登录';
?>

<?php $form = $this->beginWidget('CActiveForm' , array('htmlOptions'=>array('class'=>'login-form'))); ?>
    <h3 class="form-title">登陆</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> 请填写用户名或密码 </span>
    </div>
    <?php echo $form->errorsummary($model,'<button class="close" data-close="alert"></button>','',array('firstError'=>'true' ,'class'=>'alert alert-danger')) ?>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">用户名</label>
        <?php echo $form->textField($model,'name',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'用户名','autocomplete'=>'off')) ?>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">密码</label>
        <?php echo $form->passwordField($model,'password',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'密码','autocomplete'=>'off')) ?>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">Login</button>
        <label class="rememberme check">
            <?php echo $form->checkBox($model,'rememberMe')?>Remember
        </label>
    </div>
<?php $this->endWidget(); ?>