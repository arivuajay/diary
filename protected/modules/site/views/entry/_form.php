<?php
/* @var $this EntryController */
/* @var $model Entry */
/* @var $form CActiveForm */
?>

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

<section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-active"><a href="forms.html">WRITE AN ENTRY</a></li>
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
              <form class="cmxform" id="altForm" method="get">
                <div class="form-group">
                  <label for="name">Your Name</label>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Rajat Grover" required />
                </div>
                <div class="form-group">
                  <label for="wage">Title</label>
                  <input id="wage" name="wage" type="text" class="form-control" placeholder="Title" required/>
                </div>
                <div class="form-group">
                  <label> Your Phone Number </label>
                  <input type="text" class="form-control" maxlength="10" autocomplete="off" placeholder="No">
                </div>
                <div class="form-group">
                  <label> Your Email </label>
                  <input type="text" class="form-control" maxlength="10" autocomplete="off" placeholder="Email id">
                </div>                
                <div class="form-group">
                  <label> Date </label>
                  <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                      <input type="text" id="datepicker" class="form-control datepicker mtn" placeholder="23/9/2013">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Select Mood</label>
                  <div class="col-md-9">
                    <label class="radio-inline mr10">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <img src="<?php echo $themeUrl; ?>/css/frontend/img/smiley-img.png"> </label>
                    <label class="radio-inline mr10">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <img src="<?php echo $themeUrl; ?>/css/frontend/img/smiley-img1.png"> </label>
                    <label class="radio-inline mr10">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                      <img src="<?php echo $themeUrl; ?>/css/frontend/img/smiley-img2.png"> </label>
                  </div>
                </div>                
              </form><br>
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
                      <div class="summernote" style="height: 100px;">This is the <b>Summernote</b> Editor...</div>
                    </div>
                  </div>            
                </div>
                <div class="form-group">
                  <input class="submit btn bg-purple pull-right" type="submit" value="Submit" />
                </div>
            </div>
          </div>                              
        </div>
      </div>
    </div>
  </section>