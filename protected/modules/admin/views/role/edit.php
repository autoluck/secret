<?php
$this->pageTitle = '新增角色';
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/plugins/jstree/dist/themes/default/style.min.css");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/jstree/dist/jstree.js",CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl."/scripts/permissionTree.js",CClientScript::POS_END);
$js = <<<EOF
     var _permissionsTree;
     _permissionsTree = new PermissionsTree();
            _permissionsTree.init($('#container'));
     $("#tree-form").submit(function(){
           var rules = _permissionsTree.getSelectedPermissionNames();
           var input = $("<input>").attr("type", "hidden").attr('name', "RoleForm[rule]").val(rules);
           $(this).append($(input));
           return true;
     })
EOF;
Yii::app()->clientScript->registerScript(__CLASS__."#js",$js,CClientScript::POS_READY);
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
        <?php $form = $this->beginWidget('Admin_Form',array('id'=>'tree-form')); ?>
        <?php echo $form->hiddenField($model,'old_name'); ?>
        <div class="form-body">
            <div class="form-group <?php if($model->hasErrors('name')){echo 'has-error';} ?>">
                <label class="col-md-3 control-label">角色名称</label>
                <div class="col-md-4">
                    <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'name'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">描述</label>
                <div class="col-md-4">
                    <?php echo $form->textField($model,'description',array('class'=>'form-control')) ?>
                    <?php echo $form->error($model,'description')?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">权限</label>
            <div class="col-md-4">
                <div id="container">
                    <ul>
                        <?php foreach($data as $el=>$item): ?>
                        <li id="<?php  echo $el ; ?>"  <?php if($item['child'] && (isset($rule) && $rule[$el])){ ?> data-jstree='{ "selected" : true , "opened" : true }' <?php }elseif($item['child']){  ?>data-jstree='{"opened" : true }' <?php }elseif(isset($rule) && $rule[$el]){ ?> data-jstree='{ "selected" : true }' <?php }?>><?php  echo $item['name'] ; ?>
                           <?php if($item['child']){ ?>
                                <ul>
                                    <?php foreach($item['child'] as $key=>$val): ?>
                                     <li id="<?php  echo $key ; ?>" <?php if(isset($rule) && $rule[$key]){ ?>data-jstree='{ "selected" : true }' <?php } ?>><?php  echo $val['name'] ; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit"  class="btn green"><i class="fa fa-save"></i>保存</button>
                    <a type="button" class="btn default">取消</a>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
        <!-- END FORM-->
    </div>
</div>
