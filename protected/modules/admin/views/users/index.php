
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
            <h3 class="page-title">Users</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('admin/default/index'); ?>"><i class="fa fa-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li><a href="#">Users</a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>User's Details
                    </h4>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered datatable" id="sample_1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $key => $user):?>
                                <tr class="odd gradeX">
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $user->user_name ?></td>
                                    <td><?php echo $user->user_email ?></td>
                                    <td><?php echo $user->user_last_login ?></td>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/users/view', 'id' => $user->user_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/users/update', 'id' => $user->user_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/users/delete', 'id' => $user->user_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE widget-->
        </div>
    </div> 
</div>