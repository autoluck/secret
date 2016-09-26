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
               $checked_role[$item->name] = $item->description;
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
                            if(isset($checked_role[$val]))
                                unset($checked_role[$val]);
                            else
                                Yii::app()->auth->assign($val,Yii::app()->user->id);
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
}