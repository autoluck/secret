<?php
    $this->pageTitle = '用户列表';
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa  fa-list-alt"></i><?php echo $this->pageTitle ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green">
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>

                <table class="table table-striped table-hover table-bordered" id="example">
                    <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            username
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            status
                        </th>
                        <th>
                            created
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/datatables/media/js/jquery.dataTables.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',CClientScript::POS_END);
    $js = '
        var columns = [
            { "data": "id" },
            { "data": "username" },
            { "data": "email" },
            { "data": "status" },
            { "data": "created" },
            {
                data: null,
                defaultContent:"",
                orderable : false,
            }
        ];
        var $table = $("#example");
        var _table = $table.dataTable({
            "processing":true, //加载提示 true显示 false隐藏
            "serverSide":true, //启用服务器端分页
            "ordering": false, //禁用原生排序
            //"searching": false,    //禁用原生搜索
            "ajax" : function(data, callback, settings) {//ajax配置为function,手动调用异步查询
                //封装请求参数
                $.ajax({
                        type: "GET",
                        url: "'.$this->createUrl('list').'",
                        cache : false,  //禁用缓存
                        data: {page:data.start,limit:data.length,key:data.search.value},    //传入已封装的参数
                        dataType: "json",
                        success: function(result) {
                            //setTimeout仅为测试延迟效果
                            setTimeout(function(){
                                //异常判断与处理
                                if (result.errorCode) {
                                    alert("查询失败。错误码："+result.errorCode);
                                    return;
                                }

                                //封装返回数据，这里仅演示了修改属性名
                                var returnData = {};
                                returnData.recordsTotal = result.total;
                                returnData.recordsFiltered = result.total;//后台不实现过滤功能，每次查询均视作全部结果
                                returnData.data = result.data;
                                //调用DataTables提供的callback方法，代表数据已封装完成并传回DataTables进行渲染
                                //此时的数据需确保正确无误，异常判断应在执行此回调前自行处理完毕
                                callback(returnData);
                            },200);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("查询失败");
                        }
                    });
            },
            "columns": columns,
            "pageLength": 10,
            "createdRow": function ( row, data, index ) {
                //给当前行某列加样式
                //不使用render，改用jquery文档操作呈现单元格
                var $btnEdit = $(\'<button type="button" class="btn btn-small btn-primary btn-edit">修改</button>\');
                var $btnDel = $(\'<button type="button" class="btn btn-small btn-danger btn-del">删除</button>\');
                $("td:last", row).append($btnEdit).append($btnDel);
            },
            "language": {
                    "sProcessing":   "处理中...",
                    "sLengthMenu":   "每页 _MENU_ 项",
                    "sZeroRecords":  "没有匹配结果",
                    "sInfo":         "当前显示第 _START_ 至 _END_ 项，共 _TOTAL_ 项。",
                    "sInfoEmpty":    "还没有相关数据",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix":  "",
                    "sSearch":       "搜索:",
                    "sUrl":          "",
                    "sEmptyTable":     "还没有相关数据",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands":  ",",
                    "oPaginate": {
                        "sFirst":    "首页",
                        "sPrevious": "上页",
                        "sNext":     "下页",
                        "sLast":     "末页",
                        "sJump":     "跳转"
                    },
            },
        });
    ';
    Yii::app()->clientScript->registerScript('dataTable',$js,CClientScript::POS_END);

?>