<div class="row">
    <div class="col-sm-12">
        <?php
            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
            }
        ?>

        <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('admin/default/index'); ?>"><i class="fa fa-home"></i></a><span class="divider">&nbsp;</span>
            </li>
            <li><a href="#">Users</a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Manage Users</header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="btn-group pull-right">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
<!--                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>-->
                            <li><a href="#" id="export2excel">Export to Excel</a></li>
                        </ul>
                    </div>
                    <table  class="display table table-bordered table-striped export-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Last Login</th>
                                <th>Active Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $key => $user): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $user->user_name ?></td>
                                    <td><?php echo $user->user_email ?></td>
                                    <td><?php echo $user->user_last_login ?></td>
                                    <td>
                                        <div class="has-switch" tabindex="0">
                                            <div class="switch-off switch-animate">
                                                <span class="switch-left switch-mini switch-success">ON</span><label class="switch-mini">&nbsp;</label><span class="switch-right switch-mini switch-info">OFF</span><input type="checkbox" class="switch-mini" data-off="info" data-on="success" checked=""></div></div>                                        
                                    </td>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/users/view', 'id' => $user->user_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/users/update', 'id' => $user->user_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/users/delete', 'id' => $user->user_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
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