<?php
/* @var $this EntryController */
/* @var $model Entry */
/* @var $form CActiveForm */
?>
 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<!--<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entry-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_activation_key'); ?>
		<?php echo $form->textField($model,'temp_activation_key',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_activation_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_title'); ?>
		<?php echo $form->textField($model,'temp_title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_description'); ?>
		<?php echo $form->textArea($model,'temp_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'temp_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_category_id'); ?>
		<?php echo $form->textField($model,'temp_category_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'temp_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_tags'); ?>
		<?php echo $form->textField($model,'temp_tags',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_current_date'); ?>
		<?php echo $form->textField($model,'temp_current_date'); ?>
		<?php echo $form->error($model,'temp_current_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_user_mood_id'); ?>
		<?php echo $form->textField($model,'temp_user_mood_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'temp_user_mood_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_upload'); ?>
		<?php echo $form->textArea($model,'temp_upload',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'temp_upload'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div> form -->

<?php
 $baseUrl = Yii::app()->baseUrl;
 $themeUrl = Yii::app()->theme->baseUrl;
?>

<!-- Start: Content -->
  <section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-active"><a href="#">WRITE AN ENTRY</a></li>
          <li class="crumb-link"><a href="index.html">Home</a></li>
          <li class="crumb-trail">WRITE AN ENTRY</li>
        </ol>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-6">
          <div class="panel">
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Field Validation </span> </div>
            <div class="panel-body">

            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diary-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                 'clientOptions' => array(
                            'validateOnSubmit' => true,

                        ),
)); ?>

                <?php echo $form->errorSummary($model); ?>
<!--              <form class="cmxform" id="altForm" method="get">-->
<!--                <div class="form-group">
                  <label for="name">Your Name</label>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Rajat Grover" required />
                </div>-->
                <div class="form-group">
                  <?php echo $form->labelEx($model,'temp_title'); ?>
		  <?php echo $form->textField($model,'temp_title',array('class'=>'form-control','size'=>60,'maxlength'=>250)); ?>
		  <?php echo $form->error($model,'temp_title'); ?>
                </div>
                <div class="form-group">
                  <?php echo $form->labelEx($model,'temp_category_id'); ?>
                  <?php  echo $form->dropDownList($model, 'temp_category_id', Myclass::getCategory(), array('type'=>'text','empty'=>'--Select Your Category--','class' => 'form-control ')); ?>
                  <?php //echo $form->textField($model,'diary_category_id',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
                 <?php echo $form->error($model,'temp_category_id'); ?>
                </div>
                <div class="form-group">
                 <?php echo $form->labelEx($model,'temp_tags'); ?>
                 <?php echo $form->textField($model,'temp_tags',array('class'=>'form-control','size'=>60,'maxlength'=>250)); ?>
                  <?php echo $form->error($model,'temp_tags'); ?>
                </div>
                <div class="form-group">
                   <?php echo $form->labelEx($model,'temp_current_date'); ?>
                  <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                    <?php //echo $form->textField($model,'diary_current_date',array('id'=>'datepicker','class'=>'form-control')); ?>

                        <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'temp_current_date',

    'htmlOptions' => array(
        'id'=>'datepicker',
        'class'=>'form-control',
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));
?>
		    <?php echo $form->error($model,'temp_current_date'); ?>
                    </div>
                  </div>
                </div>
 <div class="form-group">
                 <?php echo $form->labelEx($model,'temp_upload'); ?>
                 <?php echo $form->fileField($model,'temp_upload'); ?>
                  <?php echo $form->error($model,'temp_upload'); ?>
                </div>
                <div class="form-group">
<!--                  <label class="col-md-3 control-label">Select Mood</label>-->
                  <?php echo $form->labelEx($model,'temp_user_mood_id',array('class'=>'col-md-3 control-label')); ?>

<div class="col-md-9">

    <?php
$model->temp_user_mood_id=Yii::app()->session['temp_user_mood'];

 $moods = Myclass::getMood();
//echo Yii::app()->session['temp_user_mood'];
  foreach($moods as $key => $mood){
//echo $form->radioButtonList($model,'diary_user_mood_id', Myclass::getMood(),array('template' => '{input}<img src='.$themeUrl.'/css/frontend/img/smiley-img'.''.'.png>', 'style' => 'width:20px!important', 'separator' => ''));

?>

                    <label class="radio-inline mr10">
                        <?php echo $form->radioButton($model,'temp_user_mood_id',array('value'=>$key,'uncheckValue'=>null)); ?>
                      <img src="<?php echo $themeUrl;?>/css/frontend/img/mood_<?php echo $key?>.png"> </label>

  <?php }?>

                  </div>
                </div>




<!--              </form>-->
              <br>
				<br><br>
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
                      <?php //echo $form->textArea($model,'diary_description',array('class'=>'summernote','rows'=>6, 'cols'=>50)); ?>
                   <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<div class="">
    <?php //echo $form->labelEx($model,'diary_description'); ?>
    <?php echo $form->textArea($model, 'temp_description', array('id'=>'editor1')); ?>
    <?php echo $form->error($model,'temp_description'); ?>
</div>



<script type="text/javascript">
    CKEDITOR.replace( 'editor1', {
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
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class'=>'submit btn bg-purple pull-right')); ?>
	</div>
<!--                  <input class="submit btn bg-purple pull-right" type="submit" value="Submit" />-->
                </div>

                  <?php $this->endWidget(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End: Content -->