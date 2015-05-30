<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
$classes = Myclass::getUserClasses(Yii::app()->user->id);
?>

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
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Details </span> </div>
                <div class="panel-body">
                    <?php echo $form->errorSummary($model); ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'diary_title'); ?>
                        <?php echo $form->textField($model, 'diary_title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'diary_title'); ?>
                    </div>
                    <?php if ($classes): ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_class_id'); ?>
                            <?php
                            $classes['others'] = 'Others';
                            echo $form->dropDownList($model, 'diary_class_id', $classes, array('type' => 'text', 'empty' => '--Select Your Category--', 'class' => 'form-control '));
                            echo $form->error($model, 'diary_class_id');
                            ?>
                        </div>
                        <div class="form-group hidden" id="div_class">
                            <?php echo $form->labelEx($model, 'diary_class'); ?>
                            <?php echo $form->textField($model, 'diary_class', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'diary_class'); ?>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_class_id'); ?>
                            <?php echo $form->textField($model, 'diary_class_id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'diary_class_id'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($model->isNewRecord): ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_subject_id'); ?>
                            <?php
                            echo $form->textField($model, 'diary_subject_id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250));
                            echo '<div id="div_subject"></div>';
                            echo $form->error($model, 'diary_subject_id');
                            ?>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'diary_subject_id'); ?>
                            <?php
                            $subjects = CHtml::listData(Myclass::getSubjectsArray(Yii::app()->user->id, $model->diary_class_id),'subject_id','subject_name');
                            $subjects['others'] = 'Others';
                            echo $form->dropDownList($model, 'diary_subject_id', $subjects, array('type' => 'text', 'empty' => '--Select Your Subject--', 'class' => 'form-control '));
                            echo $form->error($model, 'diary_subject_id');
                            ?>
                        </div>
                    <?php endif; ?>


                    <div class="form-group hidden" id="div_subject_area">
                        <?php echo $form->labelEx($model, 'diary_subject'); ?>
                        <?php echo $form->textField($model, 'diary_subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'diary_subject'); ?>
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
                                    'id' => CHtml::getIdByName(get_class($model) . '[diary_current_date]'),
                                    'name' => 'diary_current_date',
                                    'model' => $model,
                                    'attribute' => 'diary_current_date',
                                    'options' => array(
                                        'dateFormat' => JS_SHORT_DATE_FORMAT,
                                        'altFormat' => JS_SHORT_DATE_FORMAT,
                                        'constrainInput' => 'true',
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

                            </div>
                        </div>
                        <?php echo $form->error($model, 'diary_current_date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'diary_user_mood_id'); ?>

                        <div class="col-md-12">
                            <?php
                            $moods = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_image');
                            foreach ($moods as $key => $mood) {
                                ?>
                                <label class="radio-inline mr10">
                                    <?php echo $form->radioButton($model, 'diary_user_mood_id', array('value' => $key, 'uncheckValue' => null,)); ?>
                                    <img src="<?php echo $themeUrl; ?>/image/mood_type/<?php echo $mood ?>"> </label>
                            <?php } ?>
                        </div>
                        <?php echo $form->error($model, 'diary_user_mood_id'); ?>
                    </div>
                    <div class="form-group">
                        <a href="#" id="add-new-file" class="btn btn-success">Upload Files</a>
                        <br />
                        <br />
                        Note : Upload time depends on file size
                        <ul id="image_preview_list">
                            <?php
                            if (!$model->isNewRecord && $model->diaryImages):
                                foreach ($model->diaryImages as $dImage):
                                    $_SESSION['diary_images'][] = $dImage->diary_image;
                                    echo '<li class="col-sm-6 col-md-3">';
                                    echo '<div class="thumbnail tile tile-medium tile-teal">';
                                    echo '<a data-url="' . $this->createUrl("/site/journal/adddiaryimage/_method/delete/file/{$dImage->diary_image}") . '" data-type="POST" href="javascript:void(0);" class="delete_diary_image">';
                                    echo '<i class="fa fa-times-circle fa-lg overlay-icon top-right"></i>';
                                    echo '</a>';
                                    echo CHtml::image($this->createUrl("/uploads/journal/{$dImage->diary_image}"), '', array("class" => "img-responsive"));
                                    echo '</div>';
                                    echo '</li>';
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <?php
                        $editMe = $this->widget('ext.editMe.widgets.ExtEditMe', array(
                            'attribute' => 'diary_description',
                            'model' => $model,
                            'height' => 305, //
                            'toolbar' => array(
                                array('SpellChecker', 'Scayt'),
                                array(
                                    'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'
                                ),
                                array(
                                    'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                                    '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                                ),
                                array(
                                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'
                                ),
                                array(
//                                    'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe','Maximize'
                                    'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe', 'Maximize'
                                ),
                            )
                        ));
                        ?>
                        <?php echo $form->error($model, 'diary_description'); ?>
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

<div class="modal fade" id="addNewFile" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="editName" class="modal-title">Add images / file to your diary / journal</h4>
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
                    'htmlOptions' => array('id' => 'image-form'),
                    'options' => array(
                        'maxFileSize' => '1000000000',
                    ),
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
    <li class="col-sm-6 col-md-3">
    <div class="thumbnail tile tile-medium tile-teal">
    <a class="delete_diary_image" href="javascript:void(0);" data-type="POST" data-url="${delete_url}">
    <i class="fa fa-times-circle fa-lg overlay-icon top-right"></i>
    </a>
    <img src="${thumbnail_url}" class="img-responsive" />
    </div>
    </li>
</script>


<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#StudentDiary_diary_class_id').val() == 'others' ? $('#div_class').removeClass('hidden') : $('#div_class').addClass('hidden');

        $('#StudentDiary_diary_class_id').on('change', function(){
            $(this).val() == 'others' ? $('#div_class').removeClass('hidden') : $('#div_class').addClass('hidden');
        });
        $('select#StudentDiary_diary_class_id').on('change', function(){
            if($(this).val() == 'others'){
                $('#div_class').removeClass('hidden');
                if($('input#StudentDiary_diary_subject_id').length){
                    $('input#StudentDiary_diary_subject_id').removeClass('hidden').removeAttr('disabled');
                }else{
                     $( "<input />", {
                            "type": "text",
                            "name": "StudentDiary[diary_subject_id]",
                            "id": "StudentDiary_diary_subject_id",
                            "class": "form-control"
                        }).appendTo( "#div_subject" );
                }
                $('select#StudentDiary_diary_subject_id').remove();
            } else {
                $('#div_class').addClass('hidden');
                $.getJSON( "{$this->createUrl('/site/journal/getsubjects')}", { class: $(this).val() }).done(function( data ) {
                    if(data){
                        var items = [];
                        $.each( data, function( key, val ) {
                            items.push( "<option value='" + key + "'>" + val + "</option>" );
                        });

                        $( "<select/>", {
                            "name": "StudentDiary[diary_subject_id]",
                            "id": "StudentDiary_diary_subject_id",
                            "class": "form-control",
                            html: items.join( ""
                            )
                        }).appendTo( "#div_subject" );

                        $('input#StudentDiary_diary_subject_id').remove();
                    }else{
                         $( "<input />", {
                            "type": "text",
                            "name": "StudentDiary[diary_subject_id]",
                            "id": "StudentDiary_diary_subject_id",
                            "class": "form-control"
                        }).appendTo( "#div_subject" );
                        $('select#StudentDiary_diary_subject_id').remove();
                    }
                });
            }
        });

        $('body').on('change', 'select#StudentDiary_diary_subject_id' , function(){
            console.log($(this).val());
            if($(this).val() == 'others'){
                $('#div_subject_area').removeClass('hidden');
            } else {
                $('#div_subject_area').addClass('hidden');
            }
        });

        $("#add-new-file").bind('click',addFileDialog);

        $("a.delete_diary_image").live('click',function(){
        if(confirm("Are you sure want to remove ?")){
            _dataType = $(this).data('type');
            _dataUrl = $(this).data('url');
            var _curImg = $(this);
            $.ajax({
                type: _dataType,
                url: _dataUrl
            }).done(function( msg ){
                _dataUrl = _curImg.data('url');
                $("button[data-url='"+_dataUrl+"']").closest("tr").remove()
                _curImg.parents('li').remove();
            });
        }
        });

        function addFileDialog(event,ui) {
                var _target = $('#addNewFile');
                if (! _target) return false;

                _target.modal("show");
                return false;
        }
        $("#template-on-preview").template("listAttendees");
        $('#image-form').bind('fileuploaddone', function (e, data) {
            $.tmpl("listAttendees", data.result).appendTo("ul#image_preview_list");
        });
        $('#image-form').bind('fileuploaddestroy', function (e, data) {
            _dataURL = data.url;
            var pieces = _dataURL.split(/[\s/]+/);
            _imgURL = pieces[pieces.length-1];
            _imgURL = data.url;
            $("ul#image_preview_list li a[data-url='"+_imgURL+"']").closest("li").remove();
        });
    });
EOD;

Yii::app()->clientScript->registerScript('_journal_form', $js);
?>