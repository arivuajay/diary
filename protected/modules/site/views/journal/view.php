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
<style type=”text/css” media=”print”>

    @media print{

        body *{ visibility: hidden; }

        #div1 * {visibility: visible !important; }

        #div1 {position :absolute; top:40px; left:40px; }

    }

</style>


<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">View Journal</li>
  <!--          <li class="crumb-link"><a href="<?php // echo $baseUrl;         ?>">Home</a></li>
            <li class="crumb-trail"><?php //  echo $model->heading;         ?></li>-->
        </ol>
    </div>
    <div class="topbar-right top-button-margin">
        <?php $back_id = date('Y-m-d', strtotime($model->diary_current_date)); ?>
        <?php echo CHtml::Button('Print', array('onclick' => "js:printContent('div1')", 'class' => 'submit btn bg-purple pull-right top-marin')); ?>
        <?php
        if ($_SESSION['back'] != 1) {
            if (@$_COOKIE['diary_mode'] == '2'):
                $url = array('/site/journal/liststudentjournal');
            else:
                $url = array('journal/listjournal/date/' . $back_id);
            endif;


            echo CHtml::Button('Back', array('submit' => $url, 'class' => 'submit btn bg-purple pull-right top-marin'));
        }unset($_SESSION['back'])
        ?>
        <?php echo CHtml::Button('Edit', array('submit' => array('journal/update/id/' . $model->diary_id), 'class' => 'submit btn bg-purple pull-right top-marin')); ?>
        <?php echo CHtml::Button('Write a Journal', array('submit' => array('journal/create'), 'class' => 'submit btn bg-purple pull-right top-marin')); ?>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-10 center-column">
            <div class="panel faq-panel mt50">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> View Journal<?php //echo $model->diary_id;         ?><?php //  echo $model->heading;         ?> </span> </div>
                <div class="panel-body pn">
                    <div class="row table-layout">
                        <div class="col-abt col-xs-12 va-m p60">
                            <div class="panel-group accordion mta25" id="accordion1">
                                <div class="panel">
                                    <div id="accord1_1" class="panel-collapse collapse in">
                                        <div id="div1" class="panel-body">
                                            <?php
                                            $detail_columns = array();
                                            $detail_columns[] = array(
                                                'name' => 'Selected Mood',
                                                'type' => 'raw',
                                                'value' => CHtml::image($this->createUrl("/themes/site/image/mood_type/{$model->diaryUserMood->mood_image}"))
                                            );
                                            $detail_columns[] = 'diary_title';

                                            if (@$_COOKIE['diary_mode'] == '2'):
                                                $detail_columns[] = array(
                                                    'name' => $model->getAttributeLabel('diary_class_id'),
                                                    'type' => 'raw',
                                                    'value' => $model->diaryClass->class_name
                                                );
                                                $detail_columns[] = array(
                                                    'name' => $model->getAttributeLabel('diary_subject_id'),
                                                    'type' => 'raw',
                                                    'value' => $model->diarySubject->subject_name
                                                );
                                            else:
                                                $detail_columns[] = array(
                                                    'name' => $model->getAttributeLabel('diary_category_id'),
                                                    'type' => 'raw',
                                                    'value' => $model->diaryCategory->category_name
                                                );
                                            endif;

                                            $detail_columns[] = 'diary_tags';
                                            $detail_columns[] = array(
                                                'name' => $model->getAttributeLabel('diary_current_date'),
                                                'type' => 'raw',
                                                'value' => date('Y-m-d', strtotime($model->diary_current_date))
                                            );
                                            $detail_columns[] = array(
                                                'name' => $model->getAttributeLabel('diary_description'),
                                                'type' => 'raw',
                                                'value' => $model->diary_description
                                            );
                                            $detail_columns[] = array(
                                                'name' => 'Uploaded',
                                                'type' => 'raw',
                                                'value' => Myclass::getUserDiaryImages($model->diary_id)
                                            );

                                            $this->widget('zii.widgets.CDetailView', array(
                                                'data' => $model,
                                                'attributes' => $detail_columns,
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

<script type="text/javascript">

    function printContent(el)
    {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        // mywindow.document.write("<link rel="stylesheet" href=<?php echo $themeUrl ?>/css/frontend/css/theme.css" type=\"text/css\" media=\"print\"/>");
//        document.createStyleSheet("<?php echo $themeUrl ?>/css/frontend/css/theme.css");
//        mywindow.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>

