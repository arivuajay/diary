<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
?>

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active"><a href="#">Update Profile</a></li>
        </ol>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Profile Details </span> </div>
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'profile-details',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <?php echo $form->textField($user_det_model, 'user_first_name', array('placeholder' => $user_det_model->getAttributeLabel('user_first_name'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_first_name'); ?>
                    <div class="form-group">
                        <label for="name">Middle Name</label>
                        <?php echo $form->textField($user_det_model, 'user_middle_name', array('placeholder' => $user_det_model->getAttributeLabel('user_middle_name'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_middle_name'); ?>

                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <?php echo $form->textField($user_det_model, 'user_last_name', array('placeholder' => $user_det_model->getAttributeLabel('user_last_name'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_last_name'); ?>



                    <div class="form-group">
                        <label for="wage">Date of Birth</label>
                        <?php echo $form->textField($user_det_model, 'user_dob', array('id' => 'datepicker', 'placeholder' => $user_det_model->getAttributeLabel('user_dob'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_dob'); ?>

                    <div class="form-group">
                        <label> Gender </label>

                        <?php echo $form->radioButtonList($user_det_model, 'user_gender', array('1' => 'Male', '2' => 'Female'), array('template' => '{beginLabel}{input}{labelTitle}{endLabel}', 'separator' => '', 'labelOptions' => array('class' => 'radio-inline mr10'))); ?>
                        <?php echo $form->error($user_det_model, 'user_gender'); ?>
                    </div>

                    <div class="form-group">
                        <label> Country </label>
                        <p>
                            <?php echo $form->dropDownList($user_det_model, 'user_country', Myclass::getCountry(), array('type' => 'text', 'empty' => '--Select Country--',)); ?>
                        </p>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_country'); ?>

                    <div class="form-group">
                        <label>Education</label>
                        <?php echo $form->textField($user_det_model, 'user_education', array('placeholder' => $user_det_model->getAttributeLabel('user_education'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_education'); ?>
                    <div class="form-group">
                        <label>Marital Status </label>

                        <?php echo $form->radioButtonList($user_det_model, 'user_martial_status', array('1' => ' Married ', '2' => 'Unmarried '), array('template' => '{beginLabel}{input}{labelTitle}{endLabel}', 'separator' => '', 'labelOptions' => array('class' => 'radio-inline mr10'))); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_martial_status'); ?>


                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'profile-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">

                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Contact Details </span> </div>
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'contact-details',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>
                    <div class="form-group">
                        <label for="name">Phone Number</label>
                        <?php echo $form->textField($user_det_model, 'user_phone', array('placeholder' => $user_det_model->getAttributeLabel('user_phone'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_phone'); ?>
                    <div class="form-group">
                        <label for="name">Landline Number</label>
                        <?php echo $form->textField($user_det_model, 'user_landline', array('placeholder' => $user_det_model->getAttributeLabel('user_landline'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_landline'); ?>

                    <div class="form-group">
                        <label for="name">Address</label>
                        <?php echo $form->textArea($user_det_model, 'user_address', array('rows' => 5, 'cols' => 55, 'class' => 'form-control')); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_address'); ?>

                    <div class="alert alert-theme">You authorize E2Hteam to send you SMS on this number</div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'contact-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span>Account Related Information</span> </div>
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'users-form',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>
                    <div class="form-group">
                        <label for="name">Display Name</label>
                        <?php echo $form->textField($model, 'user_name', array('placeholder' => 'Display Name', 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($model, 'user_name'); ?>
                    <div class="form-group">
                        <label for="name">Primary Email ID</label>
                        <?php echo $form->textField($model, 'user_email', array('placeholder' => 'Primary Email ID', 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'user_email'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Secondary Email ID</label>
                        <?php echo $form->textField($model, 'user_sec_email', array('placeholder' => 'Secondary Email ID', 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'user_sec_email'); ?>
                    </div>

                    <div class="form-group">

                        <?php echo $form->labelEx($model, 'Upload a Profile Photo:'); ?>
                        <?php echo $form->fileField($model, 'user_prof_image'); ?>
                        <?php
                        if (!empty($model->user_prof_image)) {
                            echo CHtml::image($this->createUrl("/themes/site/image/prof_img/" . $model->user_prof_image), 'alt', array('width' => 100, 'height' => 100));
                        }
                        ?>
                    </div><?php echo $form->error($model, 'user_image'); ?><br>



                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'update', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span>Important Dates(with reminder facility) </span> </div>
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'reminder-details',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>

                    <div class="form-group">
                        <label for="name">Date of Anniversary</label>
                        <?php echo $form->textField($user_det_model, 'user_anniversary', array('id' => 'datepicker3', 'placeholder' => $user_det_model->getAttributeLabel('user_anniversary'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_anniversary'); ?>

                    <div class="form-group">
                        <label for="name">Spouse Date of Birth</label>
                        <?php echo $form->textField($user_det_model, 'user_spouse_dob', array('id' => 'datepicker4', 'placeholder' => $user_det_model->getAttributeLabel('user_spouse_dob'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_spouse_dob'); ?>

                    <div class="form-group">
                        <label for="name">Father date of Birth</label>
                        <?php echo $form->textField($user_det_model, 'user_father_bod', array('id' => 'datepicker5', 'placeholder' => $user_det_model->getAttributeLabel('user_father_bod'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_father_bod'); ?>

                    <div class="form-group">
                        <label for="name">Mother date of Birth</label>
                        <?php echo $form->textField($user_det_model, 'user_mother_dob', array('id' => 'datepicker6', 'placeholder' => $user_det_model->getAttributeLabel('user_spouse_dob'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_mother_dob'); ?>



                    <div class="form-group">
                        <label for="wage">Parents Anniversary Dates</label>
                        <?php echo $form->textField($user_det_model, 'user_parent_anniversary', array('id' => 'datepicker7', 'placeholder' => $user_det_model->getAttributeLabel('user_parent_anniversary'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_parent_anniversary'); ?>

                    <div class="form-group">
                        <label> Kids Date of Birth </label>
                        <?php echo $form->textField($user_det_model, 'user_kid_dob', array('id' => 'datepicker8', 'placeholder' => $user_det_model->getAttributeLabel('user_kid_dob'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid_dob'); ?>

                    <div class="form-group">
                        <label> Kids Spouse Details </label>
                        <?php echo $form->textField($user_det_model, 'user_kid_spouse_detail', array('placeholder' => $user_det_model->getAttributeLabel('user_kid_spouse_detail'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid_spouse_detail'); ?>

                    <div class="form-group">
                        <label>Kids Anniversary Dates </label>
                        <?php echo $form->textField($user_det_model, 'user_kid_anniversary', array('id' => 'datepicker9', 'placeholder' => $user_det_model->getAttributeLabel('user_kid_anniversary'), 'class' => 'form-control datepicker mtn', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid_anniversary'); ?>

                    <div class="form-group">
                        <label>Kids Details </label>
                        <?php echo $form->textField($user_det_model, 'user_kid_detail', array('placeholder' => $user_det_model->getAttributeLabel('user_kid_detail'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid_detail'); ?>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'reminder-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span>Family details </span> </div>
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'family-details',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>

                    <div class="form-group">
                        <label for="name">Parents</label>
                        <?php echo $form->textField($user_det_model, 'user_parents_detail', array('placeholder' => $user_det_model->getAttributeLabel('user_parents_details'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_parents_detail'); ?>

                    <div class="form-group">
                        <label for="name">Spouse</label>
                        <?php echo $form->textField($user_det_model, 'user_spouse_detail', array('placeholder' => $user_det_model->getAttributeLabel('user_spouse_detail'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_spouse_detail'); ?>

                    <div class="form-group">
                        <label for="name">Details Of Kids</label>
                        <?php echo $form->textField($user_det_model, 'user_detail_kids', array('placeholder' => $user_det_model->getAttributeLabel('user_detail_kids'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid_detail'); ?>

                    <div class="form-group">
                        <label for="name">Kid 1</label>
                        <?php echo $form->textField($user_det_model, 'user_kid1', array('placeholder' => $user_det_model->getAttributeLabel('user_kid1'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid1'); ?>


                    <div class="form-group">
                        <label for="wage">Kid 2</label>
                        <?php echo $form->textField($user_det_model, 'user_kid2', array('placeholder' => $user_det_model->getAttributeLabel('user_kid2'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                    </div>
                    <?php echo $form->error($user_det_model, 'user_kid2'); ?>



                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'family-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="imp">
                    <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span>Interest and hobbies</span> </div>
                    <div class="panel-body">

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'hobbies-details',
                            'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                            'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                        ));
                        ?>

                        <div class="form-group">
                            <label for="name">Areas of Interest</label>
                            <?php echo $form->textField($user_det_model, 'user_area_of_int', array('placeholder' => $user_det_model->getAttributeLabel('user_area_of_int'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_area_of_int'); ?>

                        <div class="form-group">
                            <label for="name">Sports Activities</label>
                            <?php echo $form->textField($user_det_model, 'user_sports_activity', array('placeholder' => $user_det_model->getAttributeLabel('user_sports_activity'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_sports_activity'); ?>

                        <div class="form-group">
                            <label for="name">Adventure Activities</label>
                            <?php echo $form->textField($user_det_model, 'user_adventure_activity', array('placeholder' => $user_det_model->getAttributeLabel('user_adventure_activity'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_adventure_activity'); ?>



                        <div class="form-group">
                            <label for="wage">Favorite Color</label>
                            <?php echo $form->textField($user_det_model, 'user_fav_color', array('placeholder' => $user_det_model->getAttributeLabel('user_fav_color'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_fav_color'); ?>

                        <div class="form-group">
                            <label for="wage">Favorite Place</label>
                            <?php echo $form->textField($user_det_model, 'user_fav_place', array('placeholder' => $user_det_model->getAttributeLabel('user_fav_place'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_fav_place'); ?>


                        <div class="form-group">
                            <label for="wage">Your Favourite Animal</label>
                            <?php echo $form->textField($user_det_model, 'user_fav_animal', array('placeholder' => $user_det_model->getAttributeLabel('user_fav_animal'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_fav_animal'); ?>

                        <div class="form-group">
                            <label for="wage">Your Favourite Fruit</label>
                            <?php echo $form->textField($user_det_model, 'user_fav_fruit', array('placeholder' => $user_det_model->getAttributeLabel('user_fav_fruit'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_fav_fruit'); ?>

                        <div class="form-group">
                            <label for="wage">Do you like to travel / Party / Read / watch movie / adventure sports / shopping</label>

                            <p>
                                <?php echo $form->dropDownList($user_det_model, 'user_like_travel', Myclass::getTravel(), array('type' => 'text', 'empty' => '--Select Travel To--',)); ?>
                            </p>
                        </div>
                        <?php echo $form->error($user_det_model, 'user_like_travel'); ?>



                        <div class="form-group">
                            <?php echo CHtml::submitButton('Submit', array('name' => 'hobbies-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span>Other</span> </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'hobbies-details',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'role' => 'form'),
                    ));
                    ?>

                    <div class="form-group">
                        <label for="wage">Favorite Color</label>


                    </div>

                    <div class="form-group">
                        <label for="name">Number of Best Friends</label>
                        <?php echo $form->textField($user_det_model, 'user_no_best_friend', array('placeholder' => $user_det_model->getAttributeLabel('user_no_best_friend'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_no_best_friend'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Number of Friends</label>
                        <?php echo $form->textField($user_det_model, 'user_no_friend', array('placeholder' => $user_det_model->getAttributeLabel('user_no_friend'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_no_friend'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">You like to hangout with</label>
                        <?php echo $form->textField($user_det_model, 'user_hangout', array('placeholder' => $user_det_model->getAttributeLabel('user_hangout'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_hangout'); ?>
                    </div>


                    <div class="form-group">
                        <label for="wage">What are your stress busters</label>
                        <?php echo $form->textField($user_det_model, 'user_stress_buster', array('placeholder' => $user_det_model->getAttributeLabel('user_stress_buster'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_stress_buster'); ?>
                    </div>

                    <div class="form-group">
                        <label for="wage">What do you do in your free time</label>
                        <?php echo $form->textField($user_det_model, 'user_free_time', array('placeholder' => $user_det_model->getAttributeLabel('user_free_time'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_free_time'); ?>
                    </div>


                    <div class="form-group">
                        <label for="wage">How do you describe yourself</label>
                        <?php echo $form->textField($user_det_model, 'user_desc_urself', array('placeholder' => $user_det_model->getAttributeLabel('user_desc_urself'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_desc_urself'); ?>
                    </div>

                    <div class="form-group">
                        <label for="wage">What kind of personality you are</label>
                        <?php echo $form->textField($user_det_model, 'user_personality', array('placeholder' => $user_det_model->getAttributeLabel('user_personality'), 'class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($user_det_model, 'user_personality'); ?>
                    </div>


                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('name' => 'others-details', 'class' => 'submit btn bg-purple pull-right',)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading"> <span class="panel-title">
                        <span class="glyphicon glyphicon-lock text-purple2"></span>Change Password</span>
                </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'change-password-form',
                        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form')
                    ));
                    ?>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                            <?php echo $form->passwordField($model, 'currentpassword', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('currentpassword'))); ?>
                        </div>
                        <?php echo $form->error($model, 'currentpassword'); ?>
                    </div>

                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                            <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('new_password'))); ?>
                        </div>
                        <?php echo $form->error($model, 'new_password'); ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                            <?php echo $form->passwordField($model, 'confirm_password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('confirm_password'))); ?>
                        </div>
                        <?php echo $form->error($model, 'confirm_password'); ?>
                    </div>

                </div>

                <div class="panel-footer">
                    <?php echo CHtml::submitButton('Save', array('name' => 'forgot', 'class' => 'btn btn-sm bg-purple2 pull-right',)); ?>
                    <div class="clearfix"></div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
