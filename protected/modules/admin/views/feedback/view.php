<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedback'=>array('index'),
	$model->feedback_id,
);

?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>View Feedback #<?php echo $model->feedback_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                                'feedback_id',
                                'feedback_name',
                                'feedback_email',
                                'feedback_phone',
                                'feedback_message',
                                'created',
                                'modified',
                        ),
                )); ?>
                <?php echo CHtml::link('Back', array('/admin/feedback/index'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>
