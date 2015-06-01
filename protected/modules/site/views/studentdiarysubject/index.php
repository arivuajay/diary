<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Subjects</li>
        </ol>
    </div>
</div>
<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($subjects)){?>
                            <tr>
                                <td colspan="4" class="text-center">No record found</td>
                            </tr>
                            <?php }else{?>
                                <?php foreach ($subjects as $k => $subject):
                                    ?>
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo $subject->class->class_name; ?></td>
                                        <td><?php echo $subject->subject_name; ?></td>
                                        <td><?php echo $subject->created; ?></td>
                                        <td>
                                            <?php echo CHtml::link('Edit', array('/site/studentdiarysubject/update', 'id' => $subject->subject_id))  ?>
                                            <?php //echo CHtml::link('Delete', array('/site/studentdiarysubject/delete', 'id' => $subject->subject_id), array('onClick' => 'return confirm("Are you sure to delete ?")')) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
