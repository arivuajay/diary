<?php
/* @var $this BannerLayoutController */
/* @var $model BannerLayout */

$this->breadcrumbs=array(
	'Banner Layouts'=>array('index'),
	$model->banner_layout_id,
);

//$this->menu=array(
//	array('label'=>'List BannerLayout', 'url'=>array('index')),
//	array('label'=>'Create BannerLayout', 'url'=>array('create')),
//	array('label'=>'Update BannerLayout', 'url'=>array('update', 'id'=>$model->banner_layout_id)),
//	array('label'=>'Delete BannerLayout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->banner_layout_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage BannerLayout', 'url'=>array('admin')),
//);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>View Banner Layout #<?php echo $model->banner_layout_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                                'banner_layout_page',
                                'banner_layout_position',
                                'banner_layout_dimensions',
                                'created',
                                'modified',
                        ),
                )); ?>
                
                <?php echo CHtml::link('Back', array('/admin/bannerlayout/index'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>