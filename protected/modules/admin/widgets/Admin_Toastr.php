<?php
/**
 * User: jiangtao
 * Date: 2016/9/16
 * Time: 20:03
 */
class Admin_Toastr extends CWidget{
    const SUCCESS_CODE = 0;
    const INFO_CODE = 1;
    const WARNING_CODE = 2;
    const ERROR_CODE = 3;
    public $type = array('success','info','warning','error');
    public $status ;
    public $msg ;
    public $defaultOption = array();
    public function init(){
        if(!Yii::app()->user->hasFlash('info'))
            return;
        $info = Yii::app()->user->getFlash('info');
        $this->status = $this->type[$info['code']];
        $this->msg = $info['msg'];
    }

    public function run(){
        if(!$this->status || !$this->msg)
            return ;
        $js = '
        toastr.options = {
             "closeButton": true,
             "positionClass": "toast-top-right",
              "timeOut": "2000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
        };
        toastr["'.$this->status.'"]("'.$this->msg.'","");';
        Yii::app()->clientScript->registerScript(__CLASS__.'#js',$js,CClientScript::POS_READY);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap-toastr/toastr.min.css');
        Yii::app()->clientScript->registerScriptFile( Yii::app()->baseUrl.'/plugins/bootstrap-toastr/toastr.min.js');
    }
}