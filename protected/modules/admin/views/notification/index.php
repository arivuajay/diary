<?php
/* @var $this NotificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Notifications',
);

$this->menu = array(
    array('label' => 'Create Notification', 'url' => array('create')),
    array('label' => 'Manage Notification', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Notifications
                <span class="pull-right">
                    <?php echo CHtml::link('+ Add Notification', array('/admin/notification/create'), array('class' => 'label label-success')); ?>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">

                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notification Title</th>
                                <th>Notification Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($models as $key => $model):
                                ?>
                                <tr id="tr_<?php echo $model->notification_id ?>">
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $model->notification_title; ?></td>
                                    <td><?php echo $model->notification_message; ?></td>
                                    <td>
                                        <?php
//                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/notification/view', 'id' => $model->notification_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/notification/update', 'id' => $model->notification_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/notification/delete', 'id' => $model->notification_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>