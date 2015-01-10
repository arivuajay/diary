<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
            <h3 class="link-title">Links</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('/admin/default/index'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li><a href="#">Links</a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget box blue">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> <?php echo ($model->isNewRecord) ? "Add Link" : "Update Link"; ?></h4>
                </div>
                <div class="widget-body form">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'cms-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php echo $form->errorSummary(array($model)); ?>

                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'label', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'label', array('class' => 'span6')); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'menuType', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->dropdownList($model, 'menuType', array('1' => 'CMS Page', 'Module/Controller/Action', 'External Url'), array('class' => 'span6', 'empty' => 'Select Page Type', 'id' => 'pageType')); ?>
                        </div>
                    </div>

                    <div class="control-group hide" id="url_fieldset">
                        <?php echo $form->labelEx($model, 'url', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php
                            echo $form->textField($model, 'url', array('class' => 'span6', 'id' => 'UrlBox'));
                            $cmsPages = CHtml::listData(CmsContent::model()->findAll(), 'id', 'heading');
                            echo $form->dropDownList($model, 'url', $cmsPages, array('class' => 'span6', 'id' => 'UrlList'));
                            ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pageType').change(function() {
            var _val = $(this).val();
            if (_val != '') {
                if (_val == '1') {
                    $('#UrlList').show().removeAttr('disabled');
                    $('#UrlBox').hide().attr('disabled');
                } else {
                    $('#UrlBox').show().removeAttr('disabled');
                    $('#UrlList').hide().attr('disabled');
                }

                $("#url_fieldset").removeClass('hide');
            } else {
                $("#url_fieldset").addClass('hide');
            }
        });
    });
</script>


