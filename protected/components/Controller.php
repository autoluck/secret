<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    public function sendResponse($code,$message='',$data=array()){
        header("Content-type:application/json");
        echo CJSON::encode(array(
            'code'=>$code,
            'msg'=>$message,
            'data'=>$data
        ));
        Yii::app()->end();
    }
}