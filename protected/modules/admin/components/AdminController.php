<?php
/**
 * User: JiangTao
 * Date: 16/7/16
 * Time: ÉÏÎç10:10
 */
class AdminController extends Controller{

    public $layout='/layouts/main';

    public $pageTitle;

    public $menu = array();

    public $breadcrumbs=array();

    public function init(){
        parent::init();
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

}
