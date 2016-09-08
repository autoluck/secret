<?php
/**
 *
 * User: jt
 * Date: 2016/8/26 11:33
 */

class UserController extends AdminController{

    public function actionList(){
        $dataProvider =  AdminUser::model()->getList();
        $this->render('list',array('dataProvider'=>$dataProvider));
    }
}