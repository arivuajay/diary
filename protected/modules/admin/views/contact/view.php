<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contact'=>array('index'),
	$model->contact_id,
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>View Contact #<?php echo $model->contact_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                                'contact_id',
                                'contact_name',
                                'contact_email',
                                'contact_phone',
                                'contact_message',
                                'created',
                                'modified',
                        ),
                )); ?>
                <?php echo CHtml::link('Back', array('/admin/contact/index'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>