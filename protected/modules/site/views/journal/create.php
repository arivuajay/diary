<?php

/* @var $this JournalController */
/* @var $model Diary */

$this->breadcrumbs = array(
    'Diaries' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Diary', 'url' => array('index')),
    array('label' => 'Manage Diary', 'url' => array('admin')),
);
?>


<?php
if (@$_COOKIE['diary_mode'] == '2'):
    $this->renderPartial('_student_form', array('model' => $model));
else:
    $this->renderPartial('_form', array('model' => $model));
endif;
