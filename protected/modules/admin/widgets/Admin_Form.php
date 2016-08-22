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
        'errorCssClass'=>'has-error'
    );
    public $htmlOptions = array(
        'class'=>'form-horizontal adminex-form'
    );
}