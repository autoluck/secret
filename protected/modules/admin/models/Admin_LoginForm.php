<?php
/**
 * User: JiangTao
 * Date: 16/7/6
 * Time: 下午7:55
 */

class Admin_LoginForm extends CFormModel{

    public $name;
    public $password;
    public $rememberMe;

    private $_identity;

    public function rules()
    {
        return array(
            array('name,password','required','message'=>'{attribute}不能为空'),
            array('rememberMe','boolean'),
            array('password','validatePassword')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => '用户名',
            'password' => '密码',
            'rememberMe' => '记住我的登陆信息'
        );
    }

    public function validatePassword(){
        if(!$this->hasErrors()){
            $this->_identity = new Admin_UserIdentity($this->name,$this->password);
            if(!$this->_identity->authenticate()){
                $this->addError('password','用户名或密码错误');
            }
        }
    }

    public function login(){
        if($this->_identity === null){
            $this->_identity = new Admin_UserIdentity($this->name,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode === Admin_UserIdentity::ERROR_NONE){
            $duration = $this->rememberMe ? 3600*24*3 : 0; //保存三天
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }else{
            return false;
        }

    }


}


