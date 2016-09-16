<?php

class RoleForm extends CFormModel{

    public $name;
    public $description;
    public $rule;
    public $old_name;

    public function rules(){
        return array(
            array('name,description','required'),
            array('name','isUnique','on'=>'create'),
        );
    }

    public function isUnique(){
        if(!$this->hasErrors()){
            $exist = Yii::app()->auth->getAuthItem($this->name);
            if($exist)
                $this->addError('name','角色已经存在!');
        }
    }

    public function attributeLabels(){
        return array(
            'name'=>'角色名称',
            'description'=>'描述',
            'rule'=>'权限'
        );
    }

    public function save(){
        if(!$this->validate())
            return false;
        $auth = Yii::app()->auth;
        if($this->old_name)
            $auth->removeAuthItem($this->old_name);
        $role = $auth->createRole($this->name,$this->description);
        $rules = explode(',',$this->rule);
        foreach($rules as $rule){
            $role->addChild($rule);
        }
        return true;
    }
}