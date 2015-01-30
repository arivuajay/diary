<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
?>

<!-- Start: Content -->
<section id="content_wrapper">
    <div id="topbar">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active"><a>WRITE A JOURNAL</a></li>
                <li class="crumb-link"><a href="<?php echo SITEURL; ?>">Home</a></li>
                <li class="crumb-trail">WRITE AN JOURNAL</li>
            </ol>
        </div>
    </div>
    <div id="content">
        <div class="row">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'diary-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Details </span> </div>
                    <div class="panel-body">



                        <?php echo $form->errorSummary($model); ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_title'); ?>
                            <?php echo $form->textField($model, 'diary_title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'diary_title'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_category_id'); ?>
                            <?php echo $form->dropDownList($model, 'diary_category_id', Myclass::getCategorywithOthers(), array('type' => 'text', 'empty' => '--Select Your Category--', 'class' => 'form-control ')); ?>
                            <?php //echo $form->textField($model,'diary_category_id',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
                            <?php echo $form->error($model, 'diary_category_id'); ?>
                        </div>
                        <div class="form-group hidden" id="div_category">
                            <?php echo $form->labelEx($model, 'diary_category'); ?>
                            <?php echo $form->textField($model, 'diary_category', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'diary_category'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_tags'); ?>
                            <?php echo $form->textField($model, 'diary_tags', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'diary_tags'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_current_date'); ?>
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                                    <?php //echo $form->textField($model,'diary_current_date',array('id'=>'datepicker','class'=>'form-control'));  ?>

                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'diary_current_date',
                                        'model' => $model,
                                        'attribute' => 'diary_current_date',
                                        'options' => array(
                                            'dateFormat' => JS_SHORT_DATE_FORMAT,
                                            'altFormat' => JS_SHORT_DATE_FORMAT,
                                        ),
                                        'htmlOptions' => array(
                                            'value' => date(PHP_SHORT_DATE_FORMAT, strtotime($model->diary_current_date)),
                                            'id' => 'datepicker',
                                            'class' => 'form-control',
                                            'size' => '10', // textField size
                                            'maxlength' => '10', // textField maxlength
                                        ),
                                    ));
                                    ?>
                                    <?php echo $form->error($model, 'diary_current_date'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_user_mood_id', array('class' => 'col-md-3 control-label')); ?>

                            <div class="col-md-9">
                                <?php
                                $moods = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_type');
                                foreach ($moods as $key => $mood) {
                                    ?>
                                    <label class="radio-inline mr10">
                                        <?php echo $form->radioButton($model, 'diary_user_mood_id', array('value' => $key, 'uncheckValue' => null)); ?>
                                        <img src="<?php echo $themeUrl; ?>/css/frontend/img/mood_<?php echo $key ?>.png"> </label>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <a href="#" id="add-new-file" class="btn btn-success">Add Image</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body">
                        <div id="content">
                            <div class="panel">
                                <div class="panel-body pn">
                                    <!--                      <div class="summernote" style="height: 100px;">This is the <b>Summernote</b> Editor...</div>-->
                                    <?php //echo $form->textArea($model,'diary_description',array('class'=>'summernote','rows'=>6, 'cols'=>50));   ?>
                                    <script src="<?php echo Yii::app()->baseUrl . '/ckeditor/ckeditor.js'; ?>"></script>

                                    <div class="">
                                        <?php //echo $form->labelEx($model,'diary_description');   ?>
                                        <?php echo $form->textArea($model, 'diary_description', array('id' => 'editor1')); ?>
                                        <?php echo $form->error($model, 'diary_description'); ?>
                                    </div>



                                    <script type="text/javascript">
                                        CKEDITOR.replace('editor1', {
                                            height: '224px',
                                            filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
                                            filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
                                            filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
                                            filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
                                            filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
                                            filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'submit btn bg-purple pull-right')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
</section>
<!-- End: Content -->
<style type="text/css">

</style>
<div class="modal fade" id="addNewFile" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="editName" class="modal-title">Add images to your diary</h4>
            </div>
            <div class="modal-body">
                <?php
                Yii::import("ext.xupload.models.XUploadForm");
                $imgModel = new XUploadForm;
                $this->widget('xupload.XUpload', array(
                    'url' => Yii::app()->createUrl("/site/journal/adddiaryimage"),
                    'model' => $imgModel,
                    'attribute' => 'file',
                    'multiple' => true,
                    'htmlOptions' => array('id'=>'image-form')
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#Diary_diary_category_id').val() == 'others' ? $('#div_category').removeClass('hidden') : $('#div_category').addClass('hidden');
        $('#Diary_diary_category_id').on('change', function(){
            $(this).val() == 'others' ? $('#div_category').removeClass('hidden') : $('#div_category').addClass('hidden');
        });

        $("#add-new-file").bind('click',addFileDialog);

        function addFileDialog(event,ui) {
                var _target = $('#addNewFile');
                if (! _target) return false;

                _target.modal("show");
                return false;
        }

    });
EOD;

Yii::app()->clientScript->registerScript('_journal_form', $js);
?>
