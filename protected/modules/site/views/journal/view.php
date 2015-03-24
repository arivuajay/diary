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
$themeUrl = Yii::app()->theme->baseUrl;
?>

  
<script type="text/javascript">

    function printContent(el)
    {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
       // mywindow.document.write('<link rel="stylesheet" href="<?php echo $themeUrl ?>/css/frontend/css/theme.css" type="text/css" />');
        document.body.innerHTML = printcontent; window.print();
        document.body.innerHTML = restorepage;
    }
</script>

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">View Journal</li>
  <!--          <li class="crumb-link"><a href="<?php // echo $baseUrl;   ?>">Home</a></li>
            <li class="crumb-trail"><?php //  echo $model->heading;   ?></li>-->
        </ol>
    </div>
    <div class="topbar-right top-button-margin">
        <?php $back_id =  date('Y-m-d',strtotime($model->diary_current_date));?>
        <?php echo CHtml::Button('Print', array('onclick' => "js:printContent('div1')",'class' => 'submit btn bg-purple pull-right top-marin')); ?>
        <?php if($_SESSION['back'] != 1){ echo CHtml::Button('Back', array('submit'=>array('journal/listjournal/date/'.$back_id),'class' => 'submit btn bg-purple pull-right top-marin'));}unset($_SESSION['back']) ?>
        <?php echo CHtml::Button('Edit', array('submit'=>array('journal/update/id/'.$model->diary_id),'class' => 'submit btn bg-purple pull-right top-marin')); ?>
        <?php echo CHtml::Button('Write a Journal', array('submit'=>array('journal/create'),'class' => 'submit btn bg-purple pull-right top-marin')); ?>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-10 center-column">
            <div class="panel faq-panel mt50">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> View Journal<?php //echo $model->diary_id;   ?><?php //  echo $model->heading;   ?> </span> </div>
                <div class="panel-body pn">
                    <div class="row table-layout">
                        <div class="col-abt col-xs-12 va-m p60">
                            <div class="panel-group accordion mta25" id="accordion1">
                                <div class="panel">
                                    <div id="accord1_1" class="panel-collapse collapse in">
                                        <div id="div1" class="panel-body">
                                            <?php
                                            $this->widget('zii.widgets.CDetailView', array(
                                                'data' => $model,
                                                'attributes' => array(
                                                    //            'diary_id',
                                                    //            'diary_user_id',
                                                    array(
                                                        'name' => 'Selected Mood',
                                                        'type' => 'raw',
                                                        'value' => CHtml::image($this->createUrl("/themes/site/image/mood_type/{$model->diaryUserMood->mood_image}"))
                                                    ),
                                                    'diary_title',
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
                                                        'name' => $model->getAttributeLabel('diary_description'),
                                                        'type' => 'raw',
                                                        'value' => $model->diary_description
                                                    ),
                                                    array(
                                                        'name' => 'Uploaded',
                                                        'type' => 'raw',
                                                        // 'value' => CHtml::image($this->createUrl("/".JOURNAL_IMG_PATH.$model->diary_upload))
                                                        'value' => Myclass::getUserDiaryImages($model->diary_id)
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

