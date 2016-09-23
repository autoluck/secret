<?php
$this->pageTitle = '出错了';
$assetsUrl = $this->module->assetsUrl;
Yii::app()->clientScript->registerCssFile($assetsUrl.'/css/error.css');
?>

<div class="row">
    <div class="col-md-12 page-404">
        <div class="number">
            <?php echo $error['code'] ?>
        </div>
        <div class="details">
            <h3><?php echo $error['message'] ?></h3>
        </div>
    </div>
</div>