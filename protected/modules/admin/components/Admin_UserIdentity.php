<?php
/**
 * User: JiangTao
 * Date: 16/7/25
 * Time: 下午9:15
 */

class Admin_UserIdentity extends CUserIdentity{

    private $_id;

    public function authenticate(){
        $admin_user = AdminUser::model()->normal()->find('username=:username',array(':username'=>$this->username));
        if(empty($admin_user))
            $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
        elseif(!$admin_user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else{
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $admin_user->id;
            $this->username = $admin_user->username;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId(){
        return $this->_id;
    }



}