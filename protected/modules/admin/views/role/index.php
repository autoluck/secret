<?php
    $this->pageTitle = '角色列表';
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa  fa-list-alt"></i><?php echo $this->pageTitle ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="btn-group">
                                <a class="btn green" href="<?php echo $this->createUrl('edit'); ?>">
                                    新增<i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="table-group-actions pull-right">
                                <input type="text" class="form-control input-inline" name="keyword">
                                <button class="btn yellow table-group-action-submit"><i class="fa fa-search"></i> 搜索
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>
                                角色名称
                            </th>
                            <th>
                                描述
                            </th>
                            <th>
                                操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $item->name; ?>
                                </td>
                                <td>
                                    <?php echo $item->description; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $this->createUrl('edit',array('name'=>$item->name)) ?>" class="btn btn-small btn-primary btn-edit">修改</a>
                                    <button type="button" class="btn btn-small btn-danger btn-del">删除</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
