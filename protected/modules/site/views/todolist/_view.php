<?php
/* @var $this TodolistController */
/* @var $data Todolist */
?>
<!--
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reminder_time')); ?>:</b>
	<?php echo CHtml::encode($data->reminder_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />


</div>-->



<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Todolists</li>
        </ol>
    </div>
    <div class="topbar-right pt30">
        <?php echo CHtml::link('<button class="btn btn-default btn-sm" type="button">Add Todolist</button>', array('/site/todolist/create')); ?>
    </div>
</div>
<div id="content">
    <div class="row">
    <div class="col-md-12">

    </div>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Reminder Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($todomodel as $k => $todo):
                                ?>
                                <tr>
                                    <td><?php echo $k + 1; ?></td>
                                    <td><?php echo $todo->message; ?></td>
                                    <td><?php echo $todo->reminder_time; ?></td>
                                    <td><?php echo $todo->status; ?></td>
                                    <td>
                                        <?php echo CHtml::link('Edit', array('/site/todolist/update', 'id' => $todo->id))  ?>
                                        <?php //echo CHtml::link('View', array('/site/journal/view', 'id' => $journal->diary_id)) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
