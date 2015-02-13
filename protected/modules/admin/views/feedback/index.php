<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Feedback'
);
?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Manage Feedback</header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="btn-group pull-right">
                        <button class="btn btn-primary" id="multidelete-btn">Multi Delete</button>
                        &nbsp;
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <!--                            <li><a href="#">Print</a></li>
                                                        <li><a href="#">Save as PDF</a></li>-->
                            <li><a href="#" id="export2excel">Export to Excel</a></li>
                        </ul>
                    </div>
                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo Feedback::model()->getAttributeLabel('feedback_name') ?></th>
                                <th><?php echo Feedback::model()->getAttributeLabel('feedback_email') ?></th>
                                <th><?php echo Feedback::model()->getAttributeLabel('feedback_phone') ?></th>
                                <th><?php echo Feedback::model()->getAttributeLabel('feedback_message') ?></th>
                                <th><?php echo Feedback::model()->getAttributeLabel('created') ?></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($feedbacks as $key => $feedback): ?>
                                <tr id="tr_<?php echo $feedback->feedback_id ?>">
                                    <td><input class="multidelete" type="checkbox" id="create-switch" name="multidelete[]" data-feedbackid="<?php echo $feedback->feedback_id ?>"/></td>
                                    <td><?php echo $feedback->feedback_name ?></td>
                                    <td><?php echo $feedback->feedback_email ?></td>
                                    <td><?php echo $feedback->feedback_phone ?></td>
                                    <td><?php echo $feedback->feedback_message ?></td>
                                    <td><?php echo $feedback->created ?></td>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/feedback/view', 'id' => $feedback->feedback_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/feedback/update', 'id' => $feedback->feedback_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/feedback/delete', 'id' => $feedback->feedback_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
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

<table class="export-table hidden">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo Feedback::model()->getAttributeLabel('feedback_name') ?></th>
            <th><?php echo Feedback::model()->getAttributeLabel('feedback_email') ?></th>
            <th><?php echo Feedback::model()->getAttributeLabel('feedback_phone') ?></th>
            <th><?php echo Feedback::model()->getAttributeLabel('feedback_message') ?></th>
            <th><?php echo Feedback::model()->getAttributeLabel('created') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($feedbacks as $key => $feedback): ?>
            <tr id="tr_exp_<?php echo $feedback->feedback_id ?>">
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $feedback->feedback_name ?></td>
                <td><?php echo $feedback->feedback_email ?></td>
                <td><?php echo $feedback->feedback_phone ?></td>
                <td><?php echo $feedback->feedback_message ?></td>
                <td><?php echo $feedback->created ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
    var table = $('#dynamic-table2').DataTable( {
        "aaSorting": [[ 4, "desc" ]]
    });
        
    $(document).ready(function(){
        $('.switch-mini').on('switch-change', function (e, data) {
            feedbackid = $(this).data('feedbackid');
            $.ajax({
                type: 'post',
                url:"$baseUrl/admin/feedback/changestatus?id="+feedbackid,
                success:function(result){
                    $.gritter.add({
                        text: result,
                        sticky: false,
                        time: ''
                    });
                }
            });
        });

        $('#multidelete-btn').on('click', function(){
            var del = $('input[name="multidelete[]"]:checked');
            if(del.length < 1){
                alert("Please select the feedback to delete !!!");
            }else{
                var conf = confirm("Are you sure to delete the rows ?");

                if(conf){
                    var ChkBox = [];
                    $('input[name="multidelete[]"]:checked').each(function() {
                        ChkBox.push($(this).data('feedbackid'));
                    });

                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        data: {id: ChkBox},
                        url:"$baseUrl/admin/feedback/deletemultiple",
                        success:function(result){
                            if(result.sts == 'success'){
                                $.each(ChkBox, function( index, value ) {
                                    table.fnDeleteRow($("#tr_"+value)[0]);
                                    $("#tr_exp_"+value).remove();
                                });
                            }
                            $.gritter.add({
                                text: result.text,
                                sticky: false,
                                time: ''
                            });
                        }
                    });
                }
            }
        });
    });

EOD
);
?>