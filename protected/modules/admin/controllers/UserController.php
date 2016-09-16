<?php
/**
 *
 * User: jt
 * Date: 2016/8/26 11:33
 */

class UserController extends AdminController{

    public function actionIndex(){
/*        $auth = Yii::app()->auth->getAuthAssignments(Yii::app()->user->id);
        $auth_array = array();
        foreach($auth as $item){
            $rules = Yii::app()->auth->getItemChildren($item->itemname);
            foreach($rules as $rule){
                if(isset($auth_array[$rule->name]))
                    continue;
                array_push($auth_array,$rule->name);
            }
        }
        print_r($auth_array);die;*/
        $dataProvider =  AdminUser::model()->getList();
        $this->render('index',array('dataProvider'=>$dataProvider));
    }

    public function actionEdit($id=''){
        $model = $id=='' ? new AdminUser('create') : AdminUser::model()->findByPk($id);
        if(empty($model))
            throw new CException('参数错误');
        if(!$model->getIsNewRecord())
            $model->unsetAttributes(array('password'));
        if(Yii::app()->request->isPostRequest && $posts = $_POST['AdminUser']){
            $roles = $_POST['role'];
            $model->attributes = $posts;
            if($model->save()){
                foreach($roles as $role){
                    Yii::app()->auth->assign($role, Yii::app()->user->id);
                }
                $this->toastrRedirect(Admin_Toastr::SUCCESS_CODE,'保存成功',$this->createUrl('index'));
            }
        }
        $role = Yii::app()->auth->getRoles();
        $this->render('edit',array('model'=>$model,'role'=>$role));
    }
}