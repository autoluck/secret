<?php
/**
 *
 * User: jt
 * Date: 2016/9/29 11:28
 */
class Admin_DelButton extends CWidget{

    public $del_url ;

    public $event_css_class ;

    public function init(){
        if(empty($this->del_url))
            throw new CException('del_url can not empty');
        if($this->event_css_class === null)
            $this->event_css_class = 'btn-del';
    }

    public function run(){
        echo '<button type="button" data-url="'.$this->del_url.'" class="btn btn-small btn-danger '.$this->event_css_class.'"><i class="fa fa-times"></i>删除</button>';
        $this->registerJs();
    }

    public function registerJs(){
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/sweetalert/dist/sweetalert.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/sweetalert/dist/sweetalert.min.js',CClientScript::POS_END);
        $js = <<<EOF
        $(".$this->event_css_class").on('click',function(){
              var self = $(this);
              swal({   
                title: "确定删除吗？",   
                text: "你确定要删除这条数据吗？",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonText: "确定",   
                closeOnConfirm: false
              }, function(){   
                 $.ajax({
                    type: "get",
                    url : self.data('url'),
                    datType:"json",
                    success:function(res){
                        if(res.code){
                             self.closest("tr").remove();
                             swal("删除成功", "", "success");
                        }else{
                             swal("删除失败", res.msg , "error");
                        }
                    }
                 });
              })
        });
EOF;
        Yii::app()->clientScript->registerScript(__CLASS__.'#js',$js,CClientScript::POS_READY);
    }
}