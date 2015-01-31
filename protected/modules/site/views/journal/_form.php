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
                                $moods = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_image');
                                foreach ($moods as $key => $mood) {
                                    ?>
                                    <label class="radio-inline mr10">
                                        <?php echo $form->radioButton($model, 'diary_user_mood_id', array('value' => $key, 'uncheckValue' => null)); ?>
                                        <img src="<?php echo $themeUrl; ?>/image/mood_type/<?php echo $mood ?>"> </label>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <a href="#" id="add-new-file" class="btn btn-success">Add Image</a>
                            <ul id="image_preview_list">
                                <li class="col-sm-6 col-md-3">
                                    <div class="thumbnail tile tile-medium tile-teal">
                                        <a href="#"><i class="fa fa-camera-retro fa-lg overlay-icon top-right"></i></a>
                                            <img src="" class="img-responsive" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <?php
                            $this->widget('ext.tinymce.TinyMce', array(
                                'model' => $model,
                                'attribute' => 'diary_description',
                                'settings' => array('menubar' => false),
                                'htmlOptions' => array(
                                    'rows' => 14,
                                    'cols' => 60,
                                ),
                            ));
                            ?>
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
                    'htmlOptions' => array('id' => 'image-form')
                ));
                ?>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button aria-hidden="true" data-dismiss="modal" class="btn btn-success" type="button">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The template to display files available for download -->
<script id="template-on-preview" type="text/x-tmpl">
    <div class="image-thumb" id="some-unique-thumb-id-1" style="background-image: url(some/image-1.ext)">
    <a href="#"></a>
</div>
    <li class="preview-list">
    <span class="thumbnail"><span>${thumbnail_url}</span></span>
    <span class="name"><span>${thumbnail_url}</span></span>
    </li>
</script>


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
        $("#template-on-preview").template("listAttendees"); //compiling the template to named listAttendees
        $('#image-form').bind('fileuploaddone', function (e, data) {
        $.tmpl("listAttendees", data.result).appendTo("ul#image_list");

//            $(data.result).each(function(k,v){
//        console.log(v);
//                console.log(v.delete_url);
//                console.log(v.thumbnail_url);
//            });
        });
    });
EOD;

Yii::app()->clientScript->registerScript('_journal_form', $js);
?>
