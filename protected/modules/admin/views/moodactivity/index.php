<?php
/* @var $this MoodactivityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Mood Activities',
);
?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Manage Mood Activities</header>

            <div class="panel-body">
                <div class="adv-table">
                    <?php
                    $report_status = CHtml::listData(AdminSetting::model()->findAllByAttributes(array('setting_name' => 'mood_report_mail')), 'setting_name', 'status');
                    ?>
                    <span class="mood-status-bar pull-left">Mood report will send to users <?php if ($report_status['mood_report_mail'] == 1) echo 'Daily';
                    elseif ($report_status['mood_report_mail'] == 2) echo 'Weekly';
                    elseif ($report_status['mood_report_mail'] == 3) echo 'Monthly'; ?></span>
                    <div class="btn-group pull-right">

                        &nbsp;
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Report Status<i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href=<?php echo Yii::app()->createAbsoluteUrl('/admin/moodactivity/report_status/?status=1') ?>>Send Report Daily</a></li>
                            <li><a href=<?php echo Yii::app()->createAbsoluteUrl('/admin/moodactivity/report_status/?status=2') ?>>Send Report Weekly</a></li>
                            <li><a href=<?php echo Yii::app()->createAbsoluteUrl('/admin/moodactivity/report_status/?status=3') ?> id="export2excel">Send Report Monthly</a></li>
                        </ul>
                    </div>

                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Email</th>
                                <th>User Mood</th>
                                <th>Created</th>
<!--                                <th>Action</th>-->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            foreach ($mood_activities as $key => $mood_activity):
                                ?>
                                <tr id="tr_<?php echo $user->user_id ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $mood_activity->mood_activity_email ?></td>
                                    <td><?php echo CHtml::image($this->createUrl("/themes/site/image/mood_type/{$mood_activity->moodActivityMood->mood_image}")); ?></td>
                                    <td><?php echo $mood_activity->created ?></td>
    <!--                                    <td>
                                    <?php
                                    echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/users/view', 'id' => $user->user_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/users/update', 'id' => $user->user_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/users/delete', 'id' => $user->user_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                    ?>
                                    </td>-->
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
    var table = $('#dynamic-table2').DataTable( {
        "aaSorting": [[ 0, "asc" ]]
    });
EOD
);
?>