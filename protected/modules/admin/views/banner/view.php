<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs = array(
    'Banners' => array('index'),
    $model->banner_id,
);

//$this->menu=array(
//	array('label'=>'List Banner', 'url'=>array('index')),
//	array('label'=>'Create Banner', 'url'=>array('create')),
//	array('label'=>'Update Banner', 'url'=>array('update', 'id'=>$model->banner_id)),
//	array('label'=>'Delete Banner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->banner_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Banner', 'url'=>array('admin')),
//);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>View Banner  #<?php echo $model->banner_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'banner_id',
                        array(
                            'label' => $model->getAttributeLabel('banner_layout_id'),
                            'value' => $model->bannerLayout->banner_layout_name
                        ),
                        array(
                            'label' => $model->getAttributeLabel('banner_image'),
                            'value' => CHtml::image(
                                            $this->createUrl("/themes/site/image/banners/".$model->banner_path.$model->banner_image),
                                            $model->banner_title,
                                            array(
                                                'width' => '230',
                                                'height' => '30'
                                            )
                                            )
                        ),
                        array(
                            'label' => $model->getAttributeLabel('banner_status'),
                            'value' => $model->banner_status == 1 ? 'Enabled' : 'Disabled'
                        ),
                        'created',
                        'modified',
                    ),
                ));
                ?>


            <?php echo CHtml::link('Back', array('/admin/banner/index'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>