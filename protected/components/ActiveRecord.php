<?php
/**
 * User: JiangTao
 * Date: 16/7/24
 * Time: 下午10:20
 */
class ActiveRecord extends CActiveRecord{

    public function getList($params=array(),$pagination=array()){
        if($params instanceof CDbCriteria){
            $criteria = $params;
        }elseif(is_array($params)){
            $criteria = new CDbCriteria($params);
        }else{
            $criteria = new CDbCriteria();
        }
        $pagination = array_merge(array('pageVar'=>'page','pageSize'=>10),$pagination);
        return new CActiveDataProvider($this->model(),array(
            'criteria'=>$criteria,
            'pagination'=>$pagination
        ));
    }

}