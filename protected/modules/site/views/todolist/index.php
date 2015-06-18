<?php
/* @var $this TodolistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Todolists',
);

$this->menu = array(
    array('label' => 'Create Todolist', 'url' => array('create')),
    array('label' => 'Manage Todolist', 'url' => array('admin')),
);
?>

<!--<h1>Todolists</h1>-->

<?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//        'todomodel'=>$todomodel,
//	'itemView'=>'_view',
//)); 
?>

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
                                <th>Remind Me</th>
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
                                    <td><?php
                                        if ($todo->status == 1) {
                                            echo 'Active';
                                        }if ($todo->status == 2) {
                                            echo 'Completed';
                                        }
                                        ?></td>
                                    <td>
                                        <input type="checkbox" value="<?php echo $todo->remind_me ?>" <?php echo($todo->remind_me == 1) ? 'checked' : '' ?> onclick="changeRemindMe(<?php echo $todo->id ?>)">
                                    </td>
                                    <td>
                                        <?php echo CHtml::link('Edit', array('/site/todolist/update', 'id' => $todo->id)) ?>&nbsp;
                                        <?php echo CHtml::link('Delete', array('/site/todolist/delete', 'id' => $todo->id), array('confirm' => 'Are you sure?')) ?>
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

<script>
    function changeRemindMe(todoID) {
        $.ajax({
            method: "POST",
            url: "<?php echo Yii::app()->baseUrl ?>/site/todolist/changeremindme",
            data: {todoID: todoID}
        })
                .done(function(msg) {
                    alert(msg);
                });
    }
</script>
