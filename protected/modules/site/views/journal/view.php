<?php
/* @var $this JournalController */
/* @var $model Diary */

//$this->breadcrumbs=array(
//	'Diaries'=>array('index'),
//	$model->diary_id,
//);
//
//$this->menu=array(
//	array('label'=>'List Diary', 'url'=>array('index')),
//	array('label'=>'Create Diary', 'url'=>array('create')),
//	array('label'=>'Update Diary', 'url'=>array('update', 'id'=>$model->diary_id)),
//	array('label'=>'Delete Diary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->diary_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Diary', 'url'=>array('admin')),
//);
?>

<!--<h1>View Diary #<?php echo $model->diary_id; ?></h1>-->

<?php
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'diary_id',
//		'diary_user_id',
//		'diary_title',
//		'diary_description',
//		'diary_category_id',
//		'diary_tags',
//		'diary_current_date',
//		'diary_user_mood_id',
//		'diary_upload',
//		'created',
//		'modified',
//	),
//));
?>
<section id="content_wrapper">
    <?php echo 'Your Journal added Sucess fully..'; ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'diary_id',
            'diary_user_id',
            'diary_title',
             array(
                'name' => 'diary_description',
                'type' => 'raw',
                'value' => $model->diary_description
            ),
             array(
                'name' => 'diary_category_id',
                'type' => 'raw',
                'value' => $model->diaryCategory->category_name
            ),
            'diary_tags',
            //'diary_current_date',
            array(
                'name' => 'diary_user_mood_id',
                'type' => 'raw',
                'value' => CHtml::image($this->createUrl("/themes/site/css/frontend/img/mood_{$model->diary_user_mood_id}.png"))
            ),
            'diary_upload',
        //'created',
        //'modified',
        ),
    ));
    ?>
</section>