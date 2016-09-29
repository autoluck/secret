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
            if($name == 'admin')
                throw new CException('管理员角色无法修改');
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

    public function actionDel($name){
        $auth_item = Yii::app()->auth->getAuthItem($name);
        if($name == 'admin'){
            $this->sendResponse(false,'管理员角色不能删除');
        }
        if(!$auth_item || $auth_item->type != 2 )
            $this->sendResponse(false, '不存在的角色');
        $res = Yii::app()->auth->removeAuthItem($auth_item->name);
        if($res) {
            $this->sendResponse(true, 'ok');
        }else{
            $this->sendResponse(false,'删除失败');
        }
    }

}