<?php
/**
 *
 * User: jt
 * Date: 2016/8/26 11:33
 */

class UserController extends AdminController{

    public function actionIndex(){
        $this->render('list');
    }

    public function actionList(){
        $criteria = new CDbCriteria(array(
            'limit' => $_GET['length'],
            'offset' => $_GET['start']
        ));
        $count = AdminUser::model()->count($criteria);
        $admin = AdminUser::model()->findAll($criteria);
        $data = array('draw'=>(int)$_GET['draw'],'recordsTotal'=>(int)$count, 'recordsFiltered'=>(int)$count);
        foreach ($admin as $key => $item){
            $item->unsetAttributes(array('password'));
            $data['data'][$key] = array_filter($item->attributes);
        }
        echo CJSON::encode($data);
    }

}