<?php
/**
 * User: jiangtao
 * Date: 2016/9/11
 * Time: 12:50
 */

class RoleController extends AdminController{

    public function actionIndex(){
        $roles = Yii::app()->auth->getRoles();
        $this->render('index',array('data'=>$roles));
    }

    public function actionEdit($name=''){
       /*   $auth = Yii::app()->auth;
            $auth->createTask('/admin/default/index','工作台');
            $task = $auth->createTask('/admin/user/list','用户');
            $auth->createOperation('/admin/user/edit','编辑用户');
            $auth->createOperation('/admin/user/del','删除用户');
            $task->addChild('/admin/user/edit');
            $task->addChild('/admin/user/del');
            $role = $auth->createTask('/admin/role/list','角色');
            $auth->createOperation('/admin/role/edit','编辑角色');
            $auth->createOperation('/admin/role/del','删除角色');
            $role->addChild('/admin/role/edit');
            $role->addChild('/admin/role/del');*/
            /*******************************/
            if($name == ''){
                $model = new RoleForm('create');
            }else{
                $model = new RoleForm();
                $auth_item = Yii::app()->auth->getAuthItem($name);
                if(empty($auth_item))
                    throw new CException('角色不存在');
                $model->name = $auth_item->name;
                $model->description = $auth_item->description;
                $model->old_name = $auth_item->name;
            }
            $tasks = Yii::app()->auth->getTasks();
            $data = array();
            foreach($tasks as $key => $item){
                $data[$key]['name'] = $item->description;
                $itemChild = Yii::app()->auth->getItemChildren($item->name);
                if($itemChild){
                    foreach($itemChild as $k => $v){
                        $data[$key]['child'][$k]['name'] = $v->description;
                    }
                }
            }
            if(Yii::app()->request->isPostRequest && $posts =  $_POST['RoleForm']){
                $model->attributes = $posts;
                $model->rule = $posts['rule'];
                if($model->save())
                    $this->toastrRedirect(Admin_Toastr::SUCCESS_CODE,'保存成功',$this->createUrl('index'));
            }
            $back = array('model'=>$model,'data'=>$data);
            if($name){
                $rule = Yii::app()->auth->getItemChildren($name);
                $back =  array_merge(array('rule'=>$rule),$back);
            }
            $this->render('edit',$back);
    }

}