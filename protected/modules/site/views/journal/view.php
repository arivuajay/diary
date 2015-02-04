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

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active"><a href="#">View Journal</a></li>
  <!--          <li class="crumb-link"><a href="<?php // echo $baseUrl; ?>">Home</a></li>
            <li class="crumb-trail"><?php //  echo $model->heading; ?></li>-->
        </ol>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-10 center-column">
            <div class="panel faq-panel mt50">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> View Journal # <?php echo $model->diary_id; ?><?php //  echo $model->heading; ?> </span> </div>
                <div class="panel-body pn">
                    <div class="row table-layout">
                        <div class="col-abt col-xs-12 va-m p60">
                            <div class="panel-group accordion mta25" id="accordion1">
                                <div class="panel">
                                    <div id="accord1_1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <?php
                                            $this->widget('zii.widgets.CDetailView', array(
                                                'data' => $model,
                                                'attributes' => array(
                                        //            'diary_id',
                                        //            'diary_user_id',
                                                    'diary_title',
                                                    array(
                                                        'name' => $model->getAttributeLabel('diary_description'),
                                                        'type' => 'raw',
                                                        'value' => $model->diary_description
                                                    ),
                                                    array(
                                                        'name' => $model->getAttributeLabel('diary_category_id'),
                                                        'type' => 'raw',
                                                        'value' => $model->diaryCategory->category_name
                                                    ),
                                                    'diary_tags',
                                                    array(
                                                        'name' => $model->getAttributeLabel('diary_current_date'),
                                                        'type' => 'raw',
                                                        'value' => date('Y-m-d', strtotime($model->diary_current_date))
                                                    ),
                                                    array(
                                                        'name' => 'Uploaded',
                                                        'type' => 'raw',
                                                        // 'value' => CHtml::image($this->createUrl("/".JOURNAL_IMG_PATH.$model->diary_upload))
                                                        'value' => Myclass::getUserDiaryImages($model->diary_id)
                                                    ),
                                                    array(
                                                        'name' => 'Selected Mood',
                                                        'type' => 'raw',
                                                        'value' => CHtml::image($this->createUrl("/themes/site/image/mood_type/{$model->diaryUserMood->mood_image}"))
                                                    ),
                                                //'created',
                                                //'modified',
                                                ),
                                            ));
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
