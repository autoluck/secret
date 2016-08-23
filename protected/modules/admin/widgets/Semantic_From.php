<?php
/**
 *
 * User: jt
 * Date: 2016/8/23 16:35
 */

class Semantic_Form extends CActiveRecord{

    public function init(){
        if(!isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] = 'ui form';
        if(!isset($this->htmlOptions['id']))
            $this->htmlOptions['id']=$this->id;
        else
            $this->id=$this->htmlOptions['id'];
        echo CHtml::beginForm($this->action,$this->method,$this->htmlOptions);
    }

    public function run(){
        echo CHtml::endForm();
        $cs = Yii::app()->clientScript;
        

    }

}