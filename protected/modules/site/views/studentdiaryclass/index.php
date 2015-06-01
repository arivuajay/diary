<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classes',
);

?>


<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Class</li>
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
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($classes)){?>
                            <tr>
                                <td colspan="4" class="text-center">No record found</td>
                            </tr>
                            <?php }else{?>
                                <?php foreach ($classes as $k => $class):
                                    ?>
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo $class->class_name; ?></td>
                                        <td><?php echo $class->created; ?></td>
                                        <td>
                                            <?php echo CHtml::link('Edit', array('/site/studentdiaryclass/update', 'id' => $class->class_id))  ?>
                                            <?php //echo CHtml::link('Delete', array('/site/studentdiaryclass/delete', 'id' => $class->class_id), array('onClick' => 'return confirm("Are you sure to delete ?")')) ?>
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
