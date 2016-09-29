<?php
/**
 *
 * User: jt
 * Date: 2016/8/26 11:33
 */

class UserController extends AdminController{

    public function actionIndex(){
        $dataProvider =  AdminUser::model()->getList();
        foreach ($dataProvider->data as $item ){
            $item->role = Yii::app()->auth->getAuthItems(2,$item->id);
        }
        $this->render('index',array('dataProvider'=>$dataProvider));
    }

    public function actionEdit($id=''){
        if($id == 1){
            throw new CException('管理员不能修改');
        }
        $model = $id=='' ? new AdminUser('create') : AdminUser::model()->findByPk($id);
        if(empty($model))
            throw new CException('参数错误');
        if(!$model->getIsNewRecord())
            $model->unsetAttributes(array('password'));
        $role = array();
        foreach(Yii::app()->auth->getRoles() as $key => $value){
            $role[$key]['name'] = $value->name;
            $role[$key]['description'] = $value->description;
        }
        $checked_role = array();
        if(!$model->getIsNewRecord() &&  $authItem = Yii::app()->auth->getAuthItems(2,$model->id)){
            foreach($authItem as $item){
               $checked_role[$item->name] = $item->description;
            }
        }
        if(Yii::app()->request->isPostRequest && $posts = $_POST['AdminUser']){
            $roles = $_POST['role'];
            $model->attributes = $posts;
            if($model->save()){
                    foreach ($roles as $val) {
                        if($model->getIsNewRecord()){
                            Yii::app()->auth->assign($val, $model->id);
                        }else{
                            if(isset($checked_role[$val]))
                                unset($checked_role[$val]);
                            else
                                Yii::app()->auth->assign($val,$model->id);
                        }
                    }
                    if($checked_role){
                        foreach($checked_role as $key=>$rule){
                            Yii::app()->auth->revoke($key,$model->id);
                        }
                    }
                $this->toastrRedirect(Admin_Toastr::SUCCESS_CODE,'保存成功',$this->createUrl('index'));
            }
        }
        $this->render('edit',array('model'=>$model,'role'=>$role,'checked_role'=>$checked_role));
    }
    
    public function actionDel($id){
        if($id == 1){
            $this->sendResponse(false,'管理员不能删除');
        }
        $admin_user = AdminUser::model()->findByPk($id);
        if(!$admin_user)
            $this->sendResponse(false,'不存在的用户');
        $transaction = Yii::app()->db->beginTransaction();
        try{
            if($admin_user->delete()) {
                $auth_items = Yii::app()->auth->getAuthItems(2, $admin_user->id);
                if($auth_items) {
                    foreach ($auth_items as $item) {
                        $res = Yii::app()->auth->revoke($item->name, $admin_user->id);
                        if(!$res)
                            throw new CException('删除失败');
                    }
                }
                $transaction->commit();
                $this->sendResponse(true,'ok');
            }else{
               throw new CException('删除失败');
            }
        }catch (CException $e){
            $transaction->rollback();
            $this->sendResponse(false,$e->getMessage());
        }
    }
}