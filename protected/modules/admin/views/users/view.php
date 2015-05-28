<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->user_id,
);

//$this->menu = array(
//    array('label' => 'List User', 'url' => array('index')),
//    array('label' => 'Create User', 'url' => array('create')),
//    array('label' => 'Update User', 'url' => array('update', 'id' => $model->user_id)),
//    array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->user_id), 'confirm' => 'Are you sure you want to delete this item?')),
//    array('label' => 'Manage User', 'url' => array('admin')),
//);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>View User #<?php echo $model->user_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php
                $gender = array('1' => 'Male', '2' => 'Female');
                $marital_status = array('1' => ' Married ', '2' => 'Unmarried ');

                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array(
                            'label' => '<h4>Profile Details</h4>',
                            'value' => ''
                        ),
                        'user_id',
                        'usersDetails.user_first_name',
                        'usersDetails.user_middle_name',
                        'usersDetails.user_last_name',
                        'usersDetails.user_dob',
                         array(
                            'name' => 'usersDetails.user_gender',
                            'value' => $gender[$model->usersDetails->user_gender]
                        ),
                         array(
                            'label' => 'usersDetails.user_country',
                            'value' => Myclass::getCountry($model->usersDetails->user_country)
                        ),
                        'usersDetails.user_education',
                        array(
                            'name' => 'usersDetails.user_martial_status',
                            'value' => $marital_status[$model->usersDetails->user_martial_status]
                        ),
                        array(
                            'label' => '<h4>Contact Details</h4>',
                            'value' => ''
                        ),
                        'usersDetails.user_phone',
                        'usersDetails.user_landline',
                        'usersDetails.user_address',
                        array(
                            'label' => '<h4>Account Related Information</h4>',
                            'value' => ''
                        ),
                        'user_name',
                        'user_email',
                        'user_sec_email',
                        'user_prof_image',
                        array(
                            'label' => '<h4>Important Dates(with reminder facility)</h4>',
                            'value' => ''
                        ),
                        'usersDetails.user_anniversary',
                        'usersDetails.user_spouse_dob',
                        'usersDetails.user_father_bod',
                        'usersDetails.user_mother_dob',
                        'usersDetails.user_parent_anniversary',
                        'usersDetails.user_kid_dob',
                        'usersDetails.user_kid_spouse_detail',
                        'usersDetails.user_kid_anniversary',
                        'usersDetails.user_kid_detail',
                        array(
                            'label' => '<h4>Family details</h4>',
                            'value' => ''
                        ),
                        'usersDetails.user_parents_detail',
                        'usersDetails.user_spouse_detail',
                        'usersDetails.user_detail_kids',
                        'usersDetails.user_kid1',
                        'usersDetails.user_kid2',
                        array(
                            'label' => '<h4>Interest and hobbies</h4>',
                            'value' => ''
                        ),
                        'usersDetails.user_area_of_int',
                        'usersDetails.user_sports_activity',
                        'usersDetails.user_adventure_activity',
                        'usersDetails.user_fav_color',
                        'usersDetails.user_fav_place',
                        'usersDetails.user_fav_animal',
                        'usersDetails.user_fav_fruit',
                        'usersDetails.user_like_travel',
                        array(
                            'label' => '<h4>Other</h4>',
                            'value' => ''
                        ),
                        'usersDetails.user_no_best_friend',
                        'usersDetails.user_no_friend',
                        'usersDetails.user_hangout',
                        'usersDetails.user_stress_buster',
                        'usersDetails.user_free_time',
                        'usersDetails.user_desc_urself',
                        'usersDetails.user_personality',

                        array(
                            'label' => 'Status',
                            'value' => $model->user_status == '0' ? 'In-active' : 'Active'
                        ),
                        'user_last_login',
                        'user_login_ip',
                        'created',
                        'modified',
//                        'usersDetails.user_prefix',
//                        'usersDetails.user_parent',
//                        'usersDetails.user_spouse',
//                        'usersDetails.user_anniversary_rem',
//                        'usersDetails.user_spouse_name',
//                        'usersDetails.user_spouse_dob_rem',
//                        'usersDetails.user_father_name',
//                        'usersDetails.user_mother_name',
//                        'usersDetails.user_father_bod_rem',
//                        'usersDetails.user_mother_dob_rem',
//                        'usersDetails.user_parent_anniversary_rem',
//                        'usersDetails.user_kid_dob_rem',
                    ),
                ));
                ?>

                <?php echo CHtml::link('Back', array('/admin/users/index'), array('class' => 'btn btn-sm btn-default')); ?>
            </div>
        </section>
    </div>
</div>
<style type="text/css">
    table.detail-view th{width: 260px;}
</style>
