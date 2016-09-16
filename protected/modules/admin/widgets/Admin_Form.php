<?php
/**
 * User: JiangTao
 * Date: 16/7/16
 * Time: 下午9:36
 */
class Admin_Form extends CActiveForm{

    public $enableClientValidation=true;

    public $errorMessageCssClass = 'help-block';

    public $clientOptions =array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'errorCssClass'=>'has-error',
        'afterValidate'=>'js:function(form, data, hasError){if(hasError){for(id in data){$("#"+id).parents(".form-group").addClass("has-error");}}else{return true;}}'
    );
    public $htmlOptions = array(
        'class'=>'form-horizontal'
    );

}