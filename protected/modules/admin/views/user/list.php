<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Editable Table
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
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
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/datatables/media/js/jquery.dataTables.min.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',CClientScript::POS_END);
    $js = '
        var columns = [ 
            { "data": "id" },
            { "data": "username" },
            { "data": "email" },
            { "data": "status" },
            { "data": "created" },
        ];
        var $table = $("#example");
        $table.dataTable({
            "processing":true,
            "serverSide":true,
            "ordering": false,
            "ajax":"'.$this->createUrl('list').'",
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "columns": columns,
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records",
                "processing":"加载中...",
            },
        });
    ';
    Yii::app()->clientScript->registerScript('dataTable',$js,CClientScript::POS_END);

?>