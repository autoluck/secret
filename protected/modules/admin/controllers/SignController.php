<?php
/**
 * User: jiangtao
 * Date: 2016/8/21
 * Time: 20:26
 */
class SignController extends AdminController{

    public $layout = '/layouts/empty';

    public function actionLogin(){
        if(!Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->user->returnUrl);
        }
        $model = new Admin_LoginForm();
        if(Yii::app()->request->isPostRequest && !empty($_POST['Admin_LoginForm'])){
            $model->attributes = $_POST['Admin_LoginForm'];
            if($model->validate() && $model->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('login',array('model'=>$model));
    }

}