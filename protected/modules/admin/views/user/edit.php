<?php
$this->pageTitle = '编辑用户';
?>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-note font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $this->pageTitle; ?></span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?php $form = $this->beginWidget('Admin_Form'); ?>
            <div class="form-body">
                <div class="form-group <?php if($model->hasErrors('username')){echo 'has-error';} ?>">
                    <label class="col-md-3 control-label">用户名</label>
                    <div class="col-md-4">
                        <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'username');?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-4">
                            <?php echo $form->emailField($model,'email',array('class'=>'form-control')) ?>
                            <?php echo $form->error($model,'email');?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">密码</label>
                    <div class="col-md-4">
                            <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'password');?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">权限</label>
                    <div class="md-checkbox-inline col-md-4">
                        <?php foreach($role as $val): ?>
                        <div class="md-checkbox">
                            <input name="role[]" id="<?php echo $val['name']; ?>-checkbox" value="<?php echo $val['name']; ?>" type="checkbox" class="md-check" <?php if($val['checked']) {echo 'checked';} ?>>
                            <label for="<?php echo $val['name']; ?>-checkbox">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span>
                                <?php echo $val['description']; ?></label>
                        </div>
                        <?php endforeach;  ?>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green"><i class="fa fa-save"></i>保存</button>
                        <a type="button" class="btn default">取消</a>
                    </div>
                </div>
            </div>
        <?php $this->endWidget(); ?>
        <!-- END FORM-->
    </div>
</div>
