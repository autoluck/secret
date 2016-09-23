<?php
/**
 * User: JiangTao
 * Date: 16/7/16
 */
class AdminController extends CController{

    public $layout='/layouts/main';

    public $pageTitle;

    private $_menu;

    public $breadcrumbs=array();

    public function getMenu(){
        if($this->_menu === null){
            $auth = Yii::app()->user->auth;
            $this->_menu = array(
                array('label'=>'工作台','icon'=>'icon-home','url'=>array('/admin/default/index'),'visible'=>in_array('admin/default/index',$auth)),
                array('label'=>'用户','icon'=>'icon-users','url'=>array('/admin/user/index'),'active'=>$this instanceof UserController,'visible'=>in_array('admin/user/index',$auth)),
                array('label'=>'角色','icon'=>'icon-briefcase','url'=>array('/admin/role/index'),'active'=>$this instanceof RoleController,'visible'=>in_array('admin/role/index',$auth)),
            );
        }
        return $this->_menu;
    }

    public function filters(){
        return array(
            'accessControl - admin/sign/login'
        );
    }

    public function accessRules(){
        return array(
            array('allow','users'=>array('@')),
            array('deny','users'=>array('*')),
        );
    }

    public function toastrRedirect($code,$msg,$redirect_url){
        Yii::app()->user->setFlash('info',array('code'=>$code,'msg'=>$msg));
        $this->redirect($redirect_url);
    }

    public function beforeAction($action){
        if(!Yii::app()->user->isGuest && $this->getRoute() != 'admin/sign/logout'){
            $auth = Yii::app()->user->auth;
            if(in_array($this->route,array('admin/error/index')))
                return true;
            if(!in_array($this->route,$auth))
                throw new CException('无权限访问!');
        }
        return true;
    }


}
