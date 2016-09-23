<?php
/**
 *
 * User: jt
 * Date: 2016/8/26 11:33
 */

class UserController extends AdminController{

    public function actionIndex(){
        $dataProvider =  AdminUser::model()->getList();
        $this->render('index',array('dataProvider'=>$dataProvider));
    }

    public function actionEdit($id=''){
        $model = $id=='' ? new AdminUser('create') : AdminUser::model()->findByPk($id);
        if(empty($model))
            throw new CException('参数错误');
        if(!$model->getIsNewRecord())
            $model->unsetAttributes(array('password'));
        $authItem = Yii::app()->auth->getAuthItems(2,$model->id);
        $role = array();
        foreach(Yii::app()->auth->getRoles() as $key => $value){
            $role[$key]['name'] = $value->name;
            $role[$key]['description'] = $value->description;
        }
        $checked_role = array();
        if($authItem){
            foreach($authItem as $item){
               $checked_role[] = $item->name;
            }
        }
        if(Yii::app()->request->isPostRequest && $posts = $_POST['AdminUser']){
            $roles = $_POST['role'];
            $model->attributes = $posts;
            if($model->save()){
                    foreach ($roles as $val) {
                        if($model->getIsNewRecord()){
                            Yii::app()->auth->assign($val, Yii::app()->user->id);
                        }else{
                            foreach($checked_role as $checked){

                            }
                        }
                    }
                $this->toastrRedirect(Admin_Toastr::SUCCESS_CODE,'保存成功',$this->createUrl('index'));
            }
        }
        $this->render('edit',array('model'=>$model,'role'=>$role));
    }
}