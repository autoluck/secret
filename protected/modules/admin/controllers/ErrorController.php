<?php
/**
 * User: jiangtao
 * Date: 2016/9/18
 * Time: 20:54
 */
class ErrorController extends AdminController{

    public function actionIndex(){
        $error = Yii::app()->errorHandler->error;
        $this->render('index',array('error'=>$error));
    }
}